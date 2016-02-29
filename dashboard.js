var dashboard = angular.module('dashboard', []);

dashboard.controller('dashboardController', function ($scope) {

  $scope.products = [
    {'img': 'img_features/slider2.jpg',
     'url': 'slider2.jpg',
     'name': 'Organic Apples',
     'price': '8.99',
     'description': 'description goes here. like 1 pound per quantity or something similar to that effect',
     'quanity': '1'
   }];


   $scope.add = function(index){
    $scope.products[index].quanity = parseInt($scope.products[index].quanity) + 1;
   }

   $scope.minus = function(index){
     if($scope.products[index].quanity > 0)
     {
     $scope.products[index].quanity = parseInt($scope.products[index].quanity) - 1;
     }
   }

   $scope.removeProduct = function(index){
     $scope.products.splice(index,1);
   }



});
