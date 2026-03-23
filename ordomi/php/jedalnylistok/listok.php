<?php
include("../includes/dbh.inc.php");
include('deletefood.php');
include('searchfood.php');




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jedálny Listok</title>
    <link rel="icon" type="image/x-icon" href="../foto/textlogo_1024x1024.png">
    <link rel="stylesheet" href="stylefood.css">


</head>

<body>


    <form action="" method="post">

        <table class="shape_search">
            <tr>
                <th><input type="text" name="valueToSearch" placeholder="Search" class="search_bar">
                    <input type="submit" name="search" value="" class="search_icon">
                </th>
            </tr>
        </table>

        <div class="table_name">
            <p class="p_a">
                Pridať jedlo
            </p>
            <a href="addfood.php" class="add"></a>

        </div>

        <table class="listok">

            <tr>

                <th>Id</th>
                <th>Názov</th>
                <th>Ingrediencie</th>
                <th>Alergeny</th>
                <th>Cena</th>
                <th>Upraviť</th>
                <th>Zmazať</th>

            </tr>


            <?php while ($row = mysqli_fetch_array($search_result)):
                 $id_to_update = $row['id'];
                 $update_food_name = $row['food_name'];
                 $update_food_description = $row['food_description'];
                 $update_alergens = $row['alergens'];
                 $update_price = $row['price']; 
                 $update_food_category_id = $row['food_category_id'];?>
                <tr>

                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td>
                        <?php echo $row['food_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['food_description']; ?>
                    </td>
                    <td>
                        <?php echo $row['alergens']; ?>
                    </td>
                    <td>
                        <?php echo $row['price']; ?>
                    </td>

                    <form action="updatefood.php" method="post">
                        <td>
                            <a href='updatefood.php?id=<?php echo $id_to_update; ?>
                            'type="button" name="update" ><img src="../foto/edit.svg" alt="upraviť" class="update">
                        </td>
                        
                    </form>

                    <form action="deletefood.php" method="post">
                        <td>
                            <input type="hidden" name="id_to_delete" value="<?= $row['id'] ?>">
                            <input type="submit" name="delete" value="" class="delete">
                        </td>
                    </form>
                </tr>



                <?php endwhile; ?>
        </table>

        <a href="../menu.php" class="buttonlistok">Domov</a>


    </form>


    <?php

    mysqli_free_result($search_result);
    mysqli_close($conn);
    ?>


</body>

</html>