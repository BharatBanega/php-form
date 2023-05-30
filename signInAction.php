<?php 

//Connecting to the database

session_start();
try {
    $con = new PDO('mysql: host=localhost; dbname=db', 'dbu', 'dbp');
}
catch (PDOException $e){
die("Error : ".$e->getMessage()."<br/>");
} 


//Checking if the posted username or email input value is empty or not

if ($_POST['login_username'] != "") {


$username = filter_var($_POST['login_username'], FILTER_SANITIZE_STRING);
$stmt = $con->prepare("select username, password from accounts where username= ?");
$stmt->execute([$username]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
//$stmt2 = $con->prepare("select password from accounts where username= ?");
//$stmt2->execute([$username_or_email]);
//$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
//Checking if an account with the posted username or email exists

 if ($username == $result['username']) {

//Checking if the posted password input value is empty or not 

  if (isset($_POST['login_password'])) {

$password=$_POST['login_password'];

//Checking if the posted password matches with the password of the account or not

    if (password_verify($password, $result['password'])) {

       /* Returning the response 13, after successfully signing into the account */ echo json_encode(array('success' => '13'));
       
    } else { /* Returning the response 12, if the posted password matches with the password of the account */ echo json_encode(array('success' => '12')); }
  } else { /* Returning the response 11, if the posted password input value is empty */ echo json_encode(array('success' => '11')); }
 } else { /* Returning the response 10, if an account with the same username or email does not exist */ echo json_encode(array('success' => '10')); }
} else { /* Returning the response 9, if the posted username or email input value is empty */ echo json_encode(array('success' => '9')); }
?>
