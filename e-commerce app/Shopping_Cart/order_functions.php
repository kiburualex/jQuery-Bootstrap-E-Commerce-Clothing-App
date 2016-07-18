<?php
include_once("functions/db_functions.php");
 
function money($m){
 	 return "KShs. ".number_format($m,2);
}

switch($_POST['task']){
     
	  case "view_details":
	  
	     $view_item = $_POST['view_item'];
		 $total = $_POST['total'];
		  if($total == 0){
			  echo '<div class="alert alert-info" style="border-radius:0px;">
						<span class="label label-info">NOTE!</span>
						<span> No orders for now. </span>
					 
				   </div>';
			  
			}else{
		 
			  echo ' <table class="table table-hover">
					  <caption> Total Amount is '.money($total).'</caption>
					   <thead> 
						<tr> 
						 <th>Image</th> 
						 <th>Name</th>
						 <th>Category</th>
						 <th>Quantity</th>
						 <th>Sub_Total</th> 
						</tr> 
					   </thead>
					   <tbody> ';
					
				     $r = mysql_query('SELECT * FROM order_details WHERE order_id="'.$view_item.'"');
					 while($ro = mysql_fetch_assoc($r)){
	                 extract($ro);
					echo '
					   <tr> 
						<td><img src="'.$ro['product_image'].'" class="img-responsive img-thumbnail" style="width:100px;height:100px;"></td>
						<td>'.$ro['product_name'].'</td>
						<td>'.$ro['product_category'].'</td>
						<td>'.$ro['quantity'].'</td>
						<td>'.money($ro['sub_total']).'</td>
						</tr> ';
						} 
						
						 
                  echo '<tr>
				         <td colspan="5" class="pull-right" style="text-align:right">'.money($total).'</td>
					   </tr>
				  </tbody> 
                </table>';
			}
	  break;
	  
	  case "delete_item":
	      $id = $_POST['d'];
		  $query = 'DELETE FROM orders WHERE order_id="'.$id.'"';
		  mysql_query($query);
	  break;
	  
	  case "Fullfilled_update":
	       $id = $_POST['id'];
	       $query = 'UPDATE orders SET state = "Fullfilled" WHERE order_id="'.$id.'"';
		   $result= mysql_query($query);
		   
		   
		  
		   if($result == true){
			  echo 'Fullfilled';   
			}else{
			  echo 'Error Updating';	
			}
		   
	  break;
	  
	  case "Unfullfilled_update":
	       $id = $_POST['id'];
	       $query = 'UPDATE orders SET state = "Not Fullfilled" WHERE order_id="'.$id.'"';
		   $result= mysql_query($query);
		   if($result == true){
			   echo 'Not fullfilled';   
			}else{
				echo 'problem updating';
			}
	  break;

      default:
        echo 'Failed to display anything';
}
?>