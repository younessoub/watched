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
  min-height:100vh;
  background-color:#7f5a83;
  background-image: linear-gradient(315deg, #7f5a83 0%, #0d324d 74%);
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
  
  
}

.navbar li{

  margin: 1.5rem 7px; 
  font-weight:900;
  
  
}

.navbar li :hover{
  background-color: dodgerblue;
}


.navbar li a{
  text-decoration:none;
  color:white;
}



/*  */



@media (max-width:600px){
  .navbar{
    display:none;
  }
}

.menu-toggle{
  width:40px;
  height:30px;
  display:flex;
  flex-direction:column;
  margin-top:10px;
  cursor:pointer;
  z-index: 500;
}

.bar{
  background-color:white;
  height:5px;
  width:100%;
  margin:2px;
  border-radius:5px;
}

.menu{
  display:none;
  position:absolute;
  min-width:200px;
  border:white 1px solid;
  padding-top:30px;
  top:0;
  right:0;
  text-align:center;
  background-color:#7f5a83;
  background-image: linear-gradient(315deg, #7f5a83 0%, #0d324d 74%);
  min-height:50vh;
  z-index:200;
}

.menu ul li{
  list-style:none;
  width:100%;
  height:50px;
  padding:20px;
}

.menu ul li :hover{
  background-color: dodgerblue;
}

.menu ul{
  margin:0;
  padding:0;
}

.menu ul li a{
  color:white;
  text-decoration:none;
  
}

@media (min-width:600px){
  .menu-toggle{
    display:none !important;
  }.menu{
    display:none !important;
  }.svg-icon{
    display:none !important;
  }
}

/* .show-menu{
  display:block;
} */
@keyframes show{
  0%{
    width:150px;
  }

  100%{
    width:300px;
  }
  
}

.svg-icon {
  width: 3em;
  height: 3em;
  display:none;
  z-index: 500;
  cursor:pointer;
}

.svg-icon path,
.svg-icon polygon,
.svg-icon rect {
  fill: white;
}

.svg-icon circle {
  stroke: #4691f6;
  stroke-width: 1;
}
</style>

<header class="header">
  
    <nav class="nav">
      <h1 class="title">
        <?php 
          if(isset($_SESSION["name"])){
            echo '<a href="../index.php">Watched</a>';
          } else {
            echo '<a href="index.php">Watched</a>';
          }
        ?>
        
      </h1>

      <div class="menu-toggle">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
   
      </div>
  
      <svg class="svg-icon" viewBox="0 0 20 20">
							<path fill="none" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
						</svg>
    

      <?php 


      
      if(isset($_SESSION['name'])){
        
      ?>
      <!--small screen nav -->

      <div class="menu">

        <ul class="menu-items">
          <li><a href="home.php">Home</a></li>
          <li><a href="movies.php">Movies</a></li>
          <li><a href="tvshows.php">Tv Shows</a></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>


      <!--big screen nav -->
      <ul class="navbar">
        <li><a href="home.php">Home</a></li>
        <li><a href="movies.php">Movies</a></li>
        <li><a href="tvshows.php">Tv Shows</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>

      <?php }else{ ?>

      
      <div class="menu">

        <ul class="menu-items">
          <li><a href="login.php">Log In</a></li>
          <li><a href="signup.php">Sign Up</a></li>
        </ul>
      </div>
      <ul class="navbar">
        <li><a href="login.php">Log In</a></li>
        <li><a href="signup.php">Sign Up</a></li>

      </ul>

      <?php } ?>
    </nav>
    
</header>
<script type="text/javascript">
  const menu = document.querySelector(".menu");
  const showMenu = document.querySelector(".menu-toggle");
  const hideMenu = document.querySelector(".svg-icon");
  showMenu.addEventListener('click',function(){
   
    menu.style.display = "block";
    showMenu.style.display = "none";
    hideMenu.style.display = "block";

  });

  hideMenu.addEventListener("click",function(){
    hideMenu.style.display = "none";
    menu.style.display = "none";
    showMenu.style.display = "flex";
  });


</script>
