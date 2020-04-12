<?php include_once("lib/header.php");?>

<p>
    <?php
    if(isset($_SESSION["message"]) && !empty($_SESSION["message"])){
    echo "<span style='color:red'>" . $_SESSION["message"] . "</span>";
    //session_unset();
    session_destroy(); 
  }
    ?>
    </p>
Welcome to NTW Academy<br/> <hr/>
<p>This is a coding Academy for beginners</p>
<p>In NTW Academy, we give you the best </p>

<?php
include_once("lib/footer.php");
?>


