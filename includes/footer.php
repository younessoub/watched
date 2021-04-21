<footer>
    <div class="footer">
      <div class="copyright">&copy; <span id="year"></span> Watched. All rights reserved </div>
    </div>
  </footer>
  <style>
  body{
   min-height: 100vh;
   position:relative;
  
}
   footer{
  border: 1px solid black;
  position: absolute;
  bottom: 0;
  height:40px;
  width:100%;
  background-color: #08243e;
  color: white;

}

.footer{
  padding: 10px;
}

.copyright{
  font-size: 12px;
}
  </style>
<script type="text/javascript">
  const year = document.getElementById("year");

  let date = new Date();
  let y = date.getFullYear();
  year.innerHTML = y; 

</script>