<?php session_start();
	 
	 $con = mysqli_connect("localhost","root","","pizzaplaza");
	 
	 if(!$con) 
	 {
		die("Sorry !!! we are facing technical issue"); 
	 }
	 
	 $sql = "DELETE FROM `tblproducts` WHERE `tblproducts`.`pizzaID` = ".$_GET["pizzaID"];	 
	 
	 if(mysqli_query($con,$sql))
	 {
		 header('Location:viewProducts.php');
	 }
?>
