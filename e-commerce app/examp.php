<html>

<!-- Mirrored from kutethemes.com/html/kuteshop/html/about.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 27 Sep 2015 11:11:13 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="html/assets/lib/bootstrap/css/bootstrap.min.css" />
    <title>Your Order - Suzie's Shop</title>
   <script type="text/javascript" src="html/assets/lib/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="html/assets/lib/bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="category-page" onLoad="geta()">
<div class="container">
<div class="row">
<div id="diva"></div>
<a href="javascript:;" id="modal-b"><input type="hidden" value="2" id="btn">click here</a>

<button class="btn btn-primary" id="modal-b"><input type="hidden" value="10" id="btn">Click the button</button>

<div class="form-group col-md-6">
   <input class="form-control inp col-md-6" type="text">X 3 =<span class="user_text_feedback col-md-6"></span>
</div>
</div>

<div class="row">
   <button class="btn btn-primary" id="clicker">click to reveal results</button>
   <div class="show_results"></div>
</div>

<div class="row">
   <!-- Modal --> 
   <!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
     <div class="modal-dialog"> 
      <div class="modal-content"> 
       <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
        <h4 class="modal-title" id="myModalLabel"> This Modal title</h4> 
       </div> 
       <div class="modal-body"> Add some text here </div> 
       <div class="modal-footer"> 
        <button type="button" class="btn btn-default" data-dismiss="modal">Close </button> 
        <button type="button" class="btn btn-primary"> Submit changes </button> 
       </div> 
      </div>--><!-- /.modal-content --> 
    <!--</div>--><!-- /.modal -->
   
   
</div>
<!-- Script-->
<script type="text/javascript">

	  
			 
	  /*$('#link').click(function(){
	    var add_item = $('#btn').val();
		//var id2= $('#btn2').val();
		 //alert(id +' and '+ id2); 
		 
		  $.ajax({
			 url: 'get_examp.php',
			 data:{id:1,add_item:add_item},
			 success: function(data){
				 alert(data);			
			  }  
		   });
		   
		   
		   
	  });*/
	  
	  $('#modal-b').click(function(){
	     
		  //$('#myModal').modal();
		  var add_item = $('#btn').val();
		  $.ajax({
			 url: 'get_examp.php',
			 data:{id:3,add_item:add_item},
			 success: function(data){
				 $('#diva').html(data);	
				 $('#myModal').modal();		
			  }  
		   });
		   
		   
		   
	  });
	  
	  /*function geta(){
		  $.ajax({
			 url: 'get_examp.php',
			 data:{id:2},
			 success: function(data){
				 //$('#diva').html(data);
				 alert(data);			
			  }  
		   });
		  }*/
	  $('.inp').keyup(function(){
		 var user_text = $('.inp').val();
		 var user_text2 = user_text * 3;
		 $('.user_text_feedback').html(user_text2); 
		 });
		 
		 //
		//function clicked(){
			      
			$('#clicker').click(function(){
				    var ke= 1;
					 for(count=0;count<10;count++){
						   ke++;
					    $('.show_results').html(ke);
					}
			    }
				);
			
			//}
		 
		
	 
	
</script>

</div>
</body>

<!-- Mirrored from kutethemes.com/html/kuteshop/html/order.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 27 Sep 2015 11:10:49 GMT -->
</html>