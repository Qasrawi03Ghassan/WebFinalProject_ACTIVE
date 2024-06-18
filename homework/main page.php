<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>najah restaurant</title>
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>


    <style>

        .progress .bar {
            -webkit-transition: none;
            -moz-transition: none;
            -ms-transition: none;
            -o-transition: none;
            transition: none;}


            html {
            scroll-behavior: smooth;
        }
        body{
            background-image: url("images/foodbg.jpg");
            background-color: #1b1c24 ;
            background-attachment: fixed;
        }

        section{
            z-index: -1;
            position: absolute;
            background-color: #1b1c24;
            height: 200%;
            width: 70%;
            left:15%;
            top: 12.5%;
            border-radius: 25px;


        }
        .textstyle{

           font-size: 150%;
            background: rgba(27, 28, 36, 0.3);

        }


            a:link{color: white;}
            a:hover{color: orange;
                cursor: pointer;}  /*Changed from none to pointer by Ghassan*/

        div.section1image{

            animation-name: transition1;

            animation-iteration-count: infinite;
            animation-duration: 30s;
            position: absolute;
            top: 3%;
            left: 3%; width:30%; height:20%; z-index: -10;

        }



        @keyframes transition1{


            0% { left: 20%; width: 60%; height: 40% ;z-index: 10; top: 8%;visibility: unset}
            25% { left: 20%; width: 60%; height: 40% ;z-index: 10;top: 8%}
          /*  32%{opacity: 0.9; left: 16%} 34%{opacity: 0.7; left: 12%} 36%{opacity: 0.5; left: 8%}38%{opacity: 0.3; left:4%}*/
            35% { left: 0%;visibility: hidden; width: 30%; height: 20%;top:17%}
            89%{visibility: hidden}
            90% { left: 70%; width: 30%; height: 20% ;z-index: 10;top: 17%; visibility: unset}
            100% { left: 20%; width: 60%; height: 40% ;z-index: 10;top: 8%}


        }
        @keyframes transition2{

            0% { left: 100%; width: 60%; height: 40% ;z-index: 10; top: 8%;visibility: hidden}
            25% { left: 70%; width: 30%; height: 20% ;z-index: 10;top: 17%; visibility: hidden}
            35% { left: 20%; width: 60%; height: 40% ;z-index: 10;top: 8%; visibility: unset}
            60% { left: 20%; width: 60%; height: 40% ;z-index: 10;top: 8%}
            70% { left: 0%;visibility: hidden; width: 30%; height: 20%;top:17%}
            100%{visibility: hidden}

        }

        @keyframes transition3{

            0% { left: 100%; width: 60%; height: 40% ;z-index: 10; top: 8%;visibility: hidden}
            60% { left: 70%; width: 30%; height: 20% ;z-index: 10;top: 17%; visibility: hidden}
            70% { left: 20%; width: 60%; height: 40% ;z-index: 10;top: 8%; visibility: unset}
            90% { left: 20%; width: 60%; height: 40% ;z-index: 10;top: 8%}
            95% { left: 0%;visibility: hidden; width: 30%; height: 20%;top:17%}
            100%{visibility: hidden}

        }





    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

    <script>

        function stopAnimation(element) {
            $(element).css("-webkit-animation", "none");
            $(element).css("-moz-animation", "none");
            $(element).css("-ms-animation", "none");
            $(element).css("animation", "none");
        }


            function show_return(){
            if(window.scrollY>300) {
                document.getElementById("return").style.display = "block"
            }
            else{
                document.getElementById("return").style.display = "none"
            }
        }

        function choose_section(num){
            document.getElementById("home").style.display="none";
            document.getElementById("menu").style.display="none";
            document.getElementById("sales").style.display="none";
            document.getElementById("about").style.display="none";
            document.getElementById("contact").style.display="none";

            document.getElementById("homebt").style.color="white";
            document.getElementById("menubt").style.color="white";
            document.getElementById("salesbt").style.color="white";
            document.getElementById("aboutbt").style.color="white";
            document.getElementById("contactbt").style.color="white";

            switch(num) {
                case 1:
                    document.getElementById("home").style.display="block";
                    document.getElementById("homebt").style.color="orange";
                    break;
                case 2:
                    document.getElementById("menu").style.display="block";
                    document.getElementById("menubt").style.color="orange";
                    break;
                case 3:
                    document.getElementById("sales").style.display="block";
                    document.getElementById("salesbt").style.color="orange";
                    break;
                case 4:
                    document.getElementById("about").style.display="block";
                    document.getElementById("aboutbt").style.color="orange";
                    break;
                case 5:
                    document.getElementById("contact").style.display="block";
                    document.getElementById("contactbt").style.color="orange";
                    break;
                default:
                    document.getElementById("home").style.display="block";
                    document.getElementById("homebt").style.color="orange";
            }
        }
        function unhover(num){
            switch(num) {
                case 1:
                    if( "block" == document.getElementById("home").style.display)
                    document.getElementById("homebt").style.color="orange";
                    break;
                case 2:
                    if( "block" == document.getElementById("menu").style.display)
                    document.getElementById("menubt").style.color="orange";
                    break;
                case 3:
                    if( "block" == document.getElementById("sales").style.display)
                    document.getElementById("salesbt").style.color="orange";
                    break;
                case 4:
                    if( "block" == document.getElementById("about").style.display)
                    document.getElementById("aboutbt").style.color="orange";
                    break;
                case 5:
                    if( "block" == document.getElementById("contact").style.display)
                    document.getElementById("contactbt").style.color="orange";
                    break;
                default:
                    document.getElementById("homebt").style.color="orange";
            }

        }



    </script>
