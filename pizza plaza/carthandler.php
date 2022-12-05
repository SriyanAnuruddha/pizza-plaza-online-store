<?php session_start();

    if(isset($_POST["addToCartSubmit"])){
        array_push($_SESSION['cart_array'],$_POST["pizzaID"]);

        header('Location:menu.php');
    }

?>