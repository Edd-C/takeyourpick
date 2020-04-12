<?php include_once('config/config.php'); ?>
<?php include_once('frameworkCode.php'); ?>


<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>The one vote to shame them all!</title>
	<meta name="description" content="Vote on Edds contact photos">
	<meta name="author" content="Edd Clarke">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>

<body>

<?php
	if(!isset($_GET['page']) || empty($_GET['page'])) {
		include('pages/voting.page.php');
	} else {
		include('pages/' . $_GET['page'] . '.page.php');
	}
?>

<script>
	function compare(a, b) {
		// Use toUpperCase() to ignore character casing
		const totalA = a.netTotal;
		const totalB = b.netTotal;

		let comparison = 0;
		if (totalA > totalB) {
			comparison = -1;
		} else if (totalA < totalB) {
			comparison = 1;
		}
		return comparison;
	}
</script>
</body>
</html>