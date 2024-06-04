<?php
include 'connection.php';
include 'sessionCheckUser.php';

if(isset($_POST["klantID"])) {
    $klantID = $_POST["klantID"];
    $sql = "SELECT * FROM winkelmandje WHERE gebruikersID = '$klantID'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $productid = $row['productID'];
        $aantal = $row['aantal'];
        date_default_timezone_set("Europe/Brussels");
        $datum = date("Y-m-d");



        $result = $conn->query("SELECT MAX(bestellingID) AS nextID FROM bestellingen");
        $row = $result->fetch_assoc();
        $nextID = $row['nextID'] + 1;




        $sqlInsert = "INSERT INTO bestellingen (bestellingID, datum, gebruikersID, productID, aantal) VALUES ('$nextID', '$datum', '$klantID', '$productid', '$aantal')";

        if ($conn->query($sqlInsert) === TRUE) {
            $sqlDel = "DELETE FROM winkelmandje WHERE gebruikersID = '$klantID'";
            if ($conn->query($sqlDel) === TRUE) {
                header('Location: winkelmandje.php?melding=Bedankt voor uw aankoop');
            }
        } else {
            echo "Error: " . $conn->error;
        }
    }
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
