<?php
//Connection to db:
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "webfinalproject_db";
$conn = "";

try {
    $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
}catch(mysqli_sql_exception){
    echo "Connection failed.<br>";
}

if($conn){
    echo "connection to database is successful.<br>";
}

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['cardNum']) && isset($_POST['exp_date']) && isset($_POST['cvv'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cardNum = $_POST['cardNum'];
    $expDate = $_POST['exp_date'];
    $cvv = $_POST['cvv'];

    list($m,$y) = explode("/",$expDate);
    $d = '01';
    $cy = date('Y');
    $cc = substr($cy,0,2);
    $date = $cc.$y."-".$m."-".$d;

    $qry = "INSERT INTO `users` (`Serial`, `Name`, `Email`, `Username`, `Password`, `CardNum`, `CardExp`, `CVV`, `isAdmin`) VALUES (NULL, '$name', '$email', '$username', SHA1('$password'), '$cardNum', LAST_DAY('$date'), '$cvv', '0')";
    $result = mysqli_query($conn, $qry);
}

mysqli_close($conn);
header("Location: index.php");
exit();
