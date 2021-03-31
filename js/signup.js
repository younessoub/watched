const btn = document.querySelector(".passwordfield i");
const info = document.querySelector(".info");
const match = document.querySelector(".match");
const password = document.getElementById("password");
const rpassword = document.getElementById("rpassword");
const eight = document.getElementById("eight");
const lower = document.getElementById("lower");
const upper = document.getElementById("upper");
const numbers = document.getElementById("numbers");
const userName = document.getElementById("username");
const userNameCheck = document.querySelector(".usernamecheck");
const error = document.querySelector(".error");


//removing error messages when clicked

error.addEventListener("click",function(){
  this.innerHTML="";
});

//variables used in submitting function to allow or disable submitting
var passmatch = false;
var passvalid = false;
var namevalid = true;


//showing and hiding password
btn.onclick = ()=>{
  if(password.type === "password"){
    password.type ="text";
    rpassword.type = "text";
    btn.textContent = "Hide";
  }
  else{
    password.type ="password";
    rpassword.type = "password";
    btn.textContent = "Show";
    
  }
}





password.oninput = ()=>{
  info.style.visibility = "visible";

  check();
  checkMatch();

}


//check if password is valid
function check(){
  const nums = /[0-9]/g;
  const lowerLetter = /[a-z]/g;
  const upperLetter = /[A-Z]/g;
  let text = password.value ; //password field value
  if(text.match(nums)){
    numbers.classList.add("valid");
    numbers.classList.remove("invalid");

  } else {
    numbers.classList.add("invalid");
    numbers.classList.remove("valid");
  }
    
  if(text.match(lowerLetter)){
    lower.classList.add("valid");
    lower.classList.remove("invalid");
  } else {
    lower.classList.add("invalid");
    lower.classList.remove("valid");
  }
  
  if(text.match(upperLetter)){
    upper.classList.add("valid");
    upper.classList.remove("invalid");
  } else {
    upper.classList.add("invalid");
    upper.classList.remove("valid");
  }

  if(text.length>=8){
    eight.classList.add("valid");
    eight.classList.remove("invalid");
  } else {
    eight.classList.add("invalid");
    eight.classList.remove("valid");
  }
  
  if(text.match(nums)&&text.match(lowerLetter)&&text.match(upperLetter)&&text.length>=8){
    passvalid = true;
    password.style.border = "rgb(119, 252, 119) 2px solid";
    if(password.value===""){
      password.style.border = "none";
    }
  }
  else{
    passvalid = false;
    password.style.border = "red 2px solid";
    if(password.value===""){
      password.style.border = "none";
    }
  }


}



rpassword.oninput = ()=>{
  match.style.visibility = "visible";
  checkMatch();
}

/*rpassword.onblur = ()=>{
  match.style.visibility = "hidden"; 
  rpassword.style.border = "none";

}*/

//function to decide if the user can submit
function submitting(){ 
  return (passmatch === true && passvalid === true&&namevalid==true) ? true : false;
}

//function to check if passwords match
function checkMatch(){
  let p = password.value;
  let rp = rpassword.value;
  if((p === rp) && p !== ''){
    match.innerHTML = "Passwords Match ✔";
    match.style.color="rgb(119, 252, 119)";    
    passmatch = true;
    rpassword.style.border = "rgb(119, 252, 119) 2px solid";
    if(rpassword.value===""){
      rpassword.style.border = "none";
    }
  } else { 
    match.innerHTML = "Passwords don't Match ✗ ";
    match.style.color="red";  
    rpassword.style.border = "red 2px solid";
    passmatch = false;  
    if(rpassword.value===""){
      rpassword.style.border = "none";
    }
  }
}




userName.oninput = function (){
  checkName();
}



//check if username exist in database
function checkName(){ 
  let val = userName.value;
  if(val!==""){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      if(this.status == 200 && this.readyState == 4){
        if(this.responseText === "taken"){
          userNameCheck.style.visibility = "visible";
          userNameCheck.style.color = "red";
          userNameCheck.innerHTML = val + " is taken";
          userName.style.border = "red 2px solid";
          namevalid = false;
        } else {
          userNameCheck.style.visibility = "visible";
          userNameCheck.style.color = "rgb(119, 252, 119)";
          userNameCheck.innerHTML = val + " is available";
          userName.style.border = "rgb(119, 252, 119) 2px solid";
          namevalid = true;
          
        }

      }
    }
    xhr.open("GET","config/username.php?val="+val,true);
    xhr.send();
  }
  else{
    userNameCheck.style.visibility ="hidden";
    userName.style.border = "none";

    
  }
}


