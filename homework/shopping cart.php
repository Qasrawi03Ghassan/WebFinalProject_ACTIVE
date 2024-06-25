<?php
    $db_server = "localhost";
    $db_name = "webfinalproject_db";
    $db_username = "root";
    $db_password = "";
    $conn = "";
    try{
        $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
    }catch (Exception $e){
        echo"<script>alert('Connection to database failed!');</script>";
    }
?>
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
        #disharea{
            position: absolute; top: 7.5%; left: 5%; background-color: #23252e; width: 55%; height: 40%; overflow-y: auto; border-radius: 25px
        }
        #dealarea{
            position: absolute; top: 55%; left: 5%; background-color: #23252e; width: 55%; height: 40%; overflow-y: auto; border-radius: 25px
        }
        #orderdish{
            font-size: 180%; position:absolute; top:3%; left: 5%; color: white;
        }
        #orderdeals{
            font-size: 180%; position:absolute; top:50.5%; left: 5%; color: white;
        }
        #paymenttab{
            position: absolute; top: 7.5%; left: 62.5%; background-color: #23252e; width: 35%; height: 87.5%; border-radius: 25px
        }
        @media(max-aspect-ratio: 16/9){
            section{
                width: 95%;
                left: 2.5%;
                height: 95%;
            }
            #disharea{
                width: 90%; z-index: 10; height: 25%; top:5%;
            }
            #dealarea{
                width: 90%; z-index: 10; height: 25%; top:35.5%;
            }
            #orderdish{
                font-size: 180%; position:absolute; top:1.5%; left: 5%; color: white;
            }
            #orderdeals{
                font-size: 180%; position:absolute; top:31.5%; left: 5%; color: white;
            }
            #paymenttab{
                position: absolute; top: 62.5%; left: 5%; background-color: #23252e; width: 90%; height: 35%; border-radius: 25px
            }
        }




    </style>
    <script>

        let dishcounter =0;
        let dealcounter =0;
        let Fprice=0;
        let checkit=false;
        let notfound=false;
        let notfound1=false;

        function finalprice()
        {

            let price =0;
            for(let x=0;x<dishcounter;x++)
            {

                if(typeof  document.getElementById(x+'price') !== 'undefined')
                {

                    price=price + Number(document.getElementById(x+'p').name);
                }

            }
            for(let x=0;x<dealcounter;x++)
            {

                if(typeof  document.getElementById(x+'priced') !== 'undefined')
                {

                    price=price + Number(document.getElementById(x+'pd').name);
                }

            }
            Fprice=price;
            document.getElementById('totalprice').innerText="Total price: "+Fprice+" $"


        }

        function alt_price(num)
        {



            let amount= (document.getElementById(num+'amount').value)*(document.getElementById(num+'price').name);

            if(amount=='0')
            {

                 amount= (document.getElementById(num+'amount').placeholder)*(document.getElementById(num+'price').name);
            }

            document.getElementById(num+'price').textContent= amount + ' $';
            document.getElementById(num+'p').name=amount;
            if(checkit)
                finalprice();
        }

        function alt_price2(num)
        {



            let amount= (document.getElementById(num+'amountd').value)*(document.getElementById(num+'priced').name);

            if(amount=='0')
            {

                amount= (document.getElementById(num+'amountd').placeholder)*(document.getElementById(num+'priced').name);
            }

            document.getElementById(num+'priced').textContent= amount + ' $';
            document.getElementById(num+'pd').name=amount;
            if(checkit)
                finalprice();
        }

        function deletedish(name)
        {
            document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            document.getElementById('postform').submit();

        }

        function buttonhover(id){
            document.getElementById(id).style.backgroundColor='#fbb114';
        }

        function buttonunhover(id){
            document.getElementById(id).style.backgroundColor='orange';
        }

        function confirmpayment()
        {
            document.cookie.split(';').forEach(cookie => {
                const eqPos = cookie.indexOf('=');
                const name = eqPos > -1 ? cookie.substring(0, eqPos) : cookie;
                document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:00 GMT';
            });
            if(notfound && notfound1)
            {
                alert('your order is empty!');
            }
            else {
                alert('your order has been sent!');
            }
            document.getElementById('postform').submit();

        }

      function changeamount(dishname,id)
        {


            amount=document.getElementById(id).value;

            document.cookie= dishname +'='+amount;
        }



    </script>
