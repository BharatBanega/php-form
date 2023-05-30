<?php 


session_start();

//Connecting to the database

try {
    $con = new PDO('mysql: host=localhost; dbname=db', 'dbu', 'dbp');
}
catch (PDOException $e){
die("Error : ".$e->getMessage()."<br/>");
} 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>form</title>
<meta charset="UTF-8" name="viewport" content="width=device-width, user-scalable=no" />


<!-- Including cdns -->

<script type='text/javascript' src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script type='text/javascript' src="https://cdn.tailwindcss.com"></script>


<!-- Styling the web page -->

<style type="text/tailwindcss">
 body {
     @apply bg-blue-600 text-white pointer-events-auto cursor-default select-none;
 }
 main {
     @apply text-center p-3.5;
 }
 header {
    @apply font-bold text-3xl;
 }
 input {
     @apply text-black p-3.5 rounded-full text-center;
 }
 input[type='submit'] {
     @apply bg-green-600 text-white p-1 hover:cursor-pointer hover:bg-green-500 active:bg-green-500;
 }
 form {
     @apply block;
 }
 .message_success {
     @apply bg-green-100 text-green-800 text-center border-b-2 border-b-green-800 p-1 fixed top-0 w-full;
 }
 .message_error {
    @apply bg-red-100 text-red-800 text-center border-b-2 border-b-red-800 p-1 fixed top-0 w-full;
 }
 #signIn, #otpform {
     @apply hidden;
 }
</style>
</head>
<body>
<main>
    
    
<!-- Sign Up Form -->

<form id='signUp' method='post'>
 <br />
 <header>
<h1>Sign Up</h1>
</header>
 <br />
<input type='text' placeholder='username' name='username' id='username' maxlength='10'/>
 <br /> <br />
<input type='email' placeholder='email' name='email' id='email' maxlength='50'/>
 <br /> <br />
<input type='password' placeholder='password' name='password' id='password' maxlength='50' />
 <br /> <br />
<input type='password' placeholder='confirm password' name='confirm_password' id='confirm_password' />
 <br /> <br />
<p>Agree with the <a class='hover:cursor-pointer hover:underline' id='pp'>privacy policy</a> of the website <input class='hover:cursor-pointer' type='checkbox' name='agreement' /></p> 
 <br />
<input type='submit' class='submit' value='Sign Up' />
 <br /> <br /> <br />
<p class='text-center'>Have an account? <a id='lSignIn' class='hover:cursor-pointer hover:underline active:underline'>Sign in?</a></p>
</form>


<!-- Privacy Policy section -->

<div id='privpol' class='hidden text-black bg-white p-5 absolute top-0'><p class='text-right hover:cursor-pointer' id='close'>x</p> <h1 class='text-center text-bold'><b>Privacy Policy</b></h1> <br /> <br /><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p></div>

<!-- Sign In Form -->

<form id='signIn' method='post'>
 <br />
 <header>
<h1>Sign In</h1>
</header>
 <br />
<input id='login_username' type='text' placeholder='username' name='login_username' maxlength='10'/>
 <br /> <br />
<input id='login_password' type='password' placeholder='password' name='login_password' maxlength='50'/>
 <br /> <br />
<input type='submit' class='submit' value='Sign In' />
 <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
<p class='text-center'>Don't have an account? <a id='lSignUp' class=' hover:cursor-pointer hover:underline active:underline'>Sign up?</a></p>
</form>

</main>
<footer>

</footer>
<script type='text/javascript'>
//Sign up ajax

