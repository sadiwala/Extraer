<?php session_start();?>
<?php
	if(!isset($_SESSION['id']))
	{
		echo '<script> location.replace("login.php"); </script>';
	}
?>
<?php $connection=mysqli_connect("localhost","root","","hf");?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>
			Extraer
		</title>
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
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
		.heading{
			font-family: 'Roboto Slab', serif;
			font-size: 18px;
		}
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
					<a href="user.php"><span data-hover="Profile"><p style="font-family: 'Quicksand', sans-serif;
	color: white;">Profile</p></span></a>
							
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
	
<br />
<br><br><br>
	<div class="w3-container" >
 
	<p style="font-size:30px; padding-left:43%;">Previous Records </p>
  <table class="w3-table-all w3-hoverable" style="text-align:center;">
    <thead>
      <tr class="w3-light-grey" >
        <th><p class="heading">Date</p></th>
        <th><p class="heading">Picture</p></th>
        <th><p class="heading">Text</p></th>
        
      </tr>
    </thead>
    <?php
    	$id=$_SESSION['id'];
    	$query="SELECT * FROM `files` WHERE user_id LIKE '$id'";
    	$run_query=mysqli_query($connection,$query);
    	foreach ($run_query as $ans) {
    		echo "<tr>
      <td>".$ans['uploaded']."</td>
      <td><img src='uploads/".$ans['file_name']."' height=100px width=100px></td>
      
      
      <td>".$ans['ans']."</td>
    </tr>";
    	}
    ?>
  </table>
</div>
	
</body>
</html>