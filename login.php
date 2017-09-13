<?php 

   include('config.php');
   include('custom.php');
    
   if($_SERVER["REQUEST_METHOD"] == "POST") { 
      // username and password sent from form  
       
      $username = $_POST['username']; 
      $password = $_POST['password'];

      $login = Login($username,$password);	  
	  
	  if($login){
		  header('location: index.php');
	  }
	  else {
		  if(Display('Your Login Name or Password is invalid')){
		  header('Refresh: 0');
		  exit();	
		  }
	  }
   }
	  
?>


<!DOCTYPEhtml>
<html>
<head>
    <title>E-billing</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="css/main.css" rel="stylesheet">
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">
    


</head>
<body style="background: #00aeef;background: -webkit-linear-gradient(to right, #00aeef, #f2fcfe);background: linear-gradient(to right, #00aeef, #f2fcfe);"> 
    <div class="container">
        <div class="row">
            <div class="login_outter_div col-md-4 col-md-offset-4 col-xs-12 col-sm-10 wow bounceInDown animted">
                <div class="inner_div">
                    <form action = "" method = "post">
                        <div class="row">
                            <center><img class="user_img" src="img/user.png" alt="useer">
                            <h3 style="margin: -1vh auto 2vh auto;">Staff Login</h3></center>
                            <input type="text" name = "username" class="input_area col-md-12 col-sm-12 col-xs-12" placeholder="Username"/>
                            <input type="password" name = "password" class="input_area col-md-12 col-sm-12 col-xs-12" placeholder="Password"/>
                            <button type="submit" class="btn login_btn col-md-12 col-sm-12 col-xs-12"><b>Login</b></button>
                        </div>
                    </form>
                    <br>
                    <br>
                    <center><a href="password.php">Forgot Password?</a></center>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="style/js/bootstrap.min.js"></script> 
    <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
    </script>
</body>
</html>