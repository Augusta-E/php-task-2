<?php
session_start();
//collecting data
$errorCount = 0;

//verifying the data/validation
$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $errorCount++;
$last_name =$_POST['last_name'] !=""?$_POST['last_name']:$errorCount++;
$email =$_POST['email'] !=""?$_POST['email']:$errorCount++;
$password =$_POST['Password'] !=""?$_POST['Password']:$errorCount++;
$gender =$_POST['gender'] !=""?$_POST['gender']:$errorCount++;
$designation =$_POST['designation'] !=""?$_POST['designation']:$errorCount++;
$department =$_POST['Department'] !=""?$_POST['Department']:$errorCount++;

$_SESSION['first_name']=$first_name;
$_SESSION['last_name']=$last_name;
$_SESSION['email']=$email;
$_SESSION['gender']=$gender;
$_SESSION['designation']=$designation;
$_SESSION['department']=$department;

if($errorCount>0){
    $session_error = "You have "  . $errorCount . " error";
    if($errorCount >1){
        $session_error .= "s";
    }
  
      $session_error .=  " in your form submission";
       
       $_SESSION["error"] =  $session_error;   
        header("Location:register.php");
}
   
else{
    $allusers=scandir("db/users/");
    $countAllusers = count($allusers);
    $newUserId = ($countAllusers-1);
    $userobject =[
        'Id'=>$newUserId,
        'first_name'=>$first_name,
        'last_name'=>$last_name,
        'email'=>$email,
        'password'=> password_hash ($password, PASSWORD_DEFAULT),
        'gender'=>$gender,
        'gender'=>$gender,
        'designation'=>$designation,
        'department'=>$department,
    ];

for ($counter=0; $counter<$countAllusers; $counter++){
$currentuser=$allusers[$counter];
 if ($currentuser == $email . ".json"){
    $_SESSION["error"] = "Registration failed, user already exist";
    header("Location:register.php");
  } 
 }

    file_put_contents("db/users/" . $email. ".json", json_encode ($userobject));
    $_SESSION["message"] = "Registration successful, you can now login " . $first_name;
    header("Location:login.php");
}



