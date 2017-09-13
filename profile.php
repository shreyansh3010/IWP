<?php
include('check.php');
include('custom.php');

				$user = $_SESSION['username'];
				$username = $_GET['username'];
				$userdata = GetUserData($username);
				if($userdata){
				$name = $userdata['name'];
	            $avatar = $userdata['avatar'];
	            $email = $userdata['email'];
	            $balance = $userdata['balance'];
	            $address = $userdata['address'];
	            $number = $userdata['number'];
	            $dob = $userdata['dob'];
				
				if($dob == 0000-00-00){
			       $dob = '';
	            }
	            if($number == 0){
			       $number = '';
	            }
				}
			?>	


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="style/images/favicon.png">
    <title>ANSAT|PROFILE</title>
    <!-- Bootstrap core CSS -->
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/css/plugins.css" rel="stylesheet">
    <link href="style/css/prettify.css" rel="stylesheet">
	<link href="style/css/file_button.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="style/css/color/green.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,800,700,600,500,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>
    <link href="style/type/fontello.css" rel="stylesheet">
    <link href="style/type/budicons.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="style/js/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".hideme").hide();

            $(".btn").click(function(){
                $(".hideme").toggle(900);
            });
        });
    </script>
</head>
<body class="full-layout">
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>
<div class="body-wrapper">
  <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header"> <a class="btn responsive-menu" data-toggle="collapse" data-target=".navbar-collapse"><i></i></a>
      <div class="navbar-brand text-center"> <a href="home.php"></a> </div>
      <!-- /.navbar-brand --> 
    </div>
    <!-- /.navbar-header -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="home.php" class="hint--right" data-hint="Home"><i class="budicon-home-1"></i><span>Home</span></a></li>
        <li><a href="dashboard.php" class="hint--right" data-hint="Dashboard"><i class="budicon-image"></i><span>Dashboard</span></a></li>
        <li class="current"><a href="profile.php?username=<?php echo $_SESSION['username'];?>" class="hint--right" data-hint="Profile"><i class="budicon-author"></i><span>Profile</span></a></li>
        <li><a href="blog.php?category=" class="hint--right" data-hint="Blog"><i class="budicon-book-1"></i><span>Blog</span></a></li>
		<li><a class="hint--right" data-hint="Logout"><i class="budicon-monitor" onclick="logout()"></i><span>Logout</span></a></li>
		<script>function logout() {
			var r= confirm("Logout?");
			if (r == true){
				location.href="logout.php";
			}
		}
		</script>
      </ul>

    </div>
       </nav>
<div class="body-wrapper">
    <div class="page">
        <div class="container">
            <section>
                <div class="box">
                    <center><h1>Profile</h1></center>
                    <div class="row">
                        <div class="col-sm-2"></div>
						<div class="col-sm-8" >
						<center>
                            <img class="sp-image img-responsive" src="<?php echo $avatar;?>" alt="" /><br>
						<form class="forms" method="post" enctype="multipart/form-data">
						<fieldset>
						<div class="form-row text-input-row name-field">
                            <label>Name :</label>
							<input type="text" name="name" class="text-input defaultText" value="<?php echo $name;?>" readonly />
						</div>
						<div class="form-row text-input-row name-field">
                            <label>Email :</label>
							<input type="text" name="email" class="text-input defaultText" value="<?php echo $email;?>" readonly />
						</div>
						<div class="form-row text-input-row name-field">
                            <label>Address :</label>
							<input type="text" name="address" class="text-input defaultText"  value="<?php echo $address;?>" readonly />
						</div>
						<div class="form-row text-input-row name-field">
                            <label>Contact Number :</label>
							<input type="text" name="number" class="text-input defaultText"  value="<?php echo $number;?>" readonly />
						</div>
						<div class="form-row text-input-row name-field">
                            <label>Date of Birth :</label> 	
							<input type="date" name="dob" class="text-input defaultText"  value="<?php echo $dob;?>"  readonly />
						</div>
						<div class="button-row">
							</fieldset>
						</form>
						</center>				</div>
						<div class="col-sm-2"></div>

                    </div>
                </div>
                <!-- /.box -->
            </section>
			    <footer class="footer box">
      <p class="pull-left">© 2017 ANSAT. All rights reserved.</p>
      <ul class="social pull-right">

        <li><a href="#"><i class="icon-s-facebook"></i></a></li>

        <li><a href="#"><i class="icon-s-instagram"></i></a></li>

      </ul>
      <div class="clearfix"></div>
    </footer>
            <!-- /section -->
        </div>
		
        <!-- /.container -->
    </div>
	
    <!-- /.page -->
</div>
<!-- /.body-wrapper -->
<script src="style/js/jquery.min.js"></script>
<script src="style/js/bootstrap.min.js"></script>
<script src="style/js/jquery.themepunch.tools.min.js"></script>
<script src="style/js/classie.js"></script>
<script src="style/js/plugins.js"></script>
<script src="style/js/scripts.js"></script>
<script>
    $.backstretch(["style/images/art/bg1.jpg"]);
</script>
</body>
</html>