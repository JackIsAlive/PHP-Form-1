<?php
$name = $email = $comment = $website = $gender = "";
$nameErr = $emailErr = $websiteErr = $genderErr = "";

function test_input($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

    if (empty($_SERVER["REQUEST_METHOD"]=='POST')) {
        $nameErr = "Name is required" ;      
    }   else {
            $name = test_input($_POST["name"]);
            if(!preg_match("/^[a-zA-Z ]*$/",$name)){
            $nameErr = "Only letters and white space allowed";


            }
    
    
        }
;

if (empty($_POST["email"])) {

  $emailErr = "Please enter a valid email address";
}
else {
  $email = test_input($_POST["email"]);
}

if (empty($_POST["comment"])) {
  $comment = "";
  } else {
  $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    } else {
    $gender = test_input($_POST["gender"]);
    }

    if(empty($_POST["website"])) {
      $website="";
    }
    else {
      $website = test_input($_POST["website"]);
      if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
        $websiteErr="Invalid URL";
      }


    }





    include('index.php')
    
?>