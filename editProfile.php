<?php
session_start();
$table_nm = $_SESSION['username'];
ob_start(); 
  require_once 'db.php';
   // $getid = $_GET['editid'];
   // update
   if(isset($_POST['btnupdate'])){
	    $profileid = $_POST['contact_id'];
      $chk_nm = !preg_match("/^[a-z A-Z]*$/",$_POST['fname']);
	   $fname = $_POST['fname'];
	   $username = $_POST['uname'];
	   $email = $_POST['uemail'];
	   
	   if($chk_nm){

      echo '<script>alert("Enter valid data")</script>';
      header('Location: editProfile.php');
    } else {
   $qu = "UPDATE userdetails SET name='$fname', username= '$username',email= '$email' 
   WHERE contact_id ='$profileid'";
    $run_query =@mysqli_query($dbcon,$qu);
	if($run_query){
		
    header("Location:viewProfile.php?update=profileupated"); 
   }else  {
	 echo '<p class="errorMsg">There was error while updating record</p>';  
   
	}	
   }
  }
   $profileid = $_GET['editProfile']; // GETTING ID FROM URL
   $query = "SELECT * FROM userdetails WHERE contact_id ='$profileid' ";
    $result = @mysqli_query($dbcon,$query);
	 $drow = @mysqli_fetch_assoc($result);
	 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="css/editProfilr.css">
    <title>Update User</title>
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
    <section class="banner" id="main">
    <div class="profile-box" style="height: 330px; width:330px; background-image: url('img/profile-logo.png')">
            <!-- <img src="img/profile-logo.png" alt="profile-img" srcset=""> -->
        </div>
        <div class="form-box">
            <div class="btn-box">
            <div class="btn">
                <h1 class="lbl" style="font-size: 37px; margin-left:10px; margin-top:8px;">Update User</h1>
            </div>
            </div>
            <form class="addusrbox" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                
            <input type="hidden" name ="contact_id" value= "<?php echo $drow['contact_id'];?>">
            
                <input class="inp" type="text" name="fname" id="" placeholder="Enter your Name" value= "<?php echo $drow['name'];?>" required style="border-radius:11px; margin-top: 200px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <input class="inp" type="text" name="uname" readonly id="" placeholder="Enter your User Name" value="<?php echo $drow['username'];?>" required style="border-radius:11px; margin-top: 300px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <input class="inp" type="email" name="uemail" id="" placeholder="Enter your Email" value="<?php echo $drow['email'];?>" required style="border-radius:11px; margin-top: 400px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <button class="sub-btn" type="submit" name="btnupdate" style="background-color: rgba(240, 248, 255, 0.547); margin-top: 500px; margin-left: 160px; font-size: 30px;" onMouseOver="this.style.background='rgba(0, 136, 255, 0.748)'"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">UPDATE</button>
            </form>
        </div>
    </section>
</body>
</html>