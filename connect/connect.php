<?php

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "hotelpedia");



$connect = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME)
				or die("ERROR: " .mysqli_connect_error());


?>