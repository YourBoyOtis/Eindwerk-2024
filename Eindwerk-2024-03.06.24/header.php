<?php
session_start();
$isLoggedIn = isset($_SESSION["user"]);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - BocchiMania</title>
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

    