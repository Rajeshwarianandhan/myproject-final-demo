<?php

    header("Access-Control-Allow-Methods: GET,POST,PUT,PATCH,DELETE");
    header('Access-Control-Allow-Credentials: true');
    header('Content-Type: plain/text');
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods,Access-Control-Allow-Origin, Access-Control-Allow-Credentials, Authorization, X-Requested-With");


    
    include "config.php";

    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $passwordhash=md5($password);
    $mobile=$_POST["mobile"];
    $dob=$_POST["dob"];

    $stmt=$conn->prepare("SELECT email FROM user_new WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->store_result();
    
    if($stmt->num_rows > 0){
    
        $stmt->bind_result($email);
        $stmt->fetch();
        
        echo json_encode(['status'=>'error']);
        
        // $stmt->close();
    }else{

        $stmt = $conn->prepare("INSERT INTO user_new (fname,lname,email,password,mobile,dob)
        VALUES (?,?,?,?,?,?)");
   
        $stmt->bind_param("ssssss",$fname,$lname,$email,$passwordhash,$mobile,$dob);
   
        if($stmt->execute()){
   
           echo json_encode(['status'=>'success']);
   
        }else{
   
            echo "Something wrong";   
   
        }
    } 
    $stmt->close();
   
?>