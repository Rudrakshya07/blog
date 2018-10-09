<?php require_once("db.php");?>
<?php
$succes="";
$unsuccess="";
$errmsg="";
$Longname="";
if (isset($_POST['Submit'])) {
	$Categories=mysqli_real_escape_string($Connection,$_POST['CategoryName']);
	date_default_timezone_set("Asia/Karachi");
	$DateTime=strftime("%Y-%m-%d %H:%M:%S",time());
	
	$Admin="Hara";
	if (empty($Categories)) {
		

		$errmsg="Fields must be filled out";
		
		
	}
	elseif (strlen($Categories) >99) {
		$Longname="too long Name";
		
		
	}
	else{
		$query="INSERT INTO  categories(datetimes,name,creatorname) VALUES('$DateTime','$Categories','$Admin')";
		$exe=mysqli_query($Connection,$query);
		if ($exe) {
			$succes="Succesfully added";
			# code...
		}
		else{
			$unsuccess="Failed to add";
		}

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>bootstrppage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="boot.css">
</head>
<style type="text/css">
html{
		height:100%;

	}
	body{
		margin:0;
		padding: 0;
		min-height: 100%;
		position: relative;
		cursor: default;
	}
	body::after{
		content: '';
		display: block !important;
		height: 120px !important;
	}
	</style>
<body style="background: -webkit-linear-gradient(to right, #292E49, #536976) ;  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #292E49, #536976) ; /* W3C, I*/
">

	<div class="row "> 
		<div class="col-md-2" >
			<ul id="SideBar" class="nav nav-pills nav-stacked ">
			
				<li ><a href="indexpage.php"><span class="glyphicon glyphicon-th"></span>&nbsp;Dashboard</a></li>
				<li><a href="AddPost.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Add Post</a></li>
				<li class="active"><a href="#"><span class="glyphicon glyphicon-tags"></span>&nbsp;Categories</a></li>
				<li><a href="manageadmins.php"><span class="glyphicon glyphicon-tags"></span>&nbsp;Manage Admins</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-comment"></span>&nbsp;Comments</a></li>
				
			</ul>
			
		</div>
		<div class="col-md-10" style="background-color: #ffff;">
			<h1>Manage Categories</h1>
			<div class="alert alert-danger"><?php echo "$Longname"; ?>
				<?php echo "$errmsg"; ?><?php echo "$succes"; ?><?php echo "$unsuccess"; ?>
			</div>
			<div>
				<fieldset>
					<form action="Categories.php" method="POST">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" name="CategoryName" id="name" placeholder="Name">
						</div>
							<input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add Categories">

						
					
					</form>
				</fieldset>
			</div>
			
		</div>

		
	</div>
	
</div>
<div id="footer" style="
	font-size:14px;
	color:#ffff;
	background-color: #211f22;
	text-align: center;
	border-top: 2px solid;
	border-bottom: 2px solid;
	padding: 2%;
	height: 120px;
	position: absolute;
    bottom: 0;
    width: 100%;
">
		<p>designed by | HaraRudrakshya Sahoo | &copy;All Rights Reserved</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

	</div>
	<div style="height:10px; background:#27aae1;"></div>


</body>
</html>