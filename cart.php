<html>
  <headReplace metal:use-macro="header.php/meta_head">
  </headReplace>
<body ng-app="productRow" ng-controller="productRowCrontroller">

<!-- ================================== NAVIGATION ================================== -->

<nav class="navbar navbar-inverse navbar-fixed-top market-nav">
  <div class="container">

<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="index.php">
    <img alt="Brand" src="./imgs/FnH_Logo_SVGv2.svg"/>
  </a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
    <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li id="Fruits"><a href="#productDisplay">Organic Fruits</a></li>
        <li id="Vegetables"><a href="#productDisplay">Organic Vegetables</a></li>
        <li id="Dairy"><a href="#productDisplay">Dairy</a></li>
        <li id="Meants"><a href="#productDisplay">Meats</a></li>
        <li id="Other"><a href="#productDisplay">Other</a></li>
      </ul>
    </li> -->
    <li><a href="index.php">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
  </ul>

<!--   <ul class="nav navbar-nav navbar-right">
    <li>
      <form class="navbar-form" role="search">
        <div class="form-group">
          <input id="search" type="text" class="form-control search-bar" placeholder="Search"></input>
        </div>
      </form>
    </li>
    <li><a href="login.php">Login</a></li>
    <li><a href="cartphptal.php">Shopping Cart <span id="cartsLength" class="badge">0</span></a></li>
  </ul> -->

</div>

</div>  <!-- CONTAINER -->

</nav>

<!-- ================================== SHOPPING CART ================================== -->

<div id="supertop"></div>

<div class="container">
  <h1 class="text-center">Fresh 'n Healthy: Online Farmers' Market</h1>

  <div class="col-md-5"> <h2 class="bg-warning text-center">Shopping Cart</h2> </div>

<table class="table table-hover table-bordered">
  <tr>
    <th>Product</th>
    <th>Quantity</th>
    <th class="unit-price">Unit Price</th>
    <th>Subtotal</th>
    <th></th>
  </tr>

<!-- -=-= ONE PRODUCT ROW =-=- -->
  <tr ng-repeat="x in shoppingCartItems track by $index">
    <td> <!-- PRODUCT -->
      <div class="cart-card-thumbnail">
        <img src="{{x.imgurl}}"/>
      </div>
      <h4 class="text-center">{{x.name}}</h4>
    </td>

    <td> <!-- QUANTITY -->
      <div class="input-group cart-input-group text-center">
        <div class="input-group-btn">
          <button class="btn btn-success"  ng-click="minus(x)">-</button>
        </div>
        <input type="text" class="form-control text-center quantity" ng-model="x.quantity"/>
        <div class="input-group-btn">
          <button class="btn btn-success" ng-click="x.quantity = parseInt(x.quantity)+1">+</button>
        </div>
      </div>
    </td>

    <td class="text-center unit-price priceEach">{{x.price}}</td> <!-- UNIT PRICE -->
    <td class="text-center forTotal" ng-init="x.subtotal =(x.price* x.quantity); shoppingCartItems.total = shoppingCartItems.total + (x.price* x.quantity)">{{total(x)}}</td> <!-- SUBTOTAL -->
    <td class="text-center"><button class="btn btn-danger" ng-click="remove()">X</button></td>
    </tr>

</table>

<!-- <div class="col-md-6">
  <button class="btn btn-warning">Update Cart</button>
  </div> -->

  <div class="col-md-12 text-right">
    <h3 id="totals"><b>TOTAL:</b></h3>
</div>
  
<div class="col-md-12 text-right">
  <button id="done" class="btn btn-info" >CHECKOUT</button>
</div>

</div> <!-- container --> 



<!-- ================================== FOOTER ================================== -->
<footerReplace metal:use-macro="footer.php/page_footer">
</footerReplace>
    
<div class="top"><a href="#supertop"><span class="glyphicon glyphicon-triangle-top"></span></a></div>

<script src="angular.min.js"></script>
<?php  include('cartJS.php'); ?>

</body>
</html>