<?php
session_start();
    //Connecting to db:
    $db_server = "localhost";
    $db_name = "webfinalproject_db";
    $db_username = "root";
    $db_password = "";

    $conn = "";
    try{
        $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
    }catch(Exception $e){
        echo"<script>alert('Connection to database failed!');</script>";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            height: 90%;
            width: 60%;
            left:20%;
            top: 8%;
            border-radius: 25px;
            transition: height 0.25s ease,top 0.25s ease;
        }
        #title{
            font-family: 'Libre Baskerville', serif;
            font-size: 50px;
            color:white;
            font-weight: bold;
            text-align: center;
        }
        #dishes,#users,#deals{
            width: 50%;
            height: 100%;
            font-size: 30px;
            font-family: 'Libre Baskerville', serif;
            color: white;
        }
        #dishes:hover,#users:hover,#deals:hover{
            cursor: pointer;
        }
        #dishes{
            color:orange;
        }
        #dishesCont,#usersCont,#dealsCont{
            width: 90%;
            height: 75%;
            border-radius: 25px;
            margin-top:50px;
        }
        #usersCont,#dealsCont{
            display: none;
        }
        .head{
            color: orange;
            font-family: 'Libre Baskerville', serif;
            text-align: center;
        }
        .sBtn:hover{
            cursor: pointer;
        }
        #logout{
            position: fixed;
            width: 5%;
            height: 10%;
            background-color: #1b1c24;
            border-radius: 25px;
            left: 100px;
            transition: height 0.25s ease;
        }
        #logout:hover{
            height: 15%;
        }
        #userIcon{
            color: white;
            font-size: 50px;
            margin-top: 20px;
        }
        #logoutBtn:hover{
            cursor: pointer;
        }
        .searchBox{
            width: 200px;
            position: absolute;
            top: 225px;
            right: 90px;
            background-color: rgba(35,37,46,0.76);
            color: white;
        }
    </style>
</head>
<body>
<div id="logout" align="center">
    <i class="fa-solid fa-user-tie" id="userIcon"></i><br>
    <span style="color: white;position: fixed;left: 125px;top: 100px;visibility: hidden;opacity: 0;transition: visibility 0.25s ease,opacity 0.25s ease;font-size: 20px" id="logoutBtn" onclick="logout()"><a href="index.php" style="color: white;"><i>Logout</i></a></span>
