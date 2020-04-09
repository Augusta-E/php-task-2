<?php 
session_start();
include_once("lib/header.php");
 ?>  
 <p>
    <?php
    if(isset($_SESSION["message"]) && !empty($_SESSION["message"])){
    echo "<span style='color:Blue'>" . $_SESSION["message"] . "</span>";
    //session_unset();
    session_destroy(); 
  }
    ?>
    </p> 
    
    <h3 style='color:green'>Welcome! please Login to your page</h3>
  
  
    <form method="POST" action = "processlogin.php">
  <p>
<label>Email</label><br/>
<input
<?php
if(isset($_SESSION['email'])){
  echo "value=" . $_SESSION['email'];
}
?>
 type = "text" name="email" placeholder="Enter your email" />
  </P>
  <p>
<label>Password</label><br/>
<input type = "Password" name="Password" placeholder="Password" />
  </P>


  <p>
  <button type="submit">Login</button>
  </p>
</form> 
   <?php include_once("lib/footer.php");?>
   
