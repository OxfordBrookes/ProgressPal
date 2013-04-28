<!DOCTYPE html>
<html>
	<head>
		<title>ProgressPal</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?php echo base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
		<link href="<?php echo base_url('css/global-styles.css') ?>" rel="stylesheet" media="screen">
		<link href="<?php echo base_url('css/milestone-styles.css') ?>" rel="stylesheet" media="screen">
                <link href="<?php echo base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
	</head>
	<body>
            <div class="container">
                <div class="hero-unit">
		<h1>Milestones</h1> 
		<div class="progress">
			<div class="bar bar-success" style="width: 0%;">You</div>
			<div class="bar bar-warning" style="width: 0%;">Average</div>
			<div class="bar bar-danger" style="width: 100%;">Incomplete</div>
		</div>
		<div id="milestone" class="milestones">
		</div>
                </div>
            </div>
        <script type="text/JavaScript">
            BASE_URL = "<?php echo base_url() ?>";
            USER_ID = <?php echo $this->session->userdata('user_id') ?>;
        </script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
		<script src="<?php echo base_url('js/dashboard.js') ?>"></script>
            
	</body>
</html>