<?php



function emptyInputSignup($name, $surname, $restaurant_name, $number, $psw, $pswreapat){
    $result = null ;

    if(empty($name) || empty($surname) || empty($restaurant_name) || empty($number) || empty($psw) || empty($pswreapat)){
        $result = true;
    }

    else {
        $result = false;
    }
    return $result;
}

function invalidnameofrst($restaurant_name){
    $result = null ;;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $restaurant_name)) {
        $result = true;
    }
    
    else {
        $result = false;
    }

    return $result;
}

function invalidemail($email){
    $result = null ;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    
    else {
        $result = false;
    }

    return $result;
}

function pwsMatch($psw, $pswrepeat){
    $result = null ;

    if($psw !== $pswrepeat) {
        $result = true;
    }
    
    else {
        $result = false;
    }

    return $result;
}

function nameofrstExists($conn, $restaurant_name, $email){
    $sql = "SELECT * FROM users WHERE restaurant_name = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmt-failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $restaurant_name, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }

    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);

}

function createUser($conn, $name, $surname, $restaurant_name, $email, $number, $psw){
    $sql = "INSERT INTO users (usersName,usersSurname,restaurant_name,usersEmail,usersNumber,usersPsw) VALUES (?,?,?,?,?,?) ;";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmt-failed");
        exit();
    }

    $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $name, $surname, $restaurant_name, $email, $number, $hashedPsw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=sign-up-was-successful");
    exit();
}


function emptyInputlogin($restaurant_name, $psw){
    $result = null ;

    if(empty($restaurant_name) || empty($psw)){
        $result = true;
    }

    else {
        $result = false;
    }
    return $result;
}

function   loginusers($conn,$restaurant_name, $psw){
    $nameofrstExists = nameofrstExists($conn, $restaurant_name,$restaurant_name);

    if($nameofrstExists === false){
        header("location: ../login.php?error=wrong-login");
        exit();
    }

    $pswHashed = $nameofrstExists["usersPsw"];
    $checkPsw = password_verify($psw, $pswHashed);

    if($checkPsw === false){
        header("location: ../login.php?error=wrong-login");
        exit();
    }

    else if($checkPsw === true){
        session_start();
        $_SESSION["restid"] = $nameofrstExists["id"];
        $_SESSION["Restaurant_Name"] = $nameofrstExists["restaurant_name"];
        header("location: ../index.php");
        exit();
    }
}