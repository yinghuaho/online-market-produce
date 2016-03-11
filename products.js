$(document).ready(function(){
	
	console.log("js coonected");
	
	
	//When page load, user ajax to retrieve on sale items from database
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
				  
	
				  if(result[0].message == "success")
				  {
					  for(var i = 0; i< result.length; i++)
					  {
							$('#products_display').append("<div id='"+result[i].id+"products'class='col-md-3'><div class='card'><img class='card-image' src='" +result[i].image + "'></img><h3 class='card-title'>"+result[i].product_name+"</h3><h5 class='card-title'>$"+result[i].price+" CAD</h5><div class='col-md-8 col-md-offset-2'><strong class='card-qty'>QTY.</strong><div class='input-group'><div class='input-group-btn'><button id='"+result[i].id+"minus' class='minus btn btn-success'>-</button></div><input id='"+result[i].id+"amount' type='text' class='form-control text-center' value='1'></input><div class='input-group-btn'><div id='"+result[i].id+"plus' class='add btn btn-success'>+</div></div></div></div>	<div class='clearfix'></div><button id='"+result[i].id+"toCart' class='btn btn-danger btn-block' style='margin-top: 15px;'>Add to Cart</button></div> </div>"); 	  
					  }
					  
				  }else if(result[0].message == "failed")
				  {
						console.log("something went WRONG");
				  }		  
	
				},//success:function(result)	
				error: function(jqXHR,textStatus, errorThrown) {
					console.log(jqXHR); 
					console.log(textStatus); 
					console.log(errorThrown); 
				}
			});//ajax		
		};
	
		//plus click
		$(document).on('click','.add', function(){
			var input = parseInt(this.id) + "amount";
			var itemamount = $("#"+input).val();
			itemamount++;
			$("#"+input).val(itemamount);
		});
		
		//minus click
		$(document).on('click','.minus', function(){
			var input = parseInt(this.id) + "amount";
			var itemamount = $("#"+input).val();
			if(itemamount>0)
			{
			itemamount--;
			$("#"+input).val(itemamount);
			}
		});
		
		//nav smooth animation
		$(".navbar a").on('click', function(event) {
			
			  // Prevent default anchor click behavior
			  event.preventDefault();
			
			  // Store hash
			  var hash = this.hash;
			
			  // Using jQuery's animate() method to add smooth page scroll
			  // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
			  $('html, body').animate({
				scrollTop: $(hash).offset().top
			  }, 900, function(){
				});
		 });
		

	loadingProducts();
	
});