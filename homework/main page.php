<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <title>Najah restaurant</title>
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
            animation-duration: 20s;
            position: absolute;
            top: 3%;
            left: 3%; width:30%; height:20%; z-index: -10;

        }
        span.salesspan{
            position: absolute;
            width: 60%;
            height: 90%;
            top:5%;
            border-radius: 25px;
            background-color: #1b1c24;
        }

        .salesimg{
            max-height: 100%; max-width: 70%;
        }

        .salesdesc{
            position: absolute; font-size: 150%; text-align: center; background-color: #23252e; color: white;  left:66%; border-radius: 25px; top: 2%; height: 96%; width: 30%
        }

        #animation1{
            animation-name: transition1; visibility: hidden;
        }
        #animation2{
            animation-name: transition2; visibility: hidden;
        }
        #animation3{
            animation-name: transition3; visibility: hidden;
        }

        #burger1{
            max-height: 120%; left:4%; position: absolute;
        }

        #pizza1{
            max-height: 120%; left:4%; position: absolute;
        }

        #welcometext{
            text-align: center; font-size: 200%; color: white; font-family: 'Libre Baskerville'; position: absolute; width: 100%; top: 1.5%;
        }


        #sectionselect{position: absolute; width :40%; top :5%; left: 15%; align-content: center; color: white;text-align: center }

        #carticon{
            top :3%; left : 90%; position : fixed; background-color: orange; border-radius: 15px; border: 2px solid #d9640b;
        }
        #profileicon{
            top :3%; left : 3%; position : absolute; z-index: 10
        }

        #profileinfo{
            visibility: hidden;top :3%; left : 2.7%; position : absolute; background-color: #1b1c24; text-align: center; border-radius: 25px; width: 6%; height: 20%; z-index: -10;
        }

        #profiletext{
            width: 100%; top:50%; position: absolute; left: 0%; color: white; font-size: 110%;
        }

        #contact{
            display: none; height: 40%
        }

        #return{
            top :85%; left : 90%; position : fixed; background-color: orange; border-radius: 15px; border: 2px solid #d9640b; display: none
        }
        #dishmenuselect{position: absolute; width :80%; top:1.5%; left: 5%; align-content: center; color: white;text-align: center; table-layout: fixed

        }
        #searchbar{width: 120%;height: 30px; background-color: rgba(35,37,46,0.76); color: white; }

        #searchbutton{
            font-size: 0%; position: absolute; height: 30px; width: 33px; left:88%; top:1.7%; background-image: url('images/search.png'); background-color: #23252e
        }

        .dish{
        background-color: #23252e;color: white ;border-radius: 10px;  width: 260px; height: 400px; top:0%; position: absolute;border-spacing: 30px;
        }
        .dishimage{
            position: absolute; width: 250px; max-height: 250px; background-color:  rgba(35,37,46,0.54);border-radius: 50px; left:5px;top:5px;
        }

        #dishtable{
            position: absolute; width: 90%; left: 5%; top: 0%; align-content: flex-start; height: 3000px; background-color: #1b1c24; scroll-behavior: smooth;
        }
        .dishtitle{
            top:220px; position: absolute; text-align: center; width: 100%;font-family: 'Libre Baskerville'; font-style: unset
        }

        .dishdesc{
            top:230px;word-wrap: break-word; position: absolute; text-align: center; width: 100%;font-family: 'Libre Baskerville'; font-style: unset; font-size: 80%
        }

        .dishbutton{
            background-color: orange; border-radius: 10px; border: 2px solid #d9640b; position: absolute; top:350px; left:15%; width: 50%; height: 30px; color: white; font-size: 120%;
        }

        .dishamount{
            position: absolute; left:65%; width: 20%; height: 25px;top:350px;border-radius: 10px; text-align: center;
        }


        #dishscroll{
            scroll-behavior: smooth;position: absolute; top: 5%; background-color: #23252e; width: 100%; border-radius: 25px;  ;overflow-x: auto; height: 35%; overflow-y: hidden;
        }

        #dealscroll{
            scroll-behavior: smooth;position: absolute; top: 45%; background-color: #23252e; width: 100%; border-radius: 25px;  ;overflow-x: auto; height: 35%; overflow-y: hidden
        }

        #dealstext1{
            text-align: left; font-size: 150%; color: white; font-family: 'Libre Baskerville'; position: absolute; left:5%;width: 100%; top: 1.2%;
        }

        #dealstext2{
            text-align: left; font-size: 150%; color: white; font-family: 'Libre Baskerville'; position: absolute; left:5%;width: 100%; top: 41.2%;
        }

        #sales{
            display: none;
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




        @media(max-aspect-ratio: 16/9){



            .section1image{
                animation-name: null;
            }
            section{
                width: 95%;
                left: 2.5%;

                height: 90%;
            }

            #animation1{
                animation-name: unset;
                visibility: visible;
                top: 55%;
                width: 80%;
                left: 10%;
            }
            #animation2{
                animation-name: unset;
                visibility: visible;
                top: 15%;
                width: 80%;
                left: 10%;
            }
            #animation3{
                animation-name: unset;
            }
            #qr{
                display: none;
            }
            #burger1{
                max-height: 200%; width: 90%; position: absolute;
            }
            #pizza1{
                max-height: 200%; width: 90%; position: absolute;
            }

            #welcometext{
                font-size: 100%;

            }

            #najahtext{
                display: none;
            }
            #sectionselect{
                width: 60%;
                left: 20%;
                font-size:80% ;
            }

            #carticon{
                left: 82%;
                width: 60px;
                height: 60px;
            }
            #profileicon{
                left: 2%;
                width: 80px;
                height: 80px;
                z-index: 20;
            }
            #profileinfo{
                z-index: 10;
                top :3%; left : 2%; position : absolute; background-color: #292a33; text-align: center; border-radius: 25px; width: 80px; height: 20%;
            }
            #profiletext{
                top:50%;
                font-size: 80%;

            }
            #contact{
                display: none; height: 80%
            }
            #return{
                top :90%; left : 82%; position : fixed; background-color: orange; border-radius: 15px; border: 2px solid #d9640b; display: none;  width: 45px;
                height: 55px;
            }
            #dishmenuselect{

                position: absolute; width :80%; top:1.5%; left: 2.5%; align-content: center; color: white;text-align: center; table-layout: fixed; font-size: 60%;

            }
            #searchbar{width: 140%;height: 30px; background-color: rgba(35,37,46,0.76); color: white;}
            #searchbutton{
                  top:1.9%;
            }
            .dish{
               border-radius: 10px;  width: 100px; height: 250px; top:0%;border-spacing: 30px;
            }
            .dishimage{
                 width: 100px; max-height: 100px; border-radius: 50px; left:1px;top:5px;
            }


            #dishtable{
                 width: 110%; left: 1%; top: 0%; height: 3000px;
            }

            .dishtitle{
                top:85px; position: absolute; text-align: center; width: 100%;font-family: 'Libre Baskerville'; font-style: unset; font-size: 80%;
            }

            .dishdesc{
                top:95px;word-wrap: break-word; position: absolute; text-align: center; width: 100%;font-family: 'Libre Baskerville'; font-style: unset; font-size: 60%
            }

            .dishbutton{
                 border-radius: 10px; top:210px; left:10%; width: 50%; height: 30px; font-size: 80%;
            }

            .dishamount{
                position: absolute; left:60%; width: 30%; height: 25px;top:210px;border-radius: 10px; text-align: center;
            }
            #dishscroll{
                top: 5%;  width: 95%;left: 2.5%; border-radius: 25px; height: 45%;
            }
            #dealscroll{
                top: 55%;  width: 95%;left: 2.5%; border-radius: 25px; height: 45%;
            }

            span.salesspan{
                position: absolute;
                width: 90%;
                height: 90%;
                top:5%;
                border-radius: 25px;
                background-color: #1b1c24;
            }

            .salesimg{
                max-height: 100%; max-width: 60%; top: 20%; left: 1%; position: absolute;
            }

            #sales{height: 120%}

            #dealstext1{
                text-align: left; font-size: 120%; color: white; font-family: 'Libre Baskerville'; position: absolute; left:5%;width: 100%; top: 0.2%;
            }

            #dealstext2{
                text-align: left; font-size: 120%; color: white; font-family: 'Libre Baskerville'; position: absolute; left:5%;width: 100%; top: 49.4%;
            }
            .dealdesc{
                font-size: 70%;
            }
            .dealbutton{
                font-size: 70%;

            }
            #hidetale{
                display: none;
            }

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
        .cartBtns:hover{
            cursor: pointer;
        }
    </style>

    <script >




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

            document.getElementById("contact").style.display="none";

            document.getElementById("homebt").style.color="white";
            document.getElementById("menubt").style.color="white";
            document.getElementById("salesbt").style.color="white";

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
                    if( "block" == document.getElementById("contact").style.display)
                    document.getElementById("contactbt").style.color="orange";
                    break;

                default:
                    document.getElementById("homebt").style.color="orange";
            }

        }

        function alt_price(num)
        {

            let amount= (document.getElementById(num+'amount').value)*(document.getElementById(num+'price').name);

            document.getElementById(num+'price').textContent= amount + ' $';
        }

        function changedishes(type)
        {

            document.getElementById('typeresult').setAttribute("value", type);

            document.getElementById('dishform').submit();
        }

        function showprofileinfo(){
            document.getElementById('profileinfo').style.visibility='visible';
        }
        function hideprofileinfo(){
            document.getElementById('profileinfo').style.visibility='hidden';
        }

        function hoverdish(id)
        {

            alert('sdsd');
            document.getElementById(id).style.height='4200px';
            document.getElementById(id).style.width='2800px';

        }

        function unhoverdish(id)
        {

            document.getElementById(id).style.height='4000px';
            document.getElementById(id).style.width='2600px';

        }

        function s1(){
                document.getElementById('dishscroll').scrollTo(600, 0);
                document.getElementById('dealscroll').scrollTo(600, 0);
            }
        function s2(){
                document.getElementById('dishscroll').scrollTo(1200, 0);
                document.getElementById('dealscroll').scrollTo(1200, 0);
            }
        function s3(){
                document.getElementById('dishscroll').scrollTo(0, 0);
                document.getElementById('dealscroll').scrollTo(0, 0);
            }

        let breakfun=false;
        function sidescroll(){

                    if(breakfun)
                        return;
                    window.setInterval(s1, 5000);

                    if(breakfun)
                        return;
                    window.setInterval(s2, 10000);

                    if(breakfun)
                        return;
                    window.setInterval(s3, 15000);

                     if(breakfun)
                        return;

        }

        const myTimeout = setTimeout(sidescroll, 15000)
        function myStopFunction() {
            clearTimeout(myTimeout);
        }

        function opencart()
        {
            window. open ("shopping%20cart.php", "1");
        }

        function sendtocart( dishname, num)
        {

            let amount= document.getElementById(num+'amount').value;
            if(amount==0)
            {
                amount=1;
            }

            document.cookie= dishname +'='+amount;
            let str= amount + ' orders of '+dishname+' added to cart';
            alert(str);

        }
            function buttonhover(id){
                document.getElementById(id).style.backgroundColor='#fbb114';
            }

            function buttonunhover(id){
                document.getElementById(id).style.backgroundColor='orange';
            }

            function senddealtocart( dealname)
            {
                document.cookie= dealname +'='+'1';
                let str= '1' + ' orders of '+dealname+' added to cart';
                alert(str);
            }

            let mobileexists=false;

            function checkmobile() {
                const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
                if (isMobile) {


                    mobileexists=true;

                }
                else {
                    mobileexists=false;

                }
            }




    </script>


