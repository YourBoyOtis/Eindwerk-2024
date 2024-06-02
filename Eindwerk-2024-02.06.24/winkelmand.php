<h3>Winkelmandje</h3>
<?php
if($user!="Login") {
    $sql = "SELECT * FROM `tblWinkelmandje` WHERE klant ID='$klantID'";
    $totaal = 0;
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $product = $row["productID"];
        echo "Product: " . $row['productID'];
        $sql2 = "SELECT * FROM `tblGitaren` WHERE ID='$product'";
        $result2 = $conn->query($sql2);

        while($row2 = $result2->fetch_assoc()) {
            ?>
            <?php echo $row['naam']; ?>
            <img id="imgGitaar" alt="Gitaar" src="afbeeldingen/<?php echo $row['afbeelding']; ?>">
            <b>Type: </b><?php echo $row['type']; ?>
            <b>Kleur: </b><?php echo $row['kleur']; ?>
            <b>Prijs: </b> <?php echo $row['prijs'];
            $totaal += $row['prijs'];
            echo " Aantal: " . $row['aantal']; ?>
            <a href="deleteWinkelmandje.php?productID=<?php echo $row['productID']?>"><span class='glyphicon glyphicon-trash'></span></a><br><hr>
            <?php
        }
    }
}
$conn->close();
?>
<h4>Totale prijs: <?php print $totaal; ?> euro</h4>
<?php if ($totaal > 0) { ?>
<button onclick="location.href='orderverwerken.php'">KOOP</button>
<?php } else {
    print "Je moet eerst inloggen om een winkelmandje te gebruiken";
} ?>

