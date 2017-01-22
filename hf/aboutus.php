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
	<link href="wow.css" rel="stylesheet">

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
			font-size: 40px;
			text-align: center;
			padding: 5%;
		}
		
			 #header{
				
				background-color: #05c1bc;
				height:370px;
				
			}

			.main{
			font-family: 'Roboto Slab', serif;
			font-size: 25px;
			text-align: center;
			padding: 5%;
			text-align: justify;
		
		}

		

		</style>
	</head>
<body>
<div class="row" id="header" >
		<div class="col-xs-3 wow fadeInUp">
			<section >
					<nav class="cl-effect-8">
					<?php if(isset($_SESSION['id'])){ ?>
					<a href="user.php"><span data-hover="Profile"><p  style="font-family: 'Quicksand', sans-serif;
	color: white;">Profile</p></span></a>
					<?php } else { ?>
							<a href="main.php"><span data-hover="Translate"><p  style="font-family: 'Quicksand', sans-serif;
	color: white;">Translate</p></span></a>
						<?php }?>
				</nav>
				</section>
		</div>
		<div class="col-xs-3">
		</div>
		<div class="col-xs-3">
		</div>
		<div class="col-xs-3 wow fadeInUp" style="text-align:right;">
			<section >
					<nav class="cl-effect-8">
					<?php if(isset($_SESSION['id'])){ ?>
					<a href="logout.php"><span data-hover="Logout"><p style="font-family: 'Quicksand', sans-serif;
	color: white;">Logout</p></span></a>
					<?php } else { ?>
							<a href="login.php"><span data-hover="Login"><p style="font-family: 'Quicksand', sans-serif;
	color: white;">Login</p></span></a>
	<?php } ?>
				</nav>
				</section>
		</div> 

		<div class="row wow fadeInDown">
			<div class="col-sm-3"></div>
			<div class="col-sm-6" style="text-align:center;">
				<img src="logom.png" alt="Extraer">
			</div>
			<div class="col-sm-3"></div>
		</div>

	</div>
	<br />
	<br /><br />
	<p class="heading">Project</p>

	<p class="main">
		Extraer focuses on onsite live language translation. Capture photos and write phrases or sentences, input them and the app will translate them into whichever language module you choose. From there the Signed Up regular users can also keep a record of their previous translation to look into later. If you find yourself in trouble over reading posters, banners written in different languages, you can take snap of it and get the translated form as your wish. The app will put all language just a click away from you. Click it, CONVERzE it.<br>
Extraer is a language translator web tool – it is designed to gives the user feature to capture and translate; The 'Camera input' functionality allows users to take a photograph of a document, signboard, etc. The app works by extracting text from the captured image and gives the translation in the language module selected. It comprises the usage of the Google Translate API over the extracted text by implementing a statistical machine translation engine through it. Also, a feature is provided with direct text input in order to translate to a base language (English).<br>
[Key Technologies and Methods]:<br>
Image Processing, OCR , Canny Edge Detection , Tesseract OCR , opencv-Python Library.<br>
The major stages in the pipeline:<br>
1] Capture and upload Image. 	<br>
2] Preprocessing <br>
3]Text Extraction <br>
4]Text Recognition <br>
5]Translation <br>

	</p>

		<p class="heading">Demo</p>

		<p class="heading">Step 1: <br></p>
		<div class="row">
			<div class="col-md-4">
				<p class="main"> Capture Image. <br></p>
			</div>
			<div class="col-md-8">
				<img src="screenshot.png">
			</div>
		</div>
		<p class="heading">Step 2: <br></p>
		<p class="main">Upload Image.</p>
		<p class="heading">Step 3: <br></p>
		<p class="main">Wait To Process.</p>
		<p class="heading">Step 4: <br></p>
		<p class="main">TADA!</p>



</body>

</html>