<?php
//https://www.sitepoint.com/community/t/using-session-variables-to-keep-user-logged-in-if-they-havent-logged-out/294407
ob_start();
session_start();
include 'db.php';
if(isset($_POST['submit'])){
	$username = $_POST['username1'];
	$password = $_POST['password'];
	
	if($username =='' || $password == ''){
	echo '<p class="errorMsg">All the fields are required</p>'; 
	}else{
		$sql = mysqli_query($dbcon,"SELECT * FROM userdetails WHERE username = '$username' AND password = '$password'");

        if(mysqli_num_rows($sql) == 1) {
	 $member = mysqli_fetch_assoc($sql);
		
			$_SESSION['username'] = $username;
			$_SESSION['contact_id'] = $member['contact_id'];
			
			header('Location: dashboard.php?d=dashboard'); 
		
}else{
	echo '<p class="loginerror">Invalid username or password</p>';
  // echo '<script>
  //       alert("Invalid username or password");
  //       </script>';
}
	
	}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
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
    <section class="banner" >
        <div class="form-box">
            <div class="btn-box">
            <div class="btn">
                <h1 class="lbl">LOGIN</h1>
            </div>
            </div>
            <p class="p">Not a member yet? <span class="reg"><a href="registration.php" id="reg">Register</a></span></p>
            <form class="loginbox" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                
                <input class="inp" type="text" name="username1" id="" placeholder="Enter your User Name" required style="border-radius:11px; margin-top: 240px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <input class="inp" type="password" name="password" id="" placeholder="Enter your Password" required style="border-radius:11px; margin-top: 350px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <button class="sub-btn" type="submit" name="submit" style="background-color: rgba(240, 248, 255, 0.547); margin-top: 500px; margin-left: 160px; font-size: 30px;" onMouseOver="this.style.background='rgba(0, 136, 255, 0.748)'"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">SUBMIT</button>
            </form>
        </div>
    </section>
</body>
</html>