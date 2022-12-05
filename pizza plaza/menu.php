<?php session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product</title>

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
        width: 100%;
        padding:5em 0.5em 0 0.5em;
        display: flex;
        flex-direction: row;
    }

    /*manage product */
    .container{
        width: 100%;
        height: 100%;
        margin: 1em 0 0 0 ;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }

    .card{
        border-radius: 0.5em;
        background-color:rgb(255,165,0);
        width: 25%;
        height: 25%;
        padding: 1em;
        margin: 1.5em;
        box-shadow:0em 0.5em 0.5em #aaaaaa;
    }
    .image-box{
        width: 100%;
        height: 400px;
    }
    .image-box>img{
        height: 100%;
        width: 100%;
    }

    p,h2,h4{
            margin-top: 0.5em ;
        }

    .card>a{
        margin-top: 0.5em ;
        text-align: start;
        display: block;
    }


    .add-cart{
        margin: 0.5em 0;
        background-color: rgb(80, 200, 120);
        border-radius: 5px ;
        padding: 0.5em;
        border:rgb(80, 200, 120) ;
        font-size: 1em;
    }

    .add-cart:hover{
        background-color: rgb(34,139,34);
    }

    #warning{
        color: red;
    }


    #cartImg{
        display: block;
        width: 5rem;
        padding: 0.5rem;
    }
   .cartBox{
       margin-left:5em ;
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
        
        /*content */
        .container{
           align-items: center;
            display: flex;
            flex-direction: column;
            align-self: center;
        }

        .card{
            background-color:rgb(255,165,0);
            width: 90%;
            height: 25%;
            padding: 1em;
            margin: 1em;
        }
        .image-box{
            width: 100%;
            height: 400px;
        }

        p,h2,h4{
            margin-top: 0.5em ;
        }

        .card>a{
            margin-top: 0.5em ;
            display: block;
          text-align: start;
        }

        #cartImg{
        display: block;
        width: 4rem;
        padding: 0.5rem;
        }
    }
    </style>

   
</head>
<body>
    <header class="navbar">
          <div class="logo">
            <img src="./images/icons/logo.png" alt="" class="logo-image">
            <span class="logo-name">Pizza Plaza</span>
            <div class="cartBox">
                <a href="./cart.php">
                    <img src="./images/icons/cart.png" id="cartImg" alt="cart">
                    <span></span>
                </a>
            </div>
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
              <li><a href="./userAccount.php">My Account</a></li> 
              <li><a href="login.php">Sign In/Register</a></li> 
            </ul>
          </div>
    </header>
    
    <main>
        <div class="container">
        <?php
            $con =mysqli_connect("localhost","root","","pizzaplaza");
            
            if(!$con) 
            {
                die("Cannot connect with DB server"); 
            }
            
            $sql = "SELECT * FROM `tblproducts`";
            
            $result = mysqli_query($con,$sql);	
            
            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_assoc($result)) 
                {
                
        ?>
            <div class="card">
                <div class="image-box">
                    <img src="<?php echo $row["imagePath"]?>" alt="product image">
                </div>
                
                <h2><?php echo $row["name"]?></h2>
                <p><?php echo $row["description"]?></p> 
                <h4>Prices</h4>
                <p>small size  :<?php echo $row["smallPrice"]?></p>
                <p>medium size:<?php echo $row["mediumPrice"]?></p>
                <p>large size :<?php echo $row["largePrice"]?></p>   
                
                <!-- show add to cart only when users loged -->
                <?php if (isset($_SESSION["userName"])) : ?>
                <form action="./addCart.php" method="post">
                    <input type="text" name="pizzaID" value="<?php echo $row["pizzaID"]?>" hidden>  
                    <input type="text" name="userEmail" value="<?php echo $_SESSION["userName"]?>" hidden>               
                    <input type="submit" name="addToCartSubmit" value="add to cart" class="add-cart" >
                </form>
                <?php else: ?>
                    <input type="submit" name="addToCartSubmit" value="add to cart" class="add-cart" disabled>                    
                    <span id="warning">* please register in order to add to cart</span>
                <?php endif; ?>
            </div>
            <?php
                }
            }		
            mysqli_close($con);		
        ?>
        </div>
    </main>

</body>
</html>
