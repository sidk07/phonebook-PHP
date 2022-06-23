<?php
session_start();
//echo $_SESSION['username'];
?>
<?php
session_start();
$table_nm = $_SESSION['username'];
require 'db.php';
$query = "SELECT contact_id FROM contactdetails ";
    $result = mysqli_query($dbcon,$query);
	$row = @mysqli_num_rows($result);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="css/view_user.css">
    <script>
      function ConfirmDelete() {
        return confirm("Do you want to delete?");
      }
    </script>
    <title>Add Contact</title>
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
            <a class="mr-5 hover:text-gray-900"href="view_user.php"><?php echo '<p class="loged">Logged in as <span>' .$_SESSION['username']. '</span></p>';?></a>
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
      <table class=" viewtabl" >
        <th>
        <tr>
        <td style="background-color: #04AA6D;color= #fff;"> <strong>S.No</strong></td>
        <td style="background-color: #04AA6D;color= #fff;"><strong>Name</strong></td>
        <td style="background-color: #04AA6D;color= #fff;"><strong>Designation</strong></td>
        <td style="background-color: #04AA6D;color= #fff;"><strong>Phone</strong></td>
        <td style="background-color: #04AA6D;color= #fff;"><strong>Address</strong></td>
        <td style="background-color: #04AA6D;color= #fff;"><strong>Action</strong></td>
        </tr>
        </th>
        <?php  //https://www.formget.com/update-data-in-database-using-php/  to display table in echo https://stackoverflow.com/questions/35944425/displaying-a-user-profile-page-php
        require_once 'db.php';
        $count= 1;
        $query = "SELECT * FROM contactdetails ORDER BY contact_name";
          $result = mysqli_query($dbcon,$query);
        while($row = @mysqli_fetch_assoc($result)){?>
        
        
        <tr>
        <td id="od"> <?php echo $count;?></td>
        <td class="ev"> <?php echo $row["contact_name"];?></td>
        <td class="od"><?php echo $row["designation"];?></td>
        <td class="ev"><?php echo $row["phone"];?></td>
        <td class="od"><?php echo $row["address"];?></td>
        <td class="ev">
        <a href="delete.php?deleteid=<?php echo $row["contact_id"]; ?> "id="del" Onclick="return ConfirmDelete()">Delete</a>
        <a href="edit.php?editid=<?php echo $row["contact_id"]; ?>"id="edt" >Edit</a>
        </td>
        </tr>
        <?php $count++;}?>
      </table>
    </section>
</body>
</html>