<?php $connection=mysqli_connect("localhost","root","","hf");?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Signup form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      * {
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  background: #333;
  font: 100%/1 "Helvetica Neue", Arial, sans-serif;
}

.login {
  position: absolute;
  top: 40%;
  left: 40%;

  margin: -10rem 0 0 -10rem;
  /*width: 25rem;
  height: 25rem;*/
  min-height: 60%;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  overflow: hidden;
}
.login:hover > .login-header, .login.focused > .login-header {
  width: 2rem;
}
.login:hover > .login-header > .text, .login.focused > .login-header > .text {
  font-size: 1rem;
  transform: rotate(-90deg);
}
.login.loading > .login-header {
  width: 20rem;
}
.login.loading > .login-header > .text {
  display: none;
}
.login.loading > .login-header > .loader {
  display: block;
}

.login-header {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 1;
  width: 32rem;
  height: 30rem;
  background: orange;
  transition: width 0.5s ease-in-out;
}
.login-header > .text {
  display: block;
  width: 100%;
  height: 100%;
  font-size: 5rem;
  text-align: center;
  line-height: 30rem;
  color: #fff;
  transition: all 0.5s ease-in-out;
}
.login-header > .loader {
  display: none;
  position: absolute;
  left: 5rem;
  top: 5rem;
  width: 10rem;
  height: 10rem;
  border: 2px solid #fff;
  border-radius: 50%;
  animation: loading 2s linear infinite;
}
.login-header > .loader:after {
  content: "";
  position: absolute;
  left: 4.5rem;
  top: -0.5rem;
  width: 1rem;
  height: 1rem;
  background: #fff;
  border-radius: 50%;
  border-right: 2px solid orange;
}
.login-header > .loader:before {
  content: "";
  position: absolute;
  left: 4rem;
  top: -0.5rem;
  width: 0;
  height: 0;
  border-right: 1rem solid #fff;
  border-top: 0.5rem solid transparent;
  border-bottom: 0.5rem solid transparent;
}

@keyframes loading {
  50% {
    opacity: 0.5;
  }
  100% {
    transform: rotate(360deg);
  }
}
.login-form {
  margin: 0 0 0 2rem;
  padding: 0.5rem;
}

.login-input {
  display: block;
  width: 100%;
  font-size: 2rem;
  padding: 0.5rem 1rem;
  box-shadow: none;
  border-color: #ccc;
  border-width: 0 0 2px 0;
}
.login-input + .login-input {
  margin: 10px 0 0;
}
.login-input:focus {
  outline: none;
  border-bottom-color: orange;
}

.login-btn {
  position: absolute;
  right: 1rem;
  bottom: 1rem;
  width: 5rem;
  height: 5rem;
  border: none;
  background: orange;
  border-radius: 50%;
  font-size: 0;
  border: 0.6rem solid transparent;
  transition: all 0.3s ease-in-out;
}
.login-btn:after {
  content: "";
  position: absolute;
  left: 1rem;
  top: 0.8rem;
  width: 0;
  height: 0;
  border-left: 2.4rem solid #fff;
  border-top: 1.2rem solid transparent;
  border-bottom: 1.2rem solid transparent;
  transition: border 0.3s ease-in-out 0s;
}
.login-btn:hover, .login-btn:focus, .login-btn:active {
  background: #fff;
  border-color: orange;
  outline: none;
}
.login-btn:hover:after, .login-btn:focus:after, .login-btn:active:after {
  border-left-color: orange;
}

    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
 <div class="container">
<div class="login">
  <header class="login-header"><span class="text">update </span><span class="loader"></span></header>
  <form action="signup.php" method="post" class="login-form">
    <input class="login-input" name="f_name" type="text" placeholder="First Name" required/>
    <input class="login-input" name="l_name" type="text" placeholder="Last Name" required/>
    <input class="login-input" name="email" type="email" placeholder="Email ID" required/>
    <input class="login-input" name="username" type="text" placeholder="Username" required/>
    <input class="login-input" name="password" type="password" placeholder="Password" required/>
    <button class="login-btn" name="add" type="submit">Update</button>
  </form>
</div>
</div> 
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    

</body>
</html>
<?php 
	if(isset($_POST['add']))
	{
		$f_name=$_POST['f_name'];
		$l_name=$_POST['l_name'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query="SELECT * FROM `users` WHERE `username` LIKE '$username' OR `email` LIKE '$email'";
		$run_query=mysqli_query($connection,$query);
		if($run_query->num_rows==0)
		{
			$insert_query="INSERT INTO `users`(f_name,l_name,username,email,password) values('$f_name','$l_name','$username','$email','$password') ";
			$run_insert_query=mysqli_query($connection,$insert_query);
			if($run_insert_query)
			{
				echo "<script>alert('Your Data Was Successfully saved');</script>";
			}
			else
			{
				echo "<script>alert('connection to database failed');</script>";
			}
		}
		else
		{
			echo "<script>alert('Username or Email ID is already occupied');</script>";
		}
	}
?>
