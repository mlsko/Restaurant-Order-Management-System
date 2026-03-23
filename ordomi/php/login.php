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
    <form action="includes/login.inc.php" method="post">
        <table class="login">
            <tr>
                <td>
                    <img src="foto/ordomi_text.png" alt="ordomitext" style="width:250px;">
                </td>
            </tr>

            <tr>
                <td>
                    <input class="placehold" type="text" name="restid" placeholder="Názov reštaurácie">
                </td>
            </tr>

            <tr>
                <td>
                    <input class="placehold" type="password" name="psw" placeholder="Heslo">
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
                                <a href="index.php">Domov</a>
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
                        } else if ($_GET["error"] == "wrong-login") {
                            echo "<p class='error'>incorrect login <br> information!</p>";
                        }
                    }
                    ?>
                </td>
            </tr>
        </table>
</body>

</html>