<?php
include 'connection.php';
include 'header.php';
include 'sessionCheckUser.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Winkelmandje</title>
</head>
<body>
    <div class="winkelmandje-container"> 
        <div>
            <br><br><br>
            <h2>Winkelmandje</h2>
            <button onclick="location.href='products.php'" class="btn-primary">Naar Producten</button>
        </div>
        <?php
        if ($isLoggedIn) {
            if (isset($_GET["productID"])) {
                $product = $_GET['productID'];
                $aantal = 1;
                $sql = "INSERT INTO winkelmandje (gebruikersID, productID, aantal) VALUES ('$klantID', '$product', '$aantal')";
                if ($conn->query($sql) === TRUE) {
                    $melding = "Product is toegevoegd";
                    header("location: winkelmandje.php?melding=$melding");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        ?>
        <div class="winkelmandje-items"> 
        <?php  
        if ($isLoggedIn){
        echo "<h3>Winkelmandje van " . $_SESSION['user'] . "</h3>";
        }
        ?>
        <?php
        if ($isLoggedIn) {
            $sql = "SELECT winkelmandje.*, producten.naam, producten.prijs, producten.image FROM winkelmandje JOIN producten ON winkelmandje.productID = producten.productID WHERE winkelmandje.gebruikersID='$klantID'";
            $totaal = 0;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                        <div class="product-item"> 
                        <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['naam']; ?>" class="product-image"> 
                        <div class="product-details"> 
                            <b class="product-name">Naam: </b><?php echo $row['naam']; ?><br> 
                            <b class="product-price">Prijs: </b>€ <?php echo $row['prijs']; ?><br> 
                            <b class="product-quantity">Aantal: </b><?php echo $row['aantal']; ?><br> 
                            <a href="deleteWinkelmandje.php?productID=<?php echo $row['productID']; ?>" class="delete-button">Verwijder</a><br> 
                        </div>
                    </div>
                    <?php $totaal += $row['prijs'] * $row['aantal']; ?>
                <?php }
                ?>
                <p class="total-price">Totaal: € <?php echo $totaal; ?></p>
                <?php if ($totaal > 0) { ?>
                    <form action="orderverwerken.php" method="POST">
                        <input type="hidden" name="klantID" value="<?php echo $klantID; ?>">
                        <button type="submit" class="purchase-button">Koop</button> 
                    </form>
                <?php } ?>
            <?php } else {
                echo "<p class='empty-cart-message'>Je hebt nog geen producten in je winkelmandje.</p>";
            }
        } else {
            echo "<p class='login-message'>Je moet eerst inloggen om een winkelmandje te gebruiken.</p>";
        }
        ?>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>
