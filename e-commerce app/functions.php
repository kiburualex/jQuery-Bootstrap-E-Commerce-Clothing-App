<?php
include_once("Shopping_Cart/functions/db_functions.php");
 
 if(!isset($_SESSION['cart'])){
      $_SESSION['cart'] = array();
}
  
function return_cart(){
	
	 echo '<table class="table table-bordered table-responsive cart_summary">
				<thead>
					<tr>
						<th class="cart_product">Product</th>
						<th>Description</th>
						<th>Avail.</th>
						<th>Unit price</th>
						<th>Qty</th>
						<th>Total</th>
						<th  class="action"><i class="fa fa-trash-o"></i></th>
					</tr>
				</thead>
			   <tbody>';
				  
				  $items = 0;
				  $total = 0;
                  foreach($_SESSION['cart'] as $key=> $items){
					  $get = mysql_query('SELECT * FROM items WHERE id='.mysql_real_escape_string((int)$key));
												 
												 
												 while($get_row = mysql_fetch_assoc($get)){
													  $sub = $get_row['price'] * $items;
													  $total+=$sub;
													  
	                       echo ' <tr id="'.$get_row['id'].'">
							<td class="cart_product">
								<a href="#"><img src="Shopping_Cart/'.$get_row['image_location'].'" alt="Product" style="width:100px;height:122px;"></a>
							</td>
							<td class="cart_description">
								<p class="product-name"><a href="#">'.$get_row['name'].'</a></p>
								<small class="cart_ref">category : '.$get_row['category'].'</small><br>
								<small><a href="#">Person : '.$get_row['person'].'</a></small>
							</td>
							<td class="cart_avail"><span class="label label-success">In stock</span></td>
							<td class="price"><span> KShs '.number_format($get_row['price'],2).'</span></td>
							<td class="qty">
								<input class="form-control input-sm" type="text" value="'.$items.'" onkeyup="updateQuantities(\''.$get_row['id'].'\')" onblur="checkForDelete(\''.$get_row['id'].'\')" id="box_'.$get_row['id'].'">
								
								
							</td>
							<td class="price">
								<span id="sub_'.$get_row['id'].'"> '.money($sub).'</span>
							</td>
							<td class="action">
								<a href="javascript:;" onClick="delete_item(\''.$get_row['id'].'\')">Delete item</a>
							</td>
   
					   </tr>';
												
							 }
                 }
							
							 if($items ==0){
	                         echo '<tr><td colspan="7" style="text-align:center;">Your cart is empty</td></tr>';
                             }		  
				echo ' </tbody>
				 <tfoot>
					
					<tr>
						<td colspan="4"><strong>Total</strong></td>
						<td colspan="2"><strong>'.money($total).'</strong></td>
					</tr>
				 </tfoot>    
		 </table>
                    
				
		<div class="cart_navigation">
			<a class="prev-btn" href="index.php">Continue shopping</a>
			<a class="next-btn" href="checkout.php">Proceed to checkout</a>
		</div>';
 
}