</head>
<body>



<section>
    <form id="postform" method="post"></form>
    <div id="orderdish" >Ordered dishes:</div>

    <div id="disharea">
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

        //Get dishes from database:
        $dishes = array();

        $qry = "SELECT * FROM dishes";
        $result = mysqli_query($conn,$qry);
        foreach ($result as $row){
            $name = $row['Name'];
            $type = $row['Type'];
            $price= $row['Price'];
            $URL = $row['Image url'];
            $desc = $row['Description'];

            $dishes[] = new dish($name,$type,$price,$URL,$desc);
        }

        $pizza = new dish('pizza','main',20.0,'images/dishpizza.png','brief desc thingy thing brief desc thingy thing brief desc thingy thing brief desc thingy thing');
        $burger = new dish('burger','main',30.0,'images/dishburger.png','brief desc thingy thing brief desc thingy thing brief desc thingy thing brief desc thingy thing');
        $salad = new dish('salad','side',20.0,'images/dishsalad.png','brief desc thingy thing brief desc thingy thing brief desc thingy thing brief desc thingy thing') ;
        $cola = new dish('cola','drink',2.0,'images/cola.png','brief desc thingy thing brief desc thingy thing brief desc thingy thing brief desc thingy thing') ;
        $chicken = new dish('chicken','main',40.0,'images/dishchicken.png','brief desc thingy thing brief desc thingy thing brief desc thingy thing brief desc thingy thing') ;


        //$dishes = array( $chicken,$pizza, $salad, $burger, $cola);



        $dishesfound=false;
        $id1 ='id';
        $id2='id';
        $num=0;
        $color ='"'.'#fbb114'.'"';
        $color2='"'.'orange'.'"';



        echo "<table id='dishtable' style='width: 100%; position: absolute; height: 200%; align-content: flex-start; border-spacing: 30px;'> </table> 
                <tr style='max-height: 10px;'  > <span style='color: #23252e; '> filling space </span> </tr>";
        if(empty($dishes))
        {
           echo" <div style='font-size: 150%; position:absolute; top:5%; left: 5%; color: white' >no dishes ordered.</div>";
        }
        else {
            foreach ($dishes as $x) {


                if (isset($_COOKIE[$x->name])) {

                    $dishesfound=true;
                  echo "<script>notfound=false;</script>";

                    $name= $x->name;
                    $name2= '"'.$x->name.'"';

                    $amount=$_COOKIE[$name];

                    $id1 = $num . 'price';
                    $id11 = $num . 'p';
                    $id2 = $num . 'amount';

                    echo "<tr style='padding: 10px;' >
             <div style='height: 100px;background-color: #1b1c24; width: 98%; position: relative; left: 1%; border-radius: 15px; top:0%; color: white;'>
             <img src=$x->image height='100px' width='100px' style='left: 20px; position: absolute'>
             <span style='position: absolute; top: 40%; width 200px%; left: 150px; font-size: 130%;  '> $x->name</span>
             <input type='text' style='position: absolute; width: 35%; left: 230px; top:31px; ;height: 32px; border-radius: 10px; ' placeholder='comment any request/change' >
            
              <button onmouseover='  document.getElementById(id).style.backgroundColor= $color;' onmouseleave='document.getElementById(id).style.backgroundColor= $color2;'  id=$id1 title='price' name=$x->price style=' background-color: orange; border-radius: 10px; border: 2px solid #d9640b; position: absolute; top:30px; left:70%; width: 120px; height: 40px; color: white; font-size: 120%;'><b> $x->price  </b>$</button>
              <input id=$id2 oninput='alt_price($num);changeamount($name2 , id)' type='number' step='1'  min='1' placeholder= $amount style='position: absolute; width: 30px; height: 33px;Top:30px; left:87%;border-radius: 5px; text-align: center' >
              <button id=$id1 title='cancel order' name=$x->price style=' border-radius: 100%; text-align: center;position: absolute; top:30px; left:94%; width: 40px; background-color: #1b1c24;height: 40px; color: orange; font-size: 120%;' onclick='deletedish($name2);'><b> X </b></button>
            </div>
            <button id=$id11 name='3' style='visibility: hidden'> </button>
            <script> alt_price($num);</script>
            
            
            
            <tr style='max-height: 10px;'  > <span style='color: #23252e; '> filling space </span> </tr>
            </tr>
            ";
                    $num++;

                    echo "<script> dishcounter++;</script>";
                }
            }
            if(!$dishesfound)
            {
                echo" <div style='font-size: 150%; position:absolute; top:5%; left: 5%; color: white' >no dishes ordered.</div>";
                echo "<script> notfound=true;</script>";
            }

            if($num<=2)
            {
                echo" <script>
              document.getElementById('dishtable').style.height='20%';
              </script>
            ";
            }
            if($num<=3)
            {
                echo" <script>
              document.getElementById('dishtable').style.height='25%';
              </script>
            ";
            }
            if($num<=4)
            {
                echo" <script>
              document.getElementById('dishtable').style.height='30%';
              </script>
            ";
            }
            if($num<=5)
            {
                echo" <script>
              document.getElementById('dishtable').style.height='35%';
              </script>
            ";
            }
            if($num<=6)
            {
                echo" <script>
              document.getElementById('dishtable').style.height='40%';
              </script>
            ";
            }

            if($num >6)
            {
                echo" <script>
              document.getElementById('dishtable').style.height='60%';
              </script>
            ";
            }

        }


        ?>

    </div>

    <div id="orderdeals" >Ordered deals:</div>



    <div id="dealarea">

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

        $burgersale1 = new deal('burgersale1','unlimited', 82, 'images/burgersale.png','save 50% 4 burgers 2 cola 1 fries 1 salad');
        $pizzasale1 = new deal('pizzasale1','unlimited', 38.5, 'images/pizza.png','save 40% 1 large pizza 2cola 1 fries');
        $chickensale1 = new deal('chickensale1','unlimited', 108, 'images/kindpng_3844221.png','save 30% 3 chicken meals 2 cola 2 fries 1 salad');

        $burgersale = new deal('burgersale','limited', 82, 'images/burgersale.png','save 50% 4 burgers 2 cola 1 fries 1 salad');
        $pizzasale = new deal('pizzasale','limited', 38.5, 'images/pizza.png','save 40% 1 large pizza 2cola 1 fries');
        $chickensale = new deal('chickensale','limited', 108, 'images/kindpng_3844221.png','save 30% 3 chicken meals 2 cola 2 fries 1 salad');


        $deals= array($burgersale,$pizzasale,$chickensale,$burgersale1,$pizzasale1,$chickensale1);



        $dealsfound=false;
        $id1 ='id';
        $id2='id';
        $num=0;
        $color ='"'.'#fbb114'.'"';
        $color2='"'.'orange'.'"';



        echo "<table id='dealtable' style='width: 100%; position: absolute; height: 200%; align-content: flex-start; border-spacing: 30px;'> </table> 
                <tr style='max-height: 10px;'  > <span style='color: #23252e; '> filling space </span> </tr>";
        if(empty($deals))
        {
            echo" <div style='font-size: 150%; position:absolute; top:5%; left: 5%; color: white' >no deals ordered.</div>";
        }
        else {
            foreach ($deals as $x) {


                if (isset($_COOKIE[$x->name])) {

                    $dealsfound=true;
                    echo "<script>notfound1=false;</script>";

                    $name= $x->name;
                    $name2= '"'.$x->name.'"';

                    $amount=$_COOKIE[$name];

                    $id1 = $num . 'priced';
                    $id11 = $num . 'pd';
                    $id2 = $num . 'amountd';

                    echo "<tr style='padding: 10px;' >
             <div style='height: 100px;background-color: #1b1c24; width: 98%; position: relative; left: 1%; border-radius: 15px; top:0%; color: white;'>
             <img src=$x->image height='100px' width='100px' style='left: 20px; position: absolute'>
             <span style='position: absolute; top: 40%; width 200px%; left: 150px; font-size: 130%;  '> $x->name</span>
             <input type='text' style='position: absolute; width: 32%; left: 260px; top:31px; ;height: 32px; border-radius: 10px; ' placeholder='comment any request/change' >
            
              <button onmouseover='  document.getElementById(id).style.backgroundColor= $color;' onmouseleave='document.getElementById(id).style.backgroundColor= $color2;'  id=$id1 title='price' name=$x->price style=' background-color: orange; border-radius: 10px; border: 2px solid #d9640b; position: absolute; top:30px; left:70%; width: 120px; height: 40px; color: white; font-size: 120%;'><b> $x->price  </b>$</button>
              <input id=$id2 oninput='alt_price2($num);changeamount($name2 , id)' type='number' step='1'  min='1' placeholder= $amount style='position: absolute; width: 30px; height: 33px;Top:30px; left:87%;border-radius: 5px; text-align: center' >
              <button id=$id1 title='cancel order' name=$x->price style=' border-radius: 100%; text-align: center;position: absolute; top:30px; left:94%; width: 40px; background-color: #1b1c24;height: 40px; color: orange; font-size: 120%;' onclick='deletedish($name2);'><b> X </b></button>
            </div>
            <button id=$id11 name='3' style='visibility: hidden'> </button>
            <script> alt_price2($num);</script>
            
            
            
            <tr style='max-height: 10px;'  > <span style='color: #23252e; '> filling space </span> </tr>
            </tr>
            ";
                    $num++;

               echo "<script> dealcounter++;</script>";
                }
            }
            if(!$dealsfound)
            {
                echo" <div style='font-size: 150%; position:absolute; top:5%; left: 5%; color: white' >no deals ordered.</div>";
                echo "<script> notfound1=true;</script>";
            }

            if($num<=2)
            {
                echo" <script>
              document.getElementById('dealtable').style.height='20%';
              </script>
            ";
            }
            if($num<=3)
            {
                echo" <script>
              document.getElementById('dealtable').style.height='25%';
              </script>
            ";
            }
            if($num<=4)
            {
                echo" <script>
              document.getElementById('dealtable').style.height='30%';
              </script>
            ";
            }
            if($num<=5)
            {
                echo" <script>
              document.getElementById('dealtable').style.height='35%';
              </script>
            ";
            }
            if($num<=6)
            {
                echo" <script>
              document.getElementById('dealtable').style.height='40%';
              </script>
            ";
            }

            if($num >6)
            {
                echo" <script>
              document.getElementById('dealtable').style.height='60%';
              </script>
            ";
            }

        }


        ?>

    </div>



    <div id="paymenttab">
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
            <input id="cvv"   placeholder="  123" style="width: 45%; height: 70%; left: 45%; position: absolute" >
        </div>

        <button id="paybutton" onmouseover="buttonhover('paybutton')" onmouseleave="buttonunhover('paybutton')" onclick="confirmpayment()" title='price' style=' background-color: orange; border-radius: 20px; border: 2px solid #d9640b; position: absolute; top:70%; left:15%; width: 70%; height: 25%; color: white; font-size: 120%;' > <b>Confirm order<b> </b></button>

        <div id = 'totalprice' style="font-size: 150%; position:absolute; top:60%; left: 0%; color: white; width: 100%; text-align: center" >Total price: 100 $ </div>




    </div>



</section>

<script>


    finalprice();
    checkit=true;
</script>
</body>
</html>