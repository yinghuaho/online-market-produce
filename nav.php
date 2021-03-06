<nav class="navbar navbar-inverse navbar-fixed-top market-nav" metal:define-macro="nav_bar">
	<div class="container">

<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="http://fnh.mike-ho.com/">
		<img alt="Brand" src="./imgs/FnH_Logo_SVGv2.svg"/>
	</a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav ">
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li id="Fruits" ><a href="#productDisplay">Organic Fruits</a></li>
				<li id="Vegetables"><a href="#productDisplay">Organic Vegetables</a></li>
				<li id="Dairy"><a href="#productDisplay">Dairy</a></li>
				<li id="Meants"><a href="#productDisplay">Meats</a></li>
				<li id="Other"><a href="#productDisplay">Other</a></li>
			</ul>
		</li>
	</ul>

	<ul class="nav navbar-nav navbar-right">
		<li>
			<form class="navbar-form" role="search">
			  <div class="form-group">
			    <input id="search" type="text" class="form-control search-bar" placeholder="Search"></input>
			  </div>
			</form>
		</li>
		<li><a href="login.php">Login</a></li>
		<li><a href="cartphptal.php">Shopping Cart <span id="cartsLength" class="badge">0</span></a></li>
	</ul>

</div>

	</div>	<!-- CONTAINER -->
   <script>
   var cartsLength = document.getElementById("cartsLength");
      if (localStorage.getItem("shoppingCartItems") === null) {
        var shoppingCartItems = [];
         cartsLength.innerHTML = 0;
      }else{
         var retrievedData = localStorage.getItem("shoppingCartItems");
         var shoppingCartItems = JSON.parse(retrievedData);
         cartsLength.innerHTML = shoppingCartItems.length;
      }
   
   </script>
</nav>