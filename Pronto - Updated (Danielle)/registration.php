<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<?php
						$nameErr = $emailErr = $stateErr = $zipcodeErr = "";
						$name = $email = $state = $zipcode = "";

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
						  //check name
						   if (empty($_POST["name"])) {
						     $nameErr = "This field is required";
						   } else {
						     // check if name only contains letters
						      $name = $_POST["name"];
						      $regex = "/[a-zA-Z]+/";
						     if (!(bool)preg_match($regex, $name)) {
						       $nameErr = "Name can only contain letters"; 
						     }
						   }
						   
						   
						   if (empty($_POST["email"])) {
						     $emailErr = "This field is required";
						   } else {
						     $email = $_POST["email"];
						     $regex = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-z]+/";
						     if (!(bool)preg_match($regex, $email)) {
						       $emailErr = "Invalid email"; 
						     }
						   }

						   if (empty($_POST["state"])) {
						     $stateErr = "This field is required";
						   } else {
						     $state = $_POST["state"];
						     $regex = "/[A-Z]{2}+/";
						     if (!(bool)preg_match($regex, $state)) {
						      $stateErr = "State can only contain two letters (A-Z)";
						     }
						   }

						   if (empty($_POST["zip"])) {
						     $zipcodeErr = "This field is required";
						   } else {
						     $zipcode = $_POST["zip"];
						     $regex = "/[0,9]{5}+/";
						     if (!(bool)preg_match($regex, $zip)){
						      $zipcodeErr = "Zip code limited to 5 numbers";
						     }
						   }
						   ?>
						</body>
</html>