
<?php 
include('check.php');
include('custom.php');


?>
<html>

<head>
    <link rel="stylesheet" href="css/main.css" rel="stylesheet">
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css" rel="stylesheet">
    
    <script>
        var mult = function(arg1, arg2){
            $.ajax({
            url: "new2.php?action=mult&arg1="+arg1+"&arg2="+arg2
            }).done(function(data) {
            alert(data);
            });
        }
    </script>
</head>

<body>
    <h2>Employe Data</h2>
    <div class="row">
    <?php
        $JsonData = file_get_contents("http://hotelgirnar.ml/apis/getbill2.php");
        $json = json_decode($JsonData,true);

        $output = "";
        function testfun()
            {
                 echo "Your test function on button click is working";
    }   

        foreach($json['android'] as $guest){  
            $output .= '<div class="col-md-4 col-xs-12 col-sm-12" style="padding: 10px;">';
            $output .= '<div class="test" style="padding: 10px;">';
            $output .= "<p>Name :".$guest['name']."<br/>";
            $output .= "Bill No. :".$guest['bill_no']."<br/>";
            $output .= "Total :".$guest['total']."<br/>";
            $output .= "<input type=\"submit\" value=\"send\" onClick=\"mult(1,1)\"/>";
            $output .= "</div>";
            $output .= "</div>";
          

            
        }

        echo $output;
?>
</div>
<ul>
<li onclick="logout()"><a class="hint--right" data-hint="Logout"><i class="budicon-monitor"></i><span>Logout</span></a></li>
		<script>function logout() {
			var r= confirm("Logout?");
			if (r == true){
				location.href="logout.php";
			}
		}
		</script>
      </ul>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="style/js/bootstrap.min.js"></script> 
</body>

</html>