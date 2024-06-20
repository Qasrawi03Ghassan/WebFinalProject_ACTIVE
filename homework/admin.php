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
            height: 90%;
            width: 60%;
            left:20%;
            top: 5%;
            border-radius: 25px;
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
    </style>
</head>
<body>
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
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;' placeholder='$x->name'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font' placeholder='$x->type'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;width: 35px;text-align: center' placeholder='$x->price'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font' placeholder='$x->image'></td>";
                echo "<td style='font-family: $font;color: white;font-size: 20px'><button type='button' style='border-radius: 10px;font-family: $font;background-color: orange;color: white' class='sBtn'>Submit</button</td>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td style='font-family: $font;color: white;font-size: 15px;width: 15px'>New dish</td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;' placeholder='enter dish name here'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font' placeholder='enter dish type here'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font;width: 35px;text-align: center' placeholder='$'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><input type='text' style='border-radius: 10px;font-family: $font' placeholder='enter dish image url here'></td>";
            echo "<td style='font-family: $font;color: white;font-size: 20px'><button type='button' style='border-radius: 10px;font-family: $font;background-color: orange;color: white' class='sBtn'>Add dish</button</td>";
            echo "</table>";
            ?>
        </div>
    </div>
    <div id="usersCont">
        <h1 style="color: white;font-family: 'Libre Baskerville', serif;font-size: 20px">Registered users</h1>
    </div>
    <div id="dealsCont">
        <h1 style="color: white;font-family: 'Libre Baskerville', serif;font-size: 20px">Deals</h1>
    </div>
</div>
<script>
    document.getElementById("dishes").addEventListener('click',function () {
        document.getElementById("dishes").style.color="orange";
        document.getElementById("users").style.color="white";
        document.getElementById("deals").style.color="white";

        document.getElementById("usersCont").style.display="none";
        document.getElementById("dealsCont").style.display="none";
        document.getElementById("dishesCont").style.display="block";

    })
    document.getElementById("users").addEventListener('click',function () {
        document.getElementById("dishes").style.color="white";
        document.getElementById("deals").style.color="white";
        document.getElementById("users").style.color="orange";

        document.getElementById("dishesCont").style.display="none";
        document.getElementById("dealsCont").style.display="none";
        document.getElementById("usersCont").style.display="block";
    })

    document.getElementById("deals").addEventListener('click',function () {
        document.getElementById("dishes").style.color="white";
        document.getElementById("users").style.color="white";
        document.getElementById("deals").style.color="orange";

        document.getElementById("dishesCont").style.display="none";
        document.getElementById("usersCont").style.display="none";
        document.getElementById("dealsCont").style.display="block";
    })
</script>
</body>
</html>
