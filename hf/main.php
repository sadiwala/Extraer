<?php session_start();?>
<?php $name_file="oops";?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>
			Extraer
		</title>
		<link rel="shortcut icon" href="logom.png" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<link rel="stylesheet" href="css/hf.css">
		<link rel="stylesheet" type="text/css" href="css/dropzone.css" />
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<script type="text/javascript" src="js/dropzone.js"></script>
	<script src="wow.js"></script>
	<style>
		body { 
  /*background-image: url(taxi.jpg) ;*/
  background: #05c1bc; 
     }
	</style>
		   <script>
		       new WOW().init();
		    </script>
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<link rel="stylesheet" href="css/forsubmit.css">

	</head>

	<body>
		<div class="row">
			<div class="col-xs-4">
				
				<div class="row">
					<div class="col-md-7">
						<section >
					<nav class="cl-effect-8">
					<a href="aboutus.php"><span data-hover="AboutUs">About Us</span></a>
							
				</nav>
				</section>
				</div>
				
				<div class="col-md-5">
						<section >
					<nav class="cl-effect-8">
					
					<a href="contact.php"><span data-hover="Contact">Contact</span></a>		
				</nav>
				</section>
				</div>

				</div>

			</div>
			<div class="col-xs-2"></div>
			<div class="col-xs-2"></div>
			
			<div class="col-xs-4">
				<div class="row">
					<div class="col-md-6">
						<?php
							if(!isset($_SESSION['id']))
							{
						?>
						<section >
					<nav class="cl-effect-8">
					<a href="signup.php"><span data-hover="SignUp">Sign Up</span></a>
							
				</nav>
				</section>
				<?php } else{ ?>
				<section >
					<nav class="cl-effect-8">
					<a href="user.php"><span data-hover="Profile">Profile</span></a>
							
				</nav>
				</section>
				<?php } ?>
				</div>
				 
				<div class="col-md-6">
						<section >
					<nav class="cl-effect-8">
					
					
					<?php
						if(isset($_SESSION['id']))
						{
							echo '<a href="logout.php"><span data-hover="logout">';
							echo "Logout";
						}
						else
						{
							echo '<a href="login.php"><span data-hover="login">';
							echo "Login";
						}
					?>
				</span></a>		
				</nav>
				</section>
				</div>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6" style="text-align:center;">
				<br>
				<br><br>
				<img src="logom.png" alt="Extraer">
			</div>
			<div class="col-sm-3">
				
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6" style="text-align:center;">
				<br />
				<br />
				<br />
				<br />
				<div class="image_upload_div">
				    <form action="xyz.php" class="dropzone">
				    
				    </form>
				</div>
			</div>
			<br>
			<br><br><br>
			<div class="col-sm-3">
			
			<form method="post" >
				<button class="btn  orange-circle-button" href="" name="xxx" type="submit">Translate<br /><span class="orange-circle-greater-than"></span></button>
				
			</form>
		</div>
		
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<br />
				<p align="center" id="yeah">
				    		
				    		<?php
	if(isset($_POST['xxx']))
	{
		exec('python filename variable');
		print_r($_FILES);
		echo "<img src='uploads/".$_FILES['file']['name']."' height=200px /><br>";
		echo "oops";
	 } ?>
	<?php
		$name_file="oops";
	?>
				    	</p>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<?php
if(!empty($_FILES)){
    
    //database configuration
    print_r("adv");
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'hf';
    //connect with the database
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if($mysqli->connect_errno){
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    $targetDir = "uploads/";
    $fileName = $_FILES['file']['name'];
    $name_file=$fileName;
    $targetFile = $targetDir.$fileName;
    if(isset($_SESSION['id']))
    {
    	$user_id=$_SESSION['id'];
    }
    else
    {
    	$user_id=0;
    }
    if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
        //insert file information into db table
        $conn->query("INSERT INTO files (file_name, user_id, uploaded) VALUES('".$fileName."','".$user_id."','".date("Y-m-d H:i:s")."')");
        
    }
    
}
?>

	</body>
</html>

