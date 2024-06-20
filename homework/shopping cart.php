<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>shopping cart</title>
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <style>
        body{
            background-image: url("images/foodbg.jpg");
            background-color: #1b1c24 ;
            background-attachment: fixed;
        }
        section{
            z-index: -1;
            position: absolute;
            background-color: #181920;
            height: 90%;
            width: 70%;
            left:15%;
            top: 5%;
            border-radius: 25px;
        }

        div.inputname{
            color:white;
            position: absolute;
            font-size: larger;
            left:13%;
            width: 74%;
            height:30px
        }
    </style>
</head>
<body>

<section>
    <div style="font-size: 180%; position:absolute; top:3%; left: 5%; color: white" >Ordered dishes:</div>

    <div style="position: absolute; top: 7.5%; left: 5%; background-color: #23252e; width: 55%; height: 40%; overflow-y: auto; border-radius: 25px">
        <?php

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

        $dishes = array( $chicken,$pizza, $salad, $burger);

        echo "<table style='width: 100%; position: absolute; height: 200%; align-content: flex-start; border-spacing: 30px;'> </table> 
                <tr style='max-height: 10px;'  > <span style='color: #23252e; '> filling space </span> </tr>";
        if(empty($dishes))
        {
           echo" <div style='font-size: 150%; position:absolute; top:5%; left: 5%; color: white' >no dishes ordered.</div>";
        }
        else {
            foreach ($dishes as $x) {

                echo "<tr style='padding: 10px;' >
             <div style='height: 100px;background-color: #1b1c24; width: 98%; position: relative; left: 1%; border-radius: 15px; top:0%; color: white;'>
             <img src=$x->image height='100px' width='100px' style='left: 20px; position: absolute'>
             <span style='position: absolute; top: 40%; width 200px%; left: 150px; font-size: 130%;  '> $x->name</span>
             <input type='text' style='position: absolute; width: 35%; left: 230px; top:31px; ;height: 32px; border-radius: 10px; ' placeholder='comment any request/change' >
            
              <button title='price' name=$x->price style=' background-color: orange; border-radius: 10px; border: 2px solid #d9640b; position: absolute; top:30px; left:70%; width: 150px; height: 40px; color: white; font-size: 120%;'><b> $x->price  </b>$</button>
              <input type='number' step='1'  min='1' placeholder='1' style='position: absolute; width: 30px; height: 33px;Top:30px; left:92%;border-radius: 5px; text-align: center' >
            </div>
            
            <tr style='max-height: 10px;'  > <span style='color: #23252e; '> filling space </span> </tr>
            </tr>
            ";
            }
        }


        ?>

    </div>

    <div style="font-size: 180%; position:absolute; top:50.5%; left: 5%; color: white" >Ordered deals:</div>



    <div style="position: absolute; top: 55%; left: 5%; background-color: #23252e; width: 55%; height: 40%; overflow-y: auto; border-radius: 25px">

        <div style='font-size: 150%; position:absolute; top:5%; left: 5%; color: white' >no deals ordered.</div>

    </div>



    <div style="position: absolute; top: 7.5%; left: 62.5%; background-color: #23252e; width: 35%; height: 87.5%; border-radius: 25px">
        <div style="font-size: 180%; position:absolute; top:5%; left: 5%; color: white" >Payment:</div>

        <div class="inputname" style ="top:20%" >
            Card holder name:<span> &nbsp &nbsp</span><input id="card_holder_name"   placeholder=" john doe" style="width: 90%; height: 70%" >
        </div>
        <div class="inputname" style ="top:30%" >
            Credit card number:<span>  &nbsp</span><input id="creditnumber"  placeholder="  1234 1234 1234 1234" style="width:90%; height: 70%" >
        </div>
        <div class="inputname" style ="top:40%" >
            <span style=" position: absolute; width:50%"> Expiration date:</span>
            <input id="exp_date"   placeholder="  MM/YY" style="width: 45%; height: 70%; left: 45%; position: absolute" >
        </div>
        <div class="inputname" style ="top:45%" >
            <span style=" position: absolute; width:50%; left: 25%"> CVV:</span>
            <input id="cvv"   placeholder="  123/YY" style="width: 45%; height: 70%; left: 45%; position: absolute" >
        </div>

        <button title='price' style=' background-color: orange; border-radius: 20px; border: 2px solid #d9640b; position: absolute; top:70%; left:15%; width: 70%; height: 25%; color: white; font-size: 120%;'> <b>Confirm order<b> </b></button>

        <div style="font-size: 150%; position:absolute; top:60%; left: 0%; color: white; width: 100%; text-align: center" >Total price: 100 $ </div>




    </div>



</section>


</body>
</html>