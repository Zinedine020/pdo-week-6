<?php
$host = 'localhost'; 
$db = 'winkel'; 
$user = 'root'; 
$pass = 'Zinedine020'; 
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Verbonden aan de database.";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $naam = $_POST["naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $beschrijving = $_POST["beschrijving"];

    
    $stmt = $pdo->prepare("UPDATE producten SET naam = ?, prijs_per_stuk = ?, beschrijving = ? WHERE id = 2");
    $stmt->execute([$naam, $prijs_per_stuk, $beschrijving]);

    echo "Het product is bijgewerkt!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
</head>
<body>
    <h1>Update Product</h1>
    <form method="POST" action="">
        <label for="naam">Naam:</label><br>
        <input type="text" id="naam" name="naam"><br><br>
        
        <label for="prijs_per_stuk">Prijs per stuk:</label><br>
        <input type="text" id="prijs_per_stuk" name="prijs_per_stuk"><br><br>
        
        <label for="beschrijving">Beschrijving:</label><br>
        <textarea id="beschrijving" name="beschrijving"></textarea><br><br>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
