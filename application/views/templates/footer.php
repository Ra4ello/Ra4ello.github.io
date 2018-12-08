

<script type="text/javascript">

  $(document).ready(function(){
    $('#cat2').on('click',function(){
    var cat2_name = $('#cat2_name').val();

      $('ul').append(cat2_name);
    });
  });
</script>
<script>
$(document).ready(function(){

  load_data();

  function load_data(query)
  {
    $.ajax({
      url:"/main/fetch",
      method:"POST",
      data:{query:query},
      success:function(data){
        $('#result').html(data);
      }
    })
  }

  $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();
    }
  });
});
</script>

<script >
	$(document).ready(function(){
		 $('#categories').change(function(){
		  	var categories_id = $('#categories').val();
		 	 if(categories_id != '')
		  	{
		   		$.ajax({
			   	url:"<?php echo base_url();?>main/fetch_categories2",
			    method:"POST",
			    data:{categories_id:categories_id},

			    success:function(data)
			    {
			     $('#categories2').html(data);
			     $('#storage').html('<option value="">Select item</option>');
			    }
			   });
			  }
		  else
		  {

		   $('#categories2').html('<option value="">Select Categories2</option>');
		   $('#storage').html('<option value="">Select item</option>');
		  }
 	});

	$('#categories2').change(function(){
		  var categories2_id = $('#categories2').val();

		  if(categories2_id != '')
		  {
		   $.ajax({
		    url:"<?php echo base_url(); ?>main/fetch_categories3",
		    method:"POST",
		    data:{categories2_id:categories2_id},
		    success:function(data)
		    {
		     $('#categories3').html(data);
		    }
		   });
		  }
		  else
		  {
		   $('#categories3').html('<option value="">Select Categories3</option>');
		  }
	});
});

</script>
<script type="text/javascript">
   $(document).on('submit', '#categories_form', function(event){  
           event.preventDefault();  
           var categories_name = $('#categories_name').val();   
           if(categories_name != '' )  
           {  
                $.ajax({  
                     url:"/main/createCategories",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          //alert(data);  
                          $('#categories_form')[0].reset();  
                          $('#categoriesModal').modal('hide');  
                     }  
                });  
           }  
           else  
           {  
                alert("Bother Fields are Required");  
           }  
      });  
</script>
<script type="text/javascript">
  $(document).on('submit','#categories2_form',function(event){
      event.preventDefault();
      var name_categories2 = $('#name_categories2').val();
      var categoriesAdd = $('#categoriesAdd').val();
     if(name_categories2 != '' && categoriesAdd != '' )  
           {  
                $.ajax({  
                     url:"/main/createCategories2",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          //alert(data);  
                          $('#categories2_form')[0].reset();  
                          $('#categories2Modal').modal('hide');  
                     }  
                });  
           }  
           else  
           {  
                alert("Bother Fields are Required");  
           } 
    }); 
</script>
<script type="text/javascript">
  $(document).on('submit','#categories3_form',function(event){
      event.preventDefault();
      var name_item = $('#name_item').val();
      var categoriesAdd3 = $('#categoriesAdd3').val();
      if(name_item != '' && categoriesAdd3 != '' )  
           {  
                $.ajax({  
                     url:"/main/createCategories3",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          //alert(data);  
                          $('#categories3_form')[0].reset();  
                          $('#categories3Modal').modal('hide');  
                     }  
                });  
           }  
           else  
           {  
                alert("Bother Fields are Required");  
           } 
  });
</script>
<script type="text/javascript">
  $(document).on('submit','#user_form',function(event){
      event.preventDefault();
      var user_name = $('#user_name').val();
      var name_firm = $('#name_firm').val();
      if(user_name != '' && name_firm != '')  
           {  
                $.ajax({  
                     url:"/main/createUser",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          //alert(data);  
                          $('#user_form')[0].reset();  
                          $('#userModal').modal('hide');  
                     }  
                });  
           }  
           else  
           {  
                alert("Bother Fields are Required");  
           } 
  });
</script>
<script type="text/javascript">
  $(document).on('submit','#firm_form',function(event){
      event.preventDefault();
      var firm_name = $('#firm_name').val();
      if(firm_name != '')  
           {  
                $.ajax({  
                     url:"/main/createFirm",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          //alert(data);  
                          $('#firm_form')[0].reset();  
                          $('#firmModal').modal('hide');  
                     }  
                });  
           }  
           else  
           {  
                alert("Bother Fields are Required");  
           } 
  });
</script>
</body>
</html>
