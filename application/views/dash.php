<!DOCTYPE html>
<html>
	<head>
		<title>ProgressPal</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/global-styles.css" rel="stylesheet" media="screen">
		<link href="css/milestone-styles.css" rel="stylesheet" media="screen">
	</head>
	<body>
		<h1>Milestones</h1>
		<div class="progress">
			<div class="bar bar-success" style="width: 35%;">You</div>
			<div class="bar bar-warning" style="width: 20%;">Average</div>
			<div class="bar bar-danger" style="width: 45%;">Incomplete</div>
		</div>
		<div class="milestones">
			<div class="milestone">
				<div class="circle grey pull-left"></div>
				<div class="pull-left">
					<div class="name">Name</div>
					<div class="desc">Decription</div>
				</div>
				<div class="clearfix"></div>
				<div class="milestones">
					<div class="milestone">
						<div>
						<div class="circle grey pull-left"></div>
						<div class="pull-left">
							<div class="name">Name</div>
							<div class="desc">Decription</div>
						</div>
						<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>