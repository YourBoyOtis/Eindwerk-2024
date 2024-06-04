<?php
include_once("connection.php");

$user = $_POST['username']; 
$pass1 = $_POST['password1']; 
$pass2 = $_POST['password2'];
if ($pass1 != $pass2) { 
    $melding = "Beide wachtwoorden zijn niet identiek";
    header("Location: register.php?melding=$melding");
} else {
    
    $result = $conn->query("SELECT * FROM gebruikers WHERE Gebruikersnaam='$user'");
    if($result->num_rows == 0) { 
        
        $result = $conn->query("SELECT MAX(GebruikersID) AS nextID FROM gebruikers");
        $row = $result->fetch_assoc();
        $nextID = $row['nextID'] + 1;

       
        $sql = "INSERT INTO gebruikers (GebruikersID, Gebruikersnaam, Wachtwoord) VALUES ('$nextID', '$user', '$pass1')";
        if ($conn->query($sql) === TRUE) {
            $melding = "Account is toegevoegd";
            session_start();
            $_SESSION["user"] = $user;
        } else {
            $melding = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $melding = "De gebruikersnaam bestaat al";
    }
    header("Location: login.php?melding=$melding"); 
    $conn->close();
}
?>
