const APIURL = "https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=04c35731a5ee918f014970082a0088b1&page=";

const IMGPATH = "https://image.tmdb.org/t/p/w1280";

const SEARCHAPI = "https://api.themoviedb.org/3/search/movie?&api_key=04c35731a5ee918f014970082a0088b1&query=";

const searchRes = document.querySelector(".search-results");



async function showMovies(url,i=1) {
  searchRes.innerHTML = " ";
  while(i<=4){
    const resp = await fetch(url+i);
    const respData = await resp.json();
    var movies = respData.results;
    console.log(respData.results);
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
    searchRes.innerHTML = "<div style='border:1px solid black;background: rgba(255, 255, 255,0.2);border-radius:5px;width:80vw;margin:100px auto'><h1 style=\"color:red;\">Error</h1><p>Something went wrong</p><button>Try Again</button></div>";
  }
}
// function showMovies(url,i=1){
//   searchRes.innerHTML = " ";

  // var xhr = new XMLHttpRequest();
  // xhr.onreadystatechange = function(){
  //   if(this.status==200 && this.readyState == 4){
      
  //     var movies = JSON.parse(this.responseText).results;
  //     console.log(movies)

      
  //   }
  // } 

  // xhr.open("GET",url+i,true);
  // xhr.send();

//   }

// }

showMovies(APIURL);
