<?php 
  
  

  $email = $name = '';
  require("includes/db.php");
  require("includes/functions.php");


  $errors = array('email'=>'','username'=>'','password'=>'','rpassword'=>'');
  
  if(isset($_POST['submit'])){


    $email = validate($_POST['email']);
    $name = validate($_POST['user-name']);
    $password = validate($_POST['password']);
    $rpassword = validate($_POST['rpassword']);

    //checking for empty fields
    if(!empty($_POST['email'])&&!empty($_POST['user-name'])&&!empty($_POST['password'])&&!empty($_POST['rpassword'])){
      
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Invalid email';
      }
      if(emailExists($conn, $email)){
        $errors['email'] = 'This Email is already used';
      }
      
      if(!preg_match("/^[a-zA-Z ]*$/", $name)){
        $errors['username'] = "Only letters allowed with no white spaces";
      }
      
      if(userNameExists($conn, $name)){
        $errors['username'] = "Name already taken";
      }
    

      if($password == $rpassword){
        if(strlen($password) < 8 ){
          $errors['password'] = "Password must be at least 8 characters!"; 
        }
        elseif(!preg_match("#[0-9]+#", $password)){
          $errors['password'] = "Password must contain at least 1 number!"; 
        }
        elseif(!preg_match("#[A-Z]+#", $password)){
          $errors['password'] = "Password must contain at least 1 capital letter!"; 
        }
        elseif(!preg_match("#[a-z]+#", $password)){
          $errors['password'] = "Password must contain at least 1 Lowercase letter!"; 
        }
      }

      else{
        $errors['rpassword'] = "Passwords don't match"; 
      }

    }

    if(!array_filter($errors)){
      
      
      $hp = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO users (name, email, password) VALUES(?,?, ?);";
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hp);
      mysqli_stmt_execute($stmt);
      
      header("location: login.php?a=created");
      exit();
    }
  }


?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/signup.css?v=<?php echo time(); ?>">
  <title>Sign-up</title>
</head>
<body>

  <?php
    include("includes/header.php");
  ?>

  <main class="signup">

    
    <form class="form" action="signup.php" method="POST" onsubmit = "return submitting()"> 
      <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email;?>" required>
      <span class="error"><?php echo $errors['email'] ?></span>
      <input type="text" id="username" name="user-name" placeholder="Username" value="<?php echo $name;?>" required>
      <sub class = "usernamecheck">Username is taken</sub>
      <span class="error"><?php echo $errors['username'] ?></span>
      <div class="passwordfield">
        <input type="password" id="password" name="password" placeholder="Password" value="" required><i>Show</i>
      </div>
      
      <span class="error"><?php echo $errors['password'] ?></span>
      
      <input type="password" id="rpassword" name="rpassword" placeholder="Confirm Password" value="" required>

      <span class="error"><?php echo $errors['rpassword'] ?> </span>
      <div class="match">
        Passwords don't Match
      </div>
      <div class="info">
        <p id="eight"> 8 characters minimum </p> 
        <p id="lower">Lowercase letter </p>
        <p id="upper">Uppercase letter </p>
        <p id="numbers" >Numbers   </p>
      </div>
      <input name="submit" type="submit" id="signup"  value="Sign Up">

    </form>
  </main>
  <script src="js/signup.js"></script>
</body>
</html>