<?php 

   include('config.php');
   include('custom.php');
    
   if($_SERVER["REQUEST_METHOD"] == "POST") { 
      // username and password sent from form  
       
      $username = $_POST['username']; 
      $mobile = $_POST['mobile'];

      $send_pass = SendPassword($username,$mobile);	  
	  
	  if($send_pass){
          if(Display('Your password sent to your mobile successfully :)')){
		  header('Refresh: 0');
		  exit();	
		  }
	  }
	  else {
		  if(Display('Your Username or Mobile no. is invalid !')){
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
    <link href="https://fonts.googleapis.com/css?family=Coda" rel="stylesheet">
    


</head>
<body style="background: #00aeef;background: -webkit-linear-gradient(to right, #00aeef, #f2fcfe);background: linear-gradient(to right, #00aeef, #f2fcfe);"> 
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-8 col-xs-12 col-md-offset-4  wow bounceInRight animted">
                <div class="forgetpass">
                    <div class="inner_div">
                    <form action = "" method = "post">
                        <div class="row">
                            <h2 style="margin: -1vh auto 2vh auto;font-family: 'Coda', cursive;">Recover Password</h2></center>
                            <br>
                            <input type="text" name = "username" class="input_area col-md-12 col-sm-12 col-xs-12" placeholder="Username" autocomplete="off" required/>
                            <input type="text" name = "mobile" class="input_area col-md-12 col-sm-12 col-xs-12" placeholder="Mobile no." autocomplete="off" required/>
                            <button type="submit" class="btn login_btn col-md-12 col-sm-12 col-xs-12"><b>Send Password</b></button>
                        </div>
                        <br>
                    </form>
                    <br>
                    <center><a href="login.php">Go back to Login</a></center>
                </div>
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