<html>
<head>
	<meta charset="utf-8"/>
	<title>Fresh 'n Healthy: Online Farmers' Market</title>
	<link rel = "stylesheet" type="text/css" href="css/login.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>


<body>

<div class="loginBG"></div>

<div class="pageinfo">
	<img class="loginLogo" src="imgs/FnH_Logo_SVGv2.svg"/>
  <div id="loading">
    <div id="bar"></div>
  </div>
  <div id="message"></div>
</div>



<script>
$(document).ready(function(){

function move() {
    var bar = document.getElementById("bar"); 
    var width = 0;
    var id = setInterval(frame, 25);

    function frame() {
        if (width == 100) {
            clearInterval(id);

            var complete = document.createElement("h2");
            var message = document.getElementById("message");

            complete.innerHTML = "Transaction complete!";
            message.appendChild(complete);

        } else {
            width++; 
            bar.style.width = width + '%'; 
        }
    }
}

move();

});	// document ready


</script>


</body>
</html>