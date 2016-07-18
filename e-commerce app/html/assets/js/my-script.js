//my scripts
(function($){
 window.onload = setupRefresh;
	
	//the refresh function
	function setupRefresh(){
		 check_view_cart();
		 view_cart();
		 view_no_items();
		 view_header_cart();
		 //view_no_items();
	setInterval("view_cart();",1000);
	setInterval("check_view_cart();",1000);
    setInterval("view_header_cart();",1000);
	setInterval("view_no_items();",300);
	
	//also add the small view cart at the top header
		}
	
	

   
	//funciton to display the cart
	function view_cart(){
       $.post('functions.php',{task:"show"},function(data){
        $('.order-detail-content').html(data);
       });
	}
	function check_view_cart(){
       $.post('functions.php',{task:"show_check"},function(data){
        $('.cart_box').html(data);
       });
	}
	//funciton to display the cart
	function view_header_cart(){
       $.post('functions.php',{task:"show_header"},function(data){
        $('.cart-block-content').html(data);
       });
	}
	//funciton to display the cart
	function view_no_items(){
       $.post('functions.php',{task:"no_of_items"},function(data){
        $('.no_of_items').html(data).fadeIn('fast');
		$('.total').html(data+' - Item(s)').fadeIn('fast');
		$('.notify').html(data).fadeIn('fast');
		//$('.cart-title').html(data + ' Item(s) in my cart').fadeIn('fast');
       });
	}
	   
	function updateQuantities(id){
		 //get the new quantity
		
		var d = id;
		 
		 var new_qty = $('#box_'+d).val();
		  //unique id of this product
		 var id = $('#box_'+d).parent().parent().attr("id");
		 
		 $.post('functions.php', {task:"update_qty",new_qty:new_qty,id:id}, function(data){
				
				$('.cart_total_price').html(data);
				});
				
		$.post('functions.php', {task:"update_qty2",new_qty:new_qty,id:id}, function(data){
				
				$('#sub_'+d).html(data);
				
				
				});
					
	}
	
	
	function checkForDelete(id){
		var d = id;
		//get the value
		var qty = $('#box_'+d).val();
		
		//if you typed 0 and clicked away
		if(qty == 0 ){
			//get the id of the item attached (to the container row)
			var d = $('#box_'+d).parent().parent().attr("id");
			
			
			//use ajax to remove this item from session
			$.post('functions.php', {task:"delete_item",d:d}, function(){
				//use jquery to remove the item from the page
				$(d).remove();
				});
			
			
			}
	}
	function delete_item(id){
		var d = id;
		
		//use ajax to remove this item from session
			$.post('functions.php', {task:"delete_item",d:d}, function(){
				//use jquery to remove the item from the page
				$("#"+d).fadeOut();
				});
			
	}
	function delete_item_smcart(id){
		var d = id;
		
		//use ajax to remove this item from session
			$.post('functions.php', {task:"delete_item",d:d}, function(){
				//use jquery to remove the item from the page
				$("#"+d).fadeOut();
				$.post('functions.php',{task:"no_of_items"},function(data){
					$('.no_of_items').html(data).fadeIn('fast');
					$('.total').html(data+' - Item(s)').fadeIn('fast');
					$('.notify').html(data).fadeIn('fast');
					$('.cart-title').html(data + ' Item(s) in my cart').fadeIn('fast');
			  });
			  $.post('functions.php',{task:"show"},function(data){
                     $('.order-detail-content').html(data);
				  });
				$.post('functions.php',{task:"show_header"},function(data){
				  $('.cart-block-content').html(data);
			    });
				});
			
	}
	
 })(jQuery);