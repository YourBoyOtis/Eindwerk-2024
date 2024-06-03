<?php
include 'header.php';
include 'connection.php';

$product_id = $_GET['id'];

$sql = "SELECT * FROM producten WHERE productID = $product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<div class="product-pagina">';
                echo '<img src="images/' . $row["image"] . '" alt="' . $row["naam"] . '">';
                echo '<h3>' . $row["naam"] . '</h3>';
                echo '<p>€' . $row["prijs"] . '</p>';
                echo '<a href="winkelmandje.php?id=' . $row["productID"] . '" class="btn-primary">Koop Nu</a>';
                echo '</div>';

} else {
    echo "Product niet gevonden.";
}

include 'footer.php';
?>

