<?php

$dbhost = "localhost:3307";
$dbuser = "root";
$dbwaachtwoord = "";
$dbnaam = "ouddb";

$dsn = "mysql:host=$dbhost;dbname=$dbnaam;";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try 
{
     $pdo = new PDO($dsn, $dbuser, $dbwaachtwoord, $options);
} 
catch (\PDOException $e) 
{
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if(isset($_POST['submit'])) {
    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $telefoonnummer = $_POST["telefoonnummer"];

$sql = 'INSERT INTO klanten(naam, email, telefoonnummer) VALUES (:naam, :email, :telefoonnummer)';
$stmt = $pdo->prepare($sql);
$data = array(
'naam' => $naam,
'email' => $email,
'telefoonnummer' => $telefoonnummer
);

$stmt->execute($data);

if ($stmt) {
    echo "$naam is toegvoegd";
} else {
    echo "Error";
}

};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        
        <label for="naam">naam</label><br>
		<input type="text" id="naam" name="naam" required><br>

        <label for="email">email</label><br>
		<input type="text" id="email" name="email" required><br>

        <label for="telefoonnummer">telefoonnummer</label><br>
		<input type="number" id="telefoonnummer" name="telefoonnummer" required><br><br>

        <input type="submit" name="submit" value="Verzenden">
    </form>
</body>
</html>