<?php
session_start();
if(isset($_SESSION['date']))
    unset($_SESSION['date']);
/*$_SESSION['date'] = '';
$_SESSION['no_of_days'] = 0;*/

//echo $_SESSION['date'];
//echo $_SESSION['no_of_days'];
?>
<!DOCTYPE HTML>
<html>
      <head>
        <title>Date Page</title>
    </head>
    <body style="text-align: center;">
    	<h3>Journey Date</h3>
    	<form method="POST">
    		<input type="date" name="d1" value="2020-04-22" min="2020-04-25" max="2020-07-25">
			<input type="submit" name="s1" value="Submit">
    	</form>
    </body>
</html>

<?php
    if (isset($_POST['s1'])) 
    {
        $curr_date = date_create(date("Y-m-d"));
        $after_date = date_create($_POST['d1']);
        $diff = date_diff($curr_date,$after_date);
        $d = $diff->format("%a");

        $_SESSION['date'] = $_POST['d1'];
        $_SESSION['no_of_days'] = $d;

        echo "<script> location.href='select.php'; </script>";

	}
?>
