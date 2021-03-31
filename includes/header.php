<style>

@import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');
*{
  box-sizing: border-box;
  /*border: 1px black solid;*/
  
}

body{
  font-family: 'Roboto Mono', monospace;
  margin:0;
  padding: 0;
  /*height: 100vh;
  background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.9)), url("img/background2.jpg") ;
  background-size: 100vw 100vh;
  background-repeat: no-repeat;*/
  
}

.title {
  font-weight: 900;
  font-size: 370%;
  display: flex;
  justify-content: center;
  margin:30px;
  text-align:center;
  cursor:pointer;
}

.title a{
  text-decoration: none;
  color: rgb(246, 60, 60);

}

.header{
  display: flex;
  flex-direction: column;
}

.description{
  display: flex;
  justify-content: center;
  text-align: center;
  color:rgb(88, 157, 246);
  position: relative;
  top: -50px;
  padding: 10px;
}
</style>

<header class="header">
    <h1 class="title"><a href="index.php">Watch It</a></h1>
    <p class="description">Keep track of your favorite Movies and Tv Shows</p>
</header>
