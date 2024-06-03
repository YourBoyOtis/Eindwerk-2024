
<?php
$klantID="";
session_start();
include_once "sessionCheckUser.php";
if(isset($_GET['productID'])){
    include 'connection.php'; 
    $id = $_GET['productID']; print "id=". $id;
    $sql = "DELETE FROM tblWinkelmandje` WHERE productID = '$id' AND klantID='$klantID'";
    if ($conn->query($sql) === TRUE)
    {
         header('Location: winkelmandje.php');
    }
    else
    {
        echo "Error deleting record: " . $conn->error;  
    }
   

    $conn->close();
    }