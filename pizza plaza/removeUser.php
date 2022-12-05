<?php session_start();
    
    $con =mysqli_connect("localhost","root","","pizzaplaza");
    
    if(!$con) 
    {
        die("Cannot connect with DB server"); 
    }


    $sql="DELETE FROM `tbluser` WHERE `email`='".$_GET["email"]."'";

    echo  $_GET["type"];  
    if($_GET["type"]==0)
    {
        unset($_SESSION['username'][$_GET["email"]]);
    }elseif($_GET["type"]==1)
    {
        unset($_SESSION['adminName'][$_GET["email"]]);
    }

    if(mysqli_query($con,$sql))
    {
        header('Location:manageUsers.php');
    }
    else
    {
        echo "can't remov user";
    }

?>