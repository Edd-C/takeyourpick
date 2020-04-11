<?php
include_once("../config/config.php");

// Can't use parameterized query with for setting field name. So sanitize here.
$userId = strtolower($_POST['userId']);
if(!in_array($userId, array('ck', 'tk', 'sl', 'kb'))) {
	die();
}

$vote = strtolower($_POST['vote']);
if(!in_array($vote, array('up', 'down'))) {
	die();
}


$stmt = $conn->prepare("UPDATE pictures set ".$userId."_".$vote." = ".$userId."_".$vote." + 1 where picture_name = ?");
$stmt->bind_param("s",  $_POST['fileName']);
$stmt->execute();
//fetching result would go here, but will be covered later
$stmt->close();
?>