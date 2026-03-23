<?php

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
    <form action="includes/signup.inc.php" method="post">
        <table class="login">
            <tr>
                <td>
                    <img src="foto/ordomi_text.png" alt="ordomitext" style="width:250px;">
                </td>
            </tr>

            <tr>
                <td>
                    <input class="placehold" type="text" name="name" placeholder="Meno">
                </td>
            </tr>

            <tr>
                <td>
                    <input class="placehold" type="text" name="surname" placeholder="Priezvisko">
                </td>
            </tr>

            <tr>
                <td>
                    <input class="placehold" type="text" name="restid" placeholder="Nazov reštauracie">
                </td>
            </tr>

            <tr>
                <td>
                    <input class="placehold" type="text" name="email" placeholder="Email">
                </td>
            </tr>

            <tr>
                <td>
                    <input class="placehold" type="text" name="number" placeholder="Tel. číslo">
                </td>
            </tr>

            <tr>
                <td>
                    <input class="placehold" type="password" name="psw" placeholder="Heslo">
                </td>

            </tr>
            <td>
                <input class="placehold" type="password" name="pswrepeat" placeholder="Heslo">
            </td>
            </tr>

            <tr>
                <td class="subtd">
                    <input class="sub" type="submit" name="submit" value="Potvrdiť">
                </td>
            </tr>

            <tr>
                <td>
                    <div class="logindiv">
                        <ul>
                            <li>
                                <a href="index.php">Domov </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "empty-input") {
                            echo "<p class='error'>Fill in all fields !</p>";
                        } else if ($_GET["error"] == "invalid-name-of-restaurant") {
                            echo "<p class='error'>Choose a proper Name <br> of restaurant !</p>";
                        } else if ($_GET["error"] == "invalid-email") {
                            echo "<p class='error'>Choose a proper Email !</p>";
                        } else if ($_GET["error"] == "passwords-dont-match") {
                            echo "<p class='error'>Passwords dont match !</p>";
                        } else if ($_GET["error"] == "name-of-restaurant-taken") {
                            echo "<p class='error'>This name of restaurant <br>or  email is already taken!</p>";
                        } else if ($_GET["error"] == "stmt-failed") {
                            echo "<p class='error'>Something went wrong !</p>";
                        } else if ($_GET["error"] == "sign-up-was-successful") {
                            echo "<p class='error'>You have sign up!</p>";
                        }
                    }
                    ?>
                </td>
            </tr>
        </table>



</body>

</html>