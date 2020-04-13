<?php
include_once("../config/config.php");

$data = $_POST['data'];
$userId = $_POST['userId'];

$decodedData = json_decode($_POST['data']);
$decodedData = $decodedData->{$userId};


foreach($decodedData as $picture_name => $picture) {
	$upVal = $picture->UP;
	$downVal = $picture->DOWN;

	//$stmt = $conn->prepare("UPDATE pictures set CK_UP = CK_UP + 1, CK_DOWN = CK_DOWN + 1 WHERE picture_name = ?");

	$stmt = $conn->prepare("UPDATE pictures set ".$userId."_UP = ".$userId."_UP + ".$upVal.", ".$userId."_DOWN = ".$userId."_DOWN + ".$downVal." WHERE picture_name = ?");

	$stmt->bind_param("s",  $picture_name);
	$stmt->execute();
}

$stmt->close();
?>