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

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$cardNum = $_POST['cardNum'];
$expDate = $_POST['exp_date'];
$cvv = $_POST['cvv'];

/*$qry = "INSERT INTO `users` (`Serial`, `Name`, `Email`, `Username`, `Password`, `Credit card number`, `Credit card expiration date`, `CVV`, `isAdmin`) VALUES (NULL, '$name', '$email', '$username', SHA1('$password'), '$cardNum', LAST_DAY('2027-09-09'), '$cvv', '0')";

$result = mysqli_query($conn, $qry);*/





mysqli_close($conn);