<?php
session_start();

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
    <div class="index">
        <ul>
            <li style="--i:5;"><a href="index.php"><span></span>Domov</a></li>
            <?php
            if(isset($_SESSION["Restaurant_Name"])){
                echo "<li style='--i:4;'><a href='menu.php'><span></span>Menu</a></li>";
                echo "<li style='--i:3;'><a href ='acc/acc.php'><span></span>Informacie o účte</a></li>";
                echo "<li style='--i:2;'><a href='includes/logout.inc.php'><span></span>Log out</a></li>";

                
            }
            else
            {
                echo "<li style='--i:3;'><a href='login.php'><span></span>Login</a></li>";
                echo "<li style='--i:2;'><a href='signup.php'><span></span>Registrácia</a></li>"; 

            }
            ?>
            <li style="--i:1;"><a href="kontakt.php"><span></span>Kontakt</a></li>
        </ul>
    </div>

</body>

</html>