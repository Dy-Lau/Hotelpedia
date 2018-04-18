<?php
	session_start();
	include_once('connect/connect.php');

	$user_id = $_SESSION['user_id'];
	$hotel_id = $_POST['hotel_id'];
	$today = date('Y-m-d H:i:s');
	$rating = $_POST['rating'];
	$title_review = $_POST['title_review'];
	$review = $_POST['review'];

	$insert_review = "INSERT INTO reviews (user_id, hotel_id, review_date, review_content, review_title, rating) VALUES ('$user_id', '$hotel_id', '$today', '$review', '$title_review', '$rating')";
	$query = mysqli_query($connect, $insert_review) or die ("ERROR: " .mysqli_error($connect));
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/sweetalert.min.js"></script>
</head>
<body>
	<?php

	if ($query){
			echo'<script>
			swal({
			  title: "Congratulations!",
			  text: "Your review was successfulyy sent!",
			  icon: "success"
			})
			.then((value) => {
			    window.location.href = "hotel-single-category-login.php?hotel_id='.$hotel_id.'";
			});
			</script>';
		}

		else{
			echo'<script>
			swal({
			  title: "Error!",
			  text: "Your review failed to send!Please try again",
			  icon: "error"
			})
			.then((value) => {
			    window.location.href = "write-reviews.php?hotel_id='.$hotel_id.'";
			});
			</script>';
		}
?>
</body>
</html>