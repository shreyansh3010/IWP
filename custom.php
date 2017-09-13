<?php
include('config.php');

$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

$commission = 1;

function Display($message){
	
	echo "<script>alert('$message')</script>";
	return true;
}

function RegisterUser($name, $email, $username, $password){
	global $con;
	
	$name = mysqli_real_escape_string($con,$name);
	$username = mysqli_real_escape_string($con,$username);
	$email = mysqli_real_escape_string($con,$email);
	$password = mysqli_real_escape_string($con,$password);
	$sql = $con->query("INSERT INTO user (name,email,username,password) VALUES ('$name','$email','$username','$password')");
	if($sql){
	return true;
	}
	else {
		return false;
	}
	
}

function CheckEmail($email){
	global $con;
	
	$email = mysqli_real_escape_string($con,$email);
	$sql = "SELECT email FROM user WHERE email = '$email'";
    $result = mysqli_query($con,$sql);
    $rows = mysqli_fetch_array($result,MYSQLI_ASSOC); 
    $count = mysqli_num_rows($result);
	
	if($count>0)
    {
		return true;
    }
	else
    {
		return false;
    }	
}

function CheckUsername($username){
	global $con;
	
	$sql = "SELECT username FROM user WHERE username = '$username'";
    $result = mysqli_query($con,$sql);
    $rows = mysqli_fetch_array($result,MYSQLI_ASSOC); 
    $count = mysqli_num_rows($result);
	
	if($count>0)
    {
		return true;
    }
	else
    {
		return false;
    }	
}

function Login($username, $password){
	global $con;
	
	 $username = mysqli_real_escape_string($con,$username); 
     $password = mysqli_real_escape_string($con,$password); 	  
	  
     $sql = "SELECT userid FROM user WHERE username = '$username' and password = '$password'"; 
     $result = mysqli_query($con,$sql); 
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
     $count = mysqli_num_rows($result); 
	 
	 if($count == 1) { 
	 session_start();
     $_SESSION['username'] = $username; 
	 return true;
     }
	 else { 
	 return false;
     } 
	
}

function TotalBlogCount(){
	global $con;
	
	$sql = mysqli_query($con,"SELECT MAX(id) as id FROM blog");
	$count = mysqli_fetch_array($sql,MYSQLI_ASSOC); 
	
	if($sql){
		return $count['id'];
	}
	else {
		return false;
	}
}

function GetBlog($blog_id){
	global $con;
	
	$sql = mysqli_query($con,"SELECT title, content,  author, date, category, price, intro FROM blog WHERE id='$blog_id' ");
    $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
    
	if($sql){
		return $row;
	}
	else {
		return false;
	}
}

function RegisterBlog($title, $intro, $category, $author, $content, $price/*, $photo, $temp_photo*/)
{
    global $con;

    $title = mysqli_real_escape_string($con, $title);
    $intro = mysqli_real_escape_string($con, $intro);
    $category = mysqli_real_escape_string($con, $category);
    $author = mysqli_real_escape_string($con, $author);
    $content = mysqli_real_escape_string($con, $content);
    $price = mysqli_real_escape_string($con, $price);
    //$photo = mysqli_real_escape_string($con,$photo);

    $checkblogtitle = CheckBlogTitle($title);
    if ($checkblogtitle) {

        $sql = mysqli_query($con, "INSERT INTO blog (title,intro,category,author,content,price,/*image,*/date) values ('$title','$intro','$category','$author','$content',$price, now())");

        //if(move_uploaded_file($temp_photo, 'style/images/blog/' . $photo)){

        	return true;
        //	}

        $sql2 = mysqli_query($con, "SELECT id FROM blog WHERE title='$title' ");
        $row = mysqli_fetch_array($sql2, MYSQLI_ASSOC);

        if ($sql2) {
            return $row;
        } else {
            return false;
        }
    }


	else {
		if(Display('The title already exists')){
			header('Refresh: 0');
			return false;
		}
	}

}

function CheckBlogTitle($title){
	global $con;
		
	$sql = "SELECT title FROM blog WHERE title = '$title'";
    $result = mysqli_query($con,$sql);
    $rows = mysqli_fetch_array($result,MYSQLI_ASSOC); 
    $count = mysqli_num_rows($result);
	
	if($count>0)
    {
		return false;
    }
	else
    {
		return true;
    }	
		
}

function GetUserData($username){
	global $con;
	
	$sql = mysqli_query($con,"SELECT name, avatar, email, balance, address, number, dob FROM user WHERE username='$username' ");
    $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
	
	if($sql){
		return $row;
		exit();
	}
	else
    {
		return false;
		exit();
    }
	
}

function UpdateProfile($name, $email, $address, $number, $dob, $photo, $temp_photo, $username){
	global $con;
	
	$name = mysqli_real_escape_string($con,$name);
	$email = mysqli_real_escape_string($con,$email);
	$address = mysqli_real_escape_string($con,$address);
	$number = mysqli_real_escape_string($con,$number);
	$dob = mysqli_real_escape_string($con,$dob);
	$photo = mysqli_real_escape_string($con,$photo);
	$temp_photo = mysqli_real_escape_string($con,$temp_photo);
	$username = mysqli_real_escape_string($con,$username);
		
	$sql = $con->query("UPDATE blog SET name = '$name', email = '$email', address = '$address', number = $number, dob = '$dob', avatar = '$photo' WHERE username = '$username'");
	
	if(move_uploaded_file($temp_photo, 'style/images/user/' . $photo)){
		
		// Tells you if its all ok
		}
	
	if($sql){
		return true;
	}
	else {
		return false;
	}
}

function TotalUsers(){
	global $con;
	
	$sql = "SELECT * FROM user";
    $result = mysqli_query($con,$sql);
    $rows = mysqli_fetch_array($result,MYSQLI_ASSOC); 
    $count = mysqli_num_rows($result);
	
	if($sql){
		return $count;
	}
	else {
		return false;
	}
	
}

function NetFunds(){
	global $con;
	
	$sql = mysqli_query($con,"SELECT MAX(userid) as id FROM user");
	$count = mysqli_fetch_array($sql,MYSQLI_ASSOC); 
	$max_count = $count['id'];
	
	if($sql){
	$netbalance = 0;
	
	for ($counter = 1; $counter <= $max_count; $counter++){
		$sql = "SELECT balance FROM user WHERE userid = '$counter'";
        $result = mysqli_query($con,$sql);
        $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);
		if(!empty($rows['balance'])){
		$balance = $rows['balance'];
		
		$netbalance = $netbalance + $balance;
		}
	}
		return $netbalance;
	}
	else {
		return false;
	}
}

function NetProfit(){
	global $con;
	
	$sql = "SELECT balance FROM user WHERE username = 'saurabh638'";
    $result = mysqli_query($con,$sql);
	$rows = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$profit = $rows['balance'];
	
	if($sql){
		return $profit;
	}
	else {
		return false;
	}
}

function UpdateBalance($username, $netbalance){
	global $con;
	
	$netbalance = mysqli_real_escape_string($con,$netbalance);
	$sql3 = mysqli_query($con,"UPDATE user SET balance=$netbalance WHERE username='$username' ");
	
	if($sql3){
		return true;
	}
	else {
		return false;
	}
}

function RegisterPurchase($post_id, $username){
	global $con;
	
	$sql = $con->query("insert into purchase(post_id,user) values ('$post_id','$username')");
	if($sql){
		return true;
	}
	else {
		return false;
	}
}
?>