<?php
include 'connection.php';
include 'sessionCheckUser.php';

if(isset($klantID)) {
    $sql = "SELECT * FROM tblWinkelmandje WHERE klantID = '$klantID'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $productid = $row['productID'];
        $aantal = $row['aantal'];
        date_default_timezone_set("Europe/Brussels");
        $datum = date("Y-m-d");
        $sqlInsert = "INSERT INTO tblbestellingen (bestelID, datum, klantID, productID, aantal) VALUES (NULL, '$datum', '$klantID', '$productid', '$aantal')";

        if ($conn->query($sqlInsert) === TRUE) {
            $sqlDel = "DELETE FROM tblWinkelmandje WHERE klantID = '$klantID'";
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

