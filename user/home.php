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
  <title>Home</title>
</head>
<body>
  <?php 
    require("../includes/header.php");
     
  ?>
  
  
  <main>
    <div class="search">
      <input class="search-field" placeholder="Search" type="text">
      <input class="search-button" type="button" value="Go">
    </div>
    <div class="search-results">

      <div class="element">
        <div class="image">
          <img src="https://i.ytimg.com/vi/MJuFdpVCcsY/movieposter_en.jpg" alt="">
        </div>
        <div class="info">
          <p>Jumanji <span>2020</span></p>
          <p>Your Rating : 8/10</p>
        </div>
      </div>

      <div class="element">
        <div class="image">
          <img src="https://i.ytimg.com/vi/MJuFdpVCcsY/movieposter_en.jpg" alt="">
        </div>
        <div class="info">
          <p>Jumanji <span>2020</span></p>
          <p>Your Rating : 8/10</p>
        </div>
      </div>

      <div class="element">
        <div class="image">
          <img src="https://i.ytimg.com/vi/MJuFdpVCcsY/movieposter_en.jpg" alt="">
        </div>
        <div class="info">
          <p>Jumanji <span>2020</span></p>
          <p>Your Rating : 8/10</p>
        </div>
      </div>
      <div class="element">
        <div class="image">
          <img src="https://i.ytimg.com/vi/MJuFdpVCcsY/movieposter_en.jpg" alt="">
        </div>
        <div class="info">
          <p>Jumanji <span>2020</span></p>
          <p>Your Rating : 8/10</p>
        </div>
      </div>
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