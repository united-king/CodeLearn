<?php
include 'database.php';

include 'insert.php';
error_reporting(0);
   
if(isset($_POST['submit'])){
   $username=$_POST['Username'];
   $email=$_POST['Email'];
   $password=md5($_POST['User_Password']);
   $cpassword=md5($_POST['Confirm_User_Password']);
    

   if($password == $cpassword){
        $sql="SELECT * FROM `CodeLearn` WHERE Email='$email' AND User_Password='$password'";
        $result= mysqli_query($conn,$sql);
        if(!$result->num_rows>0){
            $sql="INSERT INTO `CodeLearn`(Username,Email,User_Password)
            VALUES ('$username','$email','$password')";
     $result=mysqli_query($conn,$sql);
     if($result){
         echo "<script>alert('User Registration Successful!')</script>";
         $username="";
         $email="";
          
         $_POST['User_Password']="";
         $_POST['Confirm_User_Password']="";
     } else {
         echo "<script>alert('Something Went Wrong!')</script>";
     }
    }else{
        echo "<script>alert('Email Already Exists.')</script>";
    }
    }else{
       echo "<script>alert('Password Does not Match')</script>";
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
		<div>
			<div>
				<div id="btn"></div>
				<button type="button" class="toggle-btn" id="log" onclick="login()" style="color: #fff;">Log In</button>
				<!-- <button type="button" class="toggle-btn" id="reg" onclick="register()">Register</button> -->
                <button type="button" class="toggle-btn" id="reg" action="index.php">Register</button>
			</div>
			<div class="social-icons">
				<img src="images/icon/fb2.png">
				<img src="images/icon/insta2.png">
				<img src="images/icon/tt2.png">
			</div>
			<!-- Registration Form -->
			<form id="register" class="input-group" action="" method="POST">
				<input type="text" class="input-field" id='full_name' name="Username" value="<?php echo $username; ?>" required="required">
				<input type="email" class="input-field" placeholder="Email Address" name="Email" value="<?php echo $email; ?>" >
				<input type="password" class="input-field" placeholder="Create Password" name="User_Password" value="<?php echo $_POST['User_Password']; ?>" >
				<input type="password" class="input-field" placeholder="Confirm Password" name="Confirm_User_Password" value="<?php echo $_POST['Confirm_User_Password']; ?>" >
				<!-- <input type="checkbox" class="check-box" id="chkAgree" onclick="goFurther()">I agree to the Terms & Conditions -->
				<button type="submit" id="btnSubmit" name="submit" class="submit-btn reg-btn">Register</button>
			</form>
		</div>
		<script type="text/javascript" src="script.js"></script>
</body>
</html>