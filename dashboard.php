<html ng-app="dashboard">
  <head>
    <title>Fresh 'n Healthy: Dashboard</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css"></link>
    <link rel="stylesheet" type="text/css" href="css/products.css"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="lib/js/angular.min.js"></script>
  </head>

  <script>
    if(sessionStorage.getItem('userid')){
      var userid = sessionStorage.getItem('userid');
      var username = sessionStorage.getItem('f_name');
      var secruitycode =  sessionStorage.getItem('secruitycode');
    }
    else {
      window.location = "login.php";
    }

  </script>
<body ng-controller ="dashboardController">

<!-- ================================== NAVIGATION SIDEBAR ================================== -->

<div class="container-fluid">

  <div class="hamburger">
    <a href="#">
      <span class="burger-line"></span>
      <span class="burger-line"></span>
      <span class="burger-line"></span>
    </a>
  </div>

  <div id="dashboard-nav" style="padding-top:50px;">

  <div class="hamburger">
    <a href="#">
      <span class="burger-line"></span>
      <span class="burger-line"></span>
      <span class="burger-line"></span>
    </a>
  </div>

    <div id="dashboard-nav-col" class="col-xs-2">
      <div class="list-group">
        <span class="list-group-item active">
          Categories
        </span>
        <a href="#" class="list-group-item" ng-click="changeCategory('Fruits')">Organic Fruits</a>
        <a href="#" class="list-group-item" ng-click="changeCategory('Vegetables')">Organic Vegetables</a>
        <a href="#" class="list-group-item" ng-click="changeCategory('Dairy')">Dairy</a>
        <a href="#" class="list-group-item" ng-click="changeCategory('Meats')">Meats</a>
        <a href="#" class="list-group-item" ng-click="changeCategory('Other')">Other</a>
      </div>

      <div class="list-group">
        <a href="index.php" class="list-group-item">Back to Home</a>
        <a href="#" class="list-group-item" ng-click = "logout()">Logout</a>
      </div>
    </div> <!-- column -->
  </div> <!-- dashboard-nav -->

<!-- ================================== TABLE OF ITEMS ================================== -->

  <div class="col-xs-12">
    <div id="display">

<!-- =================================== FIRST ROW STARTS HERE =================================== -->

      <div ng-repeat = "product in products  | filter:getCategory() | limitTo:20:0" class="col-md-3 col-sm-6">
        <div class="card"> <div class="card-thumbnail">
            <img ng-src="{{product.image}}"/>
          </div>
          <!-- thumbnail -->

          <h4 class="card-title">Image URL: <input id="imgurl{{product.id}}" type="text" class="form-control text-center" value="{{product.image}}"/> </h4>
          <!-- <input type="file" name="file" id="file" class="custom-file-input" style="width:100%"/> -->
          <h4 class="card-title">Product Name: <input id="name{{product.id}}" type="text" class="form-control text-center" value="{{product.product_name}}"/> </h4>
          <h4 class="card-title">Unit Price: <input id="price{{product.id}}" type="text" class="form-control text-center" value="{{product.price}}"/> </h4>
          <h4 class='card-title'>Description: <input id="desc{{product.id}}"type="text" class="form-control text-center" value="{{product.product_description}}"/> </h4>

          <div class="col-md-8 col-md-offset-2">
            <!-- <strong class="card-qty">QTY.</strong> -->
              <div class="input-group">
                <div class="input-group-btn">
                  <button class="btn btn-success" ng-click='minus($index)'>-</button>
                </div>

                <input type="text" id="amount{{product.id}}" class="form-control text-center" value="{{product.amount}}"/>

                <div class="input-group-btn">
                  <button class="btn btn-success" ng-click='add($index)'>+</button>
                </div>
              </div>
          </div>  <!-- COL MD 6 -->

          <div class="clearfix"></div>
          <button id="done" class="btn btn-dash-update" ng-click = "update($index)">UPDATE</button>
          <button class="btn btn-dash-cards btn-block" data-toggle="modal" data-target="#myModal" style="margin-top: 15px;">Remove</button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Are you sure you want to remove Organic Apples?</h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" ng-click='removeProduct($index)' data-dismiss="modal">Remove</button>
                  </div>
                </div>
              </div>
            </div> <!-- modal -->
        </div> <!-- CARD -->
      </div>  <!-- COL MD 3 -->


<!-- =================================== FIRST ROW ENDS HERE =================================== -->



<!-- =================================== SECOND ROW STARTS HERE =================================== -->



<!-- =================================== SECOND ROW ENDS HERE =================================== -->

<!-- ========== Update Button ========== -->
<div class="col-sm-12">
  <div class="col-sm-6 text-center">
    <button id="refresh" class="btn btn-dash-update">REFRESH</button>
  </div>
  <div class="col-sm-6 text-center">
    <button class="btn btn-dash-add" data-toggle="modal" data-target="#add-product">ADD PRODUCT</button>
  </div>
</div>

    </div> <!-- display -->
  </div> <!-- column -->
</div> <!-- container -->


<!-- ========== Add Product Button ========== -->
<!-- Modal -->
<div class="modal fade" id="add-product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add A Product</h4>
      </div>
      <div class="modal-body">
        
        <div class="card">
          <h4 class="card-title">Image URL: <input type="text" class="form-control text-center" value="Insert Image URL"/></h4>
           <h4 class="card-title">Product Name: <input type="text" class="form-control text-center" value="Product Name"/></h4>
           <h4 class="card-title">Unit Price: <input type="text" class="form-control text-center" value="$0.00"/> </h4>
           <h4 class='card-title'>Description: <input type="text" class="form-control text-center" value="description goes here. like 1 pound per quantity or something similar to that effect"/> </h4>
 
           <div class="col-md-8 col-md-offset-2">
             <!-- <strong class="card-qty">QTY.</strong> -->
               <div class="input-group">
                 <div class="input-group-btn">
                   <button class="btn btn-success">-</button>
                 </div>
 
                 <input type="text" class="form-control text-center" value="1"/>
 
                 <div class="input-group-btn">
                   <button class="btn btn-success">+</button>
                 </div>
               </div>
           </div>  <!-- COL MD 6 -->
 
           <div class="clearfix"></div>
          </div> <!-- CARD -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Add Product</button>
      </div>
    </div>
  </div>
</div> <!-- modal -->


<!-- ========== Putting this here for now ========== -->
<script>
$(document).ready(function(){

  var showMenu = false,
      menuSlideIn = {"left": "0px", "easing": "swing"},
      menuSlideOut = {"left": "-60%", "easing": "swing"};

  $(".hamburger").click(function(){
    if(!showMenu) {
      showMenu = true;
      $("#dashboard-nav").animate(menuSlideIn, 300);
      $('#dashboard-nav-col').removeClass('col-xs-2');
    } else {
      showMenu = false;
      $("#dashboard-nav").animate(menuSlideOut, 300);
    }
  });

  // $('.hamburger').click(function() {
  //   $('#dashboard-nav').toggleClass('burger-slide');
  //   $('#dashboard-nav').removeClass('col-xs-2');
  // });

  $("#refresh").click(function(){
    location.reload();
  });

}); // document ready

</script>
<script type="text/javascript" src="dashboard.js"></script>

</body>
</html>