</head>

<body onscroll="show_return()" onbeforeunload="close()" onload="checkmobile();">




<div id="start_of_page" style="position: absolute; top:0%"></div>

<table id="sectionselect" >
    <tr>
        <td class="textstyle" id="homebt" onclick="choose_section(1)" onmouseleave="unhover(1) " style="color: orange"> <a > home </a> </td>
        <td class="textstyle" id="menubt" onclick="choose_section(2)" onmouseleave="unhover(2)"> <a>menu</a></td>
        <td class="textstyle" id="salesbt" onclick="choose_section(3)" onmouseleave="unhover(3)"> <a>deals</a></td>
        <td class="textstyle" id="contactbt" onclick="choose_section(4)" onmouseleave="unhover(4)"> <a>contact</a></td>


    </tr>
</table>

<table style ="position: absolute; width :30%; top :4%; left: 55%; align-content: center; color: white;text-align: center ">
    <tr>
        <td id="najahtext" style="  font-size: 250%;  background: rgba(27, 28, 36, 0.4); font-family: 'Libre Baskerville'; "> <b>Najah restaurant</b> </td>


    </tr>
</table>


<section id ="home">

    <h1 id="welcometext"> welcome to Najah restaurant! <br> check out our <a onclick="choose_section(3)">special deals</a> and order from home</h1>

    <div id ="animation1" class="section1image" >

     <img src="images/burgersale.png" id="burger1" >
    </div>
    <div id ="animation2" class="section1image" >
        <img src="images/kindpng_3844221.png" id="pizza1">

    </div>
    <div id ="animation3" class="section1image" >
        <img src="images/pizza.png" style="  max-height: 120%; left:10%;  position: absolute;">
    </div>

    <div id="qr" style="position: absolute; left: 20%; top: 62%; height: 40%; width:60%; text-align: center">
    <img src="images/qrcode.png" style=" max-height: 120%">
        <h1 style="; left: 65%;  top:10%; font-size:200%; color: white;font-family: 'Libre Baskerville'; "> Visit our <br> mobile site!</h1>


    </div>


