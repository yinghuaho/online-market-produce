<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fresh 'n Healthy: Online Farmers' Market</title>
	<link rel = "stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>



<body>

<div class = "loginScreen">
	<div class = "pageinfo">
    	<img src="imgs/made-in-china1.png">
        <div class = "name">Fresh 'n Healthy: <br> Online Farmers' Market</div>
        <input class = "enjoy-css" type="text" id="username" placeholder="Username">
        <input class ="enjoy-css" type="password" id="password" placeholder="Password">
        </br>
        <button id ="login" class = "buttonestyle" >Login</button>
    </div>
</div>


<script>
$(document).ready(function(){

$("#login").click(function(){
	console.log("Login Button Clicked!");

	if ($("#username").val() != "" && $("#password").val() != "")
	{
		console.log("Username and password not empty!");

		$.ajax({
			url: "",
			dataType:"json",
			data:{
			  username: $("#username").val(),
			  userpassword: $("#password").val(),
			  mode: "Login"
			},
			type:"post",
			success:function(result){
			  console.log(result[0].login);
			  if (result[0].login == true)
			  {
				sessionStorage.name = result[0].name;
				sessionStorage.userid = result[0].userid;
				sessionStorage.email = result[0].email;
				document.location = 'categories.html';
			  } else { //display error here, if user enters wrong pass and username
				console.log(document.getElementById("username").value);
				console.log(document.getElementById("password").value);
				errUser.innerHTML =  "Invalid username or password";
			  }
			},//success:function(result)	
			error: function(jqXHR,textStatus, errorThrown) {
				console.log(jqXHR); 
				console.log(textStatus); 
				console.log(errorThrown); 
			}
		});//ajax		
	
	} // if ...

});	// login on click


});	// document ready


</script>


</body>
</html>