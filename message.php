<?php 
include('check.php');
include('custom.php');
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
    
    <script>
        var mult = function(arg1, arg2){
            $.ajax({
            url: "new2.php?action=mult&arg1="+arg1+"&arg2="+arg2
            }).done(function(data) {
            alert(data);
            });
        }

        function change_view(){
           var x = document.getElementById("sms");
           var y = document.getElementById("switch_toggle");
           var z = document.getElementById("e_mail");
           if(y.checked == true){
                 x.style.display = "none";
                 z.style.display = "inherit";
           }
           else if(y.checked == false){
               z.style.display = "none";
               x.style.display = "inherit";
           }
          
        }
    </script>
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
<h5 class="profile_name wow FadeInDown animted">Hi, <?php
    echo  $_SESSION['name']." (". $_SESSION['username'].")";;
?>
</h5>
<section class="message_section">
  <div class="container">
    <div class="row">
        <div class="message_outer col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 wow zoomIn animted">
                <div class="inner_div">
                        <div class="row">
                            <center><h3>Send message</h3>
                            <br>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <h4><b>SMS</b></h4>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <label class="switch">
                                <input type="checkbox" id="switch_toggle" onClick="change_view()" checked>
                                <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <h4><b>E-MAIL</b></h4>
                            </div></center>
                            <div id="sms">
                                <form action = "sms.php" method = "post">
                                    <input type="text" name = "mobile" class="input_area col-md-12 col-sm-12 col-xs-12" placeholder="Mobile no." autocomplete="off" required/>
                                    <textarea type="text" name = "message" class="input_area col-md-12 col-sm-12 col-xs-12" rows="5" resize="none" placeholder="Message" autocomplete="off" required/></textarea>
                                    <button type="submit" class="btn login_btn  col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12"><b>Send SMS</b></button>
                                </form>
                            </div>
                            <div id="e_mail">
                                <form action = "email.php" method = "post">
                                    <input type="email" name = "email" class="input_area col-md-12 col-sm-12 col-xs-12" placeholder="Email Id" autocomplete="off" required/>
                                    <textarea type="text" name = "message_email" class="input_area col-md-12 col-sm-12 col-xs-12" rows="5" resize="none" placeholder="Message" autocomplete="off" required/></textarea>
                                    <button type="submit" class="btn login_btn  col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12"><b>Send E-mail</b></button>
                                </form>
                            </div>
                        </div>
                        <br>
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