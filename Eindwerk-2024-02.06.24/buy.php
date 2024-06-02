<?php
include 'header.php';
include 'connection.php';

$product_id = $_GET['id'];

$sql = "SELECT * FROM producten WHERE id = $product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

} else {
    echo "Product niet gevonden.";
}

include 'footer.php';
?>

