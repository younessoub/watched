const IMGPATH = "https://image.tmdb.org/t/p/w1280";

const div = document.querySelector(".info");//main div
const img = document.querySelector(".backdrop");
const title = document.querySelector(".t");
const dir = document.querySelector(".director");
const date = document.querySelector(".date");
const time = document.querySelector(".time");
const tagline = document.querySelector(".tagline");
const overview = document.querySelector(".overview");
const rate = document.getElementById("rate");

var director;//director name

var url_string = window.location.href;
var url = new URL(url_string);
var id = url.searchParams.get("id");

if(id){
  getMovie(id);
}

async function getMovie(id){
  let url = "https://api.themoviedb.org/3/movie/"+id+"?api_key=04c35731a5ee918f014970082a0088b1";
  const resp = await fetch(url);
  const respData = await resp.json();
  let movie = respData;
  console.log(movie);
  await getCredits(id);
  console.log(director);
    
  img.src = IMGPATH+movie.backdrop_path;
  title.innerText = movie.title;
  dir.innerText += director;
  date.innerText += movie.release_date;
  time.innerText += movie.runtime;
  tagline.innerText = movie.tagline;
  overview.innerText = movie.overview;
  // div.innerHTML += "<img class='backdrop' src= "+IMGPATH+movie.backdrop_path+" alt=''/><p  class='infos title' >"+movie.title+"</p><p class='infos director'>Directed by : "+director+"</p><p class='infos date'>Release date : "+movie.release_date+"</p><p class='infos time'>Runtime : "+movie.runtime+" min</p><p class='infos tagline'>"+movie.tagline+"</p><p class='infos overview'>"+movie.overview+"</p><div class='rating'>  Rate this movie :<form class='rating-form' action='../config/save-movie.php?id="+id+"' method='POST' ><span id='rate' >0 </span>/10 <input class='range' type='range'  oninput='getRating(this.value)' value='0' min='0' max='10' step='0.1' name='rating' required/><input class ='save' type='submit' value ='Save'/></form></div>";
  
}

async function getCredits(id){
  let url = "https://api.themoviedb.org/3/movie/"+id+"/credits?api_key=04c35731a5ee918f014970082a0088b1";
  const resp = await fetch(url);
  const respData = await resp.json();
  let credits = respData.crew;
  console.log(credits);
  
  for(i in credits){
    
    if(credits[i]["department"]==="Directing"){
      director = credits[i]["name"];
      break;
    }
  }
  
}

function getRating(value){
  rate.innerText = value;
}