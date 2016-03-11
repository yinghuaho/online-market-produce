var dashboard = angular.module('dashboard', []);

dashboard.controller('dashboardController',[ "$scope","$http", "$httpParamSerializerJQLike", function ($scope,  $http , $httpParamSerializerJQLike) {

  var post = $http({
    method: "post",
    url: "controller.php",
   data:$httpParamSerializerJQLike({
      method: "getProducts"
    }),//PHP must get value by $_REQUEST
    headers: {'Content-Type' : 'application/x-www-form-urlencoded'}
  });

  post.success(function(resp){
    $scope.products = resp;
    console.log(resp);
  });

  post.error(function(resp){
    //error messages here if ajax failed
    console.log("failed ajax called");
  });


   $scope.add = function(id){
    document.getElementById("amount"+id).value = parseInt(document.getElementById("amount"+id).value) + 1;
  }//add function,increase quanity by 1

   $scope.minus = function(id){
     if(document.getElementById("amount"+id).value > 0)
     {
     document.getElementById("amount"+id).value = parseInt(document.getElementById("amount"+id).value) -1;
     }
   }//minu function,reduce quanity by 1

   $scope.removeProduct = function(id){
     $(".modal-backdrop").css("display", "none");

     var post = $http({
       method: "post",
       url: "controller.php",
       data:$httpParamSerializerJQLike(
        {
          method: "deleteProduct",
          id: id
        }
      ),
       headers: {'Content-Type': 'application/x-www-form-urlencoded'}
     });

     post.success(function(respond){
      console.log("works");
      location.reload();
     });
   }//remove products

   $scope.update = function(id){
     var update = $http({
       method: "post",
       url: "controller.php",
       data:$httpParamSerializerJQLike({
         method: "updateProduct",
         id:id,
         product_name: document.getElementById("name"+id).value,
         product_description: document.getElementById('desc'+id).value,
         price: parseFloat(document.getElementById('price'+id).value),
         image: document.getElementById('imgurl'+id).value,
         amount: document.getElementById('amount'+id).value
       }),
       headers: {'Content-Type': 'application/x-www-form-urlencoded'}
     });

     update.success(function(resp){
       console.log("success");
       console.log(resp);
     });

     update.error(function(resp){
       console.log("update Failed");
       //error handling if ajax update failed
     });

     var post = $http({
       method: "post",
       url: "controller.php",
       data:$httpParamSerializerJQLike({method: "getProducts"}),
       headers: {'Content-Type': 'application/x-www-form-urlencoded'}
     });

     post.success(function(respond){
       setTimeout(function () {
        console.log(respond);
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

  $scope.addNewProducts = function(){
    var url = document.getElementById("addNewUrl").value;
    var name = document.getElementById("addNewName").value;
    var price = document.getElementById("addNewPrice").value;
    var desc = document.getElementById("addNewDescription").value;
    var amount = document.getElementById("addNewAmount").value;
    $scope.errorMessage = "";
    var validation = true;


    if(url == "")
    {
      validation = false;
      $scope.errorMessage += "Url Can't Be Empty" + '\n';
    }

    if(name == ""){
      validation = false;
      $scope.errorMessage += "Name Can't Be Empty"  + '\n';
    }

    if(price == ""){
      validation = false;
      $scope.errorMessage += "Price Can't Be Empty"  + '\n';
    }

    if(desc == ""){
      validation = false;
      $scope.errorMessage += "Description Can't Be Empty"  + '\n';
    }

    if(amount == ""){
      validation = false;
      $scope.errorMessage += "Amount Can't Be Empty"  + '\n';
    }

    if(validation == false){
      $scope.errorMessage = $scope.errorMessage.split( "\n" );
      $scope.error = true;
    }
    else{
       var update = $http({
         method: "post",
         url: "controller.php",
         data:$httpParamSerializerJQLike({
           method: "addNewProducts",
           product_name:name,
           product_description: desc,
           price: price,
           image: url,
           amount: amount
         }),
         headers: {'Content-Type': 'application/x-www-form-urlencoded'}
       });

       update.success(function(resp){
         console.log("success");
         $(".modal").css("display", "none");
         $(".modal-backdrop").css("display", "none");
         $('html, body').css('overflowY', 'auto'); 
         location.reload();

       });
    }





  }


}]);


 