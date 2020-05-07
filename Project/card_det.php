<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="card2.css">
  </head>
  <body>
  <form method="post">
  <div class="app-container">
    <div class="top-box">
      <p><span class="left-icon">&#x2190;</span>CHECKOUT<span class="right-icon">&#xb7;&#xb7;&#xb7;</span></p>    
    </div>

    <div class="middle-box">
      <h1><?php echo $_SESSION['total_f'].".00";?><span>Rs</span></h1>
      <p>Pay To : Indian Railways </p>
    </div>

    <div class="buttom-box">
      <button type="button" class="payment-option-button">Pay Money</button>
        <div class="card-details">
        <p>Pay using Debit card</p>
        <div class="card-num-field-group">
          <label>Card Number</label><br>
          <input type="text" class="card-num-field" name="cardno" placeholder="xxxx-xxxx-xxxx-xxxx">
        </div>
        <div class="date-field-group">
          <label>Expiry Date</label><br>
          <input type="text" class="date-field" name="month" placeholder="mm">
          <input type="text" class="date-field" name="year" placeholder="yy">
        </div>
        <div class="cvv-field-group">
          <label>CVV</label><br>
          <input type="password" class="cvv-field" name="name" placeholder="xxx">
        </div>
        <div class="name-field-group">
          <label>Card Holder</label><br>
          <input type="text" class="name-field" name="mail1" placeholder="Card Holder's Email ID">
        </div>
        <button type="submit" class="pay-button" name="submit">Pay Now</button>
      </div>
    </div>
  </div>
</form>
  </body>
</html>
<?php
//$flag = 0;

if (isset($_POST['submit'])) 
{
  if (!(empty($_POST['cardno'] || $_POST['month'] || $_POST['year'] || $_POST['name'] || $_POST['mail1']))) 
      { 
      if(strlen($_POST['cardno']) == 16)
        {
          if (strlen($_POST['month']) ==2)
          {
              if(strlen($_POST['year']) == 2)
              {
                  if(strlen($_POST['name']) == 3)
                  {
                     $_SESSION['mail1'] = $_POST['mail1'];
                     $_SESSION['otp'] = mt_rand(111111,666666);
                     echo "<script> location.href='otp.php'; </script>";
                  } 
                  else
                  {
                      echo "<script>alert('CVV code should be exactly 3 digits long')</script>";  
                  }               
              }
              else
              {
                  echo "<script>alert('YEAR SHOULD BE exactly 2 DIGITS LONG')</script>";           
              }
          }    
          else
          {
            echo "<script>alert('MONTH SHOULD BE exactly 2 DIGITS LONG')</script>";
          } 
      }
      else
      {
        echo "<script>alert('CARD NUMBER SHOULD BE EXACTLY 16 DIGITS LONG')</script>";     
      }
    }
    else
    {
      echo "<script>alert('ALL FIELDS ARE COMPULSORY..!!')</script>";  
    }   
}

?>