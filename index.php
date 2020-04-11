<?php include('config/config.php'); ?>
<?php include('frameworkCode.php'); ?>


<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>The one vote to shame them all!</title>
	<meta name="description" content="Vote on Edds contact photos">
	<meta name="author" content="Edd Clarke">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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
						'up' => 0,
						'down' => 0
					),
					'TK' => array(
						'up' => 0,
						'down' => 0
					),
					'SL' => array(
						'up' => 0,
						'down' => 0
					),
					'KB' => array(
						'up' => 0,
						'down' => 0
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
		$('#upVoteDetails_' + fileName + '_' + '<?= $user["id"]; ?>').text(parseInt($('#upVoteDetails_' + fileName + '_' + '<?= $user["id"]; ?>').text()) + 1);

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
		$('#downVoteDetails_' + fileName + '_' + '<?= $user["id"]; ?>').text(parseInt($('#downVoteDetails_' + fileName + '_' + '<?= $user["id"]; ?>').text()) + 1);

		submitVoteToDB(fileName, 'down');
		<?php } else { ?>
			alert('You must be logged into vote. Use the link in the email you received, it has an embeded userId.');
		<?php } ?>
	}

	function submitVoteToDB(fileName, vote) {
		$.post({
			url: "ajax/vote.php",
			data: {
				userId: '<?= $user["id"]; ?>',
				fileName: fileName,
				vote: vote
			}
		}).done(function() {
			updateVotes(fileName);
		});
	}

	function updateVotes(fileName) {
		console.log('Called: updateVotes');

		$.post({
			url: "ajax/getAllVotes.php",
		}).done(function(data) {
			pictures = JSON.parse(data);

			// Loop through each picture
			for(var i = 0; i < pictures.length; i++) {

				// Loop through each up/down vote counter
				var fields = ['CK', 'TK', 'SL', 'KB'];
				//var fields = ['CK'];

				for(var j = 0; j < fields.length; j++) {
					//console.log('Filename/picture_name: ' + fileName + ' - ' + pictures[i].picture_name);
					//console.log('USER/FIELD: ' + fields[j] + ' - ' + '<?= $user["id"]; ?>');

					if(fileName == pictures[i].picture_name && fields[j] == '<?= $user["id"]; ?>') {
						console.log('CONTINUE');
						continue;
					}
						console.log('DO IT');
						$('#upVoteDetails_' + pictures[i].picture_name + '_' + fields[j]).text(parseInt(pictures[i][fields[j]+'_UP']));
						$('#downVoteDetails_' + pictures[i].picture_name + '_' + fields[j]).text(parseInt(pictures[i][fields[j]+'_DOWN']));

				}
			}

		});
	}

	$( document ).ready(function() {
		updateVotes('');
	});

</script>

</body>
</html>