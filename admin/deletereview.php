<?php
session_start();
include_once('../connect/connect.php');


	$review_id = $_GET["review_id"];

	$delete_review = mysqli_query($connect, "DELETE FROM reviews WHERE review_id = '".$review_id."'")
						or die ("ERROR: " .mysqli_error($connect));

	if($delete_review){
		echo'<script>
		alert("Successfully Deleted!");
		window.location.href="admin_reviews.php"
		</script>';
	}

	else{
		echo'<script>
		alert("Failed to Delete Review!");
		window.location.href="admin_reviews.php"
		</script>';
	}

?>