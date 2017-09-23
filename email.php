
<?php 
include('custom.php');

if($_SERVER["REQUEST_METHOD"] == "POST") { 
      // username and password sent from form  
       
      $email = $_POST['email'];
      $message = $_POST['message_email'];

      $send_msg = SendEmail($email,$message);	  
	  
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