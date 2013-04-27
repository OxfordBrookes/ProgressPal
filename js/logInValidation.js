/* 
 *=================  LOG IN VALIDATION  =====================
 *  This script does not let the user proceed to log in 
 * if there is an empty field, or obvious mistake.
 */

//Input Field Names
var formName      = "frmLogin";       //The name attribute of the form
var usernameField = "txtUsername"; //The name of the username field
var passwordField = "txtPassword"; //The name of the password field
var dynamicUserOp = "p#userOps";   //The Full Selector for user text
var staySignedInOp= "input[name=staySignedIn]"; //Full Selector for stay signed in checkbox
var passReqCont   = "#passwordRequired"; //The full selector for the login container
var passFoggotCont= "#iForgotMyPassword";//The full selector for password reset container


//Check username is not empty
$(document).ready(function(){ 
  $('form[name='+formName+']').submit(function() {
      if (checkFieldNotEmpty(usernameField) & 
          checkFieldNotEmpty(passwordField)){
            return true; }
      else{ return false;}
  });
});

//Generic Function to Check a Specified field is not empty
function checkFieldNotEmpty(fieldName){
    if ($('form[name='+formName+'] input[name='+fieldName+']').val() == '') {
        $('form[name='+formName+'] input[name='+fieldName+']').css("border","1px solid red").focus();
      return false;}
    else {return true;} 
}

//Hide Error Messages once Corrected
$(document).ready(function(){
  $('form[name='+formName+'] input').keyup(function() {
      if ($(this).val()!=""){ 
          $(this).css("border","1px solid #6E6E6E")
      }
  });
});


//Show the stay signed in box, once in password field
$(document).ready(function(){
  $('form[name='+formName+']').children('input[name='+passwordField+']').keyup(function() {
    if ($('form[name='+formName+'] input[name='+usernameField+']').val() != '' && $('input[name='+passwordField+']').val() != ''){
      $("form[name="+formName+"] p#userOps").text('Stay Signed In?').removeClass('click').delay(100);
      $("form[name="+formName+"] input[name=staySignedIn]").fadeIn(); }
    else {
      $("form[name="+formName+"] "+dynamicUserOp).text('Forgot Password?').addClass('click');
      $("form[name="+formName+"] "+staySignedInOp).fadeOut();      
    }
  });
});

//Show password reset option
$(dynamicUserOp).click(function(){
  $(passReqCont).fadeOut();
  $(passFoggotCont).delay(450).fadeIn();  
})

$('#iRememberItNow').click(function(){
  $(passFoggotCont).fadeOut();
  $(passReqCont).delay(450).fadeIn();  
})








/* 
 * ================   SIGN UP VALIDATION   ================
 * Validates the users input as they type it
 * Informs them of anything invalid/ borderline
 * Doesn't let them proceed if there is anything wrong
 */


//Input Field Names (ALL FULL SELECTORS)
var suFormSelector    =   "[name=sighnUp]"        //The Main Form
var suUsernameField   =   "[name=txtSuUsername]"  //Username Field
var suEmailAddField   =   "[name=txtEmail]"       //Email Address Field
var suPasswordField   =   "[name=txtSuPassword]"  //Password Field
var suConfPassField   =   "[name=txtSuPasswordConf]"//Confirm Password Field
var suMessageText     =   "#fieldDescription"     //P tag where field description will show

var element = "";

//Tell the user what the point of the current field is
$(suUsernameField).focus(function(){
  setDescriptionOfField("The username will be your display name");
});
$(suEmailAddField).focus(function(){
  setDescriptionOfField("Email used only for password recovery");
});
$(suPasswordField).focus(function(){
  setDescriptionOfField("Password will be used to log in");
});
$(suConfPassField).focus(function(){
  setDescriptionOfField("Confirm the password you typed above");
});

//Hide message when they leave input field
$(suFormSelector+" input").blur(function(){ 
  $(suMessageText).text("");
});


//Validate the username as they type it
$(suFormSelector+" "+suUsernameField).keyup(function() {
  if($(this).val().length < 2){ 
    setDescriptionOfField("Your username must be at least 3 characters"); }
  else if($(this).val().length > 20){
   setDescriptionOfField("Your username is too long");}
  else { setDescriptionOfField(""); }
});

//Validate the password as they type it
$(suFormSelector+" "+suPasswordField).keyup(function() {
  if($(this).val().length < 6 && $(this).val().length > 1){
    setDescriptionOfField("Your Password must be at least 6 characters"); }
  else if($(this).val().length > 20){
   setDescriptionOfField("Your password is too long");}
  else { setDescriptionOfField("Password will be used to log in"); }
});

//Validate the password confrimation as they type it
$(suFormSelector+" "+suConfPassField).keyup(function() {
  if(($(this).val() != $(suFormSelector+" "+suPasswordField).val()) 
      && ($(this).val().length>4)){ 
    setDescriptionOfField("Your Passwords must match"); }
else if ($(this).val().length<5){
    setDescriptionOfField("Confirm the password you typed above");}
else {setDescriptionOfField("Passwords match")}
});

//Check the username is all cool
$(suFormSelector).submit(function() {
  if ($(suUsernameField).val() == '') {
    showFailMessage("Please choose a username", suUsernameField);      
    return false; }
  else if($(suUsernameField).val().length < 2){
    showFailMessage("Username must be atleast 3 characters long", suUsernameField);
    return false; }
  else if($(suUsernameField).val().length > 20){
    showFailMessage("Username must be under 20 characters long", suUsernameField);
    return false; }
  else { return true; }
});


//Check the password
$(suFormSelector).submit(function() {
  if ($(suPasswordField).val() == '') {
    showFailMessage("Please choose a Password", suPasswordField);      
    return false; }
  else if($(suPasswordField).val().length < 5){
    showFailMessage("Your password should be at least 6 characters", suPasswordField);
    return false; }
  else if($(suPasswordField).val().length > 25){
    showFailMessage("Password must be under 25 characters", suPasswordField);
    return false; }
  else { return true; }
});


//Check both the passwords match
$(suFormSelector).submit(function() {

  if ($(suConfPassField).val() == "") { 
    showFailMessage("You must confirm your password", suConfPassField);      
    return false; }
  else if ($(suPasswordField).val() != $(suConfPassField).val()) { 
    showFailMessage("Your passwords must match", suConfPassField);      
    return false; }
  else { return true; }
});



//Check their email is valid - or looks valid
$(suFormSelector).submit(function() {
  if ($(suEmailAddField).val() == '') {
    showFailMessage("Please enter your email", suEmailAddField);      
    return false; }
  else { return true; }
});


function showFailMessage(message, element){
  $(element).focus();
  $(element).css("border","1px solid red");  
  $('#fieldDescription').text(message);
}

function setDescriptionOfField(newText){
   $(suMessageText).text(newText);
}

//Hide Error Messages once Corrected
$(document).ready(function(){
  $(suFormSelector+' input').keyup(function() {
      if ($(this).val()!=""){ 
          $(this).css("border","1px solid #6E6E6E")
      }
  });
})








//$('input[placeholder], textarea[placeholder]').placeholder();


/*
 * @author Alicia Sykes
 */

