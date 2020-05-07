<?php
  session_start();

  $PNR = mt_rand(1111111111111,9999999999999);
  $tkt_no = mt_rand(1111111,9999999);

  $user = 'root';
  $pass = '';
  $db = 'train';

  //echo $_SESSION['value'];

  $conn = mysqli_connect('localhost',$user,$pass,$db) or die("Couldn't Connect");

  $query = "SELECT * FROM train where train_no =".$_SESSION['value'];;

  $res = mysqli_query($conn,$query);

//print_r($res);

  $row = mysqli_fetch_array($res);

  $tr_no = $row[0];
  $train_name = $row[1];
  $source = $row[2];
  $destination = $row[3];
  $arrival_time = $row[5];
  $depart_time = $row[4];
  $km = $row[6];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Display Reservation</title>
    <link rel="stylesheet" href="fdisplay.css">
  </head>
  <body>
  <div class="container">
    <div class="contained1">
          <?php echo $PNR; ?>
    </div>
    <div class="contained2">
          <?php echo $tr_no; ?>
    </div>
    <div class="contained3">
      <?php echo $_SESSION['date']; ?>
    </div>
    <div class="contained4">
      <?php echo $km; ?>
    </div>
    <div class="contained5">
      1 
    </div>
    <div class="contained6">
      <?php echo $tkt_no; ?>
    </div>
    <div class="contained7">
      <?php echo $_SESSION['class']; ?> <!--To take from Database-->
    </div>
    <div class="contained8">
      <?php echo $source; ?> 
    </div>
    <div class="contained9">
     <?php echo $destination; ?>
    </div>
    <div class="status">
      Status:<br>
        CNF
    </div>
    <?php if($_SESSION['class']=='2A')
          {
              $c = 'A';
          } 
          else if($_SESSION['class']=='3A')
          {
            $c = 'B';
          }
          else if($_SESSION['class']=='1A')
          {
            $c = 'H';
          }
          $num = mt_rand(1,4);
    ?>
    <div class="contained10">
      <?php echo $c.$num;?>
    </div>
    <?php 
      if($_SESSION['birth_pref'] == 'Side Lower')
      {
        $cl = 'SL';
      }
      else if($_SESSION['birth_pref'] == 'Side Upper')
      {
        $cl = 'SU';
      }
      else if($_SESSION['birth_pref'] == 'Upper')
      {
        $cl = 'U';
      }
      else if($_SESSION['birth_pref'] == 'Lower')
      {
        $cl = 'L';
      }      
      else if($_SESSION['birth_pref'] == 'Middle')
      {
        $cl = 'M';
      }
    ?>
    <?php $seat = mt_rand(1,28);?>
    <div class="contained11">
    <?php echo $seat." ".$cl;?>
    </div>
      <?php if($_SESSION['gender']=='Male')
            {
              $g = 'M';
            }
            else if($_SESSION['gender']=='Female')
            {
              $g = 'F';
            }
      ?>
    <div class="contained12">
      <?php echo $g; ?>
    </div>
    <div class="contained13">
      <?php echo $_SESSION['age']; ?>
    </div>
    <div class="contained14">
      <?php echo $_SESSION['base'].".00";?>
    </div>
    <div class="contained15">
    Dynamic Fare(<?php echo $_SESSION['per_f']; ?>)%<br>
      <?php echo $_SESSION['dyf_f'].".00"; ?>
    </div>
    <div class="contained16">
          Service Charge<br>
        &nbsp;&nbsp;&nbsp;<?php echo $_SESSION['sc'].".00";?>
    </div>
    <div class="contained17">
      =<?php echo $_SESSION['total_f'].".00";?>
    </div>
    <div class="contained18">
      UID Number = <?php echo "xxxx-xxxx-".$_SESSION['uid'];?>
    </div>
    <div class="contained19">
      <?php echo $row[4]."*";?>
    </div>
    <div class="contained20">
      <?php echo $row[5]."*";?>
    </div>
	</div>
</body>
</html>

<?php
$to = $_SESSION['mail'];
$Message = "Your Ticket has been booked..!!\n"."PNR:".$PNR."\n"."Train Number:".$tr_no."\n"."Train Name:".$train_name."\n"."Source:".$source."@".$depart_time."\n"."Destination:".$destination."@".$arrival_time."\n"."Date of Journey:".$_SESSION['date'];

mail($to, 'Ticket Booked!!', $Message,'From:indian@railways.com');
session_destroy();
?>