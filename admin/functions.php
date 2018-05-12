<?php

function confirmQuery($query_result){
	global $connection;
	if(!$query_result){
		die("Connection not established " . mysqli_error($connection));
	}
}



?>