<?php
session_start();
include_once('../connect/connect.php');

	$hotel_id = $_GET["hotel_id"];

	$delete_review = mysqli_query($connect, "DELETE FROM reviews WHERE hotel_id = '".$hotel_id."'")
						or die ("ERROR: " .mysqli_error($connect));

	$delete_amenities = mysqli_query($connect, "DELETE FROM amenities WHERE hotel_id = '".$hotel_id."'")
						or die ("ERROR: " .mysqli_error($connect));

	$delete_hotel = mysqli_query($connect, "DELETE FROM hotels WHERE hotel_id = '".$hotel_id."'")
					or die ("ERROR: " .mysqli_error($connect));

	if($delete_hotel && $delete_amenities && $delete_review){
		echo'<script>
		alert("Successfully Deleted!");
		window.location.href="admin_hotels.php"
		</script>';
	}
	else{
		echo'<script>
		alert("Failed to Delete Hotel!");
		window.location.href="admin_hotels.php"
		</script>';
	}

?>