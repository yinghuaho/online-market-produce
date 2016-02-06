<script>

   if (localStorage.getItem("shoppingCartItems") === null) {
     var shoppingCartItems = [];
   }else{
      var retrievedData = localStorage.getItem("shoppingCartItems");
      var shoppingCartItems = JSON.parse(retrievedData);
      console.log(shoppingCartItems);
   }
   
   var app = angular.module('productRow', []);
   app.controller('productRowCrontroller', function($scope) {
      $scope.shoppingCartItems = shoppingCartItems;
      $scope.parseInt = parseInt;
      $scope.totals = 0;
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
      
      $scope.remove = function(){
         console.log(this);
         shoppingCartItems.splice(this.$index,1);
         localStorage["shoppingCartItems"] = JSON.stringify(shoppingCartItems);
      }
      
      $scope.total = function(x){
         this.total_num = (x.price * x.quantity);
         console.log(this.total_num);
         return (this.total_num);
      }
      
       for(var x=0; x<$scope.shoppingCartItems.length; x++) {
           $scope.$watch('shoppingCartItems['+x+']', function() {
               var total = 0;
               setTimeout(function() {
                  var forTotal = document.getElementsByClassName('forTotal');
                  for (var i = 0; i < forTotal.length; ++i) {
                      total += parseInt(forTotal[i].innerText);  
                  }     
                  document.getElementById('totals').innerText = "Total: " + total;      
              }, true);
           }, 500);
       }
      
   });
   
   var checkout = document.getElementById("done");
   checkout.onclick = function (){
      window.location.href="transaction.php";
   }

</script>
