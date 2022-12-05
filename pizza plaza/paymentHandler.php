<?php

    $con =mysqli_connect("localhost","root","","pizzaplaza");
                
    if(!$con) 
    {
        die("Cannot connect with DB server"); 
    }

    $orderID=rand(0,10000)+sizeof($_POST['name']);
    for($i=0;$i<sizeof($_POST['name']);$i++)
    {
        $sql1="INSERT INTO `tblorder`(`orderID`, `productName`, `qty`, `email`, `date`) VALUES('".$orderID."','".$_POST['name'][$i]."','".$_POST['qty'][$i]."','".$_POST['email']."',CURDATE());";

       mysqli_query($con,$sql1);

          
       
    }
    

    ///add total to payment table
    $sql2="INSERT INTO `tblpayment`(`ID`, `total`, `orderID`) VALUES(NULL,'".$_POST['total']."','". $orderID."');";
    mysqli_query($con,$sql2); 

   //remove cart items from cart table
    $sql3="DELETE FROM `tblcart` WHERE `email` = '".$_POST['email']."';";
    mysqli_query($con,$sql3); 


    header('Location:menu.php');

?>