<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koop - BocchiMania</title>
    <link rel="stylesheet" href="styles.css">
    <script src="dark-mode.js" defer></script>
</head>
<body>
    <header>
        <img src="images/logo.png" alt="BocchiManiaLogo">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Producten</a></li>
                <li><a href="info.php">Informatie</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <button id="dark-mode-toggle">Donker</button>
    </header>
    <main>
        <h1>Product Aankoop</h1>
        <section class="product-purchase">
            <div class="product-details">
                <img src="images/product1.jpg" alt="Product Name" class="product-image">
                <div class="product-info">
                    <h2>Product Naam: Fender Stratocaster</h2>
                    <p>Prijs: €1200</p>
                    <form action="process_purchase.php" method="POST">
                        <label for="quantity">Aantal:</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="1" required>

                        <label for="customer-name">Uw Naam:</label>
                        <input type="text" id="customer-name" name="customer_name" required>

                        <label for="customer-email">Uw E-mail:</label>
                        <input type="email" id="customer-email" name="customer_email" required>

                        <button type="submit" class="btn-primary">Bestel Nu</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 BocchiMania. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
