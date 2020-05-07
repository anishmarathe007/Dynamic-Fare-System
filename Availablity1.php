<?php  
  session_start(); 
  if($_SESSION['login']==0)
  {
    echo '<script>alert("You have not yet logged in please login to start the session again")</script>';    
    echo "<script> location.href='Login.php'; </script>";
  }
?>

<?php
    $user = 'root';
  $pass = '';
  $db = 'train';

  //echo $_SESSION['value'];

  $conn = mysqli_connect('localhost',$user,$pass,$db) or die("Couldn't Connect");

  $query = "SELECT * FROM train where train_no =".$_SESSION['value'];;

  $res = mysqli_query($conn,$query);

//print_r($res);

  $row = mysqli_fetch_array($res);

  //$tr_no = $row[0];
  //$train_name = $row[1];
  //$source = $row[2];
  //$destination = $row[3];
  //$depart_time = $row[4];
  $km = $row[6];

  $base_2A = 3000;
  $_SESSION['rs_2A'] = 3000;
  $base_3A = 2600;
  $_SESSION['rs_3A'] = 2600;
  $_SESSION['df_2A'] = 0;
  $_SESSION['df_3A'] = 0;
  $_SESSION['per'] = 0;
  $_SESSION['per_3A'] = 0;
  $base_1A = 4100;
  $_SESSION['class'] = '';
  $_SESSION['base'] = 0;

  /*$_SESSION['per1'] = 0;
  $_SESSION['sc'] = 0;
  $_SESSION['total'] = 0;*/     
  if(isset($_SESSION['hcount_3A'])) 
  {
        if ($_SESSION['hcount_3A']==0) {
        $_SESSION['hcount_3A'] = 0; }
  }
  if ($_SESSION['hcount_3A'] == 0 || $_SESSION['hcount_2A'] == 0 || $_SESSION['hcount_1A'] == 0) {
    $_SESSION['hcount_3A'] = 0;
    $_SESSION['hcount_2A'] = 0;
    $_SESSION['hcount_1A'] = 0;
  }
    

    if (isset($_POST['submit'])) {
    if(isset($_SESSION['hcount_3A'])) 
        $_SESSION['hcount_3A'] = $_SESSION['hcount_3A'] + 3; 

    if ($_SESSION['hcount_3A'] >= 10 && $_SESSION['hcount_3A'] < 30) {
        $_SESSION['rs_3A'] = $_SESSION['rs_3A']+($base_3A*(10/100))+($base_3A*(2/100));
        $_SESSION['total1'] = $_SESSION['rs_3A'];
        $_SESSION['df_3A'] = ($base_3A*(10/100));
        $_SESSION['per_3A'] =10;       
        $_SESSION['dyf1'] =  $_SESSION['df_3A'];
        $_SESSION['per1'] = $_SESSION['per_3A'];
    }
    else if ($_SESSION['hcount_3A'] >= 30 && $_SESSION['hcount_3A'] < 50) {
        $_SESSION['rs_3A'] = $_SESSION['rs_3A']+($base_3A*(20/100))+($base_3A*(2/100));
        $_SESSION['total1'] = $_SESSION['rs_3A'];
        $_SESSION['df_3A'] = ($base_3A*(20/100));
        $_SESSION['per_3A'] =20;  
        $_SESSION['dyf1'] =  $_SESSION['df_3A']; 
        $_SESSION['per1'] = $_SESSION['per_3A'];        
    }
    else if ($_SESSION['hcount_3A'] >= 50 && $_SESSION['hcount_3A'] <= 100) {
        $_SESSION['rs_3A'] = $_SESSION['rs_3A']+($base_3A*(30/100))+($base_3A*(2/100));
        $_SESSION['total1'] = $_SESSION['rs_3A'];
        $_SESSION['df_3A'] = ($base_3A*(30/100));
        $_SESSION['per_3A'] =30;           
        $_SESSION['dyf1'] =  $_SESSION['df_3A'];
        $_SESSION['per1'] = $_SESSION['per_3A'];
    }

    if(isset($_SESSION['hcount_2A'])) 
        $_SESSION['hcount_2A'] = $_SESSION['hcount_2A'] + 4; 

    if ($_SESSION['hcount_2A'] >= 10 && $_SESSION['hcount_2A'] < 20)
    {
        $_SESSION['rs_2A'] = $_SESSION['rs_2A']+($base_2A*(10/100))+($base_2A*(2/100));
        $_SESSION['total2'] = $_SESSION['rs_2A'];
        $_SESSION['df_2A'] = ($base_2A*(10/100));
        $_SESSION['per'] =10;       
        $_SESSION['dyf2'] =  $_SESSION['df_2A'];
        $_SESSION['per2'] = $_SESSION['per'];
    }
    else if ($_SESSION['hcount_2A'] >= 20 && $_SESSION['hcount_2A'] <= 46)
    {
        $_SESSION['rs_2A'] = $_SESSION['rs_2A']+($base_2A*(20/100))+($base_2A*(2/100));
        $_SESSION['total2'] = $_SESSION['rs_2A'];
        $_SESSION['df_2A'] = ($base_2A*(20/100));
        $_SESSION['per'] =20;   
        $_SESSION['dyf2'] =  $_SESSION['df_2A'];
        $_SESSION['per2'] = $_SESSION['per'];    
    }

    if ($_SESSION['hcount_2A'] > 46)
    {
        $_SESSION['hcount_2A'] = 46;
        $_SESSION['rs_2A'] = $_SESSION['rs_2A']+($base_2A*(20/100))+($base_2A*(2/100));
        $_SESSION['total2'] = $_SESSION['rs_2A'];
        $_SESSION['df_2A'] = ($base_2A*(20/100));
        $_SESSION['per'] =20;
        $_SESSION['dyf2'] =  $_SESSION['df_2A'];
        $_SESSION['per2'] = $_SESSION['per'];
    }

    if(isset($_SESSION['hcount_1A'])) 
        $_SESSION['hcount_1A'] = $_SESSION['hcount_1A'] + 2; 

    if ($_SESSION['hcount_1A'] > 18)
    {
        $_SESSION['hcount_1A'] = 18;
    }

    if ($_SESSION['hcount_3A'] >= 102)
    {
        $_SESSION['hcount_3A'] = 0;
        $_SESSION['hcount_2A'] = 0;      
        $_SESSION['hcount_1A'] = 0;
    }
}
    if (isset($_POST['s1'])) {
        if (isset($_SESSION['total1'])) {
            $_SESSION['total_f'] = $_SESSION['total1'];    
            $_SESSION['dyf_f'] = $_SESSION['dyf1'];
            $_SESSION['per_f'] = $_SESSION['per1'];
        }
        else{
            $_SESSION['total_f'] = ($base_3A) + ($base_3A*(2/100));
            $_SESSION['dyf_f'] = 0;
            $_SESSION['per_f'] = 0;
        }
        $_SESSION['class'] = '3A';
        $_SESSION['base'] = $base_3A;
        $_SESSION['sc'] = ($base_3A*(2/100));
        
        
        echo "<script> location.href='index.php'; </script>";
    }
    else if (isset($_POST['s2'])) {
        if (isset($_SESSION['total2'])) {
            $_SESSION['total_f'] = $_SESSION['total2'];    
            $_SESSION['dyf_f'] = $_SESSION['dyf2'];
            $_SESSION['per_f'] = $_SESSION['per2'];
        }
        else{
            $_SESSION['total_f'] = ($base_2A) + ($base_2A*(2/100));
            $_SESSION['dyf_f'] = 0;
            $_SESSION['per_f'] = 0;
        }
        $_SESSION['class'] = '2A';
        $_SESSION['base'] = $base_2A;
        $_SESSION['sc'] = ($base_2A*(2/100));
        $_SESSION['dyf_f'] = $_SESSION['dyf2'];
        $_SESSION['per_f'] = $_SESSION['per2'];
        $_SESSION['total_f'] = $_SESSION['total2'];
        echo "<script> location.href='index.php'; </script>";
    }
    else if (isset($_POST['s3'])) {
        $_SESSION['class'] = '1A';
        $_SESSION['base'] = $base_1A;
        $_SESSION['dyf_f'] = 0;
        $_SESSION['per_f'] = 0;
        $_SESSION['sc'] = ($base_1A*(2/100));
        $_SESSION['total_f'] = ($base_1A) + ($base_1A*(2/100));
        echo "<script> location.href='index.php'; </script>";
    }

    //session_destroy();

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Availability</title>
        <link rel="stylesheet" href="Availablity1.css">
    </head>

    <body>
    <form method="post">
    <center>

        <h3 style="color: black; size: 20px;"><b>TRAIN PRICING</b></h3><br/>

        <hr/>
        
    </center>

    <center>
    <input style="text-decoration: none;
    background: #3366ff;
    color: #fff;
    text-transform: uppercase;
    font-weight: bold; display: inline-block;" type="submit" name="submit" value="Refresh"/>
    </center>

    <div class="wrapper">

        <div class="single-price">

            <h1>AC 3 Tier</h1>

            <div class="price">
                <h2><?php echo $_SESSION['rs_3A']."/-"; ?></h2>
            </div>

            <div class="deals">
                <h4>No of Passengers:<?php echo $_SESSION['hcount_3A']; ?></h4>
                <h4>Distance: <?php echo $km;?>km</h4>
                <h4>Base Fare:<?php echo $base_3A; ?></h4>
                <h4>Dynamic Charge:<?php echo $_SESSION['per_3A']."% =".$_SESSION['df_3A']; ?></h4>
                <h4>Service Charge(8%):<?php echo ($base_3A*(2/100)); ?></h4>
            </div>

            <a><input type="submit" name="s1" value="Select"></a> 

        </div>

        <div class="single-price">

            <h1>AC 2 Tier</h1>

             <div class="price">

                <h2><?php echo $_SESSION['rs_2A']."/-"; ?></h2>

             </div>

            <div class="deals">
                <h4>No of Passengers:<?php echo $_SESSION['hcount_2A']; ?></h4>
                <h4>Distance: <?php echo $km;?>km</h4>
                <h4>Base Fare:<?php echo $base_2A; ?></h4>
                <h4>Dynamic Charge:<?php echo $_SESSION['per']."% =".$_SESSION['df_2A']; ?></h4>
                <h4>Service Charge(8%):<?php echo ($base_2A*(2/100)); ?></h4>
            </div>

            <a><input type="submit" name="s2" value="Select"></a> 

        </div>

        <div class="single-price">

            <h1>AC 1 TIER</h1>

            <div class="price">

                <h2><?php echo $base_1A+($base_1A*(2/100))."/-"; ?></h2>

            </div>

            <div class="deals">

                <h4>No of Passengers:<?php echo $_SESSION['hcount_1A']; ?></h4>
                <h4>Distance: <?php echo $km;?>km</h4>
                <h4>Base Fare:<?php echo $base_1A; ?></h4>
                <h4>Dynamic Charge: N/A</h4>
                <h4>Service Charge(8%):<?php echo ($base_1A*(2/100)); ?></h4>

            </div>

            <a><input type="submit" name="s3" value="Select"></a> 

        </div>

        </div>

    </div>
    </form>
    </body>
</html>

<?php
//session_destroy();?>