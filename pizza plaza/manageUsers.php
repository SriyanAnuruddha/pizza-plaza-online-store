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
    <title>Document</title>
   
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
    padding:3em 0.5em 0 0.5em;
    display: flex;
    flex-direction: row;
    }
    /*body */
    .container{
        display: flex;
        justify-content: center;
        width: 100%;
        height: 100%;
        font-size: 1.2em;
    }


    h1{
        text-align: center;
        padding-top: 6rem;
    }

    /*table */
    .styled-table {
            width: 60%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #0096FF;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #0096FF;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: white;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #0096FF;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
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
            display: flex;
            flex-direction: column;
            align-items: center;
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
              <li><a href="./userAccount.php">My account</a></li>
              <li><a href="login.php">Sign In/Register</a></li> 
            </ul>
        </div>
</header>
    <h1>Current Users of The System</h1>
<main>   
    <div class="container">
    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address </th>
                <th>Phone Number</th>
                <th>Type</th>
                <th></th>
            </tr>
        </thead>
            <?php
                 $con = mysqli_connect("localhost","root","","pizzaplaza");
                
                 if(!$con) 
                 {
                     die("Cannot connect to DB server."); 
                 }
                 
                $sql2 = "SELECT * FROM tbluser;";	
                
                $result2 = mysqli_query($con,$sql2);
                
                if(mysqli_num_rows($result2)>0)
                    {
                        while($row2 = mysqli_fetch_assoc($result2)) 
                        {
            ?>
                <tr>
                    <td> <?php echo $row2["name"]; ?></td>
                    <td> <?php echo $row2["email"]; ?></td>
                    <td> <?php echo $row2["address"]; ?></td>
                    <td> <?php echo $row2["phone"]; ?></td>
                    <td> <?php if ($row2["type"]==1) : ?>
                        <p style="color:blue">Admin</p>
                        <?php else: ?>
                        <p>Customer</p>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="./removeUser.php" method="get">
                            <input type="text" name="email" value="<?php echo $row2["email"]; ?>" hidden>
                            <input type="text" name="type" value="<?php echo $row2["type"]; ?>" hidden>
                            <input type="submit" value="remove user" style="color: red; font-size:1em;">
                        </form>
                    </td>
                </tr>
                <?php  ?>
            <?php
                        }
                    }
            ?>
    </table>   
    </div>
</main>
</body>
</html>