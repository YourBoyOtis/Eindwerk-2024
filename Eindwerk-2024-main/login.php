<?php
include_once("connection.php");

function sanitize_output($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['paswoord'])) {
            session_start();
            $_SESSION["user"] = $user;
            header("Location: index.php");
            exit;
        } else {
            $melding = "Verkeerde wachtwoord";
        }
    } else {
        $melding = "Gebruiker niet gevonden";
    }
    $stmt->close();
    header("Location: login.php?melding=" . urlencode($melding));
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login - BocchiMania</title>
    <link rel="stylesheet" href="styles.css">
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
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Registreren</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($_GET['melding'])) { echo '<p>' . sanitize_output($_GET['melding']) . '</p>'; } ?>
    </main>
    <footer>
        <p>&copy; 2024 BocchiMania. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>

