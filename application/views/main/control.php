<div class="container box">

	<div>

		<h1 class="display-4" style="text-align: center">Tabs 1</h1>
		<a href="/main/index" class="btn btn-primary" role="button" aria-pressed="true" style="margin-left: 90%; ">Back</a>
		<div class="col-md-7">
			ПІБ
		<input type="text" class="form-control input-sm" id="pib">
		</div>
		<div class="col-xs-7">
	  	<br>
		    <select name="firms" id="firms" class="form-control input">
            <option value="">Select Firms</option>
            <?php
            foreach($firms as $row)
            {
             echo '<option value="'.$row['id'].'">'.$row['name_firms'].'</option>';
            }
            ?>
           </select>
	  </div>
	 
  </div>
</div>
<div class="container box">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="text-right">
	            <button type="button" class="btn btn-success" id="createBlock">Default</button>
	        </div>
	    </div>
	</div>    
	
	
<div class="container categoriesbox"> 
		   	<div class="row">
		<div class="col-md-12">
			<div>
		<input type="text" class="form-control input-sm text-right" id="no" style="display: none;">
			</div>
	
			
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td>Назва категорії</td>
						<td><input type="text" class="form-control input" id="cat1"></td>
						<td><input type="button" id="add" class="btn btn-primary" value="Add to Table" ></td>
						<input type="hidden" name="cat[]" class="btn btn-primary" value="cat[]" >
					</tr>
				</tbody>		
			</table>
	
			<br>
			<br>
			<br>
			<div class="col-md-5" style="">
			</div>
		</div>
	</div>
	<br>
	
	</div>

	<div class="form-group categoriesbox">  
                     <form name="add_name" id="add_name" >  
                          <div class="table-responsive" id="createTable">  
    
                          </div>  
                     </form>  
                </div>  
	<div class="col-md-12 text-right">
				
				<button type="button" id="save" value="Add Data to Database" class="btn btn-success btn-sm save">Save</button>
	</div>
	</div>		
</div>
</div>
   <script type="text/javascript">
   	$(document).ready(function(){  
   	var i=0;  
  	$('#add').click(function(){
		
			var cat1 = $('#cat1').val();

			$('#createTable').append(
					'<table class="table table-bordered create" style="margin-top: 30px;">'+
					'<thead>'+
						'<tr>'+
							'<th width="500px;">'+cat1+'<input type="hidden" name="cat[]" value="'+cat1+'">'+
							'<th><input type="button" value="Add to Table" class="btn btn-primary add_row" ></th></tr>'+
					'</thead>'	
			);
			

			 //$('#cat1').val('');
			 $('#cat1').val('');
			 return false; 
	});
   $(document).on('click','.add_row',function(){
           var id = $(this).index('.add_row');
           console.log(id)
           $(this).closest('.table').append(
           	'<tbody>'+
           	'<tr ><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /><input type="hidden" name="temp[]" value="'+id+'"></td><td><button type="button" name="remove"  class="btn btn-danger btn_remove">X</button></td></tr>'+
           	'</tbody>');  
    	return false;
			});
   $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $(this).closest('.name_list').remove();  
      }); 
	

		 $('#save').click(function() { 

		 		

		 		//console.log(indexes);
		 		//console.log($('#add_name').serialize())
		  		$.post('/main/saveData',$('#add_name').serialize());

		}); 
	});
	</script>
