<?php
session_start();

$errorCount = 0;

$email =$_POST['email'] !=""?$_POST['email']:$errorCount++;
$password =$_POST['Password'] !="" ? $_POST['Password'] : $errorCount++;

$_SESSION['email']=$email; 

if($errorCount>0){
    $session_error = "You have "  . $errorCount . " error";
    if($errorCount >1){
        $session_error .= "s";
    }
  
      $session_error .=  " in your form submission";
       
       $_SESSION["error"] =  $session_error;   
        header("Location:login.php");
}
else{
    $allusers=scandir("db/users/");
    $countAllusers = count($allusers);
    for ($counter=0; $counter<$countAllusers; $counter++){
        $currentuser=$allusers[$counter];
         if ($currentuser == $email . ".json"){
            $userstring = file_get_contents("db/users/" .$currentuser);
            $userobject = json_decode($userstring);
            $passwordDB = $userobject->password;
            $passwordUser = password_verify($password, $passwordDB);
            
        if($passwordDB == $passwordUser){
            $_SESSION["Loggedin"] = $userobject->id;
            header("Location:dashboard.php");
            die();
        }
  
         }
    };
    $_SESSION["error"] = "Invalid email or password";
    header("Location:login.php");
    die();

}
