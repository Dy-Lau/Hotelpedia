<?php 
session_start();
include_once('connect/connect.php');
        
    $fetch_user = mysqli_query($connect, "SELECT * FROM user WHERE user_id = '".$_SESSION['user_id']."'")
                      or die ("ERROR: " .mysqli_error());
    $row = mysqli_fetch_array($fetch_user);

	if(isset($_POST['edit'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$c_password = $_POST['c_password'];
	}
	if(isset($_FILES['profile_pic'])){
		$profile_pic = addslashes(file_get_contents($_FILES['profile_pic']['tmp_name']));
		$image = addslashes(file_get_contents($_FILES['profile_pic']['tmp_name']));
		$image_name = $_FILES['profile_pic']['name'];
	}
	else{
  		echo'<script> 
  			 alert("Only jpg, gif, and png files are allowed!");
  			 window.location.href="javascript:history.back()";
  	   	     </script>';
 	exit(); }

    if ($profile_pic != ''){
		$update_user = mysqli_query($connect, "UPDATE user SET email='".$email."', lastname='".$lastname."', firstname='".$firstname."', password='".$password."', profile_pic='$image_name', image='$image' WHERE user_id='".$row['user_id']."'") or die("Error: ".mysqli_error($connect));

		if ($update_user) {
    		echo '<script>
					alert("Successfully Saved!");
					window.location.href="profile.php"
				  </script>';
		}
		else {
    		echo'<script>
					alert("Profile Cannot Change!");
					window.location.href="javascript:history.back()";
				</script>';
		}
	}	

	if ($profile_pic == ''){
		$update_user = mysqli_query($connect, "UPDATE user SET email='".$email."', lastname='".$lastname."', firstname='".$firstname."', password='".$password."', profile_pic='".$row['profile_pic']."' WHERE user_id='".$row['user_id']."'") or die("Error: ".mysqli_error($connect));

		if ($update_user) {
    		echo '<script>
					alert("Successfully Saved!");
					window.location.href="profile.php"
				  </script>';
		} 
		else {
    		echo'<script>
					alert("Profile Cannot Change!");
					window.location.href="javascript:history.back()";
				</script>';
		}
	}

?>