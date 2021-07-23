const APIURL = "https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=04c35731a5ee918f014970082a0088b1&page=";

const IMGPATH = "https://image.tmdb.org/t/p/w1280";

const SEARCHAPI = "https://api.themoviedb.org/3/search/movie?&api_key=04c35731a5ee918f014970082a0088b1&query=";

var searching = false;
const loading = document.querySelector(".loading");
const searchRes = document.querySelector(".search-results");
const query = document.querySelector(".search-field");
const search = document.querySelector(".search-button");
var term;

var pageMovies = {};//object to track all movies in the page

//searching for movies
search.addEventListener('click',()=>{
  
  if(query.value.trim().length){
    searching = true;
    term = SEARCHAPI+query.value+"&page=";
    showMovies(term);
    query.value ="";
    
  }
});

query.addEventListener("keyup",function(event){
  if(event.keyCode===13){
    event.preventDefault();
    search.click();
  }
});

//button to show more movies
let m=2;
var more = document.createElement("button");
more.innerText = "More...";
more.addEventListener('click',function(){
  if(searching){
    showMovies(term,m);
    m++;
  }else{
    showMovies(APIURL,m);
    m++;
  }
});
more.classList.add("more")


function tryAgain(){//reload in case of error
  location.reload(); 
  
}

async function showMovies(url,i=1) {
  
  searchRes.removeChild(searchRes.lastChild);//removing more button

  if(i==1){//clearing home page before searching
    searchRes.innerHTML = " ";
  }
  loading.style.visibility = "visible";

  const resp = await fetch(url+i);
  const respData = await resp.json();
  var movies = respData.results;
  console.log(respData.results)

  loading.style.visibility = "hidden";
  for(j in movies){  
    var div = document.createElement("div");
    div.classList.add("element");
    var image = document.createElement("img");
    image.src = IMGPATH+movies[j].poster_path;
    image.alt = movies[j].title;
    div.appendChild(image);
    searchRes.appendChild(div);
    pageMovies[movies[j].title] = movies[j].id;
    image.addEventListener("click",showInfo);
  }   
    

  if(searchRes.innerHTML==" "){
    searchRes.innerHTML = "<div style='border:1px solid black;background: rgba(255, 255, 255,0.2);border-radius:5px;width:80vw;margin:100px auto'><h1 style=\"color:red;\">Error</h1><p>Something went wrong</p><button onclick='tryAgain()'>Try Again</button></div>";
  }else{
    searchRes.appendChild(more);
  }

}

showMovies(APIURL);//calling function to show movies on home page


async function showInfo(){
  let title = this.alt;
  let id = pageMovies[title];
  let url = "https://api.themoviedb.org/3/movie/"+id+"?api_key=04c35731a5ee918f014970082a0088b1";
  const resp = await fetch(url);
  const respData = await resp.json();
  let movie = respData;
 
  console.log(movie)

}