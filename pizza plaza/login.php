<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    * {
        box-sizing: border-box;
    }

    body {
        background: #f6f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'Montserrat', sans-serif;
        height: 100vh;
        margin: -20px 0 50px;
    }

    h1 {
        font-weight: bold;
        margin: 0;
    }

    h2 {
        text-align: center;
    }

    p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
    }

    span {
        font-size: 12px;
    }
    p{
        font-size: 20px;
    }
    a {
        color: #000000;
        font-size: 20px;
        text-decoration: none;
        margin: 15px 0;
    }

    #btnSubmit {
        text-align: center;
        width: 30%;
        border-radius: 20px;
        border: 1px solid #228B22;
        background-color: #228B22;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        height: 3em;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }

    #btnSubmit:active {
        transform: scale(0.95);
    }

    #btnSubmit:focus {
        outline: none;
    }

    #btnSubmit.ghost {
        background-color: transparent;
        border-color: #FFFFFF;
    }

    form {
        background-color: rgb(255,165,0);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
    }

    input {
        background-color: #eee;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
    }

    .container {
        background-color: rgb(255,165,0);
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                0 10px 10px rgba(0,0,0,0.22);
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
    }

    .form-container {
        height: 100%;
    }

    .sign-in-container {
        padding-left:5em ;
        padding-right:5em ;
        z-index: 2;
    }

    .social-container {
        margin: 20px 0;
    }

    
    </style>
</head>
<body>
    <h2>Pizza Plaza Sign up form</h2>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="loginHandler.php" method="post">
			<h1>Sign in</h1>
		 
			<input type="email" name="txtEmail" placeholder="Email" />
			<input type="password" name="txtPassword" placeholder="Password" />
            <br>
            <button id="btnSubmit" type="submit" name="btnSubmit">Sign In</button>
			<p>Don't have account ? <a href="register.php"> Register</a></p>
            <br>
            
            <a href="home.html">Back to Home</a>
        </form>   
	</div>
</body>
</html>