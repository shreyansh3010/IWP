<?php 
include('check.php');
include('custom.php');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-billing | Preview Bills</title>
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
        function getGuest(x){
          alert(x);
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
<h5 class="profile_name">Hi, <?php
    echo  $_SESSION['name']." (". $_SESSION['username'].")";
?>
</h5>

  <?php
     
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            $bill_no = $_GET['bill_no'];
            $sql = mysqli_query($con, "SELECT name, bill_date, room_type, room_no, checkin_date, checkout_date, no_of_days, room_rent, extra, total FROM bill_details WHERE bill_no='$bill_no'");
            $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
            $name = $row['name'];
            $myDate = $row['bill_date'];
            $room_type = $row['room_type'];
            $room = $row['room_no'];
            $from_date = $row['checkin_date'];
            $till_date = $row['checkout_date'];
            $no_day = $row['no_of_days'];
            $room_rent = $row['room_rent'];
            $extra = $row['extra'];
            $total = $row['total'];

            
            $sql1 = "SELECT * FROM guest_details WHERE bill_no='$bill_no'"; 
            $sth = mysqli_query($con, $sql1);
            $rows = array();
                while($r = mysqli_fetch_array($sth, MYSQLI_ASSOC)) {
                $rows = $r;
            }
             
        }
        else{
            echo "not post";
        }
?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:100px;">
    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="modal-title" id="myModalLabel">Send Message</h4></center>
      </div>
      <div class="modal-body">
        <div class="modal-body" style="padding:30px;">
            <form action = "sms.php" method = "post">
                <textarea type="text" name = "message" class="input_area col-md-12 col-sm-12 col-xs-12" rows="5" resize="none" placeholder="Message" autocomplete="off" required/></textarea>
                <center>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <button type="submit" class="btn profil_update col-md-12 col-sm-12 col-xs-12"><b>Send</b></button>    
                        </div> 
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <button type="submit" class="btn profil_update col-md-12 col-sm-12 col-xs-12" data-dismiss="modal"><b>Discard</b></button>    
                        </div> 
                    </div>
                </center> 
            </form>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<section class="message_section">
<div class="container">
    <div class="row">
        <div class="message_outer col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 wow zoomIn animted">
                <div class="inner_div">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                                        <center><h4><b style="border-bottom: 3px solid #000000;">Personal Details</b></h4></center>
                                        <br>
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>NAME :</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <p><?php echo  $row['name'] ;?></p>
                                        </div>    
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>ADDRESS :</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <p><?php echo  $rows['address'] ;?></p>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>MOBILE :</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <p><?php echo  $rows['mobile_no'] ;?></p>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>EMAIL :</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7" style="word-wrap: break-word;">
                                            <p><?php echo  $rows['email'] ;?></p>
                                        </div>
                                        <center>
                                        <div class="btn_row col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <button type="submit" class="btn profil_update col-md-12 col-sm-12 col-xs-12"><b>Resend</b></button>    
                                            </div> 
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <button type="submit" class="btn profil_update col-md-12 col-sm-12 col-xs-12" data-toggle="modal" data-target="#myModal"><b>Message</b></button>    
                                            </div> 
                                        </div>
                                        </center> 
                        </div>
                        <div class="user_info col-md-8 col-sm-8 col-xs-12" style="font-size:1em !important;">
                                        <center><h4><b style="border-bottom: 3px solid #000000;">Bill Details</b></h4></center>
                                        <br>
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>BILL NO.:</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <p><span class="bill_no"><b><?php echo  $bill_no ;?><b></span></p>
                                        </div>    
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>BILL DATE:</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <p><?php echo  $row['bill_date'] ;?></p>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>ROOM TYPE:</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <p><?php echo  $row['room_type'] ;?></p>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>ROOM NO.:</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <p><?php echo   $row['room_no'] ;?></p>
                                        </div> 
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>CHECKIN:</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <p><?php echo  $row['checkin_date'] ;?></p>
                                        </div>    
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>CHECKOUT:</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <p><?php echo  $row['checkout_date'] ;?></p>
                                        </div> 
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>DAYS :</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <p><?php echo   $row['no_of_days'];?></p>
                                        </div>    
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>ROOMRENT:</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <p><?php echo  $row['room_rent'];?></p>
                                        </div> 
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>EXTRA:</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <p><span class="extar_price"><?php echo  $row['extra'] ;?></span></p>
                                        </div> 
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <p><b>TOTAL:</b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                            <p><span class="total_price"><b><?php echo  $row['total'] ;?></b></span></p>
                                        </div> 
                        </div>        
                    </div>
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