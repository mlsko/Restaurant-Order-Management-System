<?php
include("../includes/dbh.inc.php");

session_start();

if (!isset($_SESSION["Restaurant_Name"])) {

    header("location: ../login.php");
}
$Restaurant_Name = $_SESSION["Restaurant_Name"];
$result = mysqli_query($conn, "SELECT id FROM users WHERE Restaurant_Name = '$Restaurant_Name'");
if ($row = mysqli_fetch_array($result)) {
    $usersID = $row['id'];
}

$id_to_update = $_GET['id'];
$query = "SELECT * FROM orders WHERE id='$id_to_update'";
$result = mysqli_query($conn, $query);

if (isset($_POST['Edit'])) {
    @$update_id_to_update = $_POST['id'];
    @$update_order_details = $_POST['order_details'];
    @$update_order_notes = $_POST['order_notes'];
    @$update_price = $_POST['price'];
    @$update_rest_table = $_POST['rest_table'];
    @$update_order_state = $_POST['order_state'];
    @$update_order_paid = $_POST['order_paid'];
}

while ($row = mysqli_fetch_array($result)) {
    $update_id_to_update1 = $row['id'];
    $update_order_details1 = $row['order_details'];
    $update_order_notes1 = $row['order_notes'];
    $update_price1 = $row['price'];
    $update_rest_table1 = $row['rest_table'];
    $update_order_state1 = $row['order_state'];
    $update_order_paid1 = $row['order_paid'];
}


if (isset($_POST['Edit'])) {


    $query1 = "UPDATE orders SET  order_details = '$update_order_details', order_notes='$update_order_notes',
           price='$update_price', rest_table='$update_rest_table', order_state='$update_order_state', order_paid='$update_order_paid' WHERE id='$id_to_update';";

    $result1 = mysqli_query($conn, $query1);


    if (!$result1) {
        
        header("Location : updateorder.php?chyba");

    } else {

        header("Location: orders.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../foto/textlogo_1024x1024.png">
    <link rel="stylesheet" href="../jedalnylistok/stylefood.css">
    <title>Upravenie objednávky</title>

</head>

<body>
    <fieldset>
    <legend>Upraviť jedlo</legend>
    <table class="addfood">
        <form action="" method="post">

            <tr>
                <td>
                    <label for="">Detaily objednávky</label>
                    <input type="text" name="order details" placeholder="order details"
                        value="<?php echo $update_order_details1; ?>" class="text" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Poznámky k objednavke</label>
                    <input type="text" name="order_notes" placeholder="order notes" value="<?php echo $update_order_notes1; ?>"
                        class="text" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Cena</label>
                    <input type="text" name="price" placeholder="price" value="<?php echo $update_price1; ?>"
                        class="text" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Číslo stolu</label>
                    <input type="text" name="rest_table" placeholder="number of table" value="<?php echo $update_rest_table1; ?>"
                        class="text" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Stav objednávky</label>
                    <input type="text" name="order_state" placeholder="order_state" value="<?php echo $update_order_state1; ?>"
                        class="text" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Zaplatené/nezaplatené</label>
                    <input type="text" name="order_paid" placeholder="order_paid" value="<?php echo $update_order_paid1; ?>"
                        class="text" required>
                </td>
            </tr>
           
            <tr>
                <td>
                    <input type="submit" name="Edit" value="Edit" class="buttonadd">
                    <a href="orders.php" class="buttonadd">Domov</a>
                </td>
            </tr>
        </form>
    </table>
    </fieldset>
</body>
</html>