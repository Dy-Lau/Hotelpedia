<?php
session_start();
include_once('connect/connect.php');



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/sweetalert.min.js"></script>
</head>
<body>
	<?php


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
				swal({
					  title: "Are you sure?",
					  text: "Once deleted, you will not be able to recover this imaginary file!",
					  icon: "warning",
					  buttons: true,
					  dangerMode: true
				})
				.then((willDelete) => {
					  if (willDelete) {
						swal("Poof!", "Your imaginary file has been deleted!","success")
						.then((value) => {
						  window.location.href = "hotel-single-category-login.php?hotel_id='.$hotel_id.'";
						});

					  } else {
					    swal("Error","Failed to Delete Review!", "error")
					    .then((value) => {
						  window.location.href = "hotel-single-category-login.php?hotel_id='.$hotel_id.'";
						});
					  }
				});

				</script>';
			}
		}

		else{
			echo'<script>
			swal("Warning!", "You cannot delete other than your review/s. Thanks", "warning")
			.then((a) => {
				window.location.href = "hotel-single-category-login.php?hotel_id='.$hotel_id.'";
			});
			</script>';
		}


?>
</body>
</html>