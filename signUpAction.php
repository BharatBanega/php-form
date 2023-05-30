<?php

//Connecting to the database

session_start();
try {
    $con = new PDO('mysql: host=localhost; dbname=id19512279_db', 'id19512279_dbu', '(e8jT%ViCa^r<p=~');
}
catch (PDOException $e){
die("Error : ".$e->getMessage()."<br/>");
} 


//Declaring the required variables

$username=filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$hash=password_hash($password=$_POST['password'], PASSWORD_BCRYPT);
$stmt = $con->prepare("select * from accounts where username= ?");
$stmt->execute([$username]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt2 = $con->prepare("select * from accounts where email= ?");
$stmt2->execute([$email]);
$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);

//Checking if the posted username input value is empty or not

if (isset($username) && $username) {

//Checking if an account with that username already exists

  if ($username != $result['username']) {

//Checking if the posted email input value is empty or not

    if (isset($email) && $email) {

//Checking if an account with that email address already exists

     if ($email != $result2['email']) {

//Checking if the posted password input value is empty or not

      if (isset($password) && $password) {
       
//Checking if the posted password conformation input value is empty or not

        if (isset($confirm_password) && $confirm_password) {

//Checking if the posted password input value and the posted password conformation input value match each other

          if ($password == $confirm_password) {

//Checking if the user has agreed to the privacy policy

            if (isset($_POST['agreement'])) {
                
// Returning the response 8 snding input data to the database  
             $stmt3 = $con->prepare('insert into accounts (username, email, password) values(?, ?, ?)');
             $stmt3->execute([$username, $email, $hash]);
             echo json_encode(array('success' => '8'));
             
            } else { /* Returning the response 7, if the user does not agree with the privacy policy */ echo json_encode(array('success' => '7')); }
          } else { /* Returning the response 6, if the posted password input value does not match with the posted password confirmation value */ echo json_encode(array('success' => '6')); }
        } else { /* Returning the response 5, if the posted password confirmation input value is empty */ echo json_encode(array('success' => '5')); }
      } else { /* Returning the response 4, if the posted password input value is empty */ echo json_encode(array('success' => '4')); }
     } else { /* Returning the response 3, if an account with the same email address exists */ echo json_encode(array('success' => '3')); }
    } else { /* Returning the response 2, if the posted email input value is empty */ echo json_encode(array('success' => '2')); }
  } else { /* Returning the response  1, if an account with the same username exists */ echo json_encode(array('success' => '1')); }

} else { /* Returning the response 0, if the posted username input value is empty */ echo json_encode(array('success' => '0')); }
?>
