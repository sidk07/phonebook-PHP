<?php
require_once 'db.php';
$query = "SELECT contact_id FROM contactdetails ";
    $result = mysqli_query($dbcon,$query);
	// $row = @mysqli_num_rows($result);
?>
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