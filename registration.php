<?php
require_once 'db.php';
if(isset($_POST['submit'])){
	$name1 = $_POST['fname'];
    $chk_nm = !preg_match("/^[a-z A-Z]*$/",$_POST['fname']);
    $chk_unm = !preg_match("/^[a-z A-Z]*$/",$_POST['usrname']);
	$username = $_POST['usrname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword =$_POST['cpassword'];
	if($chk_nm || $chk_unm){
		echo '<p class="errorMsg">Enter valid names</p>';
	} else if( $password != $cpassword){
		echo '<p class="errorMsg" style= "text-align: center;">Passwords do not match..</p>';
	}else{
		$sql = mysqli_query($dbcon,"SELECT * FROM userdetails WHERE username = '$username' ");

       	if(mysqli_num_rows($sql)==1){
			echo 'username already exists';
	
		} else{
			$sql = "INSERT INTO userdetails(name, username, email, password) VALUES ('$name1','$username','$email', '$password')";
			$result= mysqli_query($dbcon,$sql);
			if($result){
				echo '<p class="regsucces">Record added successfully</p>';
                header('Location: index.php?d=index'); 
		}else  {
				echo '<p class="errorMsg">There was error while adding record</p>';  
			}
		}
	}
    // Attempt create table query execution
$sql = "CREATE TABLE $username(
    contact_id INT(11)  PRIMARY KEY AUTO_INCREMENT,
    contact_name VARCHAR(255) ,
    designation VARCHAR(255) ,
    phone VARCHAR(255) ,
    address VARCHAR(255) 
)";
if(mysqli_query($dbcon, $sql)){
    // echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbcon);
}
 
// Close connection
mysqli_close($dbcon);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="css/signup.css">
    <title>Sign Up</title>
</head>
<body >
<header class="text-gray-600 body-font" style="background-color:#8d898954 ; ">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0 "style="margin-left:600px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
              <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">PhoneBook</span>
          </a>
          <!-- <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900" href="dashboard.php">Home</a>
            <a class="mr-5 hover:text-gray-900"href="add_user.php">Add New</a>
            <div class="dropdown">
                <a class="mr-5 hover:text-gray-900">Profile</a>
                  <div class="dropdown-content">
                    <a href="viewProfile.php">View Profile</a>
                    <a href="deleteProfile.php">Delete Profile</a>
                    <a href="changePassword.php">Change Password</a>
                    <a href="logout.php">Logout</a>
                  </div>
            </div>
            <a class="mr-5 hover:text-gray-900"href="#"><?php echo '<p class="loged">Logged in as <span>' .$_SESSION['username']. '</span></p>';?></a>  
          </nav> -->
        </div>
    </header>
    <section class="banner">
        <div class="form-box">
            <div class="btn-box">
            <div class="btn">
                <h1 class="lbl">SIGN UP</h1>
            </div>
            </div>
            <p class="p acount">Already have an account? please <span class="reg"><a href="index.php" id="reg">Login</a></span></p>
            <form class="registbox" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                
				<input class="inp labelname" type="text" name="fname" id="" placeholder="Enter your Name" required style="border-radius:11px; margin-top: 170px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
				<input class="inp labelname" type="text" name="usrname" id="" placeholder="Enter your User Name" required style="border-radius:11px; margin-top: 250px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
				<input class="inp labelname" type="email" name="email" id="" placeholder="Enter your Email" style="border-radius:11px; margin-top: 330px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
				<input class="inp labelname" type="password" name="password" id="" placeholder="Enter your Password" required style="border-radius:11px; margin-top: 410px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
				<input class="inp labelname" type="password" name="cpassword" id="" placeholder="Confirm Password" required style="border-radius:11px; margin-top: 490px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <button class="sub-btn" name="submit" type="submit" style="background-color: rgba(240, 248, 255, 0.547); margin-top: 570px; margin-left: 160px; font-size: 30px;" onMouseOver="this.style.background='rgba(0, 136, 255, 0.748)'"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">REGISTER</button>
            </form>

        </div>
    </section>
</body>
</html>