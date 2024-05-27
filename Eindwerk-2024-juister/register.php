<?php
include_once("connection.php");
$result=0;
$user = $_POST['username']; 
$pass1 = $_POST['password1']; 
$pass2 = $_POST['password2'];
if ($pass1!=$pass2) //zijn de wachtwoorden gelijk
{

    $melding= "Beide wachtwoorden zijn niet identiek";
    header("Location: registerform.php?melding=$melding");
}
else//bestaat de user al
{
    $result = $conn->query("SELECT * FROM gebruikers WHERE Gebruikersnaam='$user'");
    if($result->num_rows==0)
    {
        $sql = "INSERT INTO gebruikers (Gebruikersnaam, Wachtwoord) VALUES ('$user', '$pass1')";
        if ($conn->query($sql)===TRUE) 
        {


            $melding="Account is toegevoegd";
            session_start();
            $_SESSION["user"]=$user;
        }
   
        else {
        $melding= "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else
    {
        $melding= "De gebruikersnaam bestaat al";
    
    }
header("Location: registerform.php?melding=$melding"); 
$conn->close();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren - BocchiMania</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="BocchiManiaLogo">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Producten</a></li>
                <li><a href="info.php">Informatie</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Registreren</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Registreren</h1>
        <form action="register.php" method="POST">
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" required>
            <label for="password1">Wachtwoord:</label>
            <input type="password" id="password1" name="password1" required>
            <label for="password2">Bevestig Wachtwoord:</label>
            <input type="password" id="password2" name="password2" required>
            <button type="submit">Registreren</button>
        </form>
        <?php 
                    if (isset($_GET["melding"])){ $melding=$_GET["melding"];}?>
                    <p id="fout"><?php if (isset($_GET["melding"])){print $melding;}?></p>
    </main>
    <footer>
        <p>&copy; 2024 BocchiMania. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
