<?php  require_once("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>BlogPage</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="boot1.css">
<link href="https://fonts.googleapis.com/css?family=Anton|Ubuntu+Condensed" rel="stylesheet">
</head>
<style type="text/css">
	#headings{
    font-family: 'Anton', sans-serif;

	color: #77aaff;
	font-weight:900;

}
#headings:hover{
	color: #ff5566;
}
.blogpost{
	padding-top: 2%;
	border: 1px solid;
}
.description{
	font-family: 'Ubuntu Condensed', sans-serif;
}
.post{
	font-family: 'Ubuntu Condensed', sans-serif;
	color: #000044;
}
.navbar-nav{
	font-family: 'Anton', sans-serif;
}
</style>
<body style="
background: -webkit-linear-gradient(to right, #292E49, #536976) ;  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #292E49, #536976) ; /* W3C, I*/">
<div style="height:10px; background:#27aae1;"></div>
<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
				<span class="sr-only">Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" href="blog.php">
				<img src="logo.png" width="30" height="30">
			</a>
		</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="#">Home</a></li>
				<li class="active"><a href="#">Blog</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Features</a></li>
				<li><a href="#">Services</a></li>
				<li><a href="#">Contact Us</a></li>	
			</ul>
			<form action="blog.php" class="navbar-form" method="GET">
				<div class="form-group">
					<input type="text" name="Search" class="form-control" placeholder="search">
				</div>
				<input type="submit" name="SearchButton" class="btn btn-primary" value="Go">
			</form>
		</div>
		
	</div>
</div>
<div  class="navborder"style="height:10px; background:#27aae1;"></div>
<div class="container">
	<div class="blog-header"><h2 style="color: white;">BLOGS</h2></div>
	
	<div class="row">
		<div class="col-sm-8 " style="background-color: white;">
			<?php
			if (isset($_GET['SearchButton'])) {
				
				$search=$_GET['Search'];
				
 				$query= "SELECT * FROM admin_panel WHERE datetimes LIKE '%$search%' OR category LIKE '%$search%' 
 				OR title LIKE '%$search%' ";

			}
			else{
			 $query="SELECT * FROM admin_panel ORDER BY datetimes desc";}
			 $exe=mysqli_query($Connection,$query);
			 while($datarows=mysqli_fetch_array($exe))
			 {
      			$PostId=$datarows['id'];
      			$DateTime=$datarows['datetimes'];
      			$Title=$datarows['title'];
      			$Category=$datarows['category'];
      			$Admin=$datarows['author'];
      			$image=$datarows['image'];
      			$Post=$datarows['post'];
			?>
         <div class="blogpost thumbnail">
         	<img class="img-responsive img-rounded"src="Uploads/<?php echo $image; ?>" width= 720 height=400 >
         	<div id="headings" class="caption"><h1><?php echo htmlentities($Title); ?></h1></div>
         	<div class="description">Category:<?php echo htmlentities($Category); ?> </div>
         	<div class="date">Published on:<?php echo htmlentities($DateTime); ?></div>
         	<div class="post"><?php 
         	if(strlen($Post)>120){
         		$Post= substr($Post,0,120).'....';
         	}
         	echo ($Post); ?></div>
         	  <div><a href="FullPost.php?id=<?php echo $PostId; ?>"><span class="btn btn-info">Read more>></span></a>
         	  
         	  	
         	   </div>
         </div>


     <?php } ?>
		</div>
		<div class="col-sm-offset-1 col-sm-3">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.l</p>
		</div>
	</div>
</div>


</body>
</html>