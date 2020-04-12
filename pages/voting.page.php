
<!-- Sticky top nav -->
	<nav class="navbar sticky-top navbar-light bg-light p-0">
		<div class="btn-group w-100" role="group">
			<button type="button" class="btn btn-info btn-lg w-100" style="height:130px;"><a href="#CK" class="display-3 font-weight-bold" style="text-decoration: none; color:#fff;">CK</a></button>
			<button type="button" class="btn btn-info btn-lg w-100" style="height:130px;"><a href="#TK" class="display-3 font-weight-bold" style="text-decoration: none; color:#fff;">TK</a></button>
			<button type="button" class="btn btn-info btn-lg w-100" style="height:130px;"><a href="#SL" class="display-3 font-weight-bold" style="text-decoration: none; color:#fff;">SL</a></button>
			<button type="button" class="btn btn-info btn-lg w-100" style="height:130px;"><a href="#KB" class="display-3 font-weight-bold" style="text-decoration: none; color:#fff;">KB</a></button>
			<button type="button" class="btn btn-info btn-lg w-100" style="height:130px;">
				<a href="/?page=scoreboard&userId=<?= isset($_GET['userId']) ? $_GET['userId'] : ''; ?>" class="font-weight-bold" style="text-decoration: none; color:#FFD700	;">
					<svg class="bi bi-trophy" width="4em" height="4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M3 1h10c-.495 3.467-.5 10-5 10S3.495 4.467 3 1zm0 15a1 1 0 011-1h8a1 1 0 011 1H3zm2-1a1 1 0 011-1h4a1 1 0 011 1H5z"/>
						<path fill-rule="evenodd" d="M12.5 3a2 2 0 100 4 2 2 0 000-4zm-3 2a3 3 0 116 0 3 3 0 01-6 0zm-6-2a2 2 0 100 4 2 2 0 000-4zm-3 2a3 3 0 116 0 3 3 0 01-6 0z" clip-rule="evenodd"/>
						<path d="M7 10h2v4H7v-4z"/>
						<path d="M10 11c0 .552-.895 1-2 1s-2-.448-2-1 .895-1 2-1 2 .448 2 1z"/>
					</svg>
				</a>
			</button>
		</div>
	</nav>
<?php




$people = array(
	'CK' => array(),
	'TK' => array(),
	'SL' => array(),
	'KB' => array(),
);

foreach($people as $personId => $person) {
	$people[$personId]['photos'] = array();

	for($i = 1; $i <= 5; $i++ ) {
		$people[$personId]['photos'][$personId.$i] = array(
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
		<?php foreach($people as $personId => $person) { ?>
			<div class='row' style="padding-top:130px;">
				<a name="<?= $personId; ?>"></a>

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
		submitVoteToDB(fileName, 'up');
		<?php } else { ?>
		alert('You must be logged into vote. Use the link in the email you received, it has an embeded userId.');
		<?php } ?>

	}

	function downVote(fileName, versionNumber) {
		<?php if($user) { ?>
		submitVoteToDB(fileName, 'down');
		<?php } else { ?>
		alert('You must be logged into vote. Use the link in the email you received, it has an embeded userId.');
		<?php } ?>
	}

	function submitVoteToDB(fileName, vote) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				// TODO: Comment this out.
				//updateVotes(fileName);
			}
		};
		xhttp.open("POST", "ajax/vote.php", true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send("userId=<?= $user['id']; ?>&vote="+vote+"&fileName=" + fileName);
	}

	function updateVotes(fileName = '') {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var netTotal,
					netTotals = {},
					personId, pictures, fields, j, i;

				pictures = JSON.parse(this.responseText);

				netTotals['CK'] = [];
				netTotals['TK'] = [];
				netTotals['SL'] = [];
				netTotals['KB'] = [];

				// Loop through each picture
				for(i = 0; i < pictures.length; i++) {
					netTotal = 0;
					personId = pictures[i].picture_name.substr(0,2);

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

					$('#netTotal_' + pictures[i].picture_name).text(netTotal);


					netTotals[personId].push({netTotal: netTotal, picture_name: pictures[i].picture_name});
				}

				// Update ranks
				updateRanks(netTotals);
			}
		};
		xhttp.open("POST", "ajax/getAllVotes.php", true);
		xhttp.send();
	}

	function updateRanksHtml(picturesArray) {
		var ranks = ['1st', '2nd', '3rd', '4th', '5th'];

		for(var i = 0; i < picturesArray.length; i++) {
			$('#rank_' + picturesArray[i]['picture_name']).text(ranks[i]);
		}
	}

	function updateRanks(netTotals) {
		updateRanksHtml(netTotals.CK.sort(compare));
		updateRanksHtml(netTotals.TK.sort(compare));
		updateRanksHtml(netTotals.SL.sort(compare));
		updateRanksHtml(netTotals.KB.sort(compare));
	}

	$( document ).ready(function() {
		updateVotes();
		setInterval(updateVotes, 300);

	});

</script>