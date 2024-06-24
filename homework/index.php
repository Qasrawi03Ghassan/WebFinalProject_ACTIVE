<?php
session_start();


$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "webfinalproject_db";
try{
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
}catch(PDOException $e){
    echo 'Could not connect to the database.';
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["loginUsername"]) && isset($_POST["loginPassword"])){
        $username = $_POST["loginUsername"];
        $password = $_POST["loginPassword"];
        $notValid = false;

        $qry = "SELECT * FROM users";
        $result = $conn->query($qry);
        for($i = 0; $i < $result->num_rows; $i++){
            $row = $result->fetch_object();
            if($row->Username == $username && $row->Password == SHA1($password) && $row->isAdmin == 0){
                $_SESSION["userUsername"] = $row->Username;
                header('Location: main%20page.php');
            }elseif ($row->Username == $username && $row->Password == SHA1($password) && $row->isAdmin == 1){
                $_SESSION["adminUsername"] = $row->Username;
                header('Location: admin.php');
            }else{
                $notValid = true;
            }
        }
        if($notValid){
            echo "<script>alert('Invalid username or password!')</script>";
        }

    }
}

include "index.html";