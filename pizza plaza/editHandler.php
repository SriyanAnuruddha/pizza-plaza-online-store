<?php session_start();
   
  $con = mysqli_connect("localhost","root","","pizzaplaza");

    if(!$con) 
	 {
		die("Cannot connect to DB server."); 
	 }
        $productname = $_POST["txtName"];
        $description = $_POST["txtDescription"];
        $smallPrice = $_POST["smallPrice"];
        $mediumPrice = $_POST["mediumPrice"];
        $largePrice = $_POST["largePrice"];
	

		if(!file_exists($_FILES['imageFile']['tmp_name']) || 
		   !is_uploaded_file($_FILES['imageFile']['tmp_name']))
		{
			$image = $_SESSION["imagePath"];
		}
		else
		{
			$image = "images/products".basename($_FILES["imageFile"]["name"]);
	        move_uploaded_file($_FILES["imageFile"]["tmp_name"],$image);
		}
	
	 
	 if(!$con) 
	 {
		die("Sorry !!! we are facing technical issue"); 
	 }
	 
	 $sql = "UPDATE `tblproducts` SET `name` = '".$productname."', `description` = '".$description."',  `imagePath` = '".$image."', `smallPrice` = '".$smallPrice."', `largePrice` = '".$largePrice."',`mediumPrice` = '".$mediumPrice."' WHERE `tblproducts`.`pizzaID` = ".$_SESSION["pizzaID"].";";
	  
	 if(mysqli_query($con,$sql))	
	 {
		 header('Location:viewProducts.php');
	 }
?>