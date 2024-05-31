<?php
$user="Login";
//session_start();
if (isset($_SESSION["user"]))
{
   $user=$_SESSION["user"];
}
 ?>

<!doctype html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</head>
<body>
    <?php
    include_once("header.php");
    ?> 
    <div class="container">
        <div class="row">
            <h1>Login</h1>
        </div>
        <div class="row">
       
            <section class="row justify-content-center">
            <section class="col-12 col-sm-8 col-md-6">
                <form class="form-container" action="checklogin.php" method="post" autocomplete="off" >
                 
                <div class="form-group">
                        <label for="InputName">Gebruikersnaam</label>
                        <span class="glyphicon glyphicon-user"></span>
                        <input type="text" name="username" id="username" required>                                    
                    </div>
                    <div class="form-group">
                        <label for="InputPassword1">Password</label>
                        <span class="glyphicon glyphicon-lock"></span>
                        <input type="text" name="password" id="password" required>                                    
                    </div>
                    <span class="glyphicon glyphicon-user"></span><input class="btn btn-primary"  type="submit" value="SUBMIT" alt='person'>
                    <div class="form-footer">
                        <p>Heb je nog geen account?<a href="register.php">Sign Up</a></p>
                        <?php 
                        if (isset($_GET["melding"])){ $melding=$_GET["melding"];}?>
                        <p id="fout"><?php if (isset($_GET["melding"])){print $melding;}?></p>
                    </div>
                    
                </form>
        </div>
    </div>

</body>
</html>