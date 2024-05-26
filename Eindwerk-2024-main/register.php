<?php
include_once("connection.php");

function sanitize_output($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];

    if ($pass1 != $pass2) {
        $melding = "Beide wachtwoorden zijn niet identiek";
    } else {
        $stmt = $conn->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $hashed_password = password_hash($pass1, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO gebruikers (gebruikersnaam, paswoord) VALUES (?, ?)");
            $stmt->bind_param("ss", $user, $hashed_password);

            if ($stmt->execute()) {
                $melding = "Account is toegevoegd";
                session_start();
                $_SESSION["user"] = $user;
                header("Location: index.php");
                exit;
            } else {
                $melding = "Error: " . $stmt->error;
            }
        } else {
            $melding = "De gebruikersnaam bestaat al";
        }
        $stmt->close();
    }
    header("Location: register.php?melding=" . urlencode($melding));
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren - BocchiMania</title>
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
        <h1>Registreren</h1>
        <form action="register.php" method="POST">
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" required>
            <label for="password1">Wachtwoord:</label>
            <input type="password" id="password1" name="password1" required>
            <label for="password2">Bevestig Wachtwoord:</label>
            <input type="password" id="password2" name="password2" required>
            <button type="submit">Registreren</button>
        </form>
        <?php if (isset($_GET['melding'])) { echo '<p>' . sanitize_output($_GET['melding']) . '</p>'; } ?>
    </main>
    <footer>
        <p>&copy; 2024 BocchiMania. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
