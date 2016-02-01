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

  <div class="col-md-12 text-center item-bg-color">

    <div class="col-md-2">
      <h4>Product</h4>
        <div class="cart-card-thumbnail">
          <img src="img_features/slider2.jpg" alt="veggies"/>
        </div>
        <h5>Onions</h5>
        <h6>Onions make you cry. Too many ninjas chopping onions around me</h6>
    </div>

    <div class="col-md-3">
      <h4>Quantity</h4>
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
    </div>

    <div class="col-md-1">
      x
    </div>

    <div class="col-md-2">
      <h4>Unit Price</h4>
    </div>

    <div class="col-md-2">
      <h4>Subtotal</h4>
    </div>

    <div class="col-md-2">
      remove
    </div>

  </div> <!-- column -->

</div> <!-- container --> 



<!-- ================================== FOOTER ================================== -->
<footerReplace metal:use-macro="footer.php/page_footer">
</footerReplace>
    
<div class="top"><a href="#supertop"><span class="glyphicon glyphicon-triangle-top"></span></a></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>

</body>
</html>