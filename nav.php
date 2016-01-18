<nav class="navbar navbar-inverse navbar-fixed" metal:define-macro="nav_bar">
	<div class="container">
		<a class="navbar-brand" href="products.php">Logo</a>

		<ul class="nav navbar-nav">
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="#">Organic Fruits</a></li>
					<li><a href="#">Organic Vegetables</a></li>
					<li><a href="#">Dairy</a></li>
					<li><a href="#">Meats</a></li>
					<li><a href="#">Other</a></li>
				</ul>
			</li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li>
				<form class="navbar-form" role="search">
				  <div class="form-group">
				    <input type="text" class="form-control" placeholder="Search"></input>
				  </div>
				</form>
			</li>
			<li><a href="login.php">Login</a></li>
			<li><a href="#">Shopping Cart <span class="badge">0</span></a></li>
		</ul>
	</div>	<!-- CONTAINER -->
</nav>