</div>
<div id="mainCont" align="center">
    <h1 id="title">Welcome back <?php if(isset($_SESSION['adminUsername']))echo $_SESSION['adminUsername']  ?></h1>
    <div id="nav">
        <table align="center" width="100%" >
            <tr>
                <td align="center">  <a id="dishes">Manage dishes</a>  </td>
                <td align="center">  <a id="users">Manage users</a>  </td>
                <td align="center">  <a id="deals">Manage deals</a>  </td>
            </tr>
        </table>
    </div>
    <div id="dishesCont" align="center">
        <h1 style="color: white;font-family: 'Libre Baskerville', serif;font-size: 20px">Available dishes</h1>
        <input type="search" placeholder="search a dish here..." class="searchBox">
        <table width="80%">
            <tr>
                <td class="head" style="text-align: left">Name</td>
                <td class="head" style="text-align: center;width: 200px">Type</td>
                <td class="head" style="text-align: center;width: 200px">Price&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                <td class="head" style="text-align: left">Image url</td>
            </tr>
        </table>
        <div id="dishesTable" style="overflow: auto;width: 100%;height: 75%;">
            <?php
            class dish
            {
                public $name;
                public $type;
                public $price;
                public $image;

                function __construct($name, $type, $price, $image)
                {
                    $this->name = $name;
                    $this->type = $type;
                    $this->price = $price;
                    $this->image = $image;
                }
            }

            $dishName = "";
            $dishType = "";
            $dishPrice = "";
            $dishImg = "";

            $databaseDishes = array();

            //Retrieving data from database:
            $qry="SELECT * from dishes";
            $result=mysqli_query($conn,$qry);
            foreach($result as $row){
                $dishName = $row['Name'];
                $dishType = $row['Type'];
                $dishPrice = $row['Price'];
                $dishImg = $row['Image url'];

                $databaseDishes[] = new dish($dishName, $dishType, $dishPrice, $dishImg);
            }

            /*$pizza = new dish('pizza','main',20.0,'images/dishpizza.png');
            $burger = new dish('burger','main',30.0,'images/dishburger.png');
            $salad = new dish('salad','side',20.0,'images/dishsalad.png') ;
            $cola = new dish('cola','drink',2.0,'images/cola.png') ;
            $chicken = new dish('chicken','main',40.0,'images/dishchicken.png','brief desc thingy thing brief desc thingy thing brief desc thingy thing brief desc thingy thing') ;
            */
            $font ='Libre Baskerville';

            //$dishes = array( $chicken,$pizza, $salad,$pizza, $burger,$cola, $salad,$pizza, $burger, $salad,$cola,$pizza,$pizza, $salad,$pizza, $burger,$cola, $salad,$pizza, $burger, $salad,$cola,$pizza, $burger, $salad,$pizza, $burger, $salad,$pizza, $burger, $salad,$pizza, $burger,$pizza);
            echo "<table align='center' width='100%'>";
            $i=0;
            foreach ($databaseDishes as $x){
                $i++;
                echo "<tr>";
                echo "<form action='admin.php' method='post'>";
                echo "<td style='font-family: $font;color: white;font-size: 20px;width: 15px'>".$i.") "."</td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input required  name='dishName' type='text' style='border-radius: 10px;font-family: $font;text-align: center' value='$x->name'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input required  name='dishType' type='text' style='border-radius: 10px;font-family: $font;text-align: center' value='$x->type'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input required  name='dishPrice' type='number' step='1' min='0'' style='border-radius: 10px;font-family: $font;width: 50px;text-align: center' value='$x->price'></td>";
                echo "<input name='dishIndex' type='hidden' value='$i'>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input  name='dishURL' type='text' style='border-radius: 10px;width: 250px;font-family: $font;text-align: center' value='$x->image'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><button type='submit' style='border-radius: 10px;font-family: $font;text-align: center;background-color: orange;color: white' class='sBtn'>Submit</button</td>";
                echo "</form>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td style='font-family: $font;color: white;font-size: 15px;width: 15px'>New dish</td>";
            echo "<form action='admin.php' method='post'>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input required name='dName' type='text' style='border-radius: 10px;font-family: $font;text-align: center;tex' placeholder='enter dish name here'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input required name='dType' type='text' style='border-radius: 10px;font-family: $font;text-align: center' placeholder='enter dish type here'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input required name='dPrice' type='number' step='1' min='0' style='border-radius: 10px;font-family: $font;width: 50px;text-align: center' placeholder='$'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input name='dURL' type='text' style='border-radius: 10px;font-family: $font;text-align: center;width: 250px' placeholder='enter dish image url here'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><button type='submit' style='border-radius: 10px;font-family: $font;background-color: orange;color: white' class='sBtn'>Add dish</button</td>";
            echo "</form>";
            echo "</table>";


            //Editing an existing dish:
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['dishName']) && isset($_POST['dishType']) && isset($_POST['dishPrice']) && isset($_POST['dishURL']) && isset($_POST['dishIndex'])){
                    $Index = $_POST['dishIndex'];
                    $Name = $_POST['dishName'];
                    $Price = $_POST['dishPrice'];
                    $Type = $_POST['dishType'];
                    $URL = $_POST['dishURL'];

                    $qry = "UPDATE `dishes` SET `Name` = '$Name', `Type` = '$Type', `Image url` = '$URL', `Price` = '$Price' WHERE `dishes`.`Serial` = '$Index'";
                    $result = mysqli_query($conn,$qry);
                    echo "<meta http-equiv='refresh' content='0'>";
                    if($result){
                        echo "<script>alert('$Name'+' '+'dish was changed successfully!')</script>";
                    }
                }
            }

            //Adding a new dish:
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['dName']) && isset($_POST['dType']) && isset($_POST['dPrice']) && isset($_POST['dURL'])){
                    $dishName = $_POST['dName'];
                    $dishPrice = $_POST['dPrice'];
                    $dishType = $_POST['dType'];
                    $dishURL = $_POST['dURL'];

                    $qry = "INSERT INTO `dishes` (`Serial`, `Name`, `Type`, `Image url`, `Price`) VALUES (NULL, '$dishName', '$dishType', '$dishURL', '$dishPrice')";
                    $result = mysqli_query($conn,$qry);
                    echo "<meta http-equiv='refresh' content='0'>";
                    if($result){
                        echo "<script>alert('$dishName'+' '+'dish was added successfully!')</script>";
                    }
                }
            }

            ?>
        </div>
    </div>
    <div id="usersCont">
        <h1 style="color: white;font-family: 'Libre Baskerville', serif;font-size: 20px">Registered users</h1>
        <input type="search" placeholder="search a user here..." class="searchBox">
        <table width="70%" align="left">
            <tr>
                <td class="head">Name</td>
                <td class="head" style="text-align: center">Username</td>
                <td class="head" style="text-align: center">Email</td>
            </tr>
        </table>
        <div id="dishesTable" style="overflow: auto;width: 100%;height: 75%;">
            <?php
            class user
            {
                public $name;
                public $username;
                public $email;
                function __construct($name, $username,$email)
                {
                    $this->name = $name;
                    $this->username = $username;
                    $this->email = $email;
                }
            }
            $databaseUsers = array();
            //Getting users from the database:
            $qry = "SELECT * from users WHERE isAdmin != 1";
            $result=mysqli_query($conn,$qry);
            foreach($result as $row){
                $databaseUsers[] = new user($row['Name'], $row['Username'], $row['Email']);
            }
            /*
            $Ahmad = new user('Ahmad Mansour','Ahm@d99','Ahmad99@gmail.com');
            $Omar = new user('Omar Dirballi','Omar_03',"Omar03_24@gmail.com");
            $Dana = new user('Dana Hashem','D@n@GG',"Dana123@gmail.com") ;
            $Toqa = new user('Toqa Suhail','TQ@123',"ToqaHashem@yahoo.com") ;
            $Mohammad = new user('Mohammad Aghbar','Mohammad123',"Moh99@hotmail.com") ;
            */
            $font ='Libre Baskerville';

            //$users = array( $Ahmad,$Omar, $Dana,$Toqa, $Mohammad);
            echo "<table align='center' width='100%'>";
            $i=0;
            foreach ($databaseUsers as $x){
                $i++;
                echo "<tr>";
                echo "<form action='admin.php' method='post'>";
                echo "<td style='font-family: $font;color: white;font-size: 20px;width: 15px'>".$i.") "."</td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><span style='border-radius: 10px;font-family: $font;text-align: center'>$x->name</span></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><span style='border-radius: 10px;font-family: $font;text-align: center'>$x->username</span></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><span style='border-radius: 10px;font-family: $font;text-align: center'>$x->email</span></td>";
                echo "<input type='hidden' name='index' value='$x->username'>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><button type='submit' style='border-radius: 10px;font-family: $font;text-align: center;background-color: #a13333;color: white' class='sBtn'>Remove</button</td>";
                echo "</form>";
                echo "</tr>";
            }
            echo "</table>";


            //Removing a user:
            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['index'])){
                $ind = $_POST['index'];
                $qry="DELETE FROM users WHERE username = '$ind'";
                $result = mysqli_query($conn,$qry);
                if($result){
                    echo "<script>alert('The user with username (' + '$ind' +') was deleted from the database successfully.')</script>";
                }
                echo "<meta http-equiv='refresh' content='0'>";
            }

            ?>
        </div>
    </div>
    <div id="dealsCont">
        <h1 style="color: white;font-family: 'Libre Baskerville', serif;font-size: 20px">Available deals</h1>
        <input type="search" placeholder="search a deal here..." class="searchBox" id="dealSearch">
        <table width="108%">
            <tr>
                <td class="head">Name</td>
                <td class="head" style="text-align: center;width: 250px">Type</td>
                <td class="head" style="text-align: center;width: 200px">Price&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                <td class="head" style="text-align: left">Description</td>
            </tr>
        </table>
        <div id="dishesTable" style="overflow: auto;width: 100%;height: 75%;">
            <?php
            class deal
            {
                public $name;
                public $type;
                public $price;
                public $dishes;

                function __construct($name, $type, $price, $dishes)
                {
                    $this->name = $name;
                    $this->type = $type;
                    $this->price = $price;
                    $this->dishes = $dishes;
                }
            }
            //Getting data from database:
            $databaseDeals = array();
            $qry="SELECT * FROM deals";
            $result=mysqli_query($conn,$qry);
            foreach($result as $row){
                $databaseDeals[] = new deal($row['Name'], $row['Type'], $row['Price'], $row['Dishes']);
            }
            /*
            $f = new deal('Burger super','limited',82,'4 burgers, 2 cola, 1 fries, 1 salad');
            $s = new deal('Pizza tower','limited',38.5,'1 large pizza, 2 cola, 1 fries');
            $t = new deal('Crispy Party bucket','limited',108,'3 chicken meals, 2 cola, 2 fries, 1 salad') ;
            */
            $font ='Libre Baskerville';

            //$deals = array( $f,$s,$t);
            echo "<table align='center' width='100%'>";
            $i=0;
            foreach ($databaseDeals as $x){
                $i++;
                echo "<tr>";
                echo "<form action='admin.php' method = post>";
                echo "<td style='font-family: $font;color: white;font-size: 20px;width: 15px'>".$i.") "."</td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input name='dealN' type='text' style='border-radius: 10px;font-family: $font;text-align: center' value='$x->name'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input name='dealT'  type='text' style='border-radius: 10px;font-family: $font;text-align: center' value='$x->type'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input name='dealP' type='number' step='1' min='0' style='border-radius: 10px;font-family: $font;width: 50px;text-align: center' value='$x->price'></td>";
                echo "<input type='hidden' value='$i' name='dealIndex'>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><textarea name='dealD'  style='border-radius: 10px;font-family: $font;text-align: center;resize: none;height: 60px'>$x->dishes</textarea></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><button type='submit' style='border-radius: 10px;font-family: $font;text-align: center;background-color: orange;color: white;font-size: 25px' class='sBtn'>Submit</button</td>";
                echo "</form>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<form action='admin.php' method = post>";
            echo "<td style='font-family: $font;color: white;font-size: 15px;width: 15px'>New deal</td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input required type='text' name='dealName' style='border-radius: 10px;font-family: $font;text-align: center;' placeholder='enter deal name here'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input required type='text' name='dealType' style='border-radius: 10px;font-family: $font;text-align: center' placeholder='enter deal type here'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input required type='number' name='dealPrice' step='1' min='0' style='border-radius: 10px;font-family: $font;width: 50px;text-align: center' placeholder='$'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><textarea name='dealDesc' style='border-radius: 10px;font-family: $font;text-align: center;height: 60px;resize: none' placeholder='enter deal description here'></textarea></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><button type='submit' style='border-radius: 10px;font-family: $font;background-color: orange;color: white;font-size: 25px' class='sBtn'>Add deal</button</td>";
            echo "</form>";
            echo "</table>";

            //Editing an existing deal:
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['dealN']) && isset($_POST['dealT']) && isset($_POST['dealP']) && isset($_POST['dealD']) && isset($_POST['dealIndex'])){
                    $dIndex = $_POST['dealIndex'];
                    $dName = $_POST['dealN'];
                    $dPrice = $_POST['dealP'];
                    $dType = $_POST['dealT'];
                    $dDesc = $_POST['dealD'];

                    $qry = "UPDATE `deals` SET `Name` = '$dName', `Price` = '$dPrice', `Dishes` = '$dDesc', `Type` = '$dType' WHERE `deals`.`Serial` = '$dIndex'";
                    $result = mysqli_query($conn,$qry);
                    echo "<meta http-equiv='refresh' content='0'>";
                    if($result){
                        echo "<script>alert('$dName'+' '+'deal was changed successfully!')</script>";
                    }
                }
            }

            //Adding a new deal
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['dealName']) && isset($_POST['dealType']) && isset($_POST['dealPrice']) && isset($_POST['dealDesc'])){
                    $dealName = $_POST['dealName'];
                    $dealPrice = $_POST['dealPrice'];
                    $dealType = $_POST['dealType'];
                    $dealDesc = $_POST['dealDesc'];

                    $qry = "INSERT INTO `deals` (`Serial`, `Name`, `Price`, `Dishes`, `Type`) VALUES (NULL, '$dealName', '$dealPrice', '$dealDesc', '$dealType')";
                    $result = mysqli_query($conn,$qry);
                    echo "<meta http-equiv='refresh' content='0'>";
                    if($result){
                        echo "<script>alert('$dealName'+' '+'deal was added successfully!')</script>";
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
<script>
    function logout(){
        //Implement logout here:
        <?php
            session_destroy();
        ?>


    }

    document.getElementById("dishes").addEventListener('click',function () {
        document.getElementById("dishes").style.color="orange";
        document.getElementById("users").style.color="white";
        document.getElementById("deals").style.color="white";

        document.getElementById("usersCont").style.display="none";
        document.getElementById("dealsCont").style.display="none";
        document.getElementById("dishesCont").style.display="block";

        document.getElementById("mainCont").style.height="90%";
        document.getElementById("mainCont").style.top="8%";

    })
    document.getElementById("users").addEventListener('click',function () {
        document.getElementById("dishes").style.color="white";
        document.getElementById("deals").style.color="white";
        document.getElementById("users").style.color="orange";

        document.getElementById("dishesCont").style.display="none";
        document.getElementById("dealsCont").style.display="none";
        document.getElementById("usersCont").style.display="block";

        document.getElementById("mainCont").style.height="60%";
        document.getElementById("mainCont").style.top="15%";
    })

    document.getElementById("deals").addEventListener('click',function () {
        document.getElementById("dishes").style.color="white";
        document.getElementById("users").style.color="white";
        document.getElementById("deals").style.color="orange";

        document.getElementById("dishesCont").style.display="none";
        document.getElementById("usersCont").style.display="none";
        document.getElementById("dealsCont").style.display="block";

        document.getElementById("mainCont").style.height="90%";
        document.getElementById("mainCont").style.top="8%";
    })

    document.getElementById("logout").addEventListener('mouseover',function (){
        document.getElementById("logoutBtn").style.visibility="visible";
        document.getElementById("logoutBtn").style.opacity="1";
    })
    document.getElementById("logout").addEventListener('mouseout',function (){
        document.getElementById("logoutBtn").style.opacity="0";
        document.getElementById("logoutBtn").style.visibility="hidden";
    })
</script>
</body>
</html>
<?php
    mysqli_close($conn);
?>