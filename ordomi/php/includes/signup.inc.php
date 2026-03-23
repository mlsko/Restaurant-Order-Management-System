<?php


if (isset($_POST["submit"])){
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $restid = $_POST["restid"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $psw = $_POST["psw"];
    $pswrepeat = $_POST["pswrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $surname, $restid, $number, $psw, $pswrepeat)!== false){
        header("location: ../signup.php?error=empty-input");
        exit();
    }

    if(invalidnameofrst($restid)!== false){
        header("location: ../signup.php?error=invalid-name-of-restaurant");
        exit();
    }

    if(invalidemail($email)!== false){
        header("location: ../signup.php?error=invalid-email");
        exit();
    }

    if(pwsMatch($psw, $pswrepeat)!== false){
        header("location: ../signup.php?error=passwords-dont-match");
        exit();
    }

    if(nameofrstExists($conn, $restid, $email)!== false){
        header("location: ../signup.php?error=name-of-restaurant-taken");
        exit();
    }
 
    createUser($conn, $name, $surname, $restid, $email, $number, $psw);
}

else {
    header("location ../signup.php");
    exit();
}