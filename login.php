<?php
session_start();
include_once('connect/connect.php');

	if (isset($_POST["login"])){
		$email = $_POST['email'];
		$password = $_POST['password'];
	}

	$result = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email' AND password = '$password'")
			or die("Failed to query database" .mysql_error());
	$row = mysqli_fetch_array($result);

	if($row['user_type'] == 'admin' && $row['password'] == $_POST['password'] && $_SESSION['type'] != 'user'){
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['type'] = 'admin';
		header("location: admin/adminpage.php");
	}

	if($row['email'] == $_POST['email'] && $row['password'] == $_POST['password'] && $_SESSION['type'] != 'admin'){
		$_SESSION['type'] = 'user';
		$_SESSION['user_id'] = $row['user_id'];
		header("location: loginpage.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/sweetalert.min.js"></script>
</head>
<body>
	<?php

	if($row['email'] != $_POST['email'] || $row['password'] != $_POST['password']){
		echo'<script>
			swal({
			  title: "Error!",
			  text: "Incorrect Username/Password!Please try again",
			  icon: "error"
			})
			.then((value) => {
			    window.location.href = "javascript:history.back()";
			});
			</script>';
	}

	else{
		echo '<script>
			swal({
			  title: "Warning!",
			  text: "We cannot get you Logged in at this moment. Please try again, later",
			  icon: "warning"
			})
			.then((value) => {
			    window.location.href = "javascript:history.back()";
			});
			</script>';
	}

?>
</body>
</html>