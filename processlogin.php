<?php
session_start();

$errorCount = 0;

$email =$_POST['email'] !=""?$_POST['email']:$errorCount++;
$password =$_POST['Password'] !="" ? $_POST['Password'] : $errorCount++;

$_SESSION['email']=$email;

if($errorCount=1){
    $session_error = "You have "  . $errorCount . " error in your form submission";
    //    $session_error = "You have" . ""  . $errorCount . "". " error";
   
       // $session_error = "in your form submission";
        
        $_SESSION["error"] =  $session_error;

    header("Location:login.php");
}elseif($errorCount >1){
    $session_error = "You have " . $errorCount . " errors in your form submission";
    $_SESSION["error"] =$session_error;
    
    header("Location:login.php");

}else{
    echo "No error";
    header("Location:login.php");
}
