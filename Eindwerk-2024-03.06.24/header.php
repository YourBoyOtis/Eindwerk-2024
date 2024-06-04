<?php
session_start();
$isLoggedIn = isset($_SESSION["user"]);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="styles.css">
    <script src="dark-mode.js" defer></script>
</head>
<body>
    <header>
        <img id="logo" alt="BocchiManiaLogo">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Producten</a></li>
                <li><a href="info.php">Informatie</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if ($isLoggedIn) { ?>
                    <li><a href="logout.php">Logout (<?php echo $_SESSION["user"]; ?>)</a></li>
                    <li><a href="winkelmandje.php">Winkelmandje</a></li>
                <?php } else { ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Registreren</a></li>
                <?php } ?>
            </ul>
        </nav>
        <button id="dark-mode-toggle">Donker</button>
    </header>
</body>
</html>

    