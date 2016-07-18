// JavaScript Document

function add_men_cat(){
       var  validation_holder = 0
		 
	     var men_cat 	= $("form#add_men_cat input[name='men_cat']").val();
		 
		 if(name == ""){
			   $('.feeback').fadeIn('fast');
			    validation_holder = 1;
			 }
		 else{
				  $('.feeback').slideUp('fast');
				 
				/*$('.notice').html("<img src='image/ajax1.gif'>");
					$.post('process_men_cat.php', {men_cat:men_cat},function(data){
					$('.feedback').html(data);
					$('.notice').html("");
					   });*/
					   $('.notice').html("<img src='image/ajax1.gif'>");
					$.post('process_men_cat.php', {men_cat:men_cat},function(data){
					$('.feedback').html(data);
					$('.notice').html("");
					   });
			}
			
			/*if(validation_holder == 1) { // if have a field is blank, return false
			$("p.validate_msg").slideDown("fast");
			return false;
		} else{
			$("p.validate_msg").slideUp("fast");
			validation_holder = 0;
			} */// else return true
			
			
}
	   	