</head>

<body onscroll="show_return()">

<div id="start_of_page" style="position: absolute; top:0%"></div>

<table  style ="position: absolute; width :40%; top :5%; left: 15%; align-content: center; color: white;text-align: center ">
    <tr>
        <td class="textstyle" id="homebt" onclick="choose_section(1)" onmouseleave="unhover(1) " style="color: orange"> <a > home </a> </td>
        <td class="textstyle" id="menubt" onclick="choose_section(2)" onmouseleave="unhover(2)"> <a>menu</a></td>
        <td class="textstyle" id="salesbt" onclick="choose_section(3)" onmouseleave="unhover(3)"> <a>sales</a></td>
        <td class="textstyle" id="aboutbt" onclick="choose_section(4)" onmouseleave="unhover(4)"> <a>about</a></td>
        <td class="textstyle" id="contactbt" onclick="choose_section(5)" onmouseleave="unhover(5)"> <a>contact</a></td>

    </tr>
</table>

<table style ="position: absolute; width :30%; top :4%; left: 55%; align-content: center; color: white;text-align: center ">
    <tr>
        <td style="  font-size: 250%;  background: rgba(27, 28, 36, 0.4); font-family: 'Libre Baskerville'; "> <b>Najah restaurant</b> </td>


    </tr>
</table>


<section id ="home">

    <h1 style="text-align: center; font-size: 200%; color: white; font-family: 'Libre Baskerville'; position: absolute; width: 100%; top: 1.5%;"> welcome to Najah restaurant! <br> check out our <a>special deals</a> and order from home</h1>

    <div class="section1image" style=" animation-name: transition1; visibility: hidden; ">

     <img src="images/burgersale.png" style="  max-height: 120%; left:4%; position: absolute;">
    </div>
    <div class="section1image" style=";animation-name: transition2; visibility: hidden">
        <img src="images/kindpng_3844221.png" style="  max-height: 120%; left:10%;  position: absolute;">

    </div>
    <div class="section1image" style="; animation-name:transition3; visibility: hidden">
        <img src="images/pizza.png" style="  max-height: 120%; left:3%; position: absolute;">
    </div>

    <div style="position: absolute; left: 20%; top: 62%; height: 40%; width:60%; text-align: center">
    <img src="images/qrcode.png" style=" max-height: 120%">
        <h1 style="; left: 65%;  top:10%; font-size:200%; color: white;font-family: 'Libre Baskerville'; "> Visit our <br> mobile site!</h1>


    </div>


</section>


