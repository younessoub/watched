const btn = document.querySelector(".passwordfield i");
const password = document.getElementById("password");

 
btn.onclick = ()=>{
  if(password.type === "password"){
    password.type ="text";

    btn.textContent = "Hide";
  }
  else{
    password.type ="password";
    
    btn.textContent = "Show";

  }
}