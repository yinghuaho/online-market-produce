<html>
  <headReplace metal:use-macro="header.php/meta_head">
  </headReplace>
<body>

<!-- ================================== NAVIGATION ================================== -->

    <navReplace metal:use-macro="nav.php/nav_bar">
    </navReplace>

<!-- ================================== TITLE AND IMAGE SLIDER ================================== -->

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

<div class="container">
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

<div class="container">
	<div class="row text-center">

		<div class="col-md-3">
			<div class="card">
				<img class="card-image"></img>
				<h3 class="card-title">Organic Apples</h3>
				<h5 class="card-title">$8.99 CAD</h5>

				<div class="col-md-8 col-md-offset-2">
					<strong class="card-qty">QTY.</strong>
						<div class="input-group">
							<div class="input-group-btn">
								<button class="btn btn-success">-</button>
							</div>

							<input type="text" class="form-control text-center" value="1"></input>

							<div class="input-group-btn">
								<button class="btn btn-success">+</button>
							</div>
						</div>
				</div>	<!-- COL MD 6 -->

				<div class="clearfix"></div>

				<button class="btn btn-danger btn-block" style="margin-top: 15px;">Add to Cart</button>
			</div> <!-- CARD -->
		</div>	<!-- COL MD 3 -->

		<div class="col-md-3">
			<div class="card">
				<img class="card-image"></img>
				<h3 class="card-title">Organic Apples</h3>
				<h5 class="card-title">$8.99 CAD</h5>

				<div class="col-md-8 col-md-offset-2">
					<strong class="card-qty">QTY.</strong>
						<div class="input-group">
							<div class="input-group-btn">
								<button class="btn btn-success">-</button>
							</div>

							<input type="text" class="form-control text-center" value="1"></input>

							<div class="input-group-btn">
								<button class="btn btn-success">+</button>
							</div>
						</div>
				</div>	<!-- COL MD 6 -->

				<div class="clearfix"></div>

				<button class="btn btn-danger btn-block" style="margin-top: 15px;">Add to Cart</button>
			</div> <!-- CARD -->
		</div>	<!-- COL MD 3 -->

		<div class="col-md-3">
			<div class="card">
				<img class="card-image"></img>
				<h3 class="card-title">Organic Apples</h3>
				<h5 class="card-title">$8.99 CAD</h5>

				<div class="col-md-8 col-md-offset-2">
					<strong class="card-qty">QTY.</strong>
						<div class="input-group">
							<div class="input-group-btn">
								<button class="btn btn-success">-</button>
							</div>

							<input type="text" class="form-control text-center" value="1"></input>

							<div class="input-group-btn">
								<button class="btn btn-success">+</button>
							</div>
						</div>
				</div>	<!-- COL MD 6 -->

				<div class="clearfix"></div>

				<button class="btn btn-danger btn-block" style="margin-top: 15px;">Add to Cart</button>
			</div> <!-- CARD -->
		</div>	<!-- COL MD 3 -->

		<div class="col-md-3">
			<div class="card">
				<img class="card-image"></img>
				<h3 class="card-title">Organic Apples</h3>
				<h5 class="card-title">$8.99 CAD</h5>

				<div class="col-md-8 col-md-offset-2">
					<strong class="card-qty">QTY.</strong>
						<div class="input-group">
							<div class="input-group-btn">
								<button class="btn btn-success">-</button>
							</div>

							<input type="text" class="form-control text-center" value="1"></input>

							<div class="input-group-btn">
								<button class="btn btn-success">+</button>
							</div>
						</div>
				</div>	<!-- COL MD 6 -->

				<div class="clearfix"></div>

				<button class="btn btn-danger btn-block" style="margin-top: 15px;">Add to Cart</button>
			</div> <!-- CARD -->
		</div>	<!-- COL MD 3 -->
		
	</div> <!-- ROW -->






	<div class="row text-center">
		<div class="col-md-3">
			<div class="card">
				<img class="card-image"></img>
				<h3 class="card-title">Organic Apples</h3>
				<h5 class="card-title">$8.99 CAD</h5>

				<div class="col-md-8 col-md-offset-2">
					<strong class="card-qty">QTY.</strong>
						<div class="input-group">
							<div class="input-group-btn">
								<button class="btn btn-success">-</button>
							</div>

							<input type="text" class="form-control text-center" value="1"></input>

							<div class="input-group-btn">
								<button class="btn btn-success">+</button>
							</div>
						</div>
				</div>	<!-- COL MD 6 -->

				<div class="clearfix"></div>

				<button class="btn btn-danger btn-block" style="margin-top: 15px;">Add to Cart</button>
			</div> <!-- CARD -->
		</div>	<!-- COL MD 3 -->

		<div class="col-md-3">
			<div class="card">
				<img class="card-image"></img>
				<h3 class="card-title">Organic Apples</h3>
				<h5 class="card-title">$8.99 CAD</h5>

				<div class="col-md-8 col-md-offset-2">
					<strong class="card-qty">QTY.</strong>
						<div class="input-group">
							<div class="input-group-btn">
								<button class="btn btn-success">-</button>
							</div>

							<input type="text" class="form-control text-center" value="1"></input>

							<div class="input-group-btn">
								<button class="btn btn-success">+</button>
							</div>
						</div>
				</div>	<!-- COL MD 6 -->

				<div class="clearfix"></div>

				<button class="btn btn-danger btn-block" style="margin-top: 15px;">Add to Cart</button>
			</div> <!-- CARD -->
		</div>	<!-- COL MD 3 -->

		<div class="col-md-3">
			<div class="card">
				<img class="card-image"></img>
				<h3 class="card-title">Organic Apples</h3>
				<h5 class="card-title">$8.99 CAD</h5>

				<div class="col-md-8 col-md-offset-2">
					<strong class="card-qty">QTY.</strong>
						<div class="input-group">
							<div class="input-group-btn">
								<button class="btn btn-success">-</button>
							</div>

							<input type="text" class="form-control text-center" value="1"></input>

							<div class="input-group-btn">
								<button class="btn btn-success">+</button>
							</div>
						</div>
				</div>	<!-- COL MD 6 -->

				<div class="clearfix"></div>

				<button class="btn btn-danger btn-block" style="margin-top: 15px;">Add to Cart</button>
			</div> <!-- CARD -->
		</div>	<!-- COL MD 3 -->

		<div class="col-md-3">
			<div class="card">
				<img class="card-image"></img>
				<h3 class="card-title">Organic Apples</h3>
				<h5 class="card-title">$8.99 CAD</h5>

				<div class="col-md-8 col-md-offset-2">
					<strong class="card-qty">QTY.</strong>
						<div class="input-group">
							<div class="input-group-btn">
								<button class="btn btn-success">-</button>
							</div>

							<input type="text" class="form-control text-center" value="1"></input>

							<div class="input-group-btn">
								<button class="btn btn-success">+</button>
							</div>
						</div>
				</div>	<!-- COL MD 6 -->

				<div class="clearfix"></div>

				<button class="btn btn-danger btn-block" style="margin-top: 15px;">Add to Cart</button>
			</div> <!-- CARD -->
		</div>	<!-- COL MD 3 -->

	</div> <!-- ROW -->

</div> 	<!-- CONTAINER -->


<!-- ================================== FOOTER ================================== -->
    <footerReplace metal:use-macro="footer.php/page_footer">
    </footerReplace>
    
<a class="top" href="#"><span class="glyphicon glyphicon-triangle-top"></span></a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>

</body>
</html>