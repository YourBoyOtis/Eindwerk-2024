<?php
$sql = "SELECT * FROM producten WHERE type = 'elektrisch'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="product-item">';
        echo '<img src="images/' . $row["image"] . '" alt="' . $row["naam"] . '">';
        echo '<h3>' . $row["naam"] . '</h3>';
        echo '<p>€' . $row["prijs"] . '</p>';
        echo '<a href="buy.php?id=' . $row["ID"] . '" class="btn-primary">Koop Nu</a>';
        echo '</div>';
    }
} else {
    echo "Geen producten gevonden.";
}
?>
