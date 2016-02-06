<html>
  <headReplace metal:use-macro="header.php/meta_head">
  </headReplace>
<body ng-app="productRow" ng-controller="productRowCrontroller">

<!-- ================================== NAVIGATION ================================== -->

<navReplace metal:use-macro="nav.php/nav_bar">
</navReplace>



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
  <tr ng-repeat="x in shoppingCartItems" id="{{x.id}}">
    <td> <!-- PRODUCT -->
      <div class="cart-card-thumbnail">
        <img src="{{x.imgurl}}" alt="veggies"/>
      </div>
      <h4 class="text-center">{{x.name}}</h4>
    </td>

    <td> <!-- QUANTITY -->
      <div class="input-group cart-input-group text-center">
        <div class="input-group-btn">
          <button class="btn btn-success"  ng-click="minus(x)">-</button>
        </div>
        <input type="text" class="form-control text-center" ng-model="x.quantity"/>
        <div class="input-group-btn">
          <button class="btn btn-success" ng-click="x.quantity = parseInt(x.quantity)+1">+</button>
        </div>
      </div>
    </td>

    <td class="text-center unit-price">{{x.price}}</td> <!-- UNIT PRICE -->
    <td class="text-center forTotal" ng-init="x.subtotal =(x.price* x.quantity); shoppingCartItems.total = shoppingCartItems.total + (x.price* x.quantity)">{{total(x)}}</td> <!-- SUBTOTAL -->
    <td class="text-center"><button class="btn btn-danger" ng-click="remove()">Remove</button></td>
    </tr>

</table>

<div class="col-md-6">
  <button class="btn btn-warning">Update Cart</button>
  </div>

  <div class="col-md-6 text-right">
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