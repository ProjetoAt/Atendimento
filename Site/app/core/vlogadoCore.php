<?php 

if (!isLoggedIn()) {
	header("location: ".$base);
}

?>