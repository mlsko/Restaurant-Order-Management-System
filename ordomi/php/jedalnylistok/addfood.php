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


$restaurant_id = $usersID;
$food_name = @$_POST["food_name"];
$food_description = @$_POST["food_description"];
$alergens = @$_POST["alergens"];
$price = @$_POST["price"];
$category = filter_input(INPUT_POST, 'category');



if (isset($_POST["add"])) 
{
    $querry = "INSERT INTO food(food_name, food_description , alergens , food_category_id, price, restaurant_id )
                   VALUES ( '$food_name' , '$food_description' , '$alergens' , '$category', '$price' , '$restaurant_id' ) ";

    $result = mysqli_query($conn, $querry);

    if (!$result) {
        die("Nepodarilo sa uložiť do databázy");
    }

    header("location: listok.php");
}

?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pridanie Jedla</title>
    <link rel="icon" type="image/x-icon" href="../foto/textlogo_1024x1024.png">
    <link rel="stylesheet" href="stylefood.css">

</head>

<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <legend>Pridať jedlo</legend>

            <table class="addfood">
                <tr>
                    <td>
                        <label for="food_name">Názov</label>
                        <input type="text" name="food_name" placeholder="Názov" value="<?php echo $food_name; ?>"
                            class="text" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="food_description">Ingrediencie</label>
                        <input type="text" name="food_description" placeholder="Ingrediencie"
                            value="<?php echo $food_description; ?>" class="text" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="alergens">Alergény</label>
                        <input type="text" name="alergens" placeholder="Alergény" value="<?php echo $alergens; ?>"
                            class="text" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="price">Cena</label>
                        <input type="text" name="price" placeholder="Cena" value="<?php echo $price; ?>" class="text"
                            required>
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
                <td>
                    <input type="submit" name="add" value="Pridať" class="buttonadd">
                    <a href="listok.php" class="buttonadd">Domov</a>
                </td>
                </tr>

            </table>
        </fieldset>
    </form>




</body>

</html>