</section>


<section style="display: none; height: 140%" id="menu">
    <form method="post" action="main%20page.php" id="dishform">
    <table  id="dishmenuselect">
        <tr>
            <td  class="textstyle" id="alldish" style="color: orange;background-color: #23252e; border-top-left-radius: 10px;border-bottom-left-radius: 10px" onclick="changedishes('all')" > <a > all </a></td>
            <td class="textstyle" id="maindish"  style=" background-color: #23252e" onclick="changedishes('main')"> <a > main dishes </a> </td>
            <td class="textstyle" id="sides" style="background-color: #23252e"  onclick="changedishes('side')"> <a > sides </a></td>
            <td class="textstyle" id="drinks" style="background-color: #23252e" onclick="changedishes('drink')" > <a > drinks </a></td>
            <td> <input type="search" id="searchbar" name="searchresult" placeholder="find your favourite dish!" > </td>
            <input type="submit" value="a" name="searched" id="searchbutton" >
            <input type="hidden" name="typeresult" value="all" id="typeresult">

        </tr>
    </table>
    </form>

    <div style=" position:absolute; width: 100% ;overflow-y: auto; height: 90%; top:7%; ">

    <?php


    error_reporting(E_ERROR | E_PARSE);
    class dish{
        public $name;
        public $type;
        public $price;
        public $image;
        public $description;
        function __construct($name, $type, $price, $image, $description){
            $this->name= $name;
            $this->type= $type ;
            $this->price =  $price;
            $this->image =  $image ;
            $this->description = $description;
        }


    }
    $pizza = new dish('pizza','main',20.0,'images/dishpizza.png','brief desc thingy thing brief desc thingy thing brief desc thingy thing brief desc thingy thing');
    $burger = new dish('burger','main',30.0,'images/dishburger.png','brief desc thingy thing brief desc thingy thing brief desc thingy thing brief desc thingy thing');
    $salad = new dish('salad','side',20.0,'images/dishsalad.png','brief desc thingy thing brief desc thingy thing brief desc thingy thing brief desc thingy thing') ;
    $cola = new dish('cola','drink',2.0,'images/cola.png','brief desc thingy thing brief desc thingy thing brief desc thingy thing brief desc thingy thing') ;
    $chicken = new dish('chicken','main',40.0,'images/dishchicken.png','brief desc thingy thing brief desc thingy thing brief desc thingy thing brief desc thingy thing') ;


    $dishes = array( $salad,$chicken,$pizza, $salad,$pizza, $burger,$cola,$pizza, $burger, $salad,$cola,$pizza,$pizza, $salad,$pizza, $burger,$cola, $salad,$pizza, $burger, $salad,$cola,$pizza, $burger, $salad,$pizza, $burger, $salad,$pizza, $burger, $salad,$pizza, $burger,$pizza);


    $font ='Libre Baskerville';
    $id1 ='id';
    $id2='id';
    $color ='"'.'#fbb114'.'"';
    $color2='"'.'orange'.'"';


    echo "<table id='dishtable' >";
    $num =0;


     $chosentype= $_POST['typeresult'];
     $chosensearch = $_POST['searchresult'];
    if (empty($chosentype))
    {
        $chosentype='all';
    }


    foreach ($dishes as $x) {

        $id1=$num.'price';
        $id2=$num.'amount';
        $id3=$num.'disharea';
        $name= '"'.$x->name.'"';


        if(empty($chosensearch)){
        if($x->type==$chosentype || $chosentype=='all') {
            if ((($num % 4) == 0) && (!$num == 0)) {
                echo "<tr> ";
            }




            echo "<td  style='; position: relative '> 
            <div   class='dish'>

            <img  src='$x->image' class='dishimage' alt='image unavailable'>

           <h4 class='dishtitle'> $x->name </h4>
            <p class='dishdesc'>  <br> <br> $x->description</p>
          <button class='dishbutton' title='add to cart' class='cartBtns' name=$x->price id= $id1 onmouseover='  document.getElementById(id).style.backgroundColor= $color;' onmouseleave='document.getElementById(id).style.backgroundColor= $color2;' onclick='sendtocart($name, $num)'><b> $x->price  </b>$</button>
          <input class='dishamount' name=$name type='number' oninput='alt_price($num)' step='1' id= $id2 min='1' placeholder='1' > 
       
            </div>
         </td>";



            if ((($num + 1 % 4) == 0) && (!$num == 0)) {
                echo "</tr>";
            }

        $num++;
            }
        }
        else{
            if(str_contains ( $x->name,$chosensearch)) {
                if ((($num % 4) == 0) && (!$num == 0)) {
                    echo "<tr> ";
                }




                echo "<td  style='; position: relative '> 
            <div   class='dish'>

            <img  src='$x->image' class='dishimage' alt='image unavailable'>

           <h4 class='dishtitle'> $x->name </h4>
            <p class='dishdesc'>  <br> <br> $x->description</p>
          <button class='dishbutton' title='add to cart' class='cartBtns' name=$x->price id= $id1 onmouseover='  document.getElementById(id).style.backgroundColor= $color;' onmouseleave='document.getElementById(id).style.backgroundColor= $color2;' onclick='sendtocart($name, $num)'><b> $x->price  </b>$</button>
          <input class='dishamount' name=$name type='number' oninput='alt_price($num)' step='1' id= $id2 min='1' placeholder='1' > 
       
            </div>
         </td>";



                if ((($num + 1 % 4) == 0) && (!$num == 0)) {
                    echo "</tr>";
                }

                $num++;
            }

        }
    }


    echo "</table>";

    if($num<=25)
    {
        echo" <script>
              document.getElementById('dishtable').style.height='2500px';
               checkmobile();
              if(mobileexists){
              document.getElementById('dishtable').style.height='1600px';
              }
              </script>
            ";
    }
    if($num<=20)
    {
        echo" <script>
              document.getElementById('dishtable').style.height='2200px';
              checkmobile();
              if(mobileexists){
              document.getElementById('dishtable').style.height='1350px';
              }
              </script>
            ";
    }
    if($num<=16)
    {
        echo" <script>
              document.getElementById('dishtable').style.height='1800px';
              checkmobile();
              if(mobileexists){
              document.getElementById('dishtable').style.height='1100px';
              }
              </script>
            ";
    }

    if($num<=12)
    {
        echo" <script>
              document.getElementById('dishtable').style.height='1300px';
              if(mobileexists){
              document.getElementById('dishtable').style.height='800px';
              }
              </script>
            ";
    }

    if($num<=8)
    {
        echo" <script>
              document.getElementById('dishtable').style.height='900px';
              if(mobileexists){
              document.getElementById('dishtable').style.height='550px';
              }
             
              </script>
            ";
    }
    if($num>=31)
    {
        echo" <script>
              document.getElementById('dishtable').style.height='3800px';
               checkmobile();
              if(mobileexists){
              document.getElementById('dishtable').style.height='2400px';
              }
              </script>
            ";
    }



    ?>
    </div>


