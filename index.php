<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css?v=<?php echo time(); ?>">
  <script  src="js/index.js" defer></script>
  <title>Watch It</title>
</head>
<body>
  <?php 
    include("includes/header.php");
  ?>
  
  <main class="main">
    <section>
      <div class="title-container">
        <h2 class="title">Keep track of your favorite Movies</h2>
      </div>
    </section>
    <section class="login-signup">
      <a href="login.php"><button  class="btn"> Log In</button></a>
      <a href="signup.php"><button  class="btn">Sign Up</button></a>
    </section>
    
  </main>
  <?php 
    include("includes/footer.php");
  ?>
  

  
</body>
</html>