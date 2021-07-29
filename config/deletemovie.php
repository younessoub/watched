<?php
  session_start();
  

if(isset($_SESSION['name'])){
  require("../includes/db.php");
  
  $userId = $_SESSION["id"]; 
  $movieId = intval(htmlspecialchars( $_GET["id"]),  10);
  if($userId && $movieId){
    $sql = "DELETE FROM movies WHERE userId = ? AND movieId = ? ;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"ii",$userId, $movieId);
    mysqli_stmt_execute($stmt);

    header("location:../user/mymovies.php");
  }


}
else{
  header("location: ../login.php");
}

?>