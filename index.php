<?php include('config/config.php'); ?>
<?php include('frameworkCode.php'); ?>


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

 	<!-- Sticky top nav -->
	<nav class="navbar sticky-top navbar-light bg-light p-0">
		<div class="btn-group w-100" role="group">
			<button type="button" class="btn btn-info btn-lg w-100" style="height:130px;"><a href="#CK" class="display-3 font-weight-bold" style="text-decoration: none; color:#fff;">CK</a></button>
			<button type="button" class="btn btn-info btn-lg w-100" style="height:130px;"><a href="#TK" class="display-3 font-weight-bold" style="text-decoration: none; color:#fff;">TK</a></button>
			<button type="button" class="btn btn-info btn-lg w-100" style="height:130px;"><a href="#SL" class="display-3 font-weight-bold" style="text-decoration: none; color:#fff;">SL</a></button>
			<button type="button" class="btn btn-info btn-lg w-100" style="height:130px;"><a href="#KB" class="display-3 font-weight-bold" style="text-decoration: none; color:#fff;">KB</a></button>
		</div>
	</nav>

	<?php




	$people = array(
		'CK' => array(),
		'TK' => array(),
		'SL' => array(),
		'KB' => array(),
	);

	foreach($people as $personInitial => $person) {
		$people[$personInitial]['photos'] = array();

		for($i = 1; $i <= 5; $i++ ) {
			$people[$personInitial]['photos'][$personInitial.$i] = array(
				'versionNumber' => $i,
				'voteDetails' => array(
					'CK' => array(
						'up' => '&nbsp;',
						'down' => '&nbsp;'
					),
					'TK' => array(
						'up' => '&nbsp;',
						'down' => '&nbsp;'
					),
					'SL' => array(
						'up' => '&nbsp;',
						'down' => '&nbsp;'
					),
					'KB' => array(
						'up' => '&nbsp;',
						'down' => '&nbsp;'
					),
				)
			);
		}


	}

	?>

	<!-- Main area -->
	<div class="container-fluid">

		<!-- Persons section -->
		<?php foreach($people as $personInitial => $person) { ?>
			<div class='row' style="padding-top:130px;">
				<a name="<?= $personInitial; ?>"></a>

				<!-- Each photo - for current person -->
				<?php foreach($person['photos'] as $fileName => $photo) { ?>
					<div class="container-fluid" style="margin-top:200px;">
						<?php include_partial('partials/_votingCard.php', array('fileName' => $fileName, 'versionNumber' => $photo['versionNumber'], 'voteDetails' => $photo['voteDetails'])); ?>
					</div>
				<?php } ?>

			</div>
		<?php } ?>
	</div>

<script>


	function upVote(fileName, versionNumber) {
		<?php if($user) { ?>
		// Increment net total
		//$('#netTotal_' + fileName).text(parseInt($('#netTotal_' + fileName).text()) + 1);

		// Increment up vote
		//$('#upVoteDetails_' + fileName + '_' + '<?= $user["id"]; ?>').text(parseInt($('#upVoteDetails_' + fileName + '_' + '<?= $user["id"]; ?>').text()) + 1);

		submitVoteToDB(fileName, 'up');

		<?php } else { ?>
			alert('You must be logged into vote. Use the link in the email you received, it has an embeded userId.');
		<?php } ?>

	}

	function downVote(fileName, versionNumber) {
		<?php if($user) { ?>
		// Increment net total
		//$('#netTotal_' + fileName).text(parseInt($('#netTotal_' + fileName).text()) - 1);

		// Increment down vote
		//$('#downVoteDetails_' + fileName + '_' + '<?= $user["id"]; ?>').text(parseInt($('#downVoteDetails_' + fileName + '_' + '<?= $user["id"]; ?>').text()) + 1);

		submitVoteToDB(fileName, 'down');
		<?php } else { ?>
			alert('You must be logged into vote. Use the link in the email you received, it has an embeded userId.');
		<?php } ?>
	}

	function submitVoteToDB(fileName, vote) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				updateVotes(fileName);
			}
		};
		xhttp.open("POST", "ajax/vote.php", true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send("userId=<?= $user['id']; ?>&vote="+vote+"&fileName=" + fileName);
	}

	function updateVotes(fileName = '') {
		console.log('updateVotes');
		//console.log('Called: updateVotes');

		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var pictures = JSON.parse(this.responseText);

				// Loop through each picture
				var netTotal, netTotalsArr = [], fields, j, i;
				for(i = 0; i < pictures.length; i++) {
					netTotal = 0;

					// Loop through each up/down vote counter
					fields = ['CK', 'TK', 'SL', 'KB'];
					for(j = 0; j < fields.length; j++) {
						netTotal += parseInt(pictures[i][fields[j]+'_UP']);
						netTotal -= parseInt(pictures[i][fields[j]+'_DOWN']);

						// Due to lag in ajax response, skip updating the current pics votes table. We do this with jquery before the server response come back and just assume (currentVal = currentVal + 1). No jittery numbers this way.
						if(fileName == pictures[i].picture_name && fields[j] == '<?= $user["id"]; ?>') {
							continue;
						}

						$('#upVoteDetails_' + pictures[i].picture_name + '_' + fields[j]).text(parseInt(pictures[i][fields[j]+'_UP']));
						$('#downVoteDetails_' + pictures[i].picture_name + '_' + fields[j]).text(parseInt(pictures[i][fields[j]+'_DOWN']));
					}

					//console.log(fileName);

					$('#netTotal_' + pictures[i].picture_name).text(netTotal);
					//console.log("Net total: " + netTotal);
				}
			}
		};
		xhttp.open("POST", "ajax/getAllVotes.php", true);
		xhttp.send();
	}

	$( document ).ready(function() {
		setInterval(updateVotes, 200);

	});

</script>

</body>
</html>