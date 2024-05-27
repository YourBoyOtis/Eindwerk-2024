<?php
$title = "Contact";
include 'header.php';
?>

<main>
    <h1>Contact</h1>
    <section class="contact">
        <form action="contact-form.php" method="POST">
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Bericht:</label>
            <textarea id="message" name="message" required></textarea>
            <button type="submit">Verzenden</button>
        </form>
    </section>
</main>

<footer>
    <p>&copy; 2024 BocchiMania. Alle rechten voorbehouden.</p>
</footer>

</body>
</html>

