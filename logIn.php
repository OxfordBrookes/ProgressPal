<!DOCTYPE html>
<html>
  <head>
    <title>ProgresPal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/globalStyles.css" rel="stylesheet" media="screen">
    <link href="css/logInStyles.css" rel="stylesheet" media="screen">
  </head>
  <body>
      <div class="container"> 
          <div class="head">
              <h1>ProgressPal</h1>
          </div>
       <div id="passwordRequired">   
        <div id="formCont">
            <h2>Log In</h2>
            
            <form name="frmLogin" action="/index.php" mehod="post">
                <input type="text" name="txtUsername" placeholder="Username"  />
                <input type="password" name="txtPassword" placeholder="Password" />
                <br />  
                <p class="small click" id="userOps">Forgot Password?</p>
                <input type="checkbox" name="staySignedIn" class="hide" value="true" id="chkStaySignedIn"/>
                <br />
                <button type="submit">Log In</button>
            </form>
            </div>
        </div>
      </div>
    <script src="http://code.jquery.com/jquery.js"></script>
     <script src="js/logInValidation.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
  </body>
</html>