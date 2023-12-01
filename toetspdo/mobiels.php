<?php
require("db.php");

if(isset($_POST['submit'])) {
    $merk = $_POST['merk'];
    $model = $_POST['model'];
    $opslag = $_POST['opslag'];
    $prijs= $_POST['prijs'];
    


    $sql = "INSERT INTO mobiels (merk, model, opslag, prijs)
        VALUES (:merk, :model, :opslag, :prijs)";

    $stmt= $pdo->prepare($sql);
    $data = [
        'merk' => $merk,
        'model' => $model,
        'opslag' => $opslag,
        'prijs' => $prijs,
        
    ];
    $stmt->execute($data);  


    if($stmt) {
        echo "<h1>mobiel Toegevoegd</h1>";
    } else {
        echo "<h1>error</h1>";
    }
}

$stmt = $pdo->query("SELECT * FROM mobiels");  


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>telefoons</h1>

<table class="table">
  <thead>
    <tr>
      <th>id</th>
      <th>merk</th>
      <th>model</th>
      <th>opslag</th>
      <th>prijs</th>
      <th>aanpassen</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = $stmt->fetch()) {

        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['merk']."</td>";
        echo "<td>".$row['model']."</td>";
        echo "<td>".$row['opslag']."</td>";
        echo "<td>".$row['prijs']."</td>";
        echo "<td><a href='edit.php?id=". $row['id'] ."' class= 'btn btn-success'>Bewerken</a></td>";
        echo "</tr>";
    }  
   ?>
  </tbody>
</table>

<form method="post">
<H1>telefoon toevoegen</H1>

<div class="input">

<input type="text" name="merk" placeholder="merk" required><br><br>
<input type="text" name="model" placeholder="model" required><br><br>
<input type="text" name="opslag" placeholder="opslag" required><br><br>
<input type="text" name="prijs" placeholder="prijs" required><br><br>
<input type="submit" name="submit">

</form></div>
</body>
</html>