<style>
*{
  box-sizing: border-box;
  /*border: 1px black solid;*/
  
}

body{
  margin:0;
  padding: 0;
  font-family: Arial, Helvetica, sans-serif;
  height: 100vh;
  background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.9)), url("img/background2.jpg") ;
  background-size: 100vw 100vh;
  background-repeat: no-repeat;
}

.title{
  color: rgb(246, 60, 60);
  font-weight: 900;
  font-size: 500%;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', 'Verdana', 'sans-serif';
  display: flex;
  justify-content: center;
  margin:30px;
  text-align:center;
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
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
</style>
<header class="header">
    <h1 class="title">Watch It</h1>
    <p class="description">Keep track of your favorite Movies and Tv Shows</p>
</header>
