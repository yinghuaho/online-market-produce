<script>
<?php 
include('connection.php');
?>
	$(document).ready(function(){
		
		console.log("js coonected");
		var where = "";
		var wherename ="";
		var limit = 0;
		var orderby = "";
		
		//When page load, user ajax to retrieve on sale items from database
		var loadingProducts = function(limit,wherename,where){
				$.ajax({
					url: "controller.php",
					dataType:"json",
					data:{
					  method: "displayProducts",
					  limit: limit,
					  wherename: wherename,
					  where:where
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
		
			
		var loadpages = function()
		{	
			$("#pages").html("");
			$('#products_display').html("");
			var pages = onsaleItemAmount / 20;
			console.log(pages);
			var itemlimit ="";
			if(pages>0)
			{
				var pagesnumber = pages.toFixed(0);
				$("#next,#prev").show();
				loadingProducts(limit,wherename,where);
				$("#pages").append("<button id='0pages' class='pagebutton'>1</button>");
				$("#next,#prev").removeClass().addClass("0pages");
				$("#prev").attr("disabled",true);
				for(var i=1; i<pages; i++)
				{
					var pageNum = i + 1;
					$("#pages").append("<li><button id='"+i+"pages' class='pagebutton' >"+pageNum+"</button></li>");
				}
			}else
			{
				itemlimit = 0;
				$("#next,#prev").hide();
				loadingProducts(limit,wherename,where);	
			}	
		};
		
		//logic for page number count.... continue
				
		$(document).on('click','.pagebutton', function(){
			$('#products_display').html("");
			var limit = parseInt(this.id) * 20;
			loadingProducts(limit,wherename,where);
			if(this.id == "0pages")
			{
				$("#prev").attr("disabled",true);	
			}else
			{
				$("#prev").attr("disabled",false);
			}
			var maxpages = $("div .pagebutton").length;
			var maxpageclassname = maxpages-1 +"pages";
			if(this.id == maxpageclassname)
			{
				$("#next").attr("disabled",true);
			}else
			{
				$("#next").attr("disabled",false);
			}
			
			
			
			$("#next,#prev").removeClass().addClass(this.id);

		
		});
		
		$("#next").click(function(){
			$("#prev").attr("disabled",false);
			var currentnewclass = parseInt(this.className);
			console.log(currentnewclass);
			var currentpage = currentnewclass.toString() + "pages";
			console.log(currentpage);
			var maxpages = $("div .pagebutton").length;
			var maxpageclassname = maxpages-1+"pages";
			console.log(maxpageclassname);
			console.log(currentpage);
			console.log(maxpageclassname);
			if(currentpage == maxpageclassname)
			{
				$("#next").attr("disabled",true);
				
			}else
			{
				console.log("worked");
				$('#products_display').html("");
				$("#next").attr("disabled",false);
				var page = parseInt(this.className)+1;
				var limit = page*20;
				var newclass = parseInt(this.className)+1 + "pages";
				$("#next,#prev").removeClass().addClass(newclass);
				loadingProducts(limit,wherename,where);
				if(newclass == maxpageclassname)
				{
					$("#next").attr("disabled",true);
				}
			}
			
		});
		
		$("#prev").click(function(){
			$("#next").attr("disabled",false);
			if(this.className == "0pages")
			{
				$("#prev").attr("disabled",true);
			}else
			{
				$("#prev").attr("disabled",false);
				var currentpage = this.className;
				$('#products_display').html("");
				var page = parseInt(this.className)-1;
				console.log(page);
				var limit = page*20;
				console.log(limit);
				var newclass = parseInt(this.className)-1 + "pages";
				$("#next,#prev").removeClass().addClass(newclass);
				loadingProducts(limit,wherename,where);
			}

			
			
		});
		
		
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
			 
			 
			 
			 	var onsaleItemAmount =	
				<?php 
					 $querey = "SELECT COUNT(*) FROM inventory;";
					 $statement = $db->prepare($querey);
					 $statement->execute();
					 $result = $statement->fetchColumn();
					 Print($result);
				?>;
				
				loadpages();
				
				$("#selectCategory").on("change", function(){
					console.log(this.value);
					switch(this.value){
						case "All":
							onsaleItemAmount  =
							<?php 
								 $querey = "SELECT COUNT(*) FROM inventory;";
								 $statement = $db->prepare($querey);
								 $statement->execute();
								 $result = $statement->fetchColumn();
								 Print($result);
							?>;
							
							console.log(onsaleItemAmount);			
							loadpages();
						break;
						case "Fruits":
							onsaleItemAmount  =
							<?php 
								 $querey = "SELECT COUNT(*) FROM inventory WHERE category = 'Fruits';";
								 $statement = $db->prepare($querey);
								 $statement->execute();
								 $result = $statement->fetchColumn();
								 Print($result);
							?>;
							where = "Fruits";
							wherename = "category";		
							loadpages();
						break;
						case "Vegetables":
							onsaleItemAmount  =
								<?php 
									 $querey = "SELECT COUNT(*) FROM inventory WHERE category = 'Vegetables';";
									 $statement = $db->prepare($querey);
									 $statement->execute();
									 $result = $statement->fetchColumn();
									 Print($result);
								?>;
								where = "Vegetables";
								wherename = "category";			
								loadpages();
						break;	
						case "Dairy":
							onsaleItemAmount  =
								<?php 
									 $querey = "SELECT COUNT(*) FROM inventory WHERE category = 'Dairy';";
									 $statement = $db->prepare($querey);
									 $statement->execute();
									 $result = $statement->fetchColumn();
									 Print($result);
								?>;
								where = "Dairy";
								wherename = "category";			
								loadpages();
						break;
						case "Meats":
							onsaleItemAmount  =
								<?php 
									 $querey = "SELECT COUNT(*) FROM inventory WHERE category = 'Meats';";
									 $statement = $db->prepare($querey);
									 $statement->execute();
									 $result = $statement->fetchColumn();
									 Print($result);
								?>;
								where = "Meats";
								wherename = "category";		
								loadpages();
						break;
						case "Other":
							onsaleItemAmount  =
								<?php 
									 $querey = "SELECT COUNT(*) FROM inventory WHERE category = 'Other';";
									 $statement = $db->prepare($querey);
									 $statement->execute();
									 $result = $statement->fetchColumn();
									 Print($result);
								?>;
								where = "Fruits";
								wherename = "Other";		
								loadpages();
						break;

					}
				});
				
				
		
	});
	

</script>
