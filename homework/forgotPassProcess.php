<?php
    if(isset($_POST['genCode'])) {
        if (isset($_POST['email'])) {
            $userEmail = $_POST['email'];

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
    if(isset($_POST['userNewPass'])) {
        //Change password in database here
        //echo $_POST['userNewPass']; just for checking










    }