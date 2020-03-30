<?php include('frameworkCode.php'); ?>

<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>The one vote to shame them all!</title>
	<meta name="description" content="Vote on Edds contact photos">
	<meta name="author" content="Edd Clarke">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>
	<nav class="navbar sticky-top navbar-light bg-light">
		<div class='container'>
			<div class="d-flex justify-content-around w-100">
				<h1 ><span class="badge badge-info"><a href="#christine" style="text-decoration: none; color: #fff;">CK</a></span></h1>
				<h1  ><span class="badge badge-info"><a href="#theresa" style="text-decoration: none; color: #fff;">TK</a></span></h1>
				<h1><span class="badge badge-info"><a href="#christine" style="text-decoration: none; color: #fff;">SL</a></span></h1>
				<h1><span class="badge badge-info"><a href="#christine" style="text-decoration: none; color: #fff;">KB</a></span></h1>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class='row' style="max-width:600px;">
			<a name="christine"></a>
			<div class="container-fluid" style="margin-top:70px;">
				<h1>Christine</h1>

				<?php include_partial('partials/_votingCard.php', array('test' => 'testing')); ?>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
			</div>

		</div>

		<div class='row'>
			<a name="theresa"></a>
			<div class="container" style="margin-top:70px;">
				<h1>Theresa</h1>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
				Voting test <br>
			</div>
		</div>
	</div>

</body>
</html>