<?php
session_start();
include_once('../connect/connect.php');


	$user_id = $_GET["user_id"];		

	$delete_user = mysqli_query($connect, "DELETE FROM user WHERE user_id = '".$user_id."'")
						or die ("ERROR: " .mysqli_error());

	$delete_reviews = mysqli_query($connect, "DELETE FROM reviews WHERE user_id = '".$user_id."'")
						or die ("ERROR: " .mysqli_error());

	if($delete_user && $delete_reviews){
		echo'<script>
		alert("Successfully Deleted!");
		window.location.href="admin_user.php"
		</script>';
	}

	else{
		echo'<script>
		alert("Failed to Delete User!");
		window.location.href="admin_user.php"
		</script>';
	}

?>