
<?php 
include('check.php');
include('custom.php');

$bill_count = TotalGuestCount();

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
        <li><a href="#">Profile</a></li>
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
    echo  $_SESSION['name']." (". $_SESSION['username'].")";
?>
</h5>
<section class="bill_section">
  <div class="row">
  <?php
    for($bill_no = $bill_count; $bill_no >= 1; $bill_no--){
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
		$total = $row['total']; ?>
    <div class="col-md-6 col-xs-12" style="padding:10px">
     <?php echo "<div class=\"bill_card\" onClick=\"getGuest('$bill_no')\">" ?>
        <div class="row">
          <div class="col-md-4">
              <h4><b>Bill No.: <?php echo $bill_no ?></b></h4>
              <br>
              <h6>Room no.: <?php echo $room?></h6>
              <h6>Date: <?php echo $myDate?></h6>
          </div>

          <div class="col-md-8 bill_detail">
              <h6>Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<?php echo $name?></h6>
              <h6>RoomType: <?php echo $room_type?></h6>
              <h6>Checkin: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $from_date?>&nbsp;&nbsp;&nbsp;&nbsp;Checkout: <?php echo $till_date?></h6>
              <h6>Days: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $no_day?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Roomrent: <?php echo $room_rent?></h6>
              <h6>Extra: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $extra?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $total?></h6>
          </div>
        </div>
      </div>
    </div> 
   <?php }?>
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