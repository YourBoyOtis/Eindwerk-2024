<?php
include 'header.php';
include 'connection.php';

$product_id = $_GET['id'];

$sql = "SELECT * FROM producten WHERE productID = $product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<main>';
    echo '<div class="product-container">';
    echo '<img class="product-image" src="images/' . $row["image"] . '" alt="' . $row["naam"] . '">';
    echo '<div class="product-details">';
    echo '<h1 class="product-name">' . $row["naam"] . '</h1>';
    echo '<p class="product-price">€' . $row["prijs"] . '</p>';
    echo '<p class="product-brand">Merk: ' . $row["merk"] . '</p>';
    echo '<form action="winkelmandje.php" method="GET">';
    echo '<input type="hidden" name="productID" value="' . $row["productID"] . '">';
    echo '<button type="submit" class="buy-button">Toevoegen aan winkelmandje</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</main>';
} else {
    echo '<main>';
    echo '<p>Product niet gevonden.</p>';
    echo '</main>';
}

include 'footer.php';
?>

