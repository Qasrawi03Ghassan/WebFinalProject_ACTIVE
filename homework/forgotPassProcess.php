<?php
//The comments below are required, don't change them
    //Connection to db:
    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "webfinalproject_db";
    $conn = "";

    try {
        $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
    }catch(mysqli_sql_exception){
        echo "Connection failed\n";
    }

    if($conn){
        echo "connection to database is successful.\n";
    }

    if(isset($_POST['email'])) {
        if (isset($_POST['genCode'])) {
            $userEmail = $_POST['email'];

            //$qry = "SELECT";

            $to = $userEmail;
            $subject = "New password recovery code request - Najah restaurant";
            $message = "<html><body style='font-size: 20px;'>Your requested code is: <b style='font-size: 30px'>" . $_POST['genCode'] . "</b><br><br>Please make sure that you don't give it to anyone.</body></html>\n";
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $headers .= "From: Najah restaurant - WebFinalProject";

            if (mail($to, $subject, $message, $headers)) {
                echo "email was sent successfully!\n";
            } else {
                echo "email sending failed!\n";
            }
        }
    }
    if(isset($_POST['userNewPass']) && isset($_POST['userEmail'])) {
        //Change password in database here

        $userEmail = $_POST['userEmail'];
        $userNewPass = $_POST['userNewPass'];
        //echo $_POST['userNewPass']."\n"; //just for checking

        $qry = "UPDATE `users` SET `Password` = SHA1('$userNewPass') WHERE `users`.`Email` = '$userEmail'";


        $result = mysqli_query($conn, $qry);

    }
    mysqli_close($conn);