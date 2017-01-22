<?php session_start();?>
<?php
	if(!isset($_SESSION['id']))
	{
		echo '<script> location.replace("login.php"); </script>';
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>
			Extraer
		</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<link rel="stylesheet" href="css/hf.css">
			<link href='https://fonts.googleapis.com/css?family=Dancing+Script:700,400' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Quicksand:700,400' rel='stylesheet' type='text/css'>
	<script src="wow.js"></script>
		   <script>
		       new WOW().init();
		    </script>
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/demo1.css" />
		<link rel="stylesheet" type="text/css" href="css/common.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
		<script src="js/modernizr.custom.js"></script>
		<style>
			 #header{
				
				background-color: #05c1bc;
				height:370px;
				
			}
		</style>
	</head>
<body>
	
		<div class="row" id="header" >
		<div class="col-xs-3">
			<section >
					<nav class="cl-effect-8">
					<a href="aboutus.php"><span data-hover="Logout"><p style="font-family: 'Quicksand', sans-serif;
	color: white;">Project</p></span></a>
							
				</nav>
				</section>
		</div>
		<div class="col-xs-3">
		</div>
		<div class="col-xs-3">
		</div>
		<div class="col-xs-3" style="text-align:right;">
			<section >
					<nav class="cl-effect-8">
					<a href="logout.php"><span data-hover="Logout"><p style="font-family: 'Quicksand', sans-serif;
	color: white;">Logout</p></span></a>
							
				</nav>
				</section>
		</div> 

		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6" style="text-align:center;">
				<img src="logom.png" alt="Extraer">
			</div>
			<div class="col-sm-3"></div>
		</div>

	</div>
	<div class="row">
		<div class="col-md-4" align="center">
			<br />
			<br />
			<ul class="ch-grid">
					<li>
						<a href="main.php"><div class="ch-item ch-img-3">
							<div class="ch-info">
								<br />
								<h1>Translate</h1>
								
							</div>
						</div></a>
					</li>
				</ul>
		</div>
		<div class="col-md-4" align="center">
			<br />
			<br />
			<ul class="ch-grid">
					<li>
						<a href="#"><div class="ch-item ch-img-1">
							<div class="ch-info">
								<br />
								<h1>Home</h1>
								
							</div>
						</div></a>
					</li>
				</ul>
		</div>
		<div class="col-md-4" align="center">
			<br />
			<br />
			<ul class="ch-grid">
					<li>
						<a href="records.php"><div class="ch-item ch-img-2">
							<div class="ch-info">
								<br />
								<h1>Previous Records</h1>
							</div>
						</div></a>
					</li>
				</ul>
		</div>
		
	</div>
	
</body>
</html>