function return_check_cart(){
	
	 echo '<table class="table table-bordered table-responsive cart_summary">
				<thead>
					<tr>
						<th class="cart_product">Product</th>
						<th>Description</th>
						<th>Avail.</th>
						<th>Unit price</th>
						<th>Qty</th>
						<th>Total</th>
						<th  class="action"><i class="fa fa-trash-o"></i></th>
					</tr>
				</thead>
			   <tbody>';
				  
				  $items = 0;
				  $total = 0;
                  foreach($_SESSION['cart'] as $key=> $items){
					  $get = mysql_query('SELECT * FROM items WHERE id='.mysql_real_escape_string((int)$key));
												 
												 
												 while($get_row = mysql_fetch_assoc($get)){
													  $sub = $get_row['price'] * $items;
													  $total+=$sub;
													  
	                       echo ' <tr id="'.$get_row['id'].'">
							<td class="cart_product">
								<a href="#"><img src="Shopping_Cart/'.$get_row['image_location'].'" alt="Product" style="width:100px;height:122px;"></a>
							</td>
							<td class="cart_description">
								<p class="product-name"><a href="#">'.$get_row['name'].'</a></p>
								<small class="cart_ref">category : '.$get_row['category'].'</small><br>
								<small><a href="#">Person : '.$get_row['person'].'</a></small>
							</td>
							<td class="cart_avail"><span class="label label-success">In stock</span></td>
							<td class="price"><span> KShs '.number_format($get_row['price'],2).'</span></td>
							<td class="qty">
								<input class="form-control input-sm" type="text" value="'.$items.'" onkeyup="updateQuantities(\''.$get_row['id'].'\')" onblur="checkForDelete(\''.$get_row['id'].'\')" id="box_'.$get_row['id'].'">
								
								
							</td>
							<td class="price">
								<span id="sub_'.$get_row['id'].'"> '.money($sub).'</span>
							</td>
							<td class="action">
								<a href="javascript:;" onClick="delete_item(\''.$get_row['id'].'\')">Delete item</a>
							</td>
   
					   </tr>';
												
							 }
                 }
							
							 if($items ==0){
	                         echo '<tr><td colspan="7" style="text-align:center;">Your cart is empty</td></tr>';
                             }		  
				echo ' </tbody>
				 <tfoot>
					
					<tr>
						<td colspan="4"><strong>Total</strong></td>
						<td colspan="2"><strong>'.money($total).'</strong></td>
					</tr>
				 </tfoot>    
		 </table>
		 <button class="button pull-left" onclick="empty_cart()">Empty The cart</button>
		 <button class="button pull-right" onclick="place_order()">Place Order</button>';
}
function return_header_cart(){
	  
	
       echo '
			<h5 class="cart-title">';
			echo number_of_items($_SESSION['cart']).' Item(s) in your cart'; 
	echo'</h5>
			<div class="cart-block-list">
			
				<ul>';
				$val = 0;
	  $total = 0;
	  foreach($_SESSION['cart'] as $key=> $items){
	  $get = mysql_query('SELECT * FROM items WHERE id='.mysql_real_escape_string((int)$key));
			 while($get_row = mysql_fetch_assoc($get)){
				  $sub = $get_row['price'] * $items;
				  $total+=$sub;
				echo'
					<li class="product-info" id="'.$get_row['id'].'">								
						<div class="p-left">
							<a href="javascript:;" class="remove_link" onclick="delete_item_smcart(\''.$get_row['id'].'\')"></a>
							<a href="#">
							<img class="img-responsive" src="Shopping_Cart/'.$get_row['image_location'].'" alt="p10" style="width:78px;height:100px;">
							</a>
						</div>
						<div class="p-right">
							<p class="p-name">'.$get_row['name'].'</p>
							<p class="p-rice">'.money($get_row['price']).'</p>
							<p>Qty: '.$items.'</p>
						</div>
					</li> ';
			 }
		 }
		echo '</ul>
			</div>
							
			<div class="toal-cart">
				<span>Total</span>
				<span class="toal-price pull-right">'.money($total).'</span>
			</div>
							
			 <div class="cart-buttons">
				<a href="order.php" class="btn-check-out">Checkout</a>
			 </div>';	
}
function add_to_cart(){
	$add_item = $_POST['add_item'];
	//$no_items = number_of_items($_SESSION['cart']);
	
	//retrieve the name of the item from the database
	   $q = mysql_query("SELECT * FROM items WHERE id=".$add_item);
	   $r = mysql_fetch_assoc($q);
	   $nam = $r['name'];
       //check to see if this item is already in the cart

          if(isset($_SESSION['cart'][$add_item])){
          
             $_SESSION['cart'][$add_item]+=1;
             //echo 'You now have '.$_SESSION['cart'][$add_item].' '.$nam.'(s) <br />';
			  echo '<p> You now have '.$_SESSION['cart'][$add_item].' '.$nam.'(s).</p>';
                
           }else{
               $_SESSION['cart'][$add_item] = 1;
               //echo ' you added '.$_SESSION['cart'][$add_item].' '.$nam.' into the cart <br />';
			    echo ' <p>you added '.$_SESSION['cart'][$add_item].' '.$nam.' into the cart. </p>';
            }
}

function calculate_total(){
	$total = 0;
	 foreach($_SESSION['cart'] as $key=> $items){
	  $get = mysql_query('SELECT * FROM items WHERE id='.mysql_real_escape_string((int)$key));
			 while($get_row = mysql_fetch_assoc($get)){
				  $sub = $get_row['price'] * $items;
				  $total+=$sub;
				
			 }
		 }
		return $total;
}

