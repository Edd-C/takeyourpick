<div class="container-fluid">

	<!-- Picture -->
	<div class="" style="margin:0 -15px 0 -15px; position: relative;">
		<!-- Pic title -->
		<p class="display-4 font-weight-bold px-3 py-2" style="background: rgba(0,0,0,0.7);color: white; position: absolute; top: 20px; left: 20px;"> <?= $fileName; ?></p>

		<!-- Pic -->
		<img src="images/<?= $fileName; ?>.jpg" style="width: 100%;" >

		<!-- Pic total -->
		<!--<p class="font-weight-bold" style="font-size: 2.5em; color: white; position: absolute; bottom: 10px; left: 20px; text-shadow: -2px 0 black, 0 2px black, 2px 0 black, 0 -2px black; margin:0px;">
			Net total: <span>0 </span></p>-->

		<!-- Pic total -->
		<!--<p class="font-weight-bold" style="font-size: 2.5em; color: white; position: absolute; bottom: 40px; left: 20px; text-shadow: -2px 0 black, 0 2px black, 2px 0 black, 0 -2px black; margin:0px;">
			Rank: <span>1st</span></p>-->

		<table style="font-size: 2.5em; color: white; position: absolute; bottom: 20px; left: 20px; margin:0px; background: rgba(0,0,0,0.7);">
			<tr>
				<td class="px-3 pt-2">Rank: </td>
				<td class="px-3 pt-2">1st</td>
			</tr>
			<tr>
				<td class="px-3 pb-2">Net total: &nbsp;</td>
				<td class="px-3 pb-2"><span id="netTotal_<?= $fileName; ?>">0</span></td>
			</tr>
		</table>
	</div>



	<!-- Score table -->
	<div class="row pt-3 justify-content-between">
		<?php foreach($voteDetails as $personInital => $votes) { ?>
			<div class='d-inline-block' style='width: 20%;'>
				<table class="table table-bordered table-dark">
					<thead>
						<tr>
							<th colspan="2" class="text-center display-4 font-weight-bold"><?= $personInital; ?></th>
						</tr>
					</thead>

					<tbody>
					<tr>
						<td class="text-center bg-white text-dark font-weight-bold" style="font-size:1.5em;">
							<p class="m-0 p-0" id="upVoteDetails_<?= $fileName; ?>_<?= $personInital; ?>"><?= $votes['up']; ?></p>
							<svg class="bi bi-chevron-up" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							  <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 01.708 0l6 6a.5.5 0 01-.708.708L8 5.707l-5.646 5.647a.5.5 0 01-.708-.708l6-6z" clip-rule="evenodd"/>
							</svg>
						</td>
						<td class="text-center bg-white text-dark font-weight-bold" style="font-size:1.5em;">
							<p class="m-0 p-0" id="downVoteDetails_<?= $fileName; ?>_<?= $personInital; ?>"><?= $votes['down']; ?></p>
							<svg class="bi bi-chevron-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z" clip-rule="evenodd"/>
							</svg>
						</td>
					</tr>

					</tbody>
				</table>
			</div>
		<?php } ?>
	</div>



	<!-- Voting Buttons -->
	<div class="row mb-3">
		<button type="button" class="btn btn-success w-100 py-4" ontouchend="upVote('<?= $fileName; ?>', <?= $versionNumber; ?>)">
			<svg class="bi bi-check" width="4em" height="4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L6.5 10.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
			</svg>
		</button>
	</div>

	<div class="row">
		<button type="button" class="btn btn-danger w-100 py-4" ontouchend="downVote('<?= $fileName; ?>', <?= $versionNumber; ?>)">
			<svg class="bi bi-x" width="4em" height="4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
				<path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
			</svg>
		</button>
	</div>



	<!-- Total count -->
	<!--<div class="row">
		<div class="d-flex justify-content-between w-100">
			<h1 class=""><span class="">Total: </span><span class="" id="number">55</span></h1>
			<p class="mt-1" style="font-style: italic;"> Total = (all up votes - all down votes)</p>
		</div>
	</div>-->
</div>



