<?php
session_start();
if(isset($_SESSION['destination']))
	unset($_SESSION['destination']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>MAP To</title>
	<link rel="stylesheet" type="text/css" href="map2.css">
</head>
<body>
	<form method="post">
	    <p><font color="white"size="600px;" style="font-family: cursive;">To location</font></p>
	    <div class="relative">
		    <div class="abs1" style="width: 100px; height: 50px;">
		    	<h5 style="color: black;"><input type="radio" name="s1" value="Mumbai" >MUMBAI </h5>
		    </div>   
		    <div class="abs2">
		    	<h5 style="color: black;"><input type="radio" name="s1" value="Nagpur" > NAGPUR </h5>
		    </div>
		    <div class="abs12">
		    	<h5 style="color:black;"><input type="radio" name="s1" value="Delhi" > DELHI</h5>
			</div>
			<div class="abs3">
		    	<h5 style="color:black;"><input type="radio" name="s1" value="Jaipur">JAIPUR</h5>
			</div>
			<div class="abs4">
		        <h5 style="color: black;"><input type="radio" name="s1" value="Bhopal"> BHOPAL</h5>
			</div>	
			<div class="abs5">
		         <h5 style="color: black;"><input type="radio" name="s1" value="Ahmedabad"> AHMEDABAD</h5>
			</div>	
			<div class="abs6">
		         <h5 style="color: black;"><input type="radio" name="s1" value="Hyderabad">HYDREABAD</h5>
		    </div>     
		    <div class="abs7">
		         <h5 style="color:black;"><input type="radio" name="s1" value="Bangalore">BANGALORE</h5>     
			</div>
			<div class="abs8">
		         <h5 style="color:black;"><input type="radio" name="s1" value="Chandigarh">CHANDIGARH</h5>     
			</div>
			<div class="abs9">
		         <h5 style="color:black;"><input type="radio" name="s1" value="Patna">PATNA</h5>     
			</div>
			<div class="abs10">
		         <h5 style="color:black;"><input type="radio" name="s1" value="Lukhnow">LUCKNOW</h5>     
			</div>		  		  
			<div class="abs11">
		         <h5 style="color:blue;"><input type="submit" name="next1" value="Next"></h5>     
			</div>
			<div class="abs13" style="width: 100px; height: 50px;">
		    	<h5 style="color: black;"><input type="radio" name="s1" value="Trivendrum" >TRIVENDRUM </h5>
		    </div>   		  		  
		    <div class="abs14" style="width: 100px; height: 50px;">
		    	<h5 style="color: black;"><input type="radio" name="s1" value="Chennai" >CHENNAI </h5>
		    </div>   		  		  		  		  
		</div>
		</form>
</body>
</html>


<?php
if (isset($_POST['next1'])) {
	$_SESSION['destination']= $_POST['s1'];
	echo "<script> location.href='date.php'; </script>";
}
?>