
<?php 
include('check.php');
include('custom.php');

if($_SERVER["REQUEST_METHOD"] == "POST") { 
      // username and password sent from form  
       
      $mobile = $_POST['mobile'];
      $sms_message = $_POST['message'];

      $send_msg = SendMsg($mobile,$sms_message);	  
	  
	  if($send_msg){
          if(Display('Message send successfully :)')){
		  header('Location: message.php');
		  exit();	
		  }
	  }
	  else {
		  if(Display('Error occured')){
		  header('Location: message.php');
		  exit();	
		  }
	  }
   }


?>