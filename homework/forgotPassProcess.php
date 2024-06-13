<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sentEmail = $_POST["email"];
        $afterAt = $sentEmail.str_split("@")[1];
        if($afterAt.str_contains($afterAt,".com")){

        }
    }