function money($m){
 	 return "KShs. ".number_format($m,2);
}

function empty_cart(){
   //session_destroy();
   session_unset();

  echo 'Cart Emptied';
}



function number_of_items($cart){
  $items = 0;
  foreach($cart as $num => $value){
	  $items +=$value;
	}
   echo $items;
}
function place_order(){
    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$location = $_POST['location'];
	$total = calculate_total();
	$now = date('Y-m-d H:i:s');
	
	//validation
	if($fname == '' || $lname == '' || $email == '' || $phone == '' || $location == '' ){
		 echo 'Please fill all the details';
	}else if($total == 0){
		echo 'your cart is empty: Order cannot be placed';
	}
	else{
		//echo $fname.'<br>'. $lname.'<br>'. $email.'<br>'. $phone.'<br>'. $location.'<br >'.$total.'<br >'.$now;
		
		
		//adding to the orders table	
		
		$query = 'INSERT INTO orders (order_id, order_date, fname, lname,email,contact,location,total,state) 
					VALUES (" ","'.$now.'","'.$fname.'","'.$lname.'","'.$email.'","'.$phone.'","'.$location.'","'.$total.'","Not Fullfilled")';
		$result = mysql_query($query);
		//$order_id = mysql_insert_id();
		
		
			 
			 if($result == true){
				 //retrieve the cart products and add them to the order_details table
					$q = 'SELECT  `order_id` FROM  `orders` ORDER BY  `order_id` DESC LIMIT 0 , 1';
					$r = mysql_query($q);
					
					$row = mysql_fetch_assoc($r);
					$last_id = $row['order_id'];
					
					foreach($_SESSION['cart'] as $key=> $items){
					  $get = mysql_query('SELECT * FROM items WHERE id='.mysql_real_escape_string((int)$key));
							 while($get_row = mysql_fetch_assoc($get)){
								  $sub = $get_row['price'] * $items;
								  
								   $product_name = $get_row['name'];
								   $product_image = $get_row['image_location'];
								   $product_category = $get_row['category'];
								   $quantity = $items;
								   $sub_total = $sub;
								   
								$query2 = 'INSERT INTO order_details (order_id, product_name, product_image, product_category,quantity,sub_total) 
											VALUES ("'.$last_id.'","'.$product_name.'","'.$product_image.'","'.$product_category.'","'.$quantity.'","'.$sub_total.'")';
								$result2 = mysql_query($query2);
							 }
						 }
				 if($result2 == true){
				echo  'Order Placed Successfully';
				
				 }
			  }else{
			   echo 'Failed to place order';	
			   }
			 
			 //end of retrieving and adding
		}
	
}

