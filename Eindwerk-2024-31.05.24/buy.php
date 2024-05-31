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


<?php
include 'connection.php';
$sql = "SELECT * FROM `producten`";
 $result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
?>
<div class="gitaar">
<h4><?php echo $row['naam']; ?></h4>
<a href="buy.php?productID=<?php echo $row['id']?>">
<img id="imgGitaar" alt="Gitaar" src="afbeeldingen/<?php echo $row['afbeelding']; ?>"></a>
<p><b>Omschrijving: </b><?php echo $row['omschrijving']; ?></p>
<p><b>Merk: </b><?php echo $row['merk']; ?></p><br>
<p><b>Type: </b><?php echo $row['type']; ?></p><br>
<p class="prijs"><b>Prijs: </b>€ <?php echo $row['prijs']; ?></p>
<a href="winkelmandje.php?productID=<?php echo $row['id']?>">Toevoegen aan winkelmandje</a>
</div>
<?php };
$conn->close(); ?>
</div>



<?php
if(isset($_GET['productID'])){
$id = $_GET['productID'];
include 'connection.php';
$sql = "SELECT * FROM producten WHERE id = '$id'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
?>
<h4><?php echo $row['naam']; ?></h4>
<h4><?php echo $row['id']; ?></h4>
<img id='imgSchoenen' alt='schoenen' src="afbeeldingen/<?php echo $row['afbeelding']; ?>">
<p><b>Omschrijving: </b><?php echo $row['omschrijving']; ?></p>
<p><b>Kleur: </b><?php echo $row['kleur']; ?></p><br>
<p class="prijs"><b>Prijs: </b>€ <?php echo $row['prijs']; ?></p>
<a href="buy.php?productID=<?php echo $row['id']?>">Toevoegen aan winkelmandje</a><br>
<a href="producten.php">Terug naar de webshop</a>
<?php
};
$conn->close(); }
?>
    <footer>
        <p>&copy; 2024 BocchiMania. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
