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
<!-- <!DOCTYPE html>
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
			 Registration Form 
			<form id="register" class="input-group" action="" method="POST">
				<input type="text" class="input-field" id='full_name' name="Username" value="<?php echo $username; ?> placeholder="Full Name" required="required">
				<input type="email" class="input-field" placeholder="Email Address" name="Email" value=<?php echo $email; ?> required="required">
				<input type="password" class="input-field" placeholder="Create Password" name="User_Password" value=<?php echo $_POST['User_Password']; ?> required="required">
				<input type="password" class="input-field" placeholder="Confirm Password" name="Confirm_User_Password" value=<?php echo $_POST['Confirm_User_Password']; ?> required="required">
				<input type="checkbox" class="check-box" id="chkAgree" onclick="goFurther()">I agree to the Terms & Conditions
				<button type="submit" id="btnSubmit" name="submit" class="submit-btn reg-btn">Register</button>
			</form>
		</div>
		<script type="text/javascript" src="script.js"></script>
</body>
</html>-->





<html>
<head>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            body{
                background: url("4.jpg");
                background-position:center;
            }
            div.container{
            
            margin: 80px;
            margin-left: 450px;
            }
            p{
            text-align: center;
            padding: 20px;
            font-family: sans-serif;
            }
            div.register{
            padding-left: 20px;
            padding-bottom: 10px;
            background-color: rgba(0,0,0,0.5);
            width: 400px;
            font-size: 20px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.3);
            box-shadow: 2px 2px 15px
            rgba(0,0,0,0.3);
            color: #fff;
            }
            #ip{
            height: 25px;
        }
        .input-group{
            width: 200px;
        }
        #ip2{
            width: 173px;
            height: 25px;
        }
        .input-group{
            color:cornsilk;
        }


        </style>
    </head>
    <body>
        <div class="container">
            <div class="register">
            <form class="login-email" action="" method="POST">
                <p class="login-text">Register</p>
                <div class="input-group">
                <label style="font-size: 15px;">Username</label>
                    <input id="ip" type="text"  name="Username" value="<?php echo $username; ?>" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Email</label>
                    <input id="ip" type="email"  name="Email" value="<?php echo $email; ?>" required>
                </div>

                

                <div class="input-group">
                <label style="font-size: 15px;">Password</label>
                    <input id="ip" type="password" name="User_Password" value="<?php echo $_POST['User_Password']; ?>" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Confirm Password</label>
                    <input id="ip" type="password"  name="Confirm_User_Password" value="<?php echo $_POST['Confirm_User_Password'] ?>" required>
                </div>
                <div class="input-group">
                    <button style="color: darkorchid;" name="submit" class="btn">Register</button>
                </div>    
                <p class="login-register-text">Already have an account?<a href="index.php">Login Here</a></p>
            </form>
            </div>
        </div>
    </body>
</html>