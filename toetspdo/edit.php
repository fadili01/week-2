<?php
require("db.php");

$id = $_GET['id'];
$stmt = $pdo->query("SELECT * FROM mobiels WHERE id = $id");
$mobiel = $stmt->fetch();

if(isset($_POST['submit'])) {
    $merk = $_POST['merk'];
    $model = $_POST['model'];
    $opslag = $_POST['opslag'];
    $prijs = $_POST['prijs'];
    


    $sql = 'UPDATE mobiels SET merk = :merk, model = :model, opslag = :opslag,
    prijs = :prijs, WHERE id = :id';


    $stmt= $pdo->prepare($sql);
    $data = [
        'merk' => $merk,
        'model' => $model,
        'opslag' => $opslag,
        'prijs' => $prijs,
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
<H1 style="color: blue;"> telefoon aanpassen</H1>

<div class="input">

<input type="text" name="merk" placeholder="merk" value="<?php $mobiel["merk"] ?>" required><br><br>
<input type="text" name="model" placeholder="model" required><br><br>
<input type="text" name="opslag" placeholder="opslag" required><br><br>
<input type="text" name="prijs" placeholder="prijs" required><br><br>
<input type="submit" name="submit">

</form></div>
</body>
</html>