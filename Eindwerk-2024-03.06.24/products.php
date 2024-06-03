<?php
$title = "Producten";
include 'header.php';
include 'connection.php';
?>
<main>
    <h1>Onze Producten</h1>
    <section class="product-categories">
        <h2>Categorieën</h2>
        <div class="category-list">
            <a href="#electric-guitars">Elektrische Gitaren</a>
            <a href="#acoustic-guitars">Akoestische Gitaren</a>
            <a href="#bass-guitars">Basgitaren</a>
            <a href="#accessories">Accessoires</a>
        </div>
    </section>
    <section id="electric-guitars" class="product-list">
        <h2>Elektrische Gitaren</h2>
        <?php
        $sql = "SELECT * FROM producten WHERE type IN ('elektrisch', 'akoestisch', 'klassiek', 'bass') ORDER BY type";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="product-item">';
                echo '<img src="images/' . $row["image"] . '" alt="' . $row["naam"] . '">';
                echo '<h3>' . $row["naam"] . '</h3>';
                echo '<p>€' . $row["prijs"] . '</p>';
                echo '<a href="buy.php?id=' . $row["productID"] . '" class="btn-primary">Koop Nu</a>';
                echo '</div>';
            }
        } else {
            echo "Geen producten gevonden.";
        }
        ?>
    </section>
    <section id="acoustic-guitars" class="product-list">
        <h2>Akoestische Gitaren</h2>
        <?php
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["type"] == "akoestisch") {
                    echo '<div class="product-item">';
                    echo '<img src="images/' . $row["image"] . '" alt="' . $row["naam"] . '">';
                    echo '<h3>' . $row["naam"] . '</h3>';
                    echo '<p>€' . $row["prijs"] . '</p>';
                    echo '<a href="buy.php?id=' . $row["ID"] . '" class="btn-primary">Koop Nu</a>';
                    echo '</div>';
                }
            }
        } else {
            echo "Geen producten gevonden.";
        }
        ?>
    </section>
    <section id="bass-guitars" class="product-list">
        <h2>Basgitaren</h2>
        <?php
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["type"] == "bass") {
                    echo '<div class="product-item">';
                    echo '<img src="images/' . $row["image"] . '" alt="' . $row["naam"] . '">';
                    echo '<h3>' . $row["naam"] . '</h3>';
                    echo '<p>€' . $row["prijs"] . '</p>';
                    echo '<a href="buy.php?id=' . $row["ID"] . '" class="btn-primary">Koop Nu</a>';
                    echo '</div>';
                }
            }
        } else {
            echo "Geen producten gevonden.";
        }
        ?>
    </section>
    <section id="accessories" class="product-list">
        <h2>Accessoires</h2>
        <?php
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["type"] == "accessoires") {
                    echo '<div class="product-item">';
                    echo '<img src="images/' . $row["image"] . '" alt="' . $row["naam"] . '">';
                    echo '<h3>' . $row["naam"] . '</h3>';
                    echo '<p>€' . $row["prijs"] . '</p>';
                    echo '<a href="buy.php?id=' . $row["ID"] . '" class="btn-primary">Koop Nu</a>';
                    echo '</div>';
                }
            }
        } else {
            echo "Geen producten gevonden.";
        }
        ?>
    </section>
    <div class="container">
        <div class="producten">
        </div>
    </div>
</main>
<footer>
    <p>&copy; 2024 BocchiMania. Alle rechten voorbehouden.</p>
</footer>
</body>
</html>

<?php
$conn->close();
?>
