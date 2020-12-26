
<?php
/*
include "config/config.php";


if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){
		
        $sql_query = "select * from staff where email='$uname' and password='$password'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        if(mysqli_num_rows($result) >0){
			$_SESSION=array();
			$_SESSION['object'] = $row['Object'];
			$_SESSION['idst'] = $row['IDstall'];
			$_SESSION['uname'] = $row['email'];
            header('Location: homepage.php');
        }else{
            echo "Invalid email and password";
        }

	} else echo "Email and password must be not empty";
	
}
*/
?> 
<!DOCTYPE html>
<html>
<head>
	<title>SignUp and Login</title>
	<link rel="stylesheet" type="text/css" href="css/signin.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<div class="container" id="container">
<div class="form-container sign-up-container">
<!--
<form action="home.php">
	<h1>Create Account</h1>
	
	<span>or use your email for registration</span>
	<input type="text" name="name" placeholder="Name">
	<input type="email" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<button id="signup" onclick="SingUp()">SignUp</button>
</form>
-->
</div>

<div class="form-container sign-in-container">
	<form action="" method="post">
		<h1>Sign In</h1>
		
	<span>use your account</span>
	<input class="input" id="txt_uname" name="txt_uname" type="email"  placeholder="Email">
	<input class="input" id="txt_uname" name="txt_pwd" type="password"  placeholder="Password">
	<a href="#">Email: buihuudang2000@gmail.com    Password: 123456</a>
	<input type="submit" value="Sign In" name="but_submit" id="but_submit" class="but_submit"/>
	</form>
</div>

<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Welcome Back!</h1>
			<p>To keep connected with us please login with your personal info</p>
			<button class="ghost"  id="signIn">Sign In</button>
		</div>
		<div class="overlay-panel overlay-right">
			
			<h1>Hello, Friend!</h1>
			<p>Enter your details to access Hype!Club</p>
			<!--<button class="ghost" id="signUp">Sign Up</button>-->
		</div>
	</div>
</div>
</div>

<script type="text/javascript" src="js/signinup.js"></script>

</body>
</html>