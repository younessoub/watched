const APIURL = "https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=04c35731a5ee918f014970082a0088b1&page=1";

const IMGPATH = "https://image.tmdb.org/t/p/w1280";

const SEARCHAPI = "https://api.themoviedb.org/3/search/movie?&api_key=04c35731a5ee918f014970082a0088b1&query=";

const searchRes = document.querySelector(".search-results");



async function getMovies(url){
  var res = fetch(url)
  .then(response => response.json())
  .then(data => data.results);
  return res;
  
  // const resp = await fetch(url);
  // const data = await resp.json();
  // return data.results;
}

function showMovies(movies){
  for( i in movies){
    console.log("test");
    searchRes.innerHTML="test";
    var movie = document.createElement("div");
    movie.classList.add("element");
  
    movie.innerHTML = "<div class=\"image\"><img src="+IMGPATH+movies[i].poster_path+" alt="+movies[i].title+"></div><div class=\"info\"><span>2018</span><p>Rating :<span>"+movies[i].vote_average+"</span></p></div>"  ;

    searchRes.appendChild(movie);
  }
  
  

}

showMovies(getMovies(APIURL));