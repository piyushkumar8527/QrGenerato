<!DOCTYPE html>
<html>

<head>
	<title>QR Code Gen</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<link rel="stylesheet" href="style.css">

</head>

<body>
 
  <a href="showdb.php" > <span style="background-color:white; color:white">Click to see database<span> </a>
  
  


	<h3 id="class1" style="font-size: 40px"><strong>QR Code Gen</strong></h3>
	<div class="input-field">
		<form style="text-align:center" method="post">

			<div id="class4" class="form-group">
				<input type="text" name="name" class="form-control" placeholder="Enter your name"></input>
				<textarea rows="6" cols="90" type="text" class="form-control" name="msg" placeholder="Enter Your Details"></textarea>
			</div>
			<div>
				<input type="submit" name="submit" value="submit" class="btnsubmit" />
			</div>
		</form>
	</div>
	
	<!-- php code to generate php and save it to image directory -->
	<?php
	include('phpqrcode/qrlib.php');
	if (isset($_POST['submit'])) {
		$path = 'images/';
		$file = $path . $_POST['name'] . ".png";
		$name =  $_POST['name'];
		$text =  $_POST['msg'];
		$codeContents = "Name: $name\n$text";
		QRcode::png($codeContents, $file, QR_ECLEVEL_L, 11);
	}
	?>
	
	<!--section to show qr from images directory -->
	<div class="qr-field">
		<h2>QR Code Result </h2>
		<center>
			<div class="qrframe">
				<?php echo '<img src="' . @$file . '" style="width:200px;"><br>'; ?>

			</div>

		</center>
	</div>
	
	<!--php code to save data in database -->
	<?php
	if (isset($_POST['submit'])) {
		define('HOST', 'localhost');
		define('USERNAME', 'root');
		define('PASSWORD', '9461');
		define('DB', 'qrdata');

		$con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);

		$name = $_POST['name'];
		$details = $_POST['msg'];

		$sql = "insert into form (Name, Details_Field) values ('$name','$details')";

		mysqli_query($con, $sql);
	}
	?>
</body>

</html>