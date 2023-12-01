<?php
require("db.php");


if(isset($_POST['submit'])) {
    $naam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $geboortedatum = $_POST['geboortedatum'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];


    $sql = "INSERT INTO contacts (voornaam, achternaam, geboortedatum, email, telefoonnummer)
        VALUES (:voornaam, :achternaam, :geboortedatum, :email, :telefoonnummer)";

    $stmt= $pdo->prepare($sql);
    $data = [
        'voornaam' => $naam,
        'achternaam' => $achternaam,
        'geboortedatum' => $geboortedatum,
        'email' => $email,
        'telefoonnummer' => $telefoonnummer,

    ];
    $stmt->execute($data);  


    if($stmt) {
        echo "<h1>Toegevoegd</h1>";
    } else {
        echo "<h1>error</h1>";
    }
}

$stmt = $pdo->query("SELECT * FROM contacts");  




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body style="color: rgb(226, 200, 168);">

    <h1 class="h1" style="color: blue;">contactenlijst</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">voornaam</th>
      <th scope="col">achternaam</th>
      <th scope="col">geboortedatum</th>
      <th scope="col">email</th>
      <th scope="col">telefoon</th>
      <th scope="col">bewerken</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = $stmt->fetch()) {

        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['voornaam']."</td>";
        echo "<td>".$row['achternaam']."</td>";
        echo "<td>".$row['geboortedatum']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['telefoonnummer']."</td>";
        echo "<td><a href='edit.php?id=". $row['id'] ."' class= 'btn btn-success'>Bewerken</a></td>";
        echo "</tr>";
    }  
   ?>
  </tbody>
</table>

<form method="post">
<H1 style="color: blue;"> contact toevoegen</H1>

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