<?php
session_start();
include_once "sessionCheckUser.php";
if(isset($_GET['productID'])){
    include 'connection.php'; 
    $id = $_GET['productID'];
    $sql = "DELETE FROM winkelmandje WHERE productID = '$id' AND gebruikersID='$klantID'";
    if ($conn->query($sql) === TRUE) {
         header('Location: winkelmandje.php');
    } else {
        echo "Error deleting record: " . $conn->error;  
    }
    $conn->close();
}
?>
