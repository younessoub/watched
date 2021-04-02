<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
*{
  box-sizing: border-box;
  /*border: 1px black solid;*/
  
}

body{
  font-family: 'Poppins', sans-serif;
  margin:0;
  padding: 0;
  /*height: 100vh;
  background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.9)), url("img/background2.jpg") ;
  background-size: 100vw 100vh;
  background-repeat: no-repeat;*/
  
}



.title a{
  text-decoration: none;
  color: rgb(246, 60, 60);

}

.header{
  margin: auto 5vw;
}


.nav{
  display:flex;
  flex-direction:row;
  justify-content:space-between;
}

.navbar{
  list-style:none;
  height:30px;
  margin:0;
  padding:0;
  display:flex;
  flex-direction:row;
  justify-content:space-between;
  width:10rem;
}

.navbar li{
  width:45%;
  font-weight:900;
  margin-top:0.6rem;
  
}

.navbar li a{
  text-decoration:none;
}

.title{
  margin-top:0;
  font-size:2rem;
  font-weight:900;
}

@media (max-width:400px){
  .navbar{
    display:none;
  }
}
</style>

<header class="header">
  
    <nav class="nav">
      <h1 class="title"><a href="index.php">Watched</a></h1>
      <ul class="navbar">
        <li><a href="login.php">Log In</a></li>
        <li><a href="signup.php">Sign Up</a></li>

      </ul>
    </nav>
    
</header>

