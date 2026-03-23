<?php


include("../includes/dbh.inc.php");

if (isset($_POST['delete'])) {

    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

    $query = "DELETE FROM food WHERE id = $id_to_delete";
    $result = mysqli_query($conn, $query);


    if (!$result) {
        die("Data odstranené úspešne");
        header("Location : listok.php");
    } else {

        header("Location: listok.php");
    }
}

?>