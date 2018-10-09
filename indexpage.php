<?php require_once("db.php"); ?>
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
<body style="background: -webkit-linear-gradient(to right, #292E49, #536976);">

	<div class="row "> 
		<div class="col-md-2" >
			<ul id="SideBar" class="nav nav-pills nav-stacked ">
			
				<li class="active"><a href=""><span class="glyphicon glyphicon-th"></span>&nbsp;Dashboard</a></li>
				<li><a href="Addpost.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Add Post</a></li>
				<li><a href="Categories.php"><span class="glyphicon glyphicon-tags"></span>&nbsp;Categories</a></li>
				<li><a href="manageadmins.php"><span class="glyphicon glyphicon-tags"></span>&nbsp;Manage Admins</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-comment"></span>&nbsp;Comments</a></li>
				
			</ul>
			
		</div>
		<div class="col-md-10" style="background-color: #ffff;">
			
			<h1>Admin Dashboard</h1>
	<div class="table-responsive">
		<table class=" table table-striped table-hover">
			<tr>
				<th>No.</th>
				<th>Post Title</th>
				<th>Date & Time</th>
				<th>Author</th>
				<th>Category</th>
				<th>Banner</th>
				<th>Comments</th>
				<th>Actions</th>
				<th>Details</th>
			</tr>
		<?php 
          $query="SELECT * FROM admin_panel ORDER BY datetimes desc";
          $exec=mysqli_query($Connection,$query);
          $Srno=0; 
          while($datarows=mysqli_fetch_assoc($exec)) {
          	    $PostId=$datarows['id'];
      			$DateTime=$datarows['datetimes'];
      			$Title=$datarows['title'];
      			$Category=$datarows['category'];
      			$Admin=$datarows['author'];
      			$image=$datarows['image'];
      			$Post=$datarows['post'];
      			$Srno++;
          
		 ?>
		 <tr>
		 	<td><<?php echo $Srno; ?></td>
		 	<td><?php echo $Title; ?></td>
		 	<td><?php  echo $DateTime;?></td>
		 	<td><?php echo $Admin; ?></td>
		 	<td><<?php echo $Category;?></td>
		 	<td><img width=50 height=50 src="Uploads/<?php echo $image;?>"></td>
		 	<td>Processing</td>
		 	<td><button class="btn btn-primary">Edit</button> </td>
		 	<td><button class="btn btn-success">Live Blog</button></td>

	 </tr>
<?php } ?>
		</table>
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