<?php
session_start();
include_once('../../connect/connect.php');
	
	$users_id = $_SESSION['user_id'];
    $fetch_user = mysqli_query($connect, "SELECT * FROM user WHERE user_id = '$users_id'")
      				or die("Error: Could not fetch rows!".mysqli_error($connect));
    $row = mysqli_fetch_array($fetch_user);

	$user_id = $_GET['user_id'];
	$review_id = $_GET['review_id'];
	$hotel_id = $_GET['hotel_id'];

	if($users_id == $user_id){
		$delete_review = mysqli_query($connect, "DELETE FROM reviews WHERE user_id = '$user_id' AND review_id = '$review_id'") or die ("ERROR: " .mysqli_error($connect));

		if($delete_review){
			echo'<script>
			alert("Successfully Deleted!");
			window.location.href="hotel-single-category-login.php?hotel_id='.$hotel_id.'"
			</script>';
		}

		else{
			echo'<script>
			alert("Failed to Delete Review!");
			window.location.href="hotel-single-category-login.php?hotel_id='.$hotel_id.'"
			</script>';
		}
	}

	else{
		echo'<script>
		alert("Not Your Review!");
		window.location.href="hotel-single-category-login.php?hotel_id='.$hotel_id.'"
		</script>';
	}
?>