</section>

<section  id="sales">

    <p id="dealstext1"> limited time deals: </p>

    <div  id='dishscroll' onmouseover="breakfun=true;" onmouseleave="breakfun=false;" >


        <?php
        class deal{

            public $name;
            public $type;
            public $price;
            public $image;
            public $description;
            function __construct($name, $type, $price, $image, $description){
                $this->name= $name;
                $this->type= $type ;
                $this->price =  $price;
                $this->image =  $image ;
                $this->description = $description;
            }
        }

        $burgersale = new deal('burgersale','limited', 82, 'images/burgersale.png','save 50% 4 burgers 2 cola 1 fries 1 salad');
        $pizzasale = new deal('pizzasale','limited', 38.5, 'images/pizza.png','save 40% 1 large-pizza 2cola 1 fries');
        $chickensale = new deal('chickensale','limited', 108, 'images/kindpng_3844221.png','save 30% 3 chicken-meals 2 cola 2 fries 1 salad');

        $deals= array($burgersale,$pizzasale,$chickensale);

        $count=0;
        $num=2.5;
        $nnum=2.5;
        $btid='';

        foreach ($deals as $x)
        {
            $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
            if($isMob){
                $left=$nnum.'%';
            }else{
                $left=$num.'%';
            }

            $desc= explode(" ",$x->description);
            $desc[0]=$desc[0].' ';

            $btid= $count.'salesbt';

            $name= '"'.$x->name.'"';


            echo "
            <span class='salesspan' style=' left: $left'>
            <img class='salesimg' src=$x->image >
            <div class='salesdesc'>
               ";
            $strcount=0;

            echo "<span class='dealdesc'>";

                while ($strcount <count($desc))
                {
                    if($strcount==0)
                    {
                        if(!$isMob) {
                            echo "<br>";
                        }

                            echo "<br>  <b style='color: orange; font-size: 200%'>";

                    }

                    if(($strcount>1)&& ($strcount%2==0))
                    {
                        echo "<b>";

                    }


                    echo $desc[$strcount];

                    if(($strcount>1)&& ($strcount%2==0))
                    {
                        echo "</b>";

                    }
                    if($strcount==1)
                    {
                        echo "</b>";
                        if ($isMob) {
                            echo "<br>";
                        }
                    }

                    if((($strcount+1)%2)==0)
                    { if(!$isMob)
                       {
                        echo "<br>";
                       }
                        echo " <br>";
                    }
                    $strcount+=1;

                }
             echo "</span>
              <button onmouseover='  document.getElementById(id).style.backgroundColor= $color;' onmouseleave='document.getElementById(id).style.backgroundColor= $color2;' title='add to cart'  id=$btid style=' background-color: orange; border-radius: 20px; border: 2px solid #d9640b; position: absolute; top:80%; left:10%; width: 80%; height: 10%; color: white; font-size: 120%;' onclick='senddealtocart($name)'><b class='dealbutton'> $x->price  </b> <b class='dealbutton'  style='font-style: unset'>$</b></button>
            </div>
         </span>";
            $num+=62.5;
            $nnum+=96;
            $count++;

        }


        ?>





        <div style="position: absolute; left: 187.5%; width: 2.5%; height: 100%"> </div>
    </div>
    <p id="dealstext2"> deals: </p>
    <div  id='dealscroll' onmouseover="breakfun=true;" onmouseleave="breakfun=false;" >

    <?php





    $burgersale1 = new deal('burgersale1','unlimited', 82, 'images/burgersale.png','save 50% 4 burgers 2 cola 1 fries 1 salad');
    $pizzasale1 = new deal('pizzasale1','unlimited', 38.5, 'images/pizza.png','save 40% 1 large-pizza 2cola 1 fries');
    $chickensale1 = new deal('chickensale1','unlimited', 108, 'images/kindpng_3844221.png','save 30% 3 chicken-meals 2 cola 2 fries 1 salad');

    $deals= array($burgersale1,$pizzasale1,$chickensale1);

    $count=0;
    $num=2.5;
    $nnum=2.5;
    $btid='';

    foreach ($deals as $x)
    {
        $desc= explode(" ",$x->description);
        $desc[0]=$desc[0].' ';

        $btid= $count.'salesbt2';

        $name= '"'.$x->name.'"';

        $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
        if($isMob){
            $left=$nnum.'%';
        }else{
            $left=$num.'%';
        }


        echo "
            <span class='salesspan' style=' left: $left'>
            <img class='salesimg' src=$x->image >
            <div class='salesdesc'>
               ";
        $strcount=0;

        echo "<span class='dealdesc'>";
        while ($strcount <count($desc))
        {
            if($strcount==0)
            {
                if(!$isMob) {
                    echo "<br>";
                }

                echo "<br>  <b style='color: orange; font-size: 200%'>";

            }

            if(($strcount>1)&& ($strcount%2==0))
            {
                echo "<b>";

            }


            echo $desc[$strcount];

            if(($strcount>1)&& ($strcount%2==0))
            {
                echo "</b>";

            }
            if($strcount==1)
            {
                echo "</b>";
                if ($isMob) {
                    echo "<br>";
                }
            }

            if((($strcount+1)%2)==0)
            { if(!$isMob)
            {
                echo "<br>";
            }
                echo " <br>";
            }
            $strcount+=1;

        }
        echo " </span>
              <button onmouseover='  document.getElementById(id).style.backgroundColor= $color;' onmouseleave='document.getElementById(id).style.backgroundColor= $color2;' title='add to cart'  id=$btid style=' background-color: orange; border-radius: 20px; border: 2px solid #d9640b; position: absolute; top:80%; left:10%; width: 80%; height: 10%; color: white; font-size: 120%;' onclick='senddealtocart($name);'><b class='dealbutton'> $x->price  </b> <b class='dealbutton'  style='font-style: unset'>$</b></button>
            </div>
         </span>";
        $num+=62.5;
        $nnum+=96;
        $count++;

    }


    ?>
    </div>

