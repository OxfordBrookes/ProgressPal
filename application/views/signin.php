<!DOCTYPE html>
<html>
  <head>
    <title>ProgressPal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('css/global-styles.css') ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('css/logIn-styles.css') ?>" rel="stylesheet" media="screen">
  </head>
  <body>
      <div class="container"> 
          <div class="head">
              <h1 class="c1">ProgressPal</h1>
              <img src="<?php echo base_url('img/blob.png') ?>" style="display: inline; width: 45px; margin: 2px;" />
          </div>    
          
            <img src="<?php echo base_url('img/up-grey.png') ?>" style="position: absolute; opacity: .4; width: 310px; margin-top: -20px;" />
          
          <div class="span6">   
              <div id="welcomeDescription" style="background: url(<?php echo base_url('img/up-grey.png') ?>)">
                  <h2 class="c2">Welcome.</h2>
                  <p>ProgressPal - A Buddy to make you Rise!</p>

                  <p>
                      <?php echo validation_errors('<div class="alert">', '</div>') ?>
                  </p>
              </div>
              
       <div id="passwordRequired">   
        <div class="formCont">

            <h2 class="c3">Log In</h2>

            
            <form name="frmLogin" action="<?php echo base_url('index.php/home/login') ?>" method="post">
                <input type="text" name="email" placeholder="Email Address"  />
                <input type="password" name="password" placeholder="Password" />
                <br />  
                <p class="small click" id="userOps">Forgot Password?</p>
                <input type="checkbox" name="staySignedIn" class="hide" value="true" id="chkStaySignedIn"/>
                <br />
                <button type="submit">Log In</button>
            </form>
            </div>
        </div>
          
        <div class="hide formCont" id="iForgotMyPassword">

           <h3 class="c4">Reset Password</h3>

          <form name="forgetPassword" action="/actions/resetPassword.php" method="post">
            <p>
              Enter your username or email address below, and we will 
              send you a password reset email.
            </p>
            <input type="text" name="usernameForget" id="usernameForget" class="textbox"
                 placeholder="Username or Email" autocomplete="off"/><br>
            <button type="submit" id="btnResetPass">
              Send Password Reset
            </button><br>
            <p class="small white click" id="iRememberItNow">Remembered Password?</p>
          </form>                
          </div>
          </div>
          
          <div class="span6">
          <div class="formCont" id="signUpForm">

           <h2 class="c5">Sign Up</h2>

          <form name="frmSignUp" action="" method="post">
                <input type="text" name="txtFirstName" placeholder="First Name" />
                <br />
                <input type="text" name="txtLastName" placeholder="Last Name" />
                <br />
                <input type="text" name="txtEmail" placeholder="Email Address" />
                <br />                
                <input type="password" name="txtSuPassword" placeholder="Chosen Password" />
                <br />
                <input type="password" name="txtSuPasswordConf" placeholder="Confirm Password" />
                <p id="fieldDescription" style="position: absolute; font-size: 12px; color: #B0B0B0; margin: 0; padding: 0;"></p>
                <br /><br />
                <button type="submit" id="cmdSignUp">Sign Up</button>
                <br />
          </form>                
          </div>
          </div>
          
          <div class="span12 pageFoot">
              <p class="BottomOfScreenText">(C) 2013</p>
              <br />
          </div>
      </div>
      
      
    <script src="<?php echo base_url('http://code.jquery.com/jquery.js') ?>"></script>
    <script src="<?php echo base_url('js/logInValidation.js') ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
   
  </body>
</html>