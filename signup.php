<?php 
  

  $email = $name = '';
  require("includes/db.php");
  require("includes/functions.php");

  //$sql = "INSERT INTO USERS (name, email, password) VALUES('Youness', 'oubelkacem.youness@gmail.com', 'Younwatchit1')";
  //mysqli_query($conn, $sql);
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
      if(emailExists($email,$conn)){
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



  }


?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/signup.css">
  <title>Sign-up</title>
</head>
<body>

  <?php
    include("includes/header.php");
  ?>

  <main class="signup">
    <form class="form" action="signup.php" method="POST"> 
      <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email;?>" required>
      <span class="error"><?php echo $errors['email'] ?></span>
      <input type="text" id="username" name="user-name" placeholder="Username" value="<?php echo $name;?>" required>
      <span class="error"><?php echo $errors['username'] ?></span>
      <input type="password" id="password" name="password" placeholder="Password" required>
      <span class="error"><?php echo $errors['password'] ?></span>
      <input type="password" id="rpassword" name="rpassword" placeholder="Confirm Password" required>
      <span class="error"><?php echo $errors['rpassword'] ?></span>
      <input name="submit" type="submit" id="signup"  value="Sign Up">

    </form>
  </main>
  
</body>
</html>