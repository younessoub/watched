const IMGPATH = "https://image.tmdb.org/t/p/w1280";

const div = document.querySelector(".info");

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

  await getCredits(id);

  div.innerHTML = "<img class='backdrop' src= "+IMGPATH+movie.backdrop_path+" alt=''/><p  class='infos title' >"+movie.title+"</p><p class='infos'>Directed by : "+director+"</p><p class='infos'>Release date : "+movie.release_date+"</p><p class='infos'>Runtime : "+movie.runtime+" min</p><p class='infos tagline'>"+movie.tagline+"</p><p class='infos'>"+movie.overview+"</p><div class='rating'> Your Rating :<form class='rating-form' action='../config/save-movie.php' method='POST' ><span id='rate' > </span> <input class='range' type='range'  oninput='getRating(this.value)' value='0' min='0' max='10' step='0.1' name='rating' required/><input class ='save' type='submit' value ='Save'/></form></div>";
  rate = document.getElementById("rate");
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