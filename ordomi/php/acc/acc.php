<?php
include("../includes/functions.inc.php");
include("../includes/dbh.inc.php");
session_start();

if (!isset($_SESSION["Restaurant_Name"])) {

    header("location: login.php");
}
$Restaurant_Name = $_SESSION["Restaurant_Name"];
$result = mysqli_query($conn, "SELECT * FROM users WHERE Restaurant_Name = '$Restaurant_Name'");
if ($row = mysqli_fetch_array($result)) {
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informácie o Učte</title>
    <link rel="icon" type="image/x-icon" href="../foto/textlogo_1024x1024.png">
    <link rel="stylesheet" href="../jedalnylistok/stylefood.css">


</head>

<body>


    <form action="" method="post">

        <div class="table_name_acc">
            <p class="p_a_acc">
                Informacie o účte
            </p>
        </div>
        <table class="acc">

            <tr>
                <th>ID</th>
                <th>Názov</th>
                <th>Meno</th>
                <th>Priezvisko</th>
                <th>Detaily reštiky</th>
                <th>Primárna farba</th>
                <th>Sekundárna farba</th>
                <th>Email</th>
                <th>Číslo</th>
                <th>Upraviť</th>
                <th></th>
            </tr>

            <tr>
                <td>
                    <?php echo ($row['id']); ?>
                </td>
                <td>
                    <?php echo ($row['restaurant_name']); ?>
                </td>

                <td>
                    <?php echo ($row['usersName']); ?>
                </td>
                <td>
                    <?php echo ($row['usersSurname']); ?>
                </td>
                <td>
                    <?php echo ($row['restaurant_description']); ?>
                </td>
                <td>
                    <?php echo ($row['restaurant_primary_color']); ?>
                </td>
                <td>
                    <?php echo ($row['restaurant_secondary_color']); ?>
                </td>
                <td>
                    <?php echo ($row['usersEmail']); ?>
                </td>
                <td>
                    <?php echo ($row['usersNumber']); ?>
                </td>



                <td>
                    <a href="updateacc.php"><img src="../foto/edit.svg " alt="update" class="update"></a>
                </td>
                <td></td>

            </tr>




        </table>

        <a href="../index.php" class="buttonlistok">Domov</a>



    </form>

</body>

</html>