<?php session_start();
if(!isset($_SESSION["adminName"]))
{   
    
	header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add product</title>
    <style>
    html{
        font-size: 16px;
    }
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Manrope', sans-serif;
    }

    body{
        background: #f6f5f7;
    }

    /* nav bar customization*/

    .logo-image{
        display: block;
        width: 5rem;
        padding: 0.5rem;
    }
    .logo-name{
        font-size: 1.5rem;
        font-weight: 700;
    }
    .logo{
        display: flex;
        align-items: center;
    }
    .navbar{
        display: flex;
        background-color: rgb(80, 200, 120);
        justify-content: space-between;
        align-items: center;
        position: fixed;
        width: 100%;
    }
    .nav-links{
        height: 100%;
    }
    .nav-links ul{ 
        list-style: none;
        display: flex;

    }
    .nav-links li a{
        font-size: 1.1rem;
        display: block;
        text-decoration: none;
        padding: 1.6em ;
        color: black;
        font-weight: 500;
    }

    img{
        display: block;
    }

    .link-wrapper{
        background-color: rgb(80, 200, 120);
        border-radius:0.5em ;
        align-self: center;
        margin: 0.5em;
    }
    
    /*hamburger button customization*/
    .check{
        display: none;
    }

    .button .button-img{
        height: 30px;
        width: 30px;
    }

    .button{
        position: absolute;/* this will psuh button to top*/
        display: none;
        top:1rem;
        right: 1rem;
    }

    /*buttons hover*/
    .nav-links a:hover{
        background-color:rgb(34,139,34);
    }
    .link-wrapper a:hover{
        background-color:rgb(34,139,34);
        border-radius: 0.5em;
    }

    /*body content */
    main{
    display: flex;
    justify-content: center;
    width: 100%;
    padding:5em 0.5em 0 0.5em;
    }

    /*Product form */
    h2{
        margin-bottom: 1em;
        text-align: center;
    }
    form{
        display: flex;
        flex-direction: column;
    }
    form>*{
        padding: 0.3em 0.3em ;
        margin-bottom: 0.3em;
        display: block;
        font-size: 1.3em;
    }

    .container{
        padding: 2em;
        margin-top: 1em;
        display: flex;
        flex-direction: column;
        background-color:rgb(255,165,0);
        border-radius: 0.5em;
    }

    .inputBox{
        font-size: 1.3em;
    }
    
    #btnSubmit{
        padding: 0.5em;
        background-color: rgb(80, 200, 120);
        margin: 1em 0 0 0;
    }

    #btnSubmit:hover{
        background-color:rgb(34,139,34);   
    }

    @media(max-width:800px) {
        /*customizing nav-bar*/
        .navbar{
            flex-direction: column;
            align-items: flex-start;
        }
        .button{
            display: block;
        }
        .nav-links{
            width: 100%;
            display: none;
        }    

        .check:checked ~ .nav-links, ul ,li ,a {
            width: 100%;
            display: block; 
            flex-direction: column;
            text-align: center;
            
        }
        .nav-links,ul{
            margin-top: 1em ;
        }
        
        /*content customization*/
        .logo-image{
            width: 4rem;
        }
        .logo-name{
            font-size: 1.25rem;
            font-weight: 700;
        }
        
        .container{
            width: 80%;
            display: flex;
            flex-direction: column;
            background-color:rgb(255,165,0);
            border-radius: 0.5em;
        }

        form>*{
        font-size: 1em;
        }


        .inputBox{
        font-size: 1em;
        }
    }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <img src="./images/icons/logo.png" alt="" class="logo-image">
            <span class="logo-name">Pizza Plaza</span>
        </div>
        <input type="checkbox" id="check" class="check">
            <label for="check">
                <span class="button">
                <img class="button-img" src="./images/icons//menu.png"  alt="Menu">
                </span>
              </label>
        <div class="nav-links">
            <ul>
              <li><a href="./home.html">home</a></li> 
              <li><a href="./menu.php">Menu</a></li>
              <li><a href="./adminAccount.php">admin panel</a></li>
              <li><a href="login.php">Sign In/Register</a></li> 
            </ul>
        </div>
    </header>
    <?php 
        $_SESSION["pizzaID"] = $_GET["pizzaID"];
        
        $con = mysqli_connect("localhost","root","","pizzaplaza");
        
        if(!$con) 
        {
            die("Cannoy connect to DB server."); 
        }
        
        $sql = "SELECT * FROM `tblproducts` WHERE  `pizzaID` = '".$_GET["pizzaID"]."'";	
        
        $result = mysqli_query($con,$sql);
        
        $row = mysqli_fetch_assoc($result);
        ?>
    <main>  
        <div class="container">
            <h2>Enter Product info</h2>
            <form action="./editHandler.php" method="post" enctype="multipart/form-data">
                <label >Product Name</label>
                <input class="inputBox" type="text"  name="txtName" value="<?php echo $row["name"];?>"  required>
                <label >Product Details</label>
                <textarea class="inputBox" name="txtDescription"><?php echo $row["description"];?></textarea>
                <label >Product Image</label>
                <input class="inputBox" type="file" name="imageFile" >
                <label >small Price</label>
                <input class="inputBox" type="number" name="smallPrice" value="<?php echo $row["smallPrice"];?>">
                <label >Medium Price</label>
                <input class="inputBox" type="number" name="mediumPrice" value="<?php echo $row["mediumPrice"];?>"> 
                <label >large Price</label>
                <input class="inputBox" type="number" name="largePrice" value="<?php echo $row["largePrice"];?>">
                <button id="btnSubmit" name="btnSubmit" type="submit">update Product</button>
                <?php $_SESSION["imagePath"] = $row["imagePath"];?>
                
            </form>
        </div>
    </main>
</body>
</html>