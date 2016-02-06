<html>
  <headReplace metal:use-macro="header.php/meta_head">
  </headReplace>
<body>

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
  <tr>
    <td> <!-- PRODUCT -->
      <div class="cart-card-thumbnail">
        <img src="img_features/slider2.jpg" alt="veggies"/>
      </div>
      <h4 class="text-center">Onions</h4>
    </td>

    <td> <!-- QUANTITY -->
      <div class="input-group cart-input-group text-center">
        <div class="input-group-btn">
          <button class="btn btn-success">-</button>
        </div>
        <input type="text" class="form-control text-center" value="1"/>
        <div class="input-group-btn">
          <button class="btn btn-success">+</button>
        </div>
      </div>
    </td>

    <td class="text-center unit-price">$8.99</td> <!-- UNIT PRICE -->
    <td class="text-center">$8.99</td> <!-- SUBTOTAL -->
    <td class="text-center"><button class="btn btn-danger">Remove</button></td>
  </tr> 
<!-- -=-= END PRODUCT ROW =-=- -->


<!-- -=-= ONE PRODUCT ROW =-=- -->
  <tr>
    <td> <!-- PRODUCT -->
      <div class="cart-card-thumbnail">
        <img src="img_features/slider2.jpg" alt="veggies"/>
      </div>
      <h4 class="text-center">Onions</h4>
    </td>

    <td> <!-- QUANTITY -->
      <div class="input-group cart-input-group text-center">
        <div class="input-group-btn">
          <button class="btn btn-success">-</button>
        </div>
        <input type="text" class="form-control text-center" value="1"/>
        <div class="input-group-btn">
          <button class="btn btn-success">+</button>
        </div>
      </div>
    </td>

    <td class="text-center unit-price">$8.99</td> <!-- UNIT PRICE -->
    <td class="text-center">$8.99</td> <!-- SUBTOTAL -->
    <td class="text-center"><button class="btn btn-danger">Remove</button></td>
  </tr>
<!-- -=-= END PRODUCT ROW =-=- -->


<!-- -=-= ONE PRODUCT ROW =-=- -->
  <tr>
    <td> <!-- PRODUCT -->
      <div class="cart-card-thumbnail">
        <img src="img_features/slider2.jpg" alt="veggies"/>
      </div>
      <h4 class="text-center">Onions</h4>
    </td>

    <td> <!-- QUANTITY -->
      <div class="input-group cart-input-group text-center">
        <div class="input-group-btn">
          <button class="btn btn-success">-</button>
        </div>
        <input type="text" class="form-control text-center" value="1"/>
        <div class="input-group-btn">
          <button class="btn btn-success">+</button>
        </div>
      </div>
    </td>

    <td class="text-center unit-price">$8.99</td> <!-- UNIT PRICE -->
    <td class="text-center">$8.99</td> <!-- SUBTOTAL -->
    <td class="text-center"><button class="btn btn-danger">Remove</button></td>
  </tr>
<!-- -=-= END PRODUCT ROW =-=- -->


<!-- -=-= ONE PRODUCT ROW =-=- -->
  <tr>
    <td> <!-- PRODUCT -->
      <div class="cart-card-thumbnail">
        <img src="img_features/slider2.jpg" alt="veggies"/>
      </div>
      <h4 class="text-center">Onions</h4>
    </td>

    <td> <!-- QUANTITY -->
      <div class="input-group cart-input-group text-center">
        <div class="input-group-btn">
          <button class="btn btn-success">-</button>
        </div>
        <input type="text" class="form-control text-center" value="1"/>
        <div class="input-group-btn">
          <button class="btn btn-success">+</button>
        </div>
      </div>
    </td>

    <td class="text-center unit-price">$8.99</td> <!-- UNIT PRICE -->
    <td class="text-center">$8.99</td> <!-- SUBTOTAL -->
    <td class="text-center"><button class="btn btn-danger">Remove</button></td>
  </tr>
<!-- -=-= END PRODUCT ROW =-=- -->

</table>

<div class="col-md-6">
  <button class="btn btn-warning">Update Cart</button>
  </div>

  <div class="col-md-6 text-right">
    <h3><b>TOTAL:</b> $8.99</h3>
</div>
  
<div class="col-md-12 text-right">
  <button class="btn btn-info">CHECKOUT</button>
</div>

</div> <!-- container --> 



<!-- ================================== FOOTER ================================== -->
<footerReplace metal:use-macro="footer.php/page_footer">
</footerReplace>
    
<div class="top"><a href="#supertop"><span class="glyphicon glyphicon-triangle-top"></span></a></div>

<script src="angular.min.js"></script>

</body>
</html>