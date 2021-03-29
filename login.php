<?php
  require("includes/db.php");
  require("includes/functions.php");

  $account='';
  $info = '';
  if(isset($_GET['a'])){
    if($_GET['a']==='created'){
      $account = "Your Account Has Been Created Successfully, Please Log In. ";
    }
  }

  if(isset($_POST['login'])){
    $name = validate($_POST['username']);
    $password = validate($_POST['password']);

    if(emailExists($conn, $name)||userNameExists($conn, $name)){
      $sql = "SELECT * FROM users WHERE name = ? OR email = ?;";
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);

      mysqli_stmt_bind_param($stmt, "ss", $name, $name);
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($res);

      //returning hashed password
      $hpassword = $row['password'];
      $checkpassword = password_verify($password, $hpassword);
      if($checkpassword){
        //user logged in successfully
        
      }
      else{
        $info = "Wrong Email or Password";
      }
    }
    else{
      $info = "Wrong Email or Password";
    }

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
  <title>Log In</title>
</head>
<body>

  <?php
    include("includes/header.php");
  ?>
  
  <form class="login" action="login.php" method="POST">
    <span class="success"><?php echo $account ; ?></span>
    <span class="wrong"><?php echo $info ; ?></span>
    <input type="text" name="username" placeholder="Username or Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input id="submit" name="login" type="submit" value="Log In">
  </form>

</body>
</html>