<div id="hidetale" style="background-image: url('images/foodbg.jpg'); background-attachment: fixed; position: absolute; top: 85%; height: 15%; width: 100%">
</section>

<section  id="contact" >
<p style="color: white; font-size: 140%; left: 5%;top:5%; position: absolute">
    this is a project made for the web development course at najah university.<br> <br>
    you can contact us at <a href= "mailto: NajahRestproj@gmail.com">NajahRestproj@gmail.com</a> for any customer feedback, <br> <br>
    or you can directly contact the developers of the site at <br> <br> <a href= "mailto: s12112188@stu.najah.edu">s12112188@stu.najah.edu.</a> <br> <a href= "mailto: s12111991@stu.najah.edu">s12111991@stu.najah.edu</a>. <br> <br>
    all feedback is appreciated and we hope the site proves useful for you!

</p>
</section>



<IMG onclick="opencart()" SRC="images/shopping_cart.png" WIDTH="width" HEIGHT="height"  title="shopping cart" id="carticon">

<IMG SRC="images/profilepic.png" onmouseover="showprofileinfo()" WIDTH="width" HEIGHT="height" ALT="Image Text" id="profileicon" >
<div  onmouseleave="hideprofileinfo()"  onmouseover="showprofileinfo()"  id="profileinfo">
    <span id="profiletext"> user name</span>
    <a href="index.html" style="width: 100%; top:75%; position: absolute; left: 0%; color: white"> log out</a>
