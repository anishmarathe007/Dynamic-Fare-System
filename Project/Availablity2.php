<?php  
  session_start(); 
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Availability</title>
        <link rel="stylesheet" href="Availablity2.css">

    </head>

    <body>

    <center>

        <h3 style="color: white; size: 20px;"><b>TRAIN PRICING</b></h3><br/>

        <hr/>

    </center>
    <?php
        $x = 200;
    ?>
    <div class="wrapper">

        <div class="single-price">

            <h1>AC 3 TIER</h1>

            <div class="price">
                <h2>170/-</h2>
            </div>

            <div class="deals">
                <h4><script type="text/javascript">document.write(<?php echo $x; ?>)</script></h4>
                <h4>Details</h4>
                <h4>Details</h4>
                <h4>Details</h4>
            </div>

            <a href="#">Select</a> 

        </div>

        <div class="single-price">

            <h1>Standard</h1>

             <div class="price">

                <h2>290/-</h2>

             </div>

            <div class="deals">

                <h4>Details</h4>

                <h4>Details</h4>

                <h4>Details</h4>

                <h4>Details</h4>

            </div>

            <a href="#">Select</a> 

        </div>

        <div class="single-price">

            <h1>Mid Range</h1>

            <div class="price">

                <h2>395/-</h2>

            </div>

            <div class="deals">

                <h4>Details</h4>

                <h4>Details</h4>

                <h4>Details</h4>

                <h4>Details</h4>

            </div>

            <a href="#">Select</a> 

        </div>

        </div>

    </div>
    </body>
</html>




<?php

    if (isset($_POST['button'])) {
        # code...
    $base = 2600;
    if(isset($_SESSION['hcount'])) 
        $_SESSION['hcount'] = $_SESSION['hcount'] + 1; 
    else
        $_SESSION['hcount']=1;
        $_SESSION['rs'] = 2600; 

    
    //echo "<br>";
    //echo "Base fare : ".$base;
    //echo "<br>";
    //echo"No of Passengers = ".$_SESSION['hcount'];
    //echo "<br>"; 

    if ($_SESSION['hcount'] > 10 && $_SESSION['hcount'] < 20) {
        echo "Number of passenger count rises above 10 10% of the base fare is added";
        $_SESSION['rs'] = $_SESSION['rs'] + ($base*(10/100));       
    }
    else if ($_SESSION['hcount'] >= 20 && $_SESSION['hcount'] < 30) {
        echo "Number of passenger count rises above 20 15% of the base fare is added";
        $_SESSION['rs'] = $_SESSION['rs'] + ($base*(20/100));           
    }

    //echo "<br>";
    //echo "Amount  = Rs ".$_SESSION['rs'];       

    if ($_SESSION['hcount'] > 30)
    {
        unset($_SESSION['hcount']);
        session_destroy();
    }

}
?>