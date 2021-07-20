const APIURL = "https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=04c35731a5ee918f014970082a0088b1&page=";

const IMGPATH = "https://image.tmdb.org/t/p/w1280";

const SEARCHAPI = "https://api.themoviedb.org/3/search/movie?&api_key=04c35731a5ee918f014970082a0088b1&query=";

var searching = false;
const searchRes = document.querySelector(".search-results");
const query = document.querySelector(".search-field");
const search = document.querySelector(".search-button");
var term;
search.addEventListener('click',()=>{
  
  if(query.value.trim().length){
    searching = true;
    term = SEARCHAPI+query.value+"&page=";
    showMovies(term);
    
    
  }
});

let m=3;
var more = document.createElement("button");
more.innerText = "More...";
more.addEventListener('click',function(){
  if(searching){
    showMovies(term,m);
    m+=2;
  }else{
    showMovies(APIURL,m);
    m +=2;
  }
});
more.classList.add("more")


function tryAgain(){
  location.reload(); 
  
}

async function showMovies(url,i=1) {
  let k = i+1;
  searchRes.removeChild(searchRes.lastChild);
  while(i<=k){
    const resp = await fetch(url+i);
    const respData = await resp.json();
    var movies = respData.results;
    if(i==1){
      searchRes.innerHTML = " ";
    }
    for(j in movies){
      
      var div = document.createElement("div");
      div.classList.add("element");
      var image = document.createElement("img");
      image.src = IMGPATH+movies[j].poster_path;
      image.alt = movies[j].title;
      div.appendChild(image);
      searchRes.appendChild(div);
    }   
    
    i++; 
  }
  if(searchRes.innerHTML==" "){
    searchRes.innerHTML = "<div style='border:1px solid black;background: rgba(255, 255, 255,0.2);border-radius:5px;width:80vw;margin:100px auto'><h1 style=\"color:red;\">Error</h1><p>Something went wrong</p><button onclick='tryAgain()'>Try Again</button></div>";
  }else{
    searchRes.appendChild(more);
  }

}

showMovies(APIURL);
