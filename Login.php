<?php require_once("db.php");?>
<?php
$succes="";
$unsuccess="";
$errmsg="";
$wrongpass="";

if (isset($_POST['Submit'])) {
	$Username=mysqli_real_escape_string($Connection,$_POST['Email']);
	$Password=mysqli_real_escape_string($Connection,$_POST['Password']);
	
	
	if (empty($Username)|| empty($Password)) {
		

		$errmsg="Details must be filled";
		
		
	}
	else
		{   $query="SELECT * FROM register WHERE email = '$Username' AND password = '$Password'";
	       $exe= mysqli_query($Connection,$query);
	       $row=mysqli_fetch_assoc($exe);
	       if($row['email']==$Username && $row['password']==$Password)
	       {
	       	header('Location:http://localhost:8080/BlogWebsite/AddPost.php');
	       } 
	       else{
	       	$wrongpass="Wrong details entered";

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
<link rel="stylesheet" type="text/css" href="boot2.css">
</head>
<style type="text/css">
	.form_tags{
		color: orange;
	}
	.col-md-4{
		position: relative
	}
	.col-md-4:after{
		content: '';
		display: block;
		width: 80%;
		height: 20%;
		box-shadow: 0 3px 100px;
		position: absolute;
		background-color: rgba(42,170,255,0.5);
	left: 10%;
	z-index: -1;
	bottom:-3px;
		

		
	}
</style>
<body style="
background: -webkit-linear-gradient(to right, #292E49, #536976) ;  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #292E49, #536976) ; /* W3C, I*/ 
">
<div style="height:10px; background:#27aae1;"></div>
<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			

			<a class="navbar-brand" href="blog.php">
				<img src="logo.png" width="80" height="30">
			</a>
		</div>
	</div>
</div>
<div style="height:10px; background:#27aae1; position: absolute;top:90%;"></div>
	<div class="row "> 
	
		<div class="col-sm-offset-4 col-md-4" style="background-color: #ffff;">
			<h1>Login </h1>
			<div class="alert alert-danger">
				<?php echo "$errmsg"; ?><?php echo "$wrongpass"; ?><?php echo "$unsuccess"; ?>
			</div>
			<div class="forms">
				<fieldset>
					<form action="Login.php" method="POST" enctype="multipart/form-data">
						
						<div class="form-group">
							<label for="title"><span class="form_tags"> Email:</span></label>
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-user text-primary"></span>
								</span>
							
							<input class="form-control" type="text" name="Email" id="Email" placeholder="Enter email id">
						</div>
						</div>
						<div class="form-group">
							<label for="Category"><span class="form_tags"> Password:</span></label>
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock text-primary"></span>
								</span>
							<input class="form-control" type="password" name="Password" id="Password" placeholder="Enter your password">
						</div>
							</div>
						
						

							<input class="btn btn-success btn-block" type="Submit" name="Submit" value="Login" style="margin-top:2%; margin-bottom: 2%;">

						
					
					</form>
				</fieldset>
			</div>
			
		</div>

		
	</div>
	
</div>


</body>
</html>