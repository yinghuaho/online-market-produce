<script>

   if (localStorage.getItem("shoppingCartItems") === null) {
     var shoppingCartItems = [];
     if(shoppingCartItems.length == 0)
     {
        document.getElementById("done").disabled = true;
     }

   }else{
      var retrievedData = localStorage.getItem("shoppingCartItems");
      var shoppingCartItems = JSON.parse(retrievedData);
     if(shoppingCartItems.length == 0)
     {
        document.getElementById("done").disabled = true;
     }
   }

   var app = angular.module('productRow', []);
   app.controller('productRowCrontroller', function($scope) {
      $scope.shoppingCartItems = shoppingCartItems;
      console.log($scope.shoppingCartItems);
      $scope.parseInt = parseInt;
      $scope.totals = 0;
      var resultsData = [];

          var loadingProducts = function(){
        $.ajax({
          url: "controller.php",
          dataType:"json",
          data:{
            method: "displayProducts",
            limit: 0,
            wherename: "",
            where:"",
            wherestyle:"",
            orderby:""
          },
          async:false,
          type:"post",
          success:function(result){
          console.log(result);  
          $scope.results = result;
          resultsData = result;
          console.log($scope.results); 
    
          },//success:function(result)  
          error: function(jqXHR,textStatus, errorThrown) {
            console.log(jqXHR); 
            console.log(textStatus); 
            console.log(errorThrown); 
          }
        });//ajax   
      };

    loadingProducts();

      $scope.minus = function(x){
         console.log(x);
         if(x.quantity == 1)
         {
             x.quantity = 1;
         } else
         {
            x.quantity = parseInt(x.quantity) - 1;
         }
      }

      var loadingProducts = function(){
              $.ajax({
                  url: "controller.php",
                  dataType:"json",
                  data:{
                    method: "productsOnSale"
                  },
                  type:"post",
                  success:function(result){
                    console.log(result);
                    $scope.Results = result;
                    console.log($scope.Results);
                  },//success:function(result)
                  error: function(jqXHR,textStatus, errorThrown) {
                      console.log(jqXHR);
                      console.log(textStatus);
                      console.log(errorThrown);
                  }
              });//ajax
          };

      $scope.remove = function(){
         console.log(this);
         shoppingCartItems.splice(this.$index,1);
         localStorage["shoppingCartItems"] = JSON.stringify(shoppingCartItems);
         cartsLength.innerHTML = shoppingCartItems.length;
         if(shoppingCartItems.length == 0)
           {
              document.getElementById("done").disabled = true;
           }
      }

      $scope.total = function(x){
         var total = (x.price * x.quantity);
         this.total_num = total.toFixed(2);
         return (this.total_num);
      }

       for(var x=0; x<$scope.shoppingCartItems.length; x++) {
           $scope.$watch('shoppingCartItems['+x+']', function() {
               var total = 0;
               setTimeout(function() {
                  var forTotal = document.getElementsByClassName('forTotal');
                  for (var i = 0; i < forTotal.length; ++i) {
                      console.log(forTotal.length);
                      total += parseFloat(forTotal[i].innerText);
                  }
                  total = total.toFixed(2);
                  document.getElementById('totals').innerText = "Total: " + total;
              }, true);
           }, 500);
       }



   var checkout = document.getElementById("done");
   checkout.onclick = function (){
       var quantity = document.getElementsByClassName('quantity');
       var forTotal = document.getElementsByClassName('forTotal');
       var forPrice = document.getElementsByClassName('priceEach');
       var numb = document.getElementById('totals').innerText;
       var items ="";
       var total = numb.match(/\d/g);
       var amountCorrect = true;
       total = total.join("");

      function findAmount (array, attr, value){

      for (var i = 0; i < array.length; i++)
        {
          if(array[i][attr] == value )
          {
            return array[i].amount;
          }
        }
      }
       var outofstock = "";

       for(var i = 0; i<shoppingCartItems.length; i++){
        console.log(shoppingCartItems[i].id);
        var stockAmount = findAmount(resultsData, "id", shoppingCartItems[i].id);
        console.log(stockAmount);
        console.log(quantity[i].value);
        if(quantity[i].value > parseInt(stockAmount))
        {
            amountCorrect = false;
            outofstock += shoppingCartItems[i].name + " only have " + stockAmount + " at the moment!" + '\n' ;
        }
       }

       if (amountCorrect == false)
       {
          outofstock += "Please revise your amounts !!"
          alert(outofstock);
          amountCorrect = true;

       }else if (amountCorrect == true)
       {
        for(var i = 0; i<shoppingCartItems.length; i++)
       {
          items += " < Name: " + shoppingCartItems[i].name + " - Quantity: " + quantity[i].value + " - Price For Each : " +  forPrice[i].innerText+ " - SubTotal: "+ forTotal[i].innerText +"  >  ";

            var stockAmount = findAmount(resultsData, "id", shoppingCartItems[i].id);
            var newstock = parseInt(stockAmount) - quantity[i].value;
          $.ajax({
             url: "controller.php",
             dataType:"json",
             data:{
               method: "updateProductAmount",
               id:shoppingCartItems[i].id,
               amount:newstock
             },
             type:"post",
             success:function(result){
             },//success:function(result)
             error: function(jqXHR,textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
             }
          });//ajax


       }

          $.ajax({
                 url: "controller.php",
                 dataType:"json",
                 data:{
                   method: "transactionComplete",
                   total:total,
                   items:items
                 },
                 type:"post",
                 success:function(result){
                    console.log(result);
                 },//success:function(result)
                 error: function(jqXHR,textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                 }
         });//ajax

         window.location.href="transaction.php";
       }
   }

   });

</script>
