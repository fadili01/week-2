<?php
require("db.php");

$id = $_GET['id'];

if(isset($_POST['submit'])) {
    $naam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $geboortedatum = $_POST['geboortedatum'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];


    $sql = 'UPDATE contacts SET voornaam = :voornaam, achternaam = :achternaam, email = :email,
    telefoonnummer = :telefoonnummer, geboortedatum = :geboortedatum WHERE id = :id';


    $stmt= $pdo->prepare($sql);
    $data = [
        'voornaam' => $naam,
        'achternaam' => $achternaam,
        'geboortedatum' => $geboortedatum,
        'email' => $email,
        'telefoonnummer' => $telefoonnummer,
        'id'=> $id
    ];
    $stmt->execute($data);  


    if($stmt) {
        echo "<h1>bewerkt</h1>";
    } else {
        echo "<h1>error</h1>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
<H1 style="color: blue;"> contact bewerken</H1>

<div class="input">

<input type="text" name="voornaam" placeholder="naam" required><br><br>
<input type="text" name="achternaam" placeholder="achternaam" required><br><br>
<input type="date" name="geboortedatum" placeholder="geboortedatum" required><br><br>
<input type="email" name="email" placeholder="emaail" required><br><br>
<input type="text" name="telefoonnummer" placeholder="telefoonnummer" required><br> <br>
<input type="submit" name="submit">

</form></div>
</body>
</html>