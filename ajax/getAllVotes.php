<?php
include_once("../config/config.php");


$stmt = $conn->prepare("SELECT * FROM pictures");
$stmt->execute();

$data = $stmt->get_result()->fetch_all( MYSQLI_ASSOC);



$stmt->close();

echo json_encode($data);
?>