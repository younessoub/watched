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
  <title>Home</title>
</head>
<body>
  <h1><?php 
     
    echo "Hello ". $_SESSION['name']." your id is ".$_SESSION['id'];
     
  ?>
  </h1>
  <a href="logout.php">Log out</a>
</body>
</html>

<?php 
  }
else{
  header("location: ../login.php");
}

?>