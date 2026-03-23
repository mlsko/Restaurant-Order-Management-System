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
$query = "SELECT * FROM food WHERE id='$id_to_update'";
$result = mysqli_query($conn, $query);

if (isset($_POST['Edit'])) {
    @$update_food_name = $_POST['food_name'];
    @$update_food_description = $_POST['food_description'];
    @$update_alergens = $_POST['alergens'];
    @$update_price = $_POST['price'];
    @$category = filter_input(INPUT_POST, 'category');
}


while ($row = mysqli_fetch_array($result)) {
    $update_food_name1 = $row['food_name'];
    $update_food_description1 = $row['food_description'];
    $update_alergens1 = $row['alergens'];
    $update_price1 = $row['price'];
}


if (isset($_POST['Edit'])) {


    $query1 = "UPDATE food SET food_name='$update_food_name', food_description='$update_food_description', alergens='$update_alergens',
           food_category_id='$category', price='$update_price' WHERE id='$id_to_update';";

    $result1 = mysqli_query($conn, $query1);


    if (!$result1) {
        
        header("Location : updatefood.php?chyba");

    } else {

        header("Location: listok.php");
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
    <link rel="stylesheet" href="stylefood.css">
    <title>Upravenie jedla</title>

</head>

<body>
    <fieldset>
    <legend>Upraviť jedlo</legend>
    <table class="addfood">
        <form action="" method="post">
            <tr>
                <td>
                    <label for="">Názov</label>
                    <input type="text" name="food_name" placeholder="Názov" value="<?php echo $update_food_name1; ?>"
                        class="text" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Ingrediencie</label>
                    <input type="text" name="food_description" placeholder="Ingrediencie"
                        value="<?php echo $update_food_description1; ?>" class="text" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Alergény</label>
                    <input type="text" name="alergens" placeholder="Alergény" value="<?php echo $update_alergens1; ?>"
                        class="text" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Cena</label>
                    <input type="text" name="price" placeholder="Cena" value="<?php echo $update_price1; ?>"
                        class="text" required>
                </td>
            </tr>
            <tr>
                    <td>
                        <label for="category">Kategória jedla</label>
                    </td>
                <tr>
                    <td>
                        <select id="category" name="category">
                            <?php

                            if ($conn->connect_errno) {
                                echo '<option value="0">Chyba pri spojeni s databazou</option>';
                                exit();
                            }

                            $sql = "SELECT * FROM food_categories";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["id"] . '"> ' . $row["categoryName"] . '</option>';

                                }

                            } else{
                                echo  '<option value="0">Nie je vytvorená žiadna kategória</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            <tr>
                <td>
                    <input type="submit" name="Edit" value="Edit" class="buttonadd">
                    <a href="listok.php" class="buttonadd">Domov</a>
                </td>
            </tr>
        </form>
    </table>
    </fieldset>

    <?php


    ?>
</body>

</html>