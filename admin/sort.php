<?php

	$sort = $_POST['carlist'];

//sort hotel
	if($sort == 'hotel_name_asc'){
		header("location: sort_hotel_nameasc.php");
	}
	if($sort == 'price-lowest-highest'){
		header("location: sort_hotel_priceasc.php");
	}
	if($sort == 'price-highest-lowest'){
		header("location: sort_hotel_pricedesc.php");
	}
	if($sort == 'class-lowest-highest'){
		header("location: sort_hotel_classasc.php");
	}
	if($sort == 'class-highest-lowest'){
		header("location: sort_hotel_classdesc.php");
	}
	if($sort == 'sort_hotel'){
		header("location: admin_hotels.php");
	}	

//sort review
	if($sort == 'dateasc'){
		header("location: sort_reviewasc.php");
	}
	if($sort == 'datedesc'){
		header("location: sort_reviewdesc.php");
	}
	if($sort == 'ratingasc'){
		header("location: sort_review_ratingasc.php");
	}
	if($sort == 'ratingdesc'){
		header("location: sort_review_ratingdesc.php");
	}
	if($sort == 'sort_review'){
		header("location: admin_reviews.php");
	}	

//sort user
	if($sort == 'firstname_asc'){
		header("location: sort_user_firstasc.php");
	}
	if($sort == 'firstname_desc'){
		header("location: sort_user_firstdesc.php");
	}
	if($sort == 'lastname_asc'){
		header("location: sort_user_lastasc.php");
	}
	if($sort == 'lastname_desc'){
		header("location: sort_user_lastdesc.php");
	}
	if($sort == 'user_type'){
		header("location: sort_user_type.php");
	}
	if($sort == 'sort_user'){
		header("location: admin_user.php");
	}	
?>