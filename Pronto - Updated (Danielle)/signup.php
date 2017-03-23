<?php
function sendMail($mail, $name, $email){
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->FromName = "Pronto";
	$mail->Username = 'prontoenterprises7@gmail.com';                 // SMTP username
	$mail->Password = 'pronto135';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('pronto@gmail.com', 'Pronto');
	$mail->addAddress('amd3ce@virginia.edu');     // Add a recipient

	$mail->Subject = 'Thanks for signing up with Pronto!';
	$mail->Body    = 'Get ready for convenience at your fingertips!';

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	}
}

$mailpath = 'C:\xampp\htdocs';
$path = get_include_path();
$connect=new mysqli('localhost','root','','pronto');
set_include_path($path . PATH_SEPARATOR . $mailpath);

require 'PHPMailerAutoload.php';

$mail = new PHPMailer;


if($connect->connect_error){
	die("Connection failed: " . $connect->connect_error);
}
else{
	$name = $_POST["name"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$city =  $_POST["city"];
	$state = $_POST["state"];
	$zip_code = $_POST["zip_code"];


	$sql = "SELECT * FROM siteusers WHERE Name='$name'";
	$result = $connect->query($sql) or trigger_error($connect->error."[$sql]");
	
	if ($result->num_rows>0)
		{
		echo 'You are already signed up!';
		sendMail($mail, $name, $email);
		#<li><a href="registered.html"></a></li>
	}
	else{
		$connect->query("INSERT INTO siteusers(Name, Email, Address, City, State, Zip) VALUES('$name', '$email', '$address', '$city', '$state','$zip_code')");

		echo 'Thanks for signing up!';
		sendMail($mail, $name, $email);
		#<a href="newRegister.html">Thanks</a>
	}
	
}

?>