</div>

<a href ="#start_of_page"><IMG  id="return"   SRC="images/arrow.png" WIDTH="width" HEIGHT="height"  title="return" > </a>

<?php

$check= $_POST['typeresult'];
$check2 = $_POST['searched'];
$check3 = $_POST['searchresult'];

if(!empty($check)|| !empty($check2))
{
    echo "
    <script> choose_section(2);</script>;
    ";
    if($check=='all')
    {
       echo" <script> 
            document.getElementById('alldish').style.color='orange'
            document.getElementById('maindish').style.color='white'
            document.getElementById('sides').style.color='white'
            document.getElementById('drinks').style.color='white'
            </script>;";
    }
    else if($check=='main')
    {
        echo" <script> 
            document.getElementById('alldish').style.color='white'
            document.getElementById('maindish').style.color='orange'
            document.getElementById('sides').style.color='white'
            document.getElementById('drinks').style.color='white'
            </script>;";

    }
    else if($check=='side')
    {
        echo" <script> 
            document.getElementById('alldish').style.color='white'
            document.getElementById('maindish').style.color='white'
            document.getElementById('sides').style.color='orange'
            document.getElementById('drinks').style.color='white'
            </script>;";

    }
    else if($check=='drink')
    {
        echo" <script> 
            document.getElementById('alldish').style.color='white'
            document.getElementById('maindish').style.color='white'
            document.getElementById('sides').style.color='white'
            document.getElementById('drinks').style.color='orange'
            </script>;";

    }
    if($check3 != ""){
        echo" <script> 
            document.getElementById('alldish').style.color='white'
            document.getElementById('maindish').style.color='white'
            document.getElementById('sides').style.color='white'
            document.getElementById('drinks').style.color='white'
            </script>;";

    }
}

?>



</body>
</html>