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
  <link rel="stylesheet" href="../css/mymovies.css?v=<?php echo time(); ?>">
  <title>My Movies</title>
</head>
<body>
  <?php 
    require("../includes/header.php");
     
  ?>


  <?php
  
    require("../includes/db.php");
    $userId = $_SESSION["id"]; 

    $sql = "SELECT  movieId, rating FROM movies WHERE userId = ? ORDER BY rating DESC;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"i",$userId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
  
    
  ?>

  <div class="mymovies">

    <?php
      if(mysqli_num_rows($res)>0){
        $IMGPATH = "https://image.tmdb.org/t/p/w1280";
        while($results = mysqli_fetch_assoc($res)){
          // echo $results["movieId"]."  ".$results["rating"]." <br>";
          $url = "https://api.themoviedb.org/3/movie/".$results['movieId']."?api_key=04c35731a5ee918f014970082a0088b1";
          $response = json_decode(file_get_contents($url));
          
    ?>
        <a href="movie.php?id=<?php echo $results['movieId']; ?>"><div class="element">
          <span class="remove">x</span>
          <div class="img"><img class="img" src="<?php echo $IMGPATH.$response->poster_path ?>" alt="<?php echo $response->title; ?>"></div>
          <div>
            <p ><?php echo $results["rating"];?></p>
          </div>
        </div></a>  
     
    <?php
        }
      }
      else{
    ?>
        <p class="nada">You have no movies </p>
    <?php    
      }
    ?>
  </div>


</body>
</html>

<?php 
  
}else{
  header("location: ../login.php");
}

?>