<?php
require('db.php');


if (isset($_POST['sumbit'])) {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST["achernaam"];
    $geboortedatum = $_POST["geboortedatum"];
    $email = $_POST["email"];
    $telefoonnummer = $_POST["telefoonnummer"];

    
    $sql = 'INSERT INTO contacts(voornaam, achternaam, geboortedatum, email,  telefoonnummer) VALUES (:voornaam, :achternaam, :geboortedatum, :email, :telefoonnummer)';
    $stmt = $pdo->prepare($sql);
    
    $data = array(  
        'voornaam' => $voornaam,
        'achternaam' => $achternaam,
        'geboortedatum'=>$geboortedatum,
        'email'=>$email,
        'telefoonnummer' => $telefoonnummer
    );
    
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
    <title>Document</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <tbody>
        <h1>contactenlijst</h1>
        <table>
            <tr>
                <th>id</th>
                <th>voornaam</th>
                <th>achternaam</th>
                <th>geboortedatum</th>
                <th>email</th>
                <th>telefoonnummer</th>
            </tr>
        </table>
    </tbody>
   <br><br><br>
    <?php
    while ($row = $stmt->fetch()) {

        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['voornaam']."</td>";
        echo "<td>".$row['achternaam']."</td>";
        echo "<td>".$row['geboortedatum']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['telefoonnummer']."</td>";
        echo "</tr>";
        
        }
    ?>
    <form method="post">
        <h1>contact toevoegen</h1>
        <input type="text" id="naam" name="naam" placeholder="naam">
        <input type="text" id="achternaam" name="achternaam" placeholder="achternaam">
        <input type="date" id="date" name="date" placeholder="geboortedatume">
        <input type="email" id="email" name="email" placeholder="email">
        <input type="numbre" id="number" name="number" placeholder="telefoonnummer"><br><br>
        <input type="submit" name="submit" value="Verzenden">
    </form>
   
</body>
</html>