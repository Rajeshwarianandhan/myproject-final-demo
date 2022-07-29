<?php

header("Access-Control-Allow-Methods: GET,POST,PUT,PATCH,DELETE");
header('Access-Control-Allow-Credentials: true');
header('Content-Type: plain/text');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods,Access-Control-Allow-Origin, Access-Control-Allow-Credentials, Authorization, X-Requested-With");

include "config.php";

$user = new stdClass();
    session_start();

    $user->fname = $_SESSION['fname'];
    $user->lname = $_SESSION['lname'];
    $user->email = $_SESSION['email'];
    $user->password = $_SESSION['password'];
    $user->mobile = $_SESSION['mobile'];
    $user->dob = $_SESSION['dob'];

    $myJSON = json_encode($user);
            
    echo $myJSON;
   
    $_SESSION['profileData'] = $myJSON;

    

?>