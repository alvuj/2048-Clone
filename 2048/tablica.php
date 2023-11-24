<?php
// Parametri za povezivanje s bazom podataka
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "2048";

// Stvaranje povezivanja
$conn = new mysqli($servername, $username, $password, $dbname);

// Provjera povezivanja
if ($conn->connect_error) {
    die("Povezivanje nije uspjelo: " . $conn->connect_error);
}

// SQL upit za dohvat svih podataka
$sql = "SELECT id, user_name, high_score FROM tbl_user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ispis svakog reda podataka
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Ime: " . $row["user_name"]. " - Najviši rezultat: " . $row["high_score"]."<br>";
    }
} else {
    echo "0 rezultata";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="cs.css">

    
</head>
<body>
    <a href="index.html"><button>Nazad</button></a>
</body>
</html>
