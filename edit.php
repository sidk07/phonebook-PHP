<?php
session_start();
$table_nm = $_SESSION['username'];
 ob_start();
  require_once 'db.php';
   // $getid = $_GET['editid'];
   // update
   if(isset($_POST['update1'])){
	    $getid = $_POST['contact_id'];
      $chk_nm = !preg_match("/^[a-z A-Z]*$/",$_POST['fname']);
	   $fname = $_POST['fname'];
     $chk_designation = !preg_match("/^[a-z A-Z]*$/",$_POST['designation']);
	   $designation = $_POST['designation'];
	   $phone = $_POST['phone'];
	   $address = $_POST['address'];
     if($chk_designation || $chk_nm || strlen($phone) != 10){
      // echo '<script>alert("Enter valid data")</script>';
      
      header('Location: dashboard.php','Enter valid data');
    } else {
   $qu = ("UPDATE $table_nm SET contact_name='$fname', designation= '$designation',phone= '$phone',address='$address' 
   WHERE contact_id ='$getid'");
    $run_query =@mysqli_query($dbcon,$qu);
	if($run_query){
	header("Location:dashboard.php");	
  
   }else  {
	 echo '<p class="errorMsg">There was error while updating record</p>';  
   
	}
    }
   }
   $getid = $_GET['editid']; // GETTING ID FROM URL
   $query = "SELECT * FROM $table_nm WHERE contact_id ='$getid' ";
    $result = mysqli_query($dbcon,$query);
	 $drow = @mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="css/add-user.css">
    <title>Update Contact</title>
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
            <a class="mr-5 hover:text-gray-900"href="#"><?php 
            echo '<p class="loged">Logged in as <span>' .$_SESSION['username']. '</span></p>';
            ?></a>  
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
                <h1 class="lbl" style="font-size: 30px;margin-left: 8px;margin-top: 13px;">Update Contact</h1>
            </div>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="addusrbox">
                <input class="inp" type="hidden" name ="contact_id" value= "<?php echo isset($drow['contact_id']) ? $drow['contact_id'] : '';?>">
                
                <input class="inp" type="text" name="fname" id="" placeholder="Enter Name" value= "<?php echo isset($drow['contact_name']) ? $drow['contact_name'] : '';?>" required style="border-radius:11px; margin-top: 170px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <input class="inp" type="text" name="designation" id="" placeholder="Enter Designation" value="<?php echo isset($drow['designation']) ? $drow['designation'] : '';?>" required style="border-radius:11px; margin-top: 250px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <input class="inp" type="text" name="phone" id="" placeholder="Enter Contact Number" value="<?php echo isset($drow['phone']) ? $drow['phone'] : '';?>" required style="border-radius:11px; margin-top: 340px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <input class="inp" type="text" name="address" id="" placeholder="Enter Address" value="<?php echo isset($drow['address']) ? $drow['address'] : '';?>" required style="border-radius:11px; margin-top: 430px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <button class="sub-btn" name="update1" type="submit" style="background-color: rgba(240, 248, 255, 0.547); margin-top: 530px; margin-left: 160px; font-size: 30px;" onMouseOver="this.style.background='rgba(0, 136, 255, 0.748)'"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">UPDATE</button>
            </form>
        </div>
    </section>
</body>
</html>