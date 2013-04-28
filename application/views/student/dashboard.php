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
                <div class="head">
                    <h1>ProgressPal</h1>
                </div>    
                <div class="hero-unit">
		<h1>Milestones</h1> 
		<div class="progress">
			<div class="bar bar-success" style="width: 0%;">You</div>
			<div class="bar bar-warning" style="width: 0%;">Average</div>
			<div class="bar bar-danger" style="width: 100%;">Incomplete</div>
		</div>
		
                
                <div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Section 1</a></li>
    <li><a href="#tab2" data-toggle="tab">Section 2</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <p>I'm in Section 1.</p>
    </div>
    <div class="tab-pane" id="tab2">
      <p>Howdy, I'm in Section 2.</p>
    </div>
  </div>
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