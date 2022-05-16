<!DOCTYPE html>
<html>
<head>
<title>WebSPL</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("https://fondosmil.com/fondo/22272.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">WebSPL</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button"><i class="fa fa-info-circle"></i> About</a>
      <a href="/configurations" class="w3-bar-item w3-button"><i class="fa fa-cog"></i> Configurator</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
  <a href="/configurations" onclick="w3_close()" class="w3-bar-item w3-button">Configurator</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small">A new way to generate websites</span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium">A new way to generate websites</span><br>
    <span class="w3-large">WebSPL helps you generate your free WordPress website in a matter of seconds, using validation with an internal feature model</span>
    <p><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Learn More</a></p>
  </div> 
  <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
    <a href="https://github.com/diverso-lab/webspl" title="WebSPL" target="_blank"><i class="fa fa-github w3-hover-opacity"></a></i>
  </div>
</header>

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">What's WebSPL?</h3>
  <p class="w3-center w3-large">Key features of our project</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Select</p>
      <p>With our configurator you will be able to choose the features you want in your web page, in an easy and fast way. Forget about dealing with dependencies, versions, and plugins.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-bars w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Test</p>
      <p>Once you have finished choosing your needs, we use our automatic feature model analysis tool, <a href="https://github.com/diverso-lab/core" title="WebSPL" target="_blank">Flama</a></i>, to validate the new configuration.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Build</p>
      <p>Docker technologies are used to create the necessary containers and install the features and configure the web. Together with the WordPress CLI the whole process is automated.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cloud w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Deploy</p>
      <p>Finally, the website is deployed on our servers, providing the necessary keys to administer the website to the user by e-mail. In addition, the system is packaged for easy downloading.</p>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-github w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://github.com/diverso-lab" title="Diverso Lab" target="_blank" class="w3-hover-text-green">Diverso Lab</a></p>
</footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>