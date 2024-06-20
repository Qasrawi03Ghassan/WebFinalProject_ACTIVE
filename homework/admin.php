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
    <span style="color: white;position: fixed;left: 125px;top: 100px;visibility: hidden;opacity: 0;transition: visibility 0.25s ease,opacity 0.25s ease;font-size: 20px" id="logoutBtn" onclick="logout()"><a><i>Logout</i></a></span>
</div>
<div id="mainCont" align="center">
    <h1 id="title">Welcome back admin</h1>
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
        <table width="100%">
            <tr>
                <td class="head">Name</td>
                <td class="head" style="text-align: right">Type</td>
                <td class="head" style="text-align: right;width: 200px">Price&nbsp&nbsp&nbsp&nbsp&nbsp</td>
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
            $pizza = new dish('pizza','main',20.0,'images/dishpizza.png');
            $burger = new dish('burger','main',30.0,'images/dishburger.png');
            $salad = new dish('salad','side',20.0,'images/dishsalad.png') ;
            $cola = new dish('cola','drink',2.0,'images/cola.png') ;
            $chicken = new dish('chicken','main',40.0,'images/dishchicken.png','brief desc thingy thing brief desc thingy thing brief desc thingy thing brief desc thingy thing') ;

            $font ='Libre Baskerville';

            $dishes = array( $chicken,$pizza, $salad,$pizza, $burger,$cola, $salad,$pizza, $burger, $salad,$cola,$pizza,$pizza, $salad,$pizza, $burger,$cola, $salad,$pizza, $burger, $salad,$cola,$pizza, $burger, $salad,$pizza, $burger, $salad,$pizza, $burger, $salad,$pizza, $burger,$pizza);
            echo "<table align='center' width='100%'>";
            $i=0;
            foreach ($dishes as $x){
                $i++;
                echo "<tr>";
                echo "<td style='font-family: $font;color: white;font-size: 20px;width: 15px'>".$i.") "."</td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;text-align: center' placeholder='$x->name'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;text-align: center' placeholder='$x->type'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;width: 35px;text-align: center' placeholder='$x->price'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;text-align: center' placeholder='$x->image'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><button type='button' style='border-radius: 10px;font-family: $font;text-align: center;background-color: orange;color: white' class='sBtn'>Submit</button</td>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td style='font-family: $font;color: white;font-size: 15px;width: 15px'>New dish</td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;text-align: center;tex' placeholder='enter dish name here'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;text-align: center' placeholder='enter dish type here'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;width: 35px;text-align: center' placeholder='$'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;text-align: center' placeholder='enter dish image url here'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><button type='button' style='border-radius: 10px;font-family: $font;background-color: orange;color: white' class='sBtn'>Add dish</button</td>";
            echo "</table>";
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
            $Ahmad = new user('Ahmad Mansour','Ahm@d99','Ahmad99@gmail.com');
            $Omar = new user('Omar Dirballi','Omar_03',"Omar03_24@gmail.com");
            $Dana = new user('Dana Hashem','D@n@GG',"Dana123@gmail.com") ;
            $Toqa = new user('Toqa Suhail','TQ@123',"ToqaHashem@yahoo.com") ;
            $Mohammad = new user('Mohammad Aghbar','Mohammad123',"Moh99@hotmail.com") ;

            $font ='Libre Baskerville';

            $users = array( $Ahmad,$Omar, $Dana,$Toqa, $Mohammad);
            echo "<table align='center' width='100%'>";
            $i=0;
            foreach ($users as $x){
                $i++;
                echo "<tr>";
                echo "<td style='font-family: $font;color: white;font-size: 20px;width: 15px'>".$i.") "."</td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><span style='border-radius: 10px;font-family: $font;text-align: center'>$x->name</span></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><span style='border-radius: 10px;font-family: $font;text-align: center'>$x->username</span></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><span style='border-radius: 10px;font-family: $font;text-align: center'>$x->email</span></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><button type='button' style='border-radius: 10px;font-family: $font;text-align: center;background-color: #a13333;color: white' class='sBtn'>Remove</button</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
    </div>
    <div id="dealsCont">
        <h1 style="color: white;font-family: 'Libre Baskerville', serif;font-size: 20px">Available deals</h1>
        <input type="search" placeholder="search a deal here..." class="searchBox">
        <table width="108%">
            <tr>
                <td class="head">Name</td>
                <td class="head" style="text-align: right">Type</td>
                <td class="head" style="text-align: right;width: 200px">Price&nbsp&nbsp&nbsp&nbsp&nbsp</td>
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
            $f = new deal('Burger super','limited',82,'4 burgers, 2 cola, 1 fries, 1 salad');
            $s = new deal('Pizza tower','limited',38.5,'1 large pizza, 2 cola, 1 fries');
            $t = new deal('Crispy Party bucket','limited',108,'3 chicken meals, 2 cola, 2 fries, 1 salad') ;

            $font ='Libre Baskerville';

            $deals = array( $f,$s,$t);
            echo "<table align='center' width='100%'>";
            $i=0;
            foreach ($deals as $x){
                $i++;
                echo "<tr>";
                echo "<td style='font-family: $font;color: white;font-size: 20px;width: 15px'>".$i.") "."</td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;text-align: center' placeholder='$x->name'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;text-align: center' placeholder='$x->type'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;width: 40px;text-align: center' placeholder='$x->price'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><textarea style='border-radius: 10px;font-family: $font;text-align: center;resize: none;height: 60px' placeholder='$x->dishes'></textarea></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><button type='button' style='border-radius: 10px;font-family: $font;text-align: center;background-color: orange;color: white;font-size: 25px' class='sBtn'>Submit</button</td>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td style='font-family: $font;color: white;font-size: 15px;width: 15px'>New deal</td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;text-align: center;' placeholder='enter deal name here'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;text-align: center' placeholder='enter deal type here'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;width: 40px;text-align: center' placeholder='$'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><textarea style='border-radius: 10px;font-family: $font;text-align: center;height: 60px;resize: none' placeholder='enter deal description here'></textarea></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><button type='button' style='border-radius: 10px;font-family: $font;background-color: orange;color: white;font-size: 25px' class='sBtn'>Add deal</button</td>";
            echo "</table>";
            ?>
        </div>
    </div>
</div>
<script>
    function logout(){
        //Implement logout here:



        window.close();
        window.open("index.html");
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
