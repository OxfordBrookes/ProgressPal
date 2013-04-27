<!DOCTYPE html>
<html>
  <head>
    <title>ProgresPal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/global-styles.css" rel="stylesheet" media="screen">
    <link href="css/logIn-styles.css" rel="stylesheet" media="screen">
  </head>
  <body>
      <div class="container"> 
          <div class="head">
              <h1>ProgressPal</h1>
          </div>    
 
          
          <div class="span6">   
              <div id="welcomeDescription">
                  <h2>Welcome.</h2>
                  <p>Description of Page.  Text Text Text Text. Text Text Text Text.
                  Text Text Text Text.  </p>
                  
              </div>
              
       <div id="passwordRequired">   
        <div class="formCont">
            <h2>Log In</h2>
            
            <form name="frmLogin" action="/index.php" method="post">
                <input type="text" name="txtUsername" placeholder="Email Address"  />
                <input type="password" name="txtPassword" placeholder="Password" />
                <br />  
                <p class="small click" id="userOps">Forgot Password?</p>
                <input type="checkbox" name="staySignedIn" class="hide" value="true" id="chkStaySignedIn"/>
                <br />
                <button type="submit">Log In</button>
            </form>
            </div>
        </div>
          
        <div class="hide formCont" id="iForgotMyPassword">
           <h3>Reset Password</h3>
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
           <h2>Sign Up</h2>
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
      
      
    <script src="http://code.jquery.com/jquery.js"></script>
     <script src="js/logInValidation.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
  </body>
</html>