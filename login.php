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
<!--     <div class="name">Fresh 'n Healthy: <br> Online Farmers' Market</div> -->
	<div id="errorMessage">Username or Password is invalid</div>
    <input class="enjoy-css" type="text" id="username" placeholder="Username"/>
    <input class="enjoy-css" type="password" id="password" placeholder="Password"/>
    <br/>
    <button id="login" class="buttonstyle">Login</button>
</div>



<script>
$(document).ready(function(){
localStorage.clear();
$("#errorMessage").hide();

$("#login").click(function(){
	console.log("Login Button Clicked!");

	if ($("#username").val() != "" && $("#password").val() != "")
	{
		console.log("Username and password not empty!");

		$.ajax({
			url: "controller.php",
			dataType:"json",
			data:{
			  username: $("#username").val(),
			  userpassword: $("#password").val(),
			  method: "Login"
			},
			type:"post",
			success:function(result){
			  console.log(result);
			  console.log(result[0].f_name);

			  if(result[0].message == "success")
			  {
				  alert("Confirmed");
			  }else if(result[0].message == "failed")
			  {
				  $("#errorMessage").show();
			  }

			},//success:function(result)	
			error: function(jqXHR,textStatus, errorThrown) {
				console.log(jqXHR); 
				console.log(textStatus); 
				console.log(errorThrown); 
			}
		});//ajax		
	
	} else
	{
		
		
	} //else if one of username or password is empty

});	// login on click


});	// document ready


</script>


</body>
</html>