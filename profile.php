<?php 
include('check.php');
include('custom.php');

global $con;
$username1  =  $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username = '$username' "; 
$sth = mysqli_query($con, $sql);
$rows = array();
    while($r = mysqli_fetch_array($sth, MYSQLI_ASSOC)) {
    $rows = $r;
}
if($_SERVER["REQUEST_METHOD"] == "POST") { 
      // username and password sent from form  
       
      $password = $_POST['pro_password'];
      $password_old = $_POST['pro_password_old'];
      $userid = $rows['userid'];
      if($password_old == $rows['password']){
        $update = pro_update($password,$userid);
        if($update){
            if(Display('Login password successfully updated')){
            header('Refresh: 0');	
            }
        }
        else{
            if(Display('Error Occured')){
            header('Refresh: 0');	
            }
        }
      }
      else{
          if(Display('Please enter correct old password')){
            header('Refresh: 0');	
            }
      }  
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-billing | Send Message</title>
    <link href="css/main.css" rel="stylesheet">
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coda" rel="stylesheet">
    
</head>

<body style="background: #00aeef;">
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php">E-Billing system</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="invoice.php">Invoice</a></li>
        <li><a href="message.php">Send message</a></li>
        <li><a href="previewBill.php">Preview Bills</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li onclick="logout()"><a href="#">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
		<script>function logout() {
			var r= confirm("Logout?");
			if (r == true){
				location.href="logout.php";
			}
		}
</script>
<section class="message_section">
  <div class="container">
    <div class="row">
        <div class="message_outer col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 wow zoomIn animted">
                <div class="inner_div">
                        <div class="row">
                           <div class="col-md-5 col-sm-5 col-xs-12">
                                <center><img src="img/avatar.png" class="img-circle img-responsive" style="height:30vh;"/></center>
                           </div>
                           <div class="user_info col-md-7 col-sm-7 col-xs-12">
                                <div class="row">
                                    
                                        <div class="col-md-4 col-sm-4 col-xs-5">
                                            <p><b>NAME :</b></p>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-7">
                                            <p><?php echo  $rows['name'] ;?></p>
                                        </div>    
                                        <div class="col-md-4 col-sm-4 col-xs-5">
                                            <p><b>MOBILE :</b></p>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-7">
                                            <p><?php echo  $rows['mobile'] ;?></p>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-5">
                                            <p><b>EMAIL :</b></p>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-7">
                                            <p><?php echo  $rows['email'] ;?></p>
                                        </div><div class="col-md-4 col-sm-4 col-xs-5">
                                            <p><b>ADDRESS :</b></p>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-7">
                                            <p><?php echo  $rows['address'] ;?></p>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-5">
                                            <p><b>AGE :</b></p>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-7">
                                            <p><?php echo  $rows['age'] ;?></p>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-5">
                                            <p><b>GENDER :</b></p>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-7">
                                            <p><?php echo  $rows['gender'] ;?></p>
                                        </div>
                                         
                                </div>
                           </div>
                        </div>
                        <div class="row">
                            <form action = "" method = "post">
                                <div class="change_pass col-md-12 col-sm-12 col-xs-12">
                                    <center><h2>Login Credentials</h2>
                                    <h5 style="margin-top:20px;margin-bottom:20px;"><b>USERNAME : <?php echo  $rows['username'] ;?></b></h5></center>
                                    <input type="password" name = "pro_password_old" class="input_area col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3" placeholder="Old Password" required/>
                                    <input type="password" name = "pro_password" class="input_area col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3" placeholder="New Password" required/>
                                    <button type="submit" class="btn profil_update col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3"><b>Update</b></button>
                                </div>
                            </form>
                        </div>
                        
                </div>
        </div>
    </div>
  
</section>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="style/js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
</script> 
</body>

</html>