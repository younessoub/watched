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
  <link rel="stylesheet" href="../css/movie.css?v=<?php echo time(); ?>">
  <script src="../js/movie.js" defer></script>
  <title>Movie</title>
</head>
<body>
  <?php 
    require("../includes/header.php");

    
  ?>
  
  <?php 
        require("../includes/db.php");
        $userId = $_SESSION["id"]; 
        $movieId = intval(htmlspecialchars( $_GET["id"]),  10);
    
        $sql = "SELECT rating FROM movies WHERE userId = ? AND movieId = ? ;";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt,"ii",$userId, $movieId);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($res)>0){
          $rating = mysqli_fetch_assoc($res)['rating'];
        }
        else{
          $rating = 0;
        }

  ?>

  <div class="info">

    <img class='backdrop'  alt=''/>
    <p class='infos t' ></p>
    <p class='infos director'>Directed By: </p>
    <p class='infos date'>Release date: </p>
    <p class='infos time'>Runtime: </p>
    <p class='infos tagline'></p>
    <p class='infos overview'></p>
    <div class='rating'>
        Rate this movie:
          <form class='rating-form' action='../config/save-movie.php?id=<?php echo $_GET["id"];?>' method='POST' >
            <span id='rate' ><?php echo $rating; ?> </span>/10 
            <input class='range' type='range'  oninput='getRating(this.value)' value=<?php echo $rating; ?> min='0' max='10' step='0.1' name='rating' required/>
            <input class ='save' type='submit' value ='Save'/>
          </form>
    </div>

  </div>
  


</body>
</html>



<?php 
  
}else{
  header("location: ../login.php");
}

?>