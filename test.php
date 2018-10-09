<?php
if(isset($_GET['submit']))
{
	$path=$_GET['testfile'];
	echo $path;
	$imag=$_FILES["testfile"]["name"];
	echo $imag;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<form action="test.php" method="GET">
		<input type="file" name="testfile"/>
		<input type="submit" name="submit" value="submit">
	</form>

</body>
</html>