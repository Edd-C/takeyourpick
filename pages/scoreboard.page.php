<div class="container-fluid mb-5">
	<div class="row">
		<a class="btn btn-info w-100 py-4" style="font-size:4em;" href="/?page=voting&userId=<?= isset($_GET['userId']) ? $_GET['userId'] : ''; ?>" role="button">Back to voting</a>
	</div>
</div>





<?php
include_once("config/config.php");


$stmt = $conn->prepare("SELECT * FROM pictures");
$stmt->execute();

$data = $stmt->get_result()->fetch_all( MYSQLI_ASSOC);
$stmt->close();

unset($stmt);

// Build data structure
$people = array();
foreach($data as $picture) {
	$personId = substr($picture['picture_name'], 0, 2);

	$totalUp = $picture['CK_UP'] + $picture['TK_UP'] + $picture['SL_UP'] + $picture['KB_UP'];
	$totalDown = $picture['CK_DOWN'] + $picture['TK_DOWN'] + $picture['SL_DOWN'] + $picture['KB_DOWN'];

	$netTotal = $totalUp - $totalDown;

	$people[$personId][$picture['picture_name']] = $netTotal;
}

// Sort each person
foreach($people as $personId => $person) {
	natsort($people[$personId]);
	$people[$personId] = array_reverse($people[$personId]);
}
?>



<div class="container-fluid">
	<?php foreach($people as $personId => $person) {
		$count = 0;
		$ranks = array('1st', '2nd', '3rd', '4th', '5th');
		?>

		<div class="row mb-5">
			<?php foreach($person as $fileName => $netTotal) { ?>
				<div class="col">
					<div style="position: relative;">
						<div class="font-weight-bold py-2 mb-0" style=" font-size: 1em; background: rgba(0,0,0,0.7);color: white; ">
							<div class="row px-3">
								<div class="col text-left"><?= $ranks[$count]; ?></div>
								<div class="col text-right"><?= $fileName; ?></div>
							</div>

						</div>

						<img src="images/<?= $fileName; ?>.jpg" style="width: 100%;" >
					</div>

					<p class="font-weight-bold px-2 py-1 m-0" style="font-size: 1em; background: rgba(0,0,0,0.7);color: white; position: absolute; bottom: 0px; right: 15px;"><?= $netTotal; ?></p>
			    </div>

			<?php
			$count++;
			} ?>
		</div>

	<?php } ?>
</div>



