<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="js/jquery1.11.3.js"></script>
<!--<script type="text/javascript" src="js/ajax1.5.1.js"></script>-->
<script type="text/javascript">
 $(document).ready(function(e)
	{
        
		//create the xhr2 plugin
		$.fn.upload = function(remote,data,successFn,progressFn)
		{
		 //if we don't have post data, move it along
		 if(typeof data!="object")
		    {
				progressFn = successFn;
				successFn = data;		 
			 }
		return this.each(function()
		{
		  if($(this)[0].files[0])
		  {
			   var formData = new FormData();
			   formData.append($(this).attr("name"),$(this)[0].files[0]);
			   //if we have post data too
			   if(typeof data == "object")
			    {
					for(var i in data){
						formData.append(i,data[i]);
			    }
			}
			
			//do the ajax request
			$.ajax({
				url:remote,
				type:'POST',
				xhr: function()
				{
					myXhr = $.ajaxSettings.xhr();
					if(myXhr.upload && progressFn)
					{
							 myXhr.upload.addEventListener('progress',function(prog)
							 {
								 var value = ~~((prog.loaded/prog.total)*100);		
							        //if we passed a progress function
									if(progressFn && typeof progressFn == "function")
									{
									progressFn(prog,value);
									
									//if we passed a progress element
									}
									else if(progressFn)
									{
									$(progressFn).val(value);
									}		
							},false);	
					 }
						return myXhr;
				},
				data:formData,
				cache:false,
				contentType:false,
				processData:false,
			    complete:function(res)
					{
					if(successFn)successFn(res.responseText);
					}
				});//end of ajax
		  }		 
		 });//end of the return
		}//end of plugin
		
		//click the button
		  $("#upload1").click(function(e){
			  
			  e.preventDefault();
			  //ajax upload
			  $("#file").upload("process_upload.php",function(success){
				  //console.log("done");
				  $('#cont').fadeIn(10000).html('done');
				  },$("#prog"));
			  });
		
});//end jquery document

</script>

</head>

<body>
<form enctype="multipart/form-data" role="form" method="post" id="myform">
<label>First Name: </label>
<input type="text" name="fname" id="fname"><br /><br />
<label>Last Name: </label>
<input type="text" name="lname" id="lname"><br /><br />
<label>File</label>
  <input type="file" name="file" id="file">
  <Button id="upload" type="submit">Upload It!</button>
  <progress id="prog" value="0" min="0" max="100"></progress>
</form>
<div id="cont"></div>

<script>
     $(document).on('submit', 'form', function(e){
		    e.preventDefault();
			
			$form = $(this);
			
			uploadImage($form);
		 });
		 
		 function uploadImage($form){
			     var formdata = new FormData($form[0]);
				 
				 var request = new XMLHttpRequest();
				 request.open('post', 'process_upload.php');
				 request.send(formdata);
				 
			 }
</script>
<!--<script>
//$(document).ready(function (){
	
// var fileInput = $('input[type=file]'),
//       button = $('#upload');
//	   
//   button.click( function(){
//		 //Access the files property, whichholds
//		 //an array with selected files
//		 
//	var files = fileInput.prop('files');
//	//No file was chosen
//	  if(files.length == 0)
//	  {
//		  alert('Please choose a file');
//		  return false;
//	  }
//	  var fd = new FormData();
//	  
//	  fd.append('file',files[0]);
//	  
//	  //Upload the file to process_upload.php, which only prints the file
//	  $.ajax({
//		  url:'process_upload.php',
//		  data:fd,
//		  contentType:false,
//		  processData:false,
//		  type:'POST',
//		  success:function(data){
//			  $('#cont').html(data);
//			  }
//		  
//		  });
//	   });
 });
</script>-->
</body>
</html>