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

<script>
	var voteBuffer = {
		<?= $user["id"]; ?>: {
			CK1: {UP: 0, DOWN: 0},
			CK2: {UP: 0, DOWN: 0},
			CK3: {UP: 0, DOWN: 0},
			CK4: {UP: 0, DOWN: 0},
			CK5: {UP: 0, DOWN: 0},
			TK1: {UP: 0, DOWN: 0},
			TK2: {UP: 0, DOWN: 0},
			TK3: {UP: 0, DOWN: 0},
			TK4: {UP: 0, DOWN: 0},
			TK5: {UP: 0, DOWN: 0},
			SL1: {UP: 0, DOWN: 0},
			SL2: {UP: 0, DOWN: 0},
			SL3: {UP: 0, DOWN: 0},
			SL4: {UP: 0, DOWN: 0},
			SL5: {UP: 0, DOWN: 0},
			KB1: {UP: 0, DOWN: 0},
			KB2: {UP: 0, DOWN: 0},
			KB3: {UP: 0, DOWN: 0},
			KB4: {UP: 0, DOWN: 0},
			KB5: {UP: 0, DOWN: 0},
		}
	};



</script>

<!-- TODO: Work in progress -->
<!--<div style="right:0px; top:150px; position: fixed; z-index: 10;">
	<div class='row m-0'>
		<div class="col px-0">
			<div class="text-center text-white p-2" style='position:absolute; left:-100px; background: rgba(0,0,0,0.7); width:100px; height:100px;' onclick="toggleSideMenu()">
				<svg class="bi bi-bar-chart" width="100%" height="100%" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5h-2v12h2V2zm-2-1a1 1 0 00-1 1v12a1 1 0 001 1h2a1 1 0 001-1V2a1 1 0 00-1-1h-2zM6 7a1 1 0 011-1h2a1 1 0 011 1v7a1 1 0 01-1 1H7a1 1 0 01-1-1V7zm-5 4a1 1 0 011-1h2a1 1 0 011 1v3a1 1 0 01-1 1H2a1 1 0 01-1-1v-3z" clip-rule="evenodd"/>
				</svg>
			</div>

			<div id="sideMenu" style="display:none; height:400px; background: rgba(0,0,0,0.7); color:white;">
				<div class='row p-3 m-0'>
					<div class='col'>
						<p class="display-4">Christine:</p>
					</div>

					<div class='col'>
						<p class='d-inline' style="font-size:2em;">Last Vote: 9:00PM</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>-->




<?php
	if(!isset($_GET['page']) || empty($_GET['page'])) {
		include('pages/voting.page.php');
	} else {
		include('pages/' . $_GET['page'] . '.page.php');
	}
?>

<script>
	function toggleSideMenu() {
		$('#sideMenu').toggle();
		console.log('toggle');
	}

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

	function resetVoteBuffer() {
		var tempVoteBuffer = voteBuffer;

		voteBuffer = {
			<?= $user["id"]; ?>: {
				CK1: {UP: 0, DOWN: 0},
				CK2: {UP: 0, DOWN: 0},
				CK3: {UP: 0, DOWN: 0},
				CK4: {UP: 0, DOWN: 0},
				CK5: {UP: 0, DOWN: 0},
				TK1: {UP: 0, DOWN: 0},
				TK2: {UP: 0, DOWN: 0},
				TK3: {UP: 0, DOWN: 0},
				TK4: {UP: 0, DOWN: 0},
				TK5: {UP: 0, DOWN: 0},
				SL1: {UP: 0, DOWN: 0},
				SL2: {UP: 0, DOWN: 0},
				SL3: {UP: 0, DOWN: 0},
				SL4: {UP: 0, DOWN: 0},
				SL5: {UP: 0, DOWN: 0},
				KB1: {UP: 0, DOWN: 0},
				KB2: {UP: 0, DOWN: 0},
				KB3: {UP: 0, DOWN: 0},
				KB4: {UP: 0, DOWN: 0},
				KB5: {UP: 0, DOWN: 0},
			}
		};

		return tempVoteBuffer;
	}
</script>
</body>
</html>