<?php
session_start();
//echo $_SESSION['username'];
//echo $_SESSION['contact_id'];
$table_nm = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="css/editProfilr.css">
    <title>Profile</title>
</head>
<body>
    <!-- <header class="text-gray-600 body-font" style="background-color:#8d898954 ;">
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
            <a class="mr-5 hover:text-gray-900"href="view_user.php">View All</a>
            <div class="dropdown">
                <a class="mr-5 hover:text-gray-900">Profile</a>
                  <div class="dropdown-content">
                    <a href="viewProfile.php">View Profile</a>
                    <a href="deleteProfile.php">Delete Profile</a>
                    <a href="changePassword.php">Change Password</a>
                    <a href="logout.php">Logout</a>
                  </div>
                </div> 
          </nav>
        </div>
    </header> -->
    <?php  include_once 'menu-main.php';?>
    <section class="banner" >
      <div class="profile-box" style="height: 330px; width:330px; background-image: url('img/profile-logo.png')">
            <!-- <img src="img/profile-logo.png" alt="profile-img" srcset=""> -->
        </div>
        <div class="form-box">
            <form action="" method="">
            <?php  //https://www.formget.com/update-data-in-database-using-php/  to display table in echo 
  //echo $_SESSION['contact_id'];
   require_once 'db.php';
   
   $query = "SELECT * FROM userdetails where contact_id= '".$_SESSION['contact_id']."'";
    $result = mysqli_query($dbcon,$query);
	 $row = @mysqli_fetch_assoc($result)?>
                <h1 class="lbl" style="margin-top: 85px;">NAME:</h1>
                <input class="inp" type="text" name="name" value="<?php echo $row["name"];?>" id="" placeholder="Your Name" readonly style="border-radius:11px; margin-top: 130px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <h1 class="lbl" style="margin-top: 235px;">USERNAME:</h1>
                <input class="inp" type="text" name="username" value="<?php echo $row["username"];?>" id="" placeholder="Your User Name" readonly style="border-radius:11px; margin-top: 280px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <h1 class="lbl" style="margin-top: 385px;">Email:</h1>
                <input class="inp" type="email" name="email" value="<?php echo $row["email"];?>" id="" placeholder="Your Email" readonly style="border-radius:11px; margin-top: 430px; background-color: rgba(240, 248, 255, 0.547);" onMouseOver="this.style.background='rgba(33, 217, 165, 0.748) '"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">
                
                <a href="editProfile.php?editProfile=<?php echo $row["contact_id"]; ?> "id="edt" class="sub-btn" style="background-color: rgba(240, 248, 255, 0.547); margin-top: 530px; margin-left: 160px; font-size: 30px;" onMouseOver="this.style.background='rgba(0, 136, 255, 0.748)'"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'"><p style="margin-left:50px;font-weight: 400; margin-top:5px;">EDIT</p></a>

                <!-- <a href="editProfile.php"id="edt">
                <button class="sub-btn" style="background-color: rgba(240, 248, 255, 0.547); margin-top: 530px; margin-left: 160px; font-size: 30px;" onMouseOver="this.style.background='rgba(0, 136, 255, 0.748)'"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">EDIT</button></a> -->
                <!-- <button class="sub-btn" type="submit" name="btnupdate" style="background-color: rgba(240, 248, 255, 0.547); margin-top: 530px; margin-left: 160px; font-size: 30px;" onMouseOver="this.style.background='rgba(0, 136, 255, 0.748)'"
                onMouseOut="this.style.background='rgba(240, 248, 255, 0.547)'">UPDATE</button> -->
            </form>
        </div>
    </section>
</body>
</html>