function item_details($id){
 echo '<div id="product">
                        <div class="primary-box row">
                            <div class="pb-left-column col-xs-12 col-sm-6">
                                <!-- product-imge-->
                                <div class="product-image">
                                    <div class="product-full">';
                                    
                                       $a = mysql_query("SELECT * FROM items WHERE id='".$id."'") or die(mysql_error());
									   $fetch = mysql_fetch_assoc($a);
									   
									   
									
                                       echo ' <img id="product-zoom" src="Shopping_Cart/'.$fetch['image_location'].'" data-zoom-image="Shopping_Cart/'.$fetch['image_location'].'"/>
                                    </div>
                                    <div class="product-img-thumb" id="gallery_01">
                                        
                                    </div>
                                </div>
                                <!-- product-imge-->
                            </div>
                            <div class="pb-right-column col-xs-12 col-sm-6">
                                <h1 class="product-name" style="font-size:1.3em;"> Name : '.$fetch['name'].'</h1>
                                
                                <div class="product-price-group">
                                    <span class="price" style="font-size:1.1em;"> Price : '.money($fetch['price']).'</span>
                                </div>
                                <div class="info-orther">
                                    <p>Availability : <span class="in-stock">In stock</span></p>
                                    <p>Condition : '.$fetch['new'].'</p>
                                </div>
                                <div class="product-desc"> Description : '.$fetch['description'].'</div>
                               
                                <div class="form-action">
                                    <div class="button-group">
                                        <a class="btn-add-cart" href="javascript:;" onClick="add_to_cart2('.$fetch['id'].')">Add to cart</a>
                                    </div>
                                    
                                </div>
                                <div class="reply"></div>
                            </div>
                        </div>
                        
                    </div>';	
 	
}
function category($cat,$pers){
	echo '<h2 class="page-heading">
                        <span class="page-heading-title">'.$cat.'</span>
                    </h2>
                    <ul class="display-product-option">
                        <li class="view-as-grid selected">
                            <span>grid</span>
                        </li>
                        <li class="view-as-list">
                            <span>list</span>
                        </li>
                    </ul>
                    
                   <div class="tab-container">
                   
                    <ul class="row product-list grid tab-panel active" id="tab-1">';
                    
                                 
					  $tab = mysql_query("SELECT * FROM items WHERE category='".$cat."' AND person='".$pers."' ")or die(mysql_error());
					  
					  if(mysql_num_rows($tab) >0){
						  
						  
					  while($tab_fetch = mysql_fetch_assoc($tab)){
									
                       echo  '<li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="javascript:;" onClick="detail('.$tab_fetch['id'].')">
                                        <img class="img-responsive" alt="product" src="Shopping_cart/'.$tab_fetch['image_location'].'" />
                                    </a>
                                    
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" onClick="add_to_cart('. $tab_fetch['id'].')">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="javascript:;" onClick="detail('.$tab_fetch['id'].')">'.$tab_fetch['name'].'</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">'.$tab_fetch['price'].'</span>
                                    </div>
                                    <div class="info-orther">
                                        
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">'.$tab_fetch['description'].'</div>
                                    </div>
                                </div>
                            </div>
                        </li>';
                        
								 }
					  }else{
						   echo '<li class="col-sx-12 col-sm-12">
						            <h3 style="color:#f8329b;font-size:2.0em;text-transform:uppercase;text-align:center;"><b>sorry no items at the moment to display</b></h3>
						   </li>';
						  }
								 
							
                        
                   echo '</ul>
                    
                    </div>';	
}

switch($_POST['task']){
      case "add":
         add_to_cart();
        echo number_of_items($_SESSION['cart']).' total item(s)';
      break;
	  case "no_of_items":
	       number_of_items($_SESSION['cart']);
		   //echo 'sasa';
	  break;

      case "show":
	     return_cart();
		 
      break;
	  
	  case "place_order":
	     place_order();
		  //empty_cart();
		 
      break;
	  
	  case "show_check":
	     return_check_cart();
		 
      break;
	  
	  case "show_header":
	     return_header_cart();
		 
      break;

      case "empty":
         empty_cart();
      break;
	  
	  case "display_items":
	        display_items();
	  break;
	  
	  case "update_qty":
	        $id = $_POST['id'];
			$new_qty = $_POST['new_qty'];
			
			foreach($_SESSION['cart'] as $key=> $item){
			  if($key == $id){
				   $_SESSION['cart'][$key] = $new_qty;
				   
			  }
			}
		 	
		 //echo money(calculate_total());
	  break;
	  
	  case "update_qty2":
	        $id = $_POST['id'];
			$new_qty = $_POST['new_qty'];
			
			foreach($_SESSION['cart'] as $key=> $item){
				
			  if($key == $id){
				   $_SESSION['cart'][$key] = $new_qty;
				
			  }
			  $get = mysql_query('SELECT * FROM items WHERE id='.mysql_real_escape_string((int)$id));
												 
												 
				 while($get_row = mysql_fetch_assoc($get)){
					  $sub = $get_row['price'] * $new_qty;
			     }
								
			  			  
			}
		 //echo money(calculate_sub($new_qty));
		 echo money($sub);
		 
	  break;
	  
	  case "delete_item":
	        $id = $_POST['d'];
			//find the item that matches this item
			foreach($_SESSION['cart'] as $key=> $items){
				if($key  == $id){
				  //remove the item from the array
				  	unset($_SESSION['cart'][$key]);
				}
			}
	  break;
	  case "detail":
	        $id = $_POST['detail_item'];
	      item_details($id);
	  break;
	  
	  case "category":
	        $cat = $_POST['category'];
			$pers = $_POST['person'];
			category($cat,$pers);
	  break;

      default:
        echo 'Not working';
}
?>