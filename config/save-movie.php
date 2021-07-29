<?php
  session_start();
  

if(isset($_SESSION['name'])){
  require("../includes/db.php");
?>


  <?php 


    $userId = $_SESSION["id"]; 
    $movieId = intval(htmlspecialchars( $_GET["id"]),  10);
    $rating = floatval(htmlspecialchars($_POST["rating"]));
  
  
    function movieExists($conn, $userId, $movieId){
      $sql = "SELECT * FROM movies WHERE userId = ? AND movieId = ? ;";
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_bind_param($stmt,"ii",$userId, $movieId);
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
      
      if(mysqli_num_rows($res)>0){
        $sql = "DELETE FROM movies WHERE userId = ? AND movieId = ? ;";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt,"ii",$userId, $movieId);
        mysqli_stmt_execute($stmt);
      }
    }
    
    movieExists($conn, $userId, $movieId);
    $sql = "INSERT INTO movies (userId, movieId, rating) VALUES(?,?, ?);";   
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "iid", $userId, $movieId, $rating);
    mysqli_stmt_execute($stmt);
    
    header("location: ../user/mymovies.php");

  ?>





<?php 
  
}else{
  header("location: ../login.php");
}

?>