<section style="display: none; height: 140%" id="menu">

    <table  style ="position: absolute; width :80%; top:0.5%; left: 5%; align-content: center; color: white;text-align: center; table-layout: fixed">
        <tr>
            <td class="textstyle" id="maindish"  style="color: orange; background-color: #23252e"> <a > main dishes </a> </td>
            <td class="textstyle" id="sides" style="background-color: #23252e" > <a> sides </a></td>
            <td class="textstyle" id="drinks" style="background-color: #23252e" > <a> drinks </a></td>
            <td> <input type="search" placeholder="find your favourite dish!" style="width: 120%;height: 30px; background-color: rgba(35,37,46,0.76); color: white"> </td>
        </tr>
    </table>

    <div style=" position:absolute; width: 100% ;overflow-y: auto; height: 90%; top:7%">
    <?php

    class dish{
        public $name;
        public $type;
        public $price;
        public $image;
        function __construct($name, $type, $price, $image){
            $this->name= $name;
            $this->type= $type ;
            $this->price =  $price;
            $this->image =  $image ;
        }


    }
    $pizza = new dish('pizza','main',20,null);
    $burger = new dish('burger','main',30,'images/dishburger.png');
    $salad = new dish('salad','side',20,null) ;

    $dishes = array( $pizza, $salad,$pizza, $burger, $salad,$pizza, $burger, $salad,$pizza, $burger,$pizza,$pizza, $salad,$pizza, $burger, $salad,$pizza, $burger, $salad,$pizza, $burger,$pizza);

    $chosentype  = "all";
    $counter =0;


    echo "<table id='dishtable' style=';position: absolute; width: 90%; left: 5%; top: 0%; align-content: flex-start; height: 4500px; background-color: #1b1c24; scroll-behavior: smooth;'>";
    $num =0;

    foreach ($dishes as $x) {
        if($x->type==$chosentype || $chosentype=='all') {
            if ((($num % 4) == 0) && (!$num == 0)) {
                echo "<tr> ";
            }
            echo "<td  style='; position: relative '> 
            <div style='background-color: rgba(35,37,46,0.54);color: white ;border-radius: 10px; ; width: 260px; height: 400px; top:0%; position: absolute;border-spacing: 30px;'>
            <img src='$x->image' style='position: absolute; width: 260px; max-height: 260px;' alt='image unavailable'>

           <p style='top:260px; position: absolute; text-align: center; left:110px'> $x->name</p>
            
           $x->name
       
            </div>
         </td>";

            if ((($num + 1 % 4) == 0) && (!$num == 0)) {
                echo "</tr>";
            }

        $num++;
            }
    }


    echo "</table>";

    if($num<=25)
    {
        echo" <script>
              document.getElementById('dishtable').style.height='2500px';
              </script>
            ";
    }
    if($num<=16)
    {
        echo" <script>
              document.getElementById('dishtable').style.height='1800px';
              </script>
            ";
    }

    if($num<=12)
    {
        echo" <script>
              document.getElementById('dishtable').style.height='1400px';
              </script>
            ";
    }

    if($num<=8)
    {
        echo" <script>
              document.getElementById('dishtable').style.height='1000px';
              </script>
            ";
    }
    ?>
    </div>






</section>

<section style="display: none" id="sales">

    test2
</section>

<section style="display: none" id="about">
test3
</section>

<section style="display: none" id="contact">
    test4

</section>

<IMG SRC="images/shopping_cart.png" WIDTH="width" HEIGHT="height"  title="shopping cart" style="top :3%; left : 90%; position : fixed; background-color: orange; border-radius: 15px; border: 2px solid #d9640b;">

<IMG SRC="images/profilepic.png" WIDTH="width" HEIGHT="height" ALT="Image Text" title="profile pic" style="top :3%; left : 3%; position : absolute">

<a href ="#start_of_page"><IMG  id="return"   SRC="images/arrow.png" WIDTH="width" HEIGHT="height"  title="return" style="top :85%; left : 90%; position : fixed; background-color: orange; border-radius: 15px; border: 2px solid #d9640b; display: none"> </a>

</body>
</html>