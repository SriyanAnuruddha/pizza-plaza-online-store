<?php session_start();
 if(isset($_POST["btnSubmit"]))
 {
	 $name = $_POST["txtName"];
	 $email = $_POST["txtEmail"];
	 $password = $_POST["txtPassword"];
	 $contact = $_POST["txtContactNo"];
	 $address = $_POST["txtAddress"];

	 $con = mysqli_connect("localhost","root","","pizzaplaza");
	 
	 if(!$con) 
	 {
		die("Sorry !!! we are facing technical issue"); 
	 }
	 
	 $sql = "INSERT INTO `tbluser`(`name`, `email`, `address`, `phone`, `password`) VALUES ('".$name."','".$email."','".$address."','".$contact."','".$password."');";
	 
	 mysqli_query($con,$sql);	
	
     header('Location:login.php');

 }
?>
