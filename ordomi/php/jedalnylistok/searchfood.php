<?php
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


if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];

    $query = "SELECT * FROM food WHERE 
    id like '%$valueToSearch%' and restaurant_id = $usersID 
    or food_name like '%$valueToSearch%' and restaurant_id = $usersID 
    or food_description like '%$valueToSearch%' and restaurant_id = $usersID 
    or alergens like '%$valueToSearch%' and restaurant_id = $usersID
    or price like '%$valueToSearch%' and restaurant_id = $usersID";

    $search_result = filterTable($query);

} else {
    $query = "SELECT * FROM `food` WHERE restaurant_id = $usersID";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    include("../includes/dbh.inc.php");

    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}

?>