$(document).ready(function() {
    $('#signUp').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'signUpAction.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response)
            {
                var jsonData = JSON.parse(JSON.stringify(response));
                
 // appending an error message to body if username input value is empty 

 if (jsonData.success == "0") { $('body').append("<div class='message_error'><h4>You Need to Specify an Username for Your Account</h4></div>"); $('input').removeClass('border-2 border-red-500'); $('#username').addClass('border-2 border-red-500'); }


 // appending an error message to body if the echoed response is 1 

 else if (jsonData.success == "1") { $('body').append("<div class='message_error'><h4>An Account with The Same Username Already Exists</h4></div>"); $('input').removeClass('border-2 border-red-500'); $('#username').addClass('border-2 border-red-500'); }


 // appending an error message to body if the echoed response is 2 

 else if (jsonData.success == "2") { $('body').append("<div class='message_error'><h4>You Need to Specify an Email Address for Your Account</h4></div>"); $('input').removeClass('border-2 border-red-500'); $('#email').addClass('border-2 border-red-500'); }


 // appending an error message to body if the echoed response is 3

 else if (jsonData.success == "3") { $('body').append("<div class='message_error'><h4>An Account with The Same Email Address Already Exists</h4></div>"); $('input').removeClass('border-2 border-red-500'); $('#email').addClass('border-2 border-red-500'); }


 // appending an error message to body if the echoed response is 4

 else if (jsonData.success == "4") { $('body').append("<div class='message_error'><h4>You Need to Specify a Password for Your Account</h4></div>"); $('input').removeClass('border-2 border-red-500');  $('#password').addClass('border-2 border-red-500'); }


 // appending an error message to body if the echoed response is 5

 else if (jsonData.success == "5") { $('body').append("<div class='message_error'><h4>You Need to Confirm the Password which You Specified for Your Account</h4></div>"); $('input').removeClass('border-2 border-red-500'); $('#confirm_password').addClass('border-2 border-red-500'); }


 // appending an error message to body if the echoed response is 6

 else if (jsonData.success == "6") { $('body').append("<div class='message_error'><h4>The Password Did Not Match</h4></div>"); $('input').removeClass('border-2 border-red-500'); $('#password, #confirm_password').addClass('border-2 border-red-500');}


 // appending an error message to body if the echoed response is 7

 else if (jsonData.success == "7") { $('body').append("<div class='message_error'><h4>You Must Agree with Our Privacy Policy to Continue</h4></div>"); $('input').removeClass('border-2 border-red-500'); $('#agreement').addClass('border-red-500'); }


 // switching to the otp form if  the echoed response is 8

 else if (jsonData.success == "8") { $('input').removeClass('border-2 border-red-500');
 $('.message_error').hide(); $('.message_success').hide(); $('body').append("<div class='message_success'><h4>Your Account has been Successfully Created</h4></div>"); } 


 // appending an error message to body if the echoed response is something else 

 else { $('body').append("<div class='message_error'><h4>An Unknown Error has Occured</h4></div>"); $('input').removeClass('border-2 border-red-500');}


                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    } 
       });
     });
    });


//Sign in ajax

    $(document).ready(function() {
        $('#signIn').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'signInAction.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response)
            {
                var jsonData = JSON.parse(JSON.stringify(response));

 // appending an error message to body if the echoed response is 9

if (jsonData.success == "9") { $('body').append("<div class='message_error'><h4>You Need to Specify Username or Email of Your Account</h4></div>"); $('input').removeClass('border-2 border-red-500'); $('#login_username').addClass('border-2 border-red-500'); }


// appending an error message to body if the echoed response is 10

else if (jsonData.success == "10") { $('body').append("<div class='message_error'><h4>Account does not Exist</h4></div>"); $('input').removeClass('border-2 border-red-500'); $('#login_username').addClass('border-2 border-red-500'); }


// appending an error message to body if the echoed response is 11

else if (jsonData.success == "11") { $('body').append("<div class='message_error'><h4>You Need to Specify the Password of Your Account</h4></div>"); $('input').removeClass('border-2 border-red-500'); $('#login_password').addClass('border-2 border-red-500'); }


// appending an error message to body if the echoed response is 12

else if (jsonData.success == "12") { $('body').append("<div class='message_error'><h4>Wrong Password</h4></div>"); $('input').removeClass('border-2 border-red-500'); $('#login_password').addClass('border-2 border-red-500'); }


// appending a success message to body if the echoed response is 13

else if (jsonData.success == "13") { $('body').append("<div class='message_success'><h4>You have Successfully Signed into Your Account</h4></div>"); $('input').removeClass('border-2 border-red-500'); }


// appending an error message to body if the echoed response is something else

else { $('body').append("<div class='message_error'><h4>An Unknown Error has Occured</h4></div>"); $('input').removeClass('border-2 border-red-500');}


                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    } 
       });
     }); 
    });


//Switching from sign up form to sign in form

$("#lSignUp").click(function(){$("#signUp").show(); $("#signIn").hide(); $(".message_error").hide(); $(".message_success").hide();});


//Switching from sign in form to sign up form

$("#lSignIn").click(function(){$("#signIn").show(); $("#signUp").hide(); $(".message_error").hide(); $(".message_success").hide();});


//Opening privacy policy section

$("#pp").click(function(){$('#privpol').show()});


//Closing privacy policy section

$('#close').click(function(){ $('#privpol').hide();});


</script>
</body>
</html>
