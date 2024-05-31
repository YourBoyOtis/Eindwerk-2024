<?php
include_once("connection.php");
$result=0;
$user = $_POST['username']; 
$pass1 = $_POST['password1']; 
$pass2 = $_POST['password2'];
if ($pass1!=$pass2) //zijn de wachtwoorden gelijk
{

    $melding= "Beide wachtwoorden zijn niet identiek";
    header("Location: signupForm.php?melding=$melding");
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
header("Location: login.php?melding=$melding"); 
$conn->close();
}
?>