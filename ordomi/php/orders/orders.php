<?php
include("../includes/functions.inc.php");
include("../includes/dbh.inc.php");
session_start();

if (!isset($_SESSION["Restaurant_Name"])) {

    header("location: ../login.php");
} else {
    $Restaurant_Name = $_SESSION["Restaurant_Name"];
    $result = mysqli_query($conn, "SELECT id FROM users WHERE Restaurant_Name = '$Restaurant_Name'");
    if ($row = mysqli_fetch_array($result)) {
        $usersID = $row['id'];
    }
}

if ($Restaurant_Name === false) {
    header("location: ../login.php?error=wrong-login");
    exit();
}

$query = "SELECT * FROM orders WHERE order_state = 0 or order_state = 1 or order_state = 2 and restaurant_id = $usersID";
$search_result = filterTable($query);


function filterTable($query)
{
    include("../includes/dbh.inc.php");

    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
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

        <div class="table_name_order">
            <p class="p_a_acc">
                Informacie o objednávkach
            </p>
        </div>
        <table class="objednavky">

            <tr>
                <th>ID</th>
                <th>ID Reštaurácie</th>
                <th>Detaily objednávky</th>
                <th>Poznámky k objednavke</th>
                <th>Cena</th>
                <th>Číslo stolu</th>
                <th>Stav objednávky</th>
                <th>Zaplatená/nezaplatená</th>
                <th>upraviť</th>
                <th></th>
            </tr>
            <?php while ($row = mysqli_fetch_array($search_result)):
                $id_to_update = $row['id'];
                $update_restaurant_id = $row['restaurant_id'];
                $update_order_details = $row['order_details'];
                $update_order_notes = $row['order_notes'];
                $update_price = $row['price'];
                $update_rest_table = $row['rest_table'];
                $update_order_state = $row['order_state'];
                $update_order_paid = $row['order_paid'];?>

                <tr>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td>
                        <?php echo $row['restaurant_id']; ?>
                    </td>

                    <td>
                        <?php echo $row['order_details']; ?>
                    </td>
                    <td>
                        <?php echo $row['order_notes']; ?>
                    </td>
                    <td>
                        <?php echo $row['price']; ?>
                    </td>
                    <td>
                        <?php echo $row['rest_table']; ?>
                    </td>
                    <td>
                        <?php echo $row['order_state']; ?>
                    </td>

                    <td>
                        <?php echo $row['order_paid']; ?>
                    </td>



                    <form action="updateorder.php" method="post">
                        <td>
                            <a href='updateorder.php?id=<?php echo $id_to_update; ?>
                                    ' type="button" name="update"><img src="../foto/edit.svg" alt="upraviť" class="update">
                        </td>

                    </form>
                    <td>

                    </td>

                </tr>



            <?php endwhile; ?>
        </table>

        <a href="../menu.php" class="buttonlistok">Domov</a>



    </form>

</body>

</html>