<?php

if(isset($_POST["submit"])){

    $restid = $_POST["restid"];
    $psw = $_POST["psw"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputlogin($restid, $psw)!== false){
        header("location: ../login.php?error=empty-input");
        exit();
    }
    
    loginusers($conn,$restid, $psw);
}

else{
    header("location ../login.php");
    exit();
}