<html> 
  <head>
    <title>Fresh 'n Healthy: Dashboard</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css"></link>
    <link rel="stylesheet" type="text/css" href="css/products.css"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
  </head>


<body>

<!-- ================================== NAVIGATION ================================== -->

<div class="container-fluid">
  <div class="col-xs-2">
    <div class="list-group">
      <span class="list-group-item active">
        Categories
      </span>
      <a href="#" class="list-group-item">Organic Fruits</a>
      <a href="#" class="list-group-item">Organic Vegetables</a>
      <a href="#" class="list-group-item">Dairy</a>
      <a href="#" class="list-group-item">Meats</a>
      <a href="#" class="list-group-item">Other</a>
    </div>

    <div class="list-group">
      <a href="index.php" class="list-group-item">Back to Home</a>
      <a href="#" class="list-group-item">Logout</a>
    </div>
  </div> <!-- column -->

<!-- ================================== TABLE OF ITEMS ================================== -->

  <div class="col-xs-10">
    <div id="display">
      
    <table class="table table-hover table-bordered table-responsive">
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
        <td class="text-center"><button class="btn btn-danger">X</button></td>
      </tr> 
    <!-- -=-= END PRODUCT ROW =-=- -->

    </table>

    </div>
  </div> <!-- column -->
</div> <!-- container -->

</body>
</html>