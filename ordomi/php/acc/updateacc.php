<?php

include("../includes/functions.inc.php");
include("../includes/dbh.inc.php");
session_start();

if (!isset($_SESSION["Restaurant_Name"])) {

    header("location: ../login.php");
}
$Restaurant_Name = $_SESSION["Restaurant_Name"];
$result = mysqli_query($conn,"SELECT * FROM users WHERE Restaurant_Name = '$Restaurant_Name'");
if($row = mysqli_fetch_array($result))
{
    $usersName = $row['usersName'];
    $usersSurname = $row['usersSurname'];
    $restaurant_description = $row['restaurant_description'];
    $restaurant_primary_color = $row['restaurant_primary_color'];
    $restaurant_secondary_color = $row['restaurant_secondary_color'];
    $usersEmail = $row['usersEmail'];
    $usersNumber = $row['usersNumber'];
}

?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8" content="widtg-device-width,initial-scale=1.0">
    <title>Upravenie Učtu</title>
    <link rel="icon" type="image/x-icon" href="../foto/textlogo_1024x1024.png">
    <link href="../jedalnylistok/stylefood.css" rel="stylesheet" type="text/css">
</head>

<body>

<fieldset>
        <legend>Upraviť jedlo</legend>
        <form method="post" action="">
            <table class="updatefood">
                <?php
                if (isset($_POST['update'])) {
                    $usersName = $_POST['usersName'];
                    $usersSurname = $_POST['usersSurname'];
                    $restaurant_description = $_POST['restaurant_description'];
                    $restaurant_primary_color = $_POST['restaurant_primary_color'];
                    $restaurant_secondary_color = $_POST['restaurant_secondary_color'];
                    $usersEmail = $_POST['usersEmail'];
                    $usersNumber = $_POST['usersNumber'];


                    $result3 = mysqli_query($conn, "UPDATE users set usersName ='$usersName', usersSurname = '$usersSurname' , restaurant_description = '$restaurant_description' ,
                        restaurant_primary_color = '$restaurant_primary_color' ,restaurant_secondary_color = '$restaurant_secondary_color' ,
                        usersEmail='$usersEmail' , usersNumber ='$usersNumber' WHERE Restaurant_Name = '$Restaurant_Name'");
                    if ($result3) {
                        header("location: acc.php");
                    } else {
                        echo "<p>something went wrong</p>";
                    }
                }
                ?>

                <tr>
                    <td>
                        <label for="usersName">Meno</label>
                        <input type="text" name="usersName" placeholder="Meno" value="<?php echo $usersName; ?>"
                            class="text" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="usersSurname">Priezvisko</label>
                        <input type="text" name="usersSurname" placeholder="Priezvisko"
                            value="<?php echo $usersSurname; ?>" class="text" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="restaurant_description">Detaily reštiky</label>
                        <input type="text" name="restaurant_description" placeholder="Detaily reštiky"
                            value="<?php echo $restaurant_description; ?>" class="text" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="restaurant_primary_color">Primárna farba</label>
                        <input type="text" name="restaurant_primary_color" placeholder="Primárna farba"
                            value="<?php echo $restaurant_primary_color; ?>" class="text" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="restaurant_secondary_color">Sekundárna farba</label>
                        <input type="text" name="restaurant_secondary_color" placeholder="Sekundárna farba"
                            value="<?php echo $restaurant_secondary_color; ?>" class="text" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="usersEmail">Email</label>
                        <input type="text" name="usersEmail" placeholder="Email" value="<?php echo $usersEmail; ?>"
                            class="text" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="usersNumber">Číslo</label>
                        <input type="text" name="usersNumber" placeholder="Číslo" value="<?php echo $usersNumber; ?>" class="text"
                            required>
                    </td>
                </tr>
                

                <tr>
                    <td>
                        <input type="submit" name="update" value="Upraviť" class="buttonupdate">
                        <a href="acc.php" class="buttonupdate">Domov</a>
                    </td>
                </tr>
            </table>
    </fieldset>


</body>

</html>