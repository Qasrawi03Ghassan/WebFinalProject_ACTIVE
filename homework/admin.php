<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <title>Admin page | Najah restaurant</title>
    <style>
        html {
            scroll-behavior: smooth;
        }
        body{
            background-image: url("images/foodbg.jpg");
            background-color: #1b1c24 ;
            background-attachment: fixed;
        }
        #mainCont{
            z-index: -1;
            position: absolute;
            background-color: #1b1c24;
            height: 80%;
            width: 50%;
            left:23%;
            top: 12.5%;
            border-radius: 25px;
        }
        #title{
            font-family: 'Libre Baskerville', serif;
            font-size: 50px;
            color:white;
            font-weight: bold;
            text-align: center;
        }
        #dishes,#users{
            width: 50%;
            height: 100%;
            font-size: 30px;
            font-family: 'Libre Baskerville', serif;
            color: white;
        }
        #dishes:hover,#users:hover{
            cursor: pointer;
        }
        #dishes{
            color:yellow;
        }
        #dishesCont,#usersCont{
            width: 70%;
            height: 75%;
            border-radius: 25px;
            margin-top:50px;
        }
        #usersCont{
            display: none;
        }
        .field{
            color: white;
            font-size: 30px;
            font-family: 'Libre Baskerville', serif;
        }
        .txt{
            font-size: 18px;
        }
    </style>
</head>
<body>
<div id="mainCont" align="center">
    <h1 id="title">Welcome back</h1>
    <div id="nav">
        <table align="center" width="100%" >
            <tr>
                <td align="center">  <a id="dishes">Add a new dish</a>  </td>
                <td align="center">  <a id="users">Manage users</a>  </td>
            </tr>
        </table>
    </div>
    <div id="dishesCont" align="center">
        <form action="" method="post">
        <table width="auto">
            <tr>
                <td><span class="field">Dish name:&nbsp</span></td>
                <td><input type="text" class="txt" name="dishName" required></td>
            </tr>
            <tr>
                <td><span class="field">Type:&nbsp</span></td>
                <td><input type="text" class="txt" name="dishType" required></td>
            </tr>
            <tr>
                <td><span class="field">Image url:&nbsp</span></td>
                <td><input type="text" class="txt" name="dishImage"></td>
            </tr>
            <tr>
                <td><span class="field">Price:&nbsp</span></td>
                <td><input type="text" class="txt" name="dishPrice"></td>
            </tr>
        </table>
            <button class="Btn" type="reset">Cancel</button>
            <button class="Btn" type="submit">Add a new dish</button>
        </form>
    </div>
    <div id="usersCont">
        <h1 style="color: white">Users</h1>
    </div>
</div>
<script>
    document.getElementById("dishes").addEventListener('click',function () {
        document.getElementById("dishes").style.color="yellow";
        document.getElementById("users").style.color="white";

        document.getElementById("usersCont").style.display="none";
        document.getElementById("dishesCont").style.display="block";

    })
    document.getElementById("users").addEventListener('click',function () {
        document.getElementById("dishes").style.color="white";
        document.getElementById("users").style.color="yellow";

        document.getElementById("dishesCont").style.display="none";
        document.getElementById("usersCont").style.display="block";
    })
</script>
</body>
</html>
