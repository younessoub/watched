<?php
  session_start();
  

if(isset($_SESSION['name'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Movies</title>
</head>
<body>
  <?php 
    require("../includes/header.php");
     
  ?>
</body>
</html>

<?php 
  
}else{
  header("location: ../login.php");
}

?>