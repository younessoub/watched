<?php 
  
  require("../includes/db.php");
  require("../includes/functions.php");
  

 
  if(isset($_GET['val'])){
    $val = validate($_GET['val']);
    if(userNameExists($conn, $val)){
      echo "taken";
    } else {
      echo "available";
    }
  }
?>