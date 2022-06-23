<?php
session_start();
$table_nm = $_SESSION['username'];
require 'db.php';
// $getid = $_GET['deleteid'];
$query = "DROP TABLE $table_nm ";
$query_run = mysqli_query($dbcon,$query);

$table_nm1  = 'userdetails';
// $profile = $_SESSION['username'];
$query2 = "DELETE FROM $table_nm1 WHERE username = '$table_nm'";
$query_run2 = mysqli_query($dbcon,$query2);


if($query_run && $query_run2){
	header('Location:index.php');
}else{
	echo 'Error while deleting user record'. mysqli_error($dbcon);
}

?>
<?php

?>