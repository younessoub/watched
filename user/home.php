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
  <link rel="stylesheet" href="../css/home.css?v=<?php echo time(); ?>">
  <script src="../js/home.js" defer></script>
  <title>Home</title>
</head>
<body>
  <?php 
    require("../includes/header.php");
     
  ?>
  
  
  
  <main>

    
    <h3 class="welcome">Welcome, <?php echo $_SESSION['name']?>!</h3>
    <div class="search">
      <input class="search-field" placeholder="Search" type="text">
      <input class="search-button" type="button" value="Go">
    </div>
    <p class="loading">Loading...</p>

    <div class="search-results">
    </div>
  
  </main>


  <?php 
    require("../includes/footer.php");
     
  ?>
</body>
</html>





<?php 
  
}else{
  header("location: ../login.php");
}

?>