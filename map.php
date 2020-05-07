<?php
session_start();
if(isset($_SESSION['source']))
	unset($_SESSION['source']);

if (isset($_POST['next'])) {
	$_SESSION['source'] = $_POST['s'];	
	echo "<script> location.href='map2.php'; </script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>MAP From</title>
	<link rel="stylesheet" type="text/css" href="map1f.css">
</head>
<body>
		<form method="post">
	    <p><font color="white"size="600px;" style="font-family: cursive;">From location</font></p>
	    <div class="relative">
		    <div class="abs1" style="width: 100px; height: 50px;">
		    	<h5 style="color: black;"><input type="radio" name="s" value="Mumbai" >MUMBAI </h5>
		    </div>   
		    <div class="abs2">
		    	<h5 style="color: black;"><input type="radio" name="s" value="Nagpur" > NAGPUR </h5>
		    </div>
		    <div class="abs3">
		    	<h5 style="color:black;"><input type="radio" name="s" value="Jaipur" > JAIPUR</h5>
			</div>
			<div class="abs4">
		        <h5 style="color: black;"><input type="radio" name="s" value="Bhopal"> BHOPAL</h5>
			</div>	
			<div class="abs5">
		         <h5 style="color: black;"><input type="radio" name="s" value="Ahmedabad"> AHMEDABAD</h5>
			</div>	
			<div class="abs6">
		         <h5 style="color: black;"><input type="radio" name="s" value="Hyderabad">HYDREABAD</h5>
		    </div>     
		    <div class="abs7">
		         <h5 style="color:black;"><input type="radio" name="s" value="Bangalore">BANGALORE</h5>     
			</div>
			<div class="abs8">
		         <h5 style="color:black;"><input type="radio" name="s" value="Chandigarh">CHANDIGARH</h5>     
			</div>
			<div class="abs9">
		         <h5 style="color:black;"><input type="radio" name="s" value="Patna">PATNA</h5>     
			</div>
			<div class="abs12">
		         <h5 style="color:black;"><input type="radio" name="s" value="Delhi">DELHI</h5>     
			</div>
			<div class="abs10">
		         <h5 style="color:black;"><input type="radio" name="s" value="Lukhnow">LUCKNOW</h5>     
			</div>		  		  
			<div class="abs11">
		         <h5 style="color:black;"><input type="submit" name="next" value="Next"></h5>
		    </div>
		    <div class="abs13" style="width: 100px; height: 50px;">
		    	<h5 style="color: black;"><input type="radio" name="s" value="Trivendrum" >TRIVENDRUM </h5>
		    </div>   		  		  
		    <div class="abs14" style="width: 100px; height: 50px;">
		    	<h5 style="color: black;"><input type="radio" name="s" value="Chennai" >CHENNAI </h5>
		    </div>   		  		  
		</div>
		</form>
</body>
</html>


<?php

?>