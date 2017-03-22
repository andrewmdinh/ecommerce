<?php

$connect=new mysqli('localhost','root','','pronto');


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
		#echo 'You are already signed up!';
		<a href="registered.html">You have already registered</a>
	}
	else{
		$connect->query("INSERT INTO siteusers(Name, Email, Address, City, State, Zip) VALUES('$name', '$email', '$address', '$city', '$state','$zip_code')");

		#echo 'Thanks for signing up!';
		<a href="newRegister.html">Thanks</a>
	}
	
}

?>