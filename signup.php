
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
    <form class="form" action="login.php" method="POST"> 
      <input type="text" id="username" name="user-name" placeholder="Username" required>
      <input type="password" id="password" name="password" placeholder="Password" required>
      <input type="password" id="password" name="password" placeholder="Confirm Password" required>
      <input id="signup" type="submit" value="Sign Up">

    </form>
  </main>
  
</body>
</html>