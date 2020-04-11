<?php


function getUserHash() {
	if(isset($_GET['userId']) && !empty($_GET['userId'])) {
		$userId = $_GET['userId'];
	} else {
		$userId = null;
	}

	return $userId;
}

function getUser() {
	$user = null;

	if($userHash = getUserHash()) {
		// CK
		if($userHash == 'cf029eadf168a997214b7d0d5e6fc2cd') {
			$user = array('id' => 'CK');
		}

		// TK
		else if ($userHash == '0450966999f9d7742c0a41f3ea4b6c20') {
			$user = array('id' => 'TK');
		}

		// SL
		else if ($userHash == '96eabf87f6359c0d3c0678a602e1cd69') {
			$user = array('id' => 'SL');
		}

		// KB
		else if ($userHash == '40c9b2e02ed34e0daf04649641cbda98') {
			$user = array('id' => 'KB');
		}
	}

	return $user;
}
$user = getUser();



function include_partial($filePath, $variables = array())
{
	$output = NULL;
	if(file_exists($filePath)){
		// Extract the variables to a local namespace
		extract($variables);

		// Set UserId in partial
		$user = getUser();


		// Start output buffering
		ob_start();

		// Include the template file
		include $filePath;

		// End buffering and return its contents
		$output = ob_get_clean();
	}

	echo $output;

}