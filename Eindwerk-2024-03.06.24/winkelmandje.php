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

    <div class="producten">
        <div>
            <br><br><br>
            <h2>Winkelmandje</h2>
            <button onclick="location.href='products.php'" class="btn-primary">Naar Producten</button>
        </div>
        <?php
        if ($isLoggedIn) {
           
            if (isset($_GET["productID"]))
            {
               
                $product = $_GET['productID'];
                $aantal=1;
                print $klantID;
               
                $sql = "INSERT INTO `winkelmandje` (`ID`, `gebruikersID`, `productID`, `aantal`) VALUES (NULL, '$klantID', '$product', '$aantal')";
                if ($conn->query($sql) === TRUE) {
                    $melding = "Product is toegevoegd";
                    header("location: winkelmandje.php?melding=$melding");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        ?>
        <div class="WinkelmandDiv">
        <h3>Winkelmandje Van <?php echo $user; ?></h3>
       
        <?php
        if ($isLoggedIn)
         {
           
            $sql = "SELECT * FROM `winkelmandje` WHERE gebruikersID='$klantID'";
            $totaal = 0;
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
            $product = $row['productID'];
            echo "Product: " . $row['productID'];
            $sql2 = "(SELECT * FROM `producten` WHERE id='$product')
            UNION
            (SELECT * FROM `producten` WHERE id='$product')";
            $result2 = $conn->query($sql2);
            while ($row2 = $result2->fetch_assoc()) { ?>
            <img id="imgGitaar" alt="gitaar" src="img/<?php echo $row2['afbeelding'];?>">
            <b>Naam: </b><?php echo $row2['naam']; ?>
            <b>Prijs: </b>€ <?php echo $row2['prijs']; ?>
            <?php $totaal += $row2['prijs']; ?>
            <b>Aantal: </b><?php echo $row['aantal']; ?>
            <a href="deleteWinkelmandje.php?productID=<?php echo $row['productID']; ?>"><br>Verwijder<br></a><br>
           
            <?php }
            }
            $conn->close(); ?>
            <p>Totaal: € <?php echo $totaal; ?></p>
            <h4>Totale prijs: <?php echo $totaal; ?> euro</h4>
            <?php if ($totaal > 0) { ?>
                <button onclick="location.href='orderverwerken.php'">Koop</button>
              </div> 
            <?php } }
           
            else{
                print"Je moet eerst inloggen om een winkelmandje te gerbuiken.";
               
               
            }
           
            ?>
           
         
    </div>
   
    <?php include "footer.php"; ?>  
</body>
</html>