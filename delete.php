<?php
session_start();
$table_nm = $_SESSION['username'];
require 'db.php';
$getid = $_GET['deleteid'];
$query = "DELETE FROM $table_nm WHERE contact_id = '$getid'";
$query_run = mysqli_query($dbcon,$query);
if($query_run){
	header('Location:dashboard.php');
}else{
	echo 'Error while deleting user record';
}

?>