<?php
include("includes/dbh.inc.php");

session_start();

if (!isset($_SESSION["Restaurant_Name"])) {

    header("location: login.php");
}
$Restaurant_Name = $_SESSION["Restaurant_Name"];
$result = mysqli_query($conn, "SELECT id FROM users WHERE Restaurant_Name = '$Restaurant_Name'");
if ($row = mysqli_fetch_array($result)) {
    $usersID = $row['id'];
}
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8" content="widtg-device-width,initial-scale=1.0">
    <title>Ordomi</title>
    <link rel="icon" type="image/x-icon" href="foto/textlogo_1024x1024.png">
    <link href="styleordomi.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="menu">
        <ul>
            <li style="--i:5;"><a href="index.php"><span></span>Domov</a></li>
            <li style="--i:4;"><a href="jedalnylistok/listok.php"><span></span>Jedálny lístok</a></li>
            <li style="--i:3;"><a href="orders/orders.php"><span></span>Objednávky</a></li>
            <li style="--i:2;"><a href="orders/historyorders.php"><span></span>História Objednávok</a></li>
            <li style="--i:1;"><a href="kontakt.php"><span></span>Kontakt</a></li>
        </ul>
    </div>
</body>

</html>