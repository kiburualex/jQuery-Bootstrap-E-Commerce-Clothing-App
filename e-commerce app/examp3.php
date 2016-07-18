<?php
session_start();

if(!isset($_SESSION['cart'])){
      $_SESSION['cart'] = array();
}

//functions
function return_cart(){
	
	/* echo '<table class="table table-bordered table-responsive cart_summary">
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
                                   <tbody>
													  <tr>
																<td class="cart_product">
																	<a href="#"><img src="html/assets/data/06_dress.jpg" alt="Product" style="width:100px;height:122px;"></a>
																</td>
																<td class="cart_description">
																	<p class="product-name"><a href="#">name</a></p>
																	<small class="cart_ref">category</small><br>
																	<small><a href="#">Person : man</a></small>
																</td>
																<td class="cart_avail"><span class="label label-success">In stock</span></td>
																<td class="price"><span> KShs 200</span></td>
																<td class="qty">
																	<input class="form-control input-sm" type="text" value="21">
																	<!--<span class="col-sm-12">'.$value.'</span>-->
																	
																</td>
																<td class="price">
																	<span> KShs 212</span>
																</td>
																<td class="action">
																	<a href="javascript:;" onClick="delete_item()">Delete item</a>
																</td>
														   </tr>
                                                          <tr><td colspan="4">Your cart is Empty</td></tr>
                                                         </tbody>
													<tfoot>
														<tr>
															<td colspan="2" rowspan="2"></td>
															<td colspan="3">Total products (tax incl.)</td>
															<td colspan="2">KShs 1212</td>
														</tr>
														<tr>
															<td colspan="3"><strong>Total</strong></td>
															<td colspan="2"><strong>122.38 €</strong></td>
														</tr>
													</tfoot>    
											</table>
                    
				
                <div class="cart_navigation">
                    <a class="prev-btn" href="#">Continue shopping</a>
                    <a class="next-btn" href="#">Proceed to checkout</a>
                </div>';*/

	 echo '
	<table class="col-md-8 col-sm-12" border="0" style="margin-top:50px;">
	  
	  <tr>
	    <td colspan="2">'.number_of_items($_SESSION['cart']).'</td>
	  </tr>
	  <tr>  
		<td colspan="3" class="cart_total_price">'.money(calculate_total()).'</td>
	  </tr>
	</table>
	<table class="table-striped col-md-8 col-sm-12" style="margin-top:10px;">
	  <tr>
	    <td colspan="5"><chr></td>
	  </tr>
	  <tr>
	    
		<th>Name</th>
		<th>Quantity</th>
		<th>Amount</th>
		<th>Subtotal</th>
		<th>delete</th>
	
	  </tr>
	  <tr>
	     <td colspan="5"><chr></td>
	  </tr>';
	$items = 0;
   foreach($_SESSION['cart'] as $key=> $items){
     
	  echo '
	  <tr id="'.$key.'" class="tro">
	  
	   <td>'.$key.'</td>
	   <td><input type="text" size="3" value="'.$items.'" onkeyup="updateQuantities(\''.$key.'\')" onblur="checkForDelete(\''.$key.'\')" id="box_'.$key.'"></td>
	   <td>3000</td>
	   <td id="sub_'.$key.'">'.money(calculate_sub($items)).'</td>
	   <td><a href="javascript:;"  id="del" onClick="delete_item(\''.$key.'\')"> X </a></td>
	  </tr>';

  }
  
   if($items ==0){
	   echo '<tr><td>Your cart is empty</td></tr>';
   }
	   echo '</table>';
}
function display_items(){
	$items = 0;
   foreach($_SESSION['cart'] as $key=> $items){
	   $sub = $items * 3000;
     echo $key ." - ".$items."-".$sub.'<br />';
   }
   if($items ==0){
	   echo 'Your cart is empty';
	   }
}
function calculate_sub($a){

   
  return $a * 3000;
}

function calculate_total(){
   $total = 0;
   if(isset($_SESSION['cart'])){
	   
      foreach($_SESSION['cart'] as $key => $value){
      
	   $sub = $value * 3000;
	   $total += $sub;
      }
	  
   }
  return $total;
}
function money($m){
 	 return "Kshs. ".number_format($m,2);
}
function empty_cart(){
   session_destroy();
   session_unset();

  echo 'Cart Emptied';
}
function number_of_items($cart){
  $items = 0;
  foreach($cart as $num => $value){
	  $items +=$value;
	}
   echo 'You now have '.$items.' item(s) in your cart';
}
function add_to_cart(){
	$num = $_POST['num'];
       //check to see if this item is already in the cart

          if(isset($_SESSION['cart'][$num])){
          
             $_SESSION['cart'][$num]+=1;
             echo 'You now have '.$_SESSION['cart'][$num].' '.$num.'(s) <br />';
                
           }else{
               $_SESSION['cart'][$num] = 1;
               echo ' you added '.$_SESSION['cart'][$num].' '.$num.' into the cart <br />';
            }
}


switch($_POST['task']){
      case "add":
         add_to_cart();
         number_of_items($_SESSION['cart']);
      break;

      case "show":
	     return_cart();
		 calculate_total();
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
		 	
		 echo money(calculate_total());
	  break;
	  
	  case "update_qty2":
	        $id = $_POST['id'];
			$new_qty = $_POST['new_qty'];
			
			foreach($_SESSION['cart'] as $key=> $item){
				
			  if($key == $id){
				   $_SESSION['cart'][$key] = $new_qty;
				
			  }
			  			  
			}
		 echo money(calculate_sub($new_qty));
		 
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

      default:
        echo 'Not working';
}
?>