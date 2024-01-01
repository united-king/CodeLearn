<?php
include 'database.php';

include 'insert.php';

session_start();

error_reporting(0);


if(isset($_POST['submit'])){
    $email=$_POST['Email'];
    $password=md5($_POST['User_Password']);
    


    $sql="SELECT * FROM `CodeLearn` WHERE Email='$email' AND User_Password='$password' ";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['Username']= $row['Username'];{ 
           header("Location: index.html");
        }
    }else{
        echo "<script>alert('Wrong Input! Try Again.')</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="images/icon/favicon.png">
	<title>Login SignUp</title>
	<link rel="stylesheet" type="text/css" href="loginStyle.css">

</head>
<body>
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" id="log" onclick="login()" style="color: #fff;">Log In</button>
				<button type="button" class="toggle-btn" id="reg" onclick="register()">Register</button>
			</div>
			<div class="social-icons">
				<img src="images/icon/fb2.png">
				<img src="images/icon/insta2.png">
				<img src="images/icon/tt2.png">
			</div>
			
			<!-- Login Form -->
			<form id="login" class="input-group" action="" method="POST" >
				<div class="inp">
					<img src="images/icon/user.png"><input type="email" id="email" name="Email" class="input-field" placeholder="Email" value="<?php echo $email; ?>" style="width: 88%; border:none;" required="required">
				</div>
				<div class="inp">
					<img src="images/icon/password.png"><input type="password" id="password" name="User_Password" class="input-field" placeholder="Password" value="<?php echo $password; ?>" style="width: 88%; border: none;" required="required">
				</div>
				<!-- <input type="checkbox" class="check-box">Remember Password -->
				<button type="submit" name="submit" class="submit-btn">Log In</button>
                <p class="login-register-text">Don't have an account?<a href="register.php">Register Here</a></p>
			</form>


			<div class="other" id="other">
				<div class="instead">
					<h3>or</h3>
				</div>
				<button class="connect" onclick="google()">
					<img src="images/icon/google.png"><span>Sign in with Google</span>
				</button>
			</div>
			
			<!-- Registration Form -->
			<!-- <form id="register" class="input-group">
				<input type="text" class="input-field" id='full_name' placeholder="Full Name" required="required">
				<input type="email" class="input-field" placeholder="Email Address" required="required">
				<input type="password" class="input-field" placeholder="Create Password" name="psame" required="required">
				<input type="password" class="input-field" placeholder="Confirm Password" name="psame" required="required">
				<input type="checkbox" class="check-box" id="chkAgree" onclick="goFurther()">I agree to the Terms & Conditions
				<button type="submit" id="btnSubmit" class="submit-btn reg-btn">Register</button>
			</form> -->

		</div>
		<script type="text/javascript" src="script.js"></script>
</body>
</html>