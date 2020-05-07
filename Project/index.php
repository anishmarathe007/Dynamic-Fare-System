<?php
session_start();


if (isset($_POST['Next'])) {
  $user = 'root';
  $pass = '';
  $db = 'train';

  //$user = $_SESSION['username'];

  $conn = mysqli_connect('localhost',$user,$pass,$db) or die("Couldn't Connect");

  $_SESSION['age'] = $_POST['age'] ;
  $_SESSION['gender'] = $_POST['g'];
  $_SESSION['birth_pref'] = $_POST['select'];
  $_SESSION['mail'] =$_POST['Email'] ;
  $_SESSION['uid'] = $_POST['aadhar'];

  $name = $_POST['name'];
  $age = $_POST['age'];
  $email = $_POST['Email'];
  $phone = $_POST['phone'];
  $aadhar = $_POST['aadhar'];
  $gender = $_POST['g'];
  $birth_pref = $_POST['select'];

  //$query1 = "SELECT ID FROM person where ID = (SELECT ID FROM login WHERE username = '$user')";

  //$result1 = mysqli_query($conn,$query1);

  //echo $result1;


  $query = "INSERT INTO person(pname,age,email_id,phone_number,uid,gender,birth_pref) VALUES('$name',$age,'$email',$phone,$aadhar,'$gender','$birth_pref')";
  $result = mysqli_query($conn,$query);
  echo "<script> alert('Redirecting to Further pages') </script>";
  echo "<script> location.href='card_det.php'; </script>";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styels.css">
  </head>
  <body>
  <header>
  <div class="contact-section">
   <h1>Enter the Person Details</h1>
    <div class="border"></div>
     <form class="contact-form" method="post">
      <input type="text" class="contact-form-text" placeholder="Name" name="name">
      <input type="text" class="contact-form-text" placeholder="Age" name="age">
      <input type="email" class="contact-form-text" placeholder="Email-ID" name="Email">
      <input type="text" class="contact-form-text" placeholder="Phone Number" maxlength="10" name="phone">
      <input type="text" class="contact-form-text" placeholder="Last 4 digits of UID Number" name="aadhar">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="white">Male<input type="radio" class="contact-form-radio" name="g" value="Male"></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <font color="white">Fe-Male<input type="radio" class="contact-form-radio" name="g" value="Female"></font>
      <select class="contact-form-text" name="select">
        <optgroup label="Select Birth Preference">
          <option>Middle</option>
          <option>Lower</option>
          <option>Upper</option>
          <option>Side Lower</option>
          <option>Side Upper</option>
        </optgroup>
      </select>
      <input type="reset" class="contact-form-btn" value="Clear" name="clear">
      <input type="submit" class="contact-form-btn" value="Next" name="Next">
    </form>
  </div>
  </header>
 </body>
</html>
