<?php
session_start();

$user = 'root';
$pass = '';
$db = 'train';

echo $_SESSION['value'];

$conn = mysqli_connect('localhost',$user,$pass,$db) or die("Couldn't Connect");

$query = "SELECT * FROM train where train_no =".$_SESSION['value'];;

$res = mysqli_query($conn,$query);

//print_r($res);

$row = mysqli_fetch_array($res);

$tr_no = $row[0];
$train_name = $row[1];
$source = $row[2];
$destination = $row[3];
$depart_time = $row[4];
$km = $row[5];

//echo $tr_no;
/*echo $train_name;
echo $depart_time;*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>connect Page</title>
</head>
<body>
	<form action="display.php">
		<input type="submit" name="s1">
	</form>
</body>
</html>

<?php
	if (isset($_POST['s1'])) {
		
	}
?>


