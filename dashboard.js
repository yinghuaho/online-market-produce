var dashboard = angular.module('dashboard', []);

dashboard.controller('dashboardController', function ($scope,  $http) {

  var post = $http({
    method: "post",
    url: "controller.php",
    params:{
      method: "getProducts"
    }//PHP must get value by $_REQUEST
  });

  post.success(function(resp){
    $scope.products = resp;
  });

  post.error(function(resp){
    //error messages here if ajax failed
    console.log("failed ajax called");
  });


   $scope.add = function(index){
    $scope.products[index].amount = parseInt($scope.products[index].amount) + 1;
  }//add function,increase quanity by 1

   $scope.minus = function(index){
     if($scope.products[index].amount > 0)
     {
     $scope.products[index].amount = parseInt($scope.products[index].amount) - 1;
     }
   }//minu function,reduce quanity by 1

   $scope.removeProduct = function(index){
     $scope.products.splice(index,1);
     //something more is coming
   }//remove products

   $scope.update = function(index){
     var update = $http({
       method: "post",
       url: "controller.php",
       data:$.param({
         method: "updateProduct",
         id: $scope.products[index].id,
         product_name: document.getElementById("name"+$scope.products[index].id).value,
         product_description: document.getElementById('desc'+$scope.products[index].id).value,
         price: parseFloat(document.getElementById('price'+$scope.products[index].id).value),
         image: document.getElementById('imgurl'+$scope.products[index].id).value,
         amount: document.getElementById('amount'+$scope.products[index].id).value
       }),
       headers: {'Content-Type': 'application/x-www-form-urlencoded'}
     });

     update.success(function(resp){
       console.log("success");
     });

     update.error(function(resp){
       console.log("update Failed");
       //error handling if ajax update failed
     });

     var post = $http({
       method: "post",
       url: "controller.php",
       params:{
         method: "getProducts"
       }//PHP must get value by $_REQUEST
     });

     post.success(function(respond){
       setTimeout(function () {
       $scope.products = respond;
     }, 200);
     });

     post.error(function(resp){
       //error messages here if ajax failed
       console.log("failed ajax called");
     });



   }

   //filter sectioin
  $scope.filter = "$";
  $scope.changeCategory = function(type){
    $scope.filter = type;
  }

  $scope.getCategory = function(){
    switch($scope.filter){
      case 'Fruits':
        return {category:'Fruits'};
      case 'Vegetables':
        return {category:'Vegetables'};
      case 'Dairy':
        return {category:'Dairy'};
      case 'Meats':
        return {category:'Meats'};
      case 'Other':
        return {category:'Other'};
      default:
        return {$: ""}
    }
  }

  $scope.logout = function(){
    sessionStorage.clear();
    window.location = "login.php";
  }


});
