<html>
  <headReplace metal:use-macro="header.php/meta_head">
  </headReplace>
<body>

<!-- ================================== NAVIGATION ================================== -->

    <navReplace metal:use-macro="nav.php/nav_bar">
    </navReplace>

<!-- ================================== TITLE AND IMAGE SLIDER ================================== -->
<div id="test">asdasd</div>

<div class="container">
	<h1 class="text-center">Fresh 'n Healthy: Online Farmers' Market</h1>

	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img_features/slider1.jpg" alt="fruits"></img>
      <div class="carousel-caption">
        <h3>Fresh fruits and vegetables</h3>
      </div>
    </div>

    <div class="item">
      <img src="img_features/slider2.jpg" alt="veggies"></img>
      <div class="carousel-caption">
        <h3>Prepare and cook using fresh ingredients</h3>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>	<!-- CONTAINER -->


<!-- ================================== FILTERS ================================== -->

<div id= "productDisplay" class="container">
	<div class="col-md-5"> <h2 class="bg-warning text-center">Fresh Products</h2> </div>
	<div class="col-md-7 text-center"> 
		<form class="form-inline" style="padding-top: 20px;"><!--  ADD A CLASS FOR THIS PADDING LATER !!!!!!!!!!!!!!! -->
			<label>Filters</label>
				<select class="form-control">
					<option>-- By Category --</option>
					<option>Organic Fruits</option>
					<option>Organic Vegetables</option>
					<option>Dairy</option>
					<option>Meats</option>
					<option>Other</option>
				</select>

				<select class="form-control">
					<option>-- Sort By --</option>
					<option>Price: Lowest to Highest</option>
					<option>Price: Highest to Lowest</option>
					<option>Availability</option>
					<option>Newest Products</option>
				</select>

				<button type="submit" class="btn btn-success">GO</button>
		</form> <!-- INLINE FORM -->
	</div>	<!-- COLUMN 7 -->
</div> 	<!-- CONTAINER -->


<!-- ================================== ACTUAL PRODUCTS ================================== -->
<div id="productscontainer" class="container">
	<div id="products_display" class="row text-center">
	</div> <!-- ROW -->
<button>2</button>
</div> 	<!-- CONTAINER -->


<!-- ================================== FOOTER ================================== -->
    <footerReplace metal:use-macro="footer.php/page_footer">
    </footerReplace>
    
<a class="top" href="#"><span class="glyphicon glyphicon-triangle-top"></span></a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>

</body>
</html>