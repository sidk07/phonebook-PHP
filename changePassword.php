<?php
//https://www.sitepoint.com/community/t/using-session-variables-to-keep-user-logged-in-if-they-havent-logged-out/294407
ob_start();
session_start();
$table_nm = $_SESSION['username'];
include 'db.php';
if(isset($_POST['passchange'])){
	$oldpass = $_POST['oldpass'];
	 $newpass = $_POST['newpass'];
	 $cnewpass = $_POST['cnewpass'];
	
	if($oldpass =='' || $newpass == ''|| $cnewpass==''){
	echo '<p class="cpass">All the fields are required</p>'; 
	}else{
		$sql =mysqli_query($dbcon, "SELECT * FROM userdetails where contact_id= '".$_SESSION['contact_id']."'");

        if(mysqli_num_rows($sql) == 1) {
	 $member = mysqli_fetch_assoc($sql);
		
	 if($member['password']!=$oldpass){
		echo '<p class="cpass">your old password is invalid</p>';
	 } 
	 else
		if($newpass!= $cnewpass){
		echo '<p class="cpass">Your passwords do not match</p>';
	}else {
		$query = mysqli_query($dbcon,"update userdetails set password='$newpass' where contact_id= '".$_SESSION['contact_id']."'");
		if($query){
			echo '<p class="cpasssuc">Password updated</p>';
		}else{
			echo 'error';
		}
	}
		
}// end num rowns

	
	}/// end empty fields
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="css/change-pass.css">
    <title>Change Password</title>
    <style>
      .dropdown {
        display: inline-block;
        position: relative;
      }
      .dropdown-content {
        display: none;
        position: absolute;
        width: 100%;
        overflow: auto;
        background: #d9d8d8;
        box-shadow: 0px 10px 10px 0px rgba(0,0,0,0.4);
      }
      .dropdown:hover .dropdown-content {
        width: 100px;
        display: block;
      }
      .dropdown-content a {
        display: block;
        color: #757575;
        padding: 5px;
        text-decoration: none;
      }
      .dropdown-content a:hover {
        color: #212121;
        background-color: #fff;
      }
    </style>
</head>
<body>
<header class="text-gray-600 body-font" style="background-color:#8d898954 ;">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
              <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">PhoneBook</span>
          </a>
          <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
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
          </nav>
        </div>
    </header>
    <?php  
    // include_once 'menu-main.php';
    ?>
    <section class="banner" >
        <div class="form-box">
            <div class="btn-box">
            <div class="btn">
                <h1 class="lbl">Change Password</h1>
            </div>
            </div>
            <form class="passbox" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                
                <input class="inp" type="password" name="oldpass" id="" placeholder="Enter your Old Password" required style="border-radius:11px; margin-top: 200px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <input class="inp" type="password" name="newpass" id="" placeholder="Enter your New Password" required style="border-radius:11px; margin-top: 300px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <input class="inp" type="password" name="cnewpass" id="" placeholder="Confirm your New Password" required style="border-radius:11px; margin-top: 400px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <button class="sub-btn" type="submit" name="passchange" style="background-color: rgba(240, 248, 255, 0.547); margin-top: 500px; margin-left: 160px; font-size: 30px;" onMouseOver="this.style.background='rgba(0, 136, 255, 0.748)'"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">CHANGE</button>
            </form>
        </div>
    </section>
</body>
</html>