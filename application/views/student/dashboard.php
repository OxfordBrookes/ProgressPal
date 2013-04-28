<!DOCTYPE html>
<html>
	<head>
		<title>ProgressPal</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?php echo base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
		<link href="<?php echo base_url('css/global-styles.css') ?>" rel="stylesheet" media="screen">
		<link href="<?php echo base_url('css/milestone-styles.css') ?>" rel="stylesheet" media="screen">
	</head>
	<body>
		<h1>Milestones</h1>
		<div class="progress">
			<div class="bar bar-success" style="width: 35%;">You</div>
			<div class="bar bar-warning" style="width: 20%;">Average</div>
			<div class="bar bar-danger" style="width: 45%;">Incomplete</div>
		</div>
		<div class="milestones">
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
	</body>
</html>