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
    <h3 class="welcome">Welcome <?php echo $_SESSION['name']?>!</h3>
    <div class="search">
      <input class="search-field" placeholder="Search" type="text">
      <input class="search-button" type="button" value="Go">
    </div>
    <div class="search-results">
       
      <!-- <div class="element">
        <div class="image">
          <img src="https://i.ytimg.com/vi/MJuFdpVCcsY/movieposter_en.jpg" alt="">
        </div>
        <div class="info">
           <span>2018</span>
          <p>My Rating :<span> <i>8</i>/10</span></p>
        </div>
      </div>

      <div class="element">
        <div class="image">
          <img src="https://i.ytimg.com/vi/MJuFdpVCcsY/movieposter_en.jpg" alt="">
        </div>
        <div class="info">
          <span>2018</span>
          <p>My Rating :<span> <i>8</i>/10</span></p>
        </div>
      </div>

      <div class="element">
        <div class="image">
          <img src="https://i.ytimg.com/vi/MJuFdpVCcsY/movieposter_en.jpg" alt="">
        </div>
        <div class="info">
          <span>2018</span>
          <p>My Rating :<span> <i>8</i>/10</span></p>
        </div>
      </div>
      <div class="element">
        <div class="image">
          <img src="https://i.ytimg.com/vi/MJuFdpVCcsY/movieposter_en.jpg" alt="">
        </div>
        <div class="info">
          <span>2018</span>
          <p>My Rating :<span> <i>8</i>/10</span></p>
        </div>
      </div> -->

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