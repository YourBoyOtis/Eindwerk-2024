<?php
//session_start();
if ((isset($_SESSION["user"])) AND (isset($_SESSION["gebruikersID"])))
{
    $user = $_SESSION["user"];
    $klantID = $_SESSION["gebruikersID"];
} else {
    $user = "Login";
    $klantID = "";
}
?>