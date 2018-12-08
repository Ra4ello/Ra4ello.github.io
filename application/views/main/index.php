 
      <div class="container box">  
           <button type="button" name="createUser" data-toggle="modal" data-target="#userModal" class="btn btn-success">Create user</button>
           <button type="button" name="createFirm" data-toggle="modal" data-target="#firmModal" class="btn btn-primary">Create firm</button>
           <a href="/main/control" class="btn btn-warning" role="button" aria-pressed="true">Create Order?</a> 
           <div class="table-responsive"> 

                <br /> 
              <div class="form-group">
                  <span class="input"><?=$logout;?></span>
                  <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
                </div>

              <br />

    </div>
    <div style="clear:both"></div> 

                        <div id="result"></div>
           </div>  
      </div>   
  <div id="userModal" class="modal fade">  
      <div class="modal-dialog">  
           <form method="post" id="user_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Add User</h4>  
                     </div>  
                     <div class="modal-body">  
                          <label>ПІБ Користувача</label>  
                          <input type="text" name="user_name" id="user_name" class="form-control" />  
                          <br />
                          <label>До якої Фірми належить</label>    
                          <select name="name_firm" id="name_firm" class="form-control input">
                            <option value="">Select Categories</option>
                            <?php  foreach($firms as $row)
                    {
                     echo '<option value="'.$row['id'].'">'.$row['name_firms'].'</option>';
                    }
                              ?>
                            </select>
                          <br />   
                     </div>  
                     <div class="modal-footer">  
                          <button type="submit" name="add" id='add' class="btn btn-success" value="Add" >Add</button>  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>
 <div id="firmModal" class="modal fade">  
      <div class="modal-dialog">  
           <form method="post" id="firm_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Add Firm</h4>  
                     </div>  
                     <div class="modal-body">  
                          <label>Назва Фірми</label>  
                          <input type="text" name="firm_name" id="firm_name" class="form-control" />  
                          <br />
                     </div>  
                     <div class="modal-footer">  
                          <button type="submit" name="add" id='add' class="btn btn-success" value="Add" >Add</button>  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>
<form>
<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Користувач</label>
                            <div class="col-md-10">
                              <input type="text" name="product_code_edit" id="product_code_edit" class="form-control" placeholder="Користувач" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Фірма</label>
                            <div class="col-md-10">
                              <input type="text" name="product_name_edit" id="product_name_edit" class="form-control" placeholder="Фірма">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Категорія</label>
                            <div class="col-md-10">
                              <input type="text" name="price_edit" id="price_edit" class="form-control" placeholder="Категорія">
                            </div>
                        </div>
                            <div class="form-group row">
                            <label class="col-md-2 col-form-label">Категорія2 </label>
                            <div class="col-md-10">
                              <input type="text" name="price_edit" id="price_edit" class="form-control" placeholder="Категорія2">
                            </div>
                        </div>
                            <div class="form-group row">
                            <label class="col-md-2 col-form-label">Категорія3</label>
                            <div class="col-md-10">
                              <input type="text" name="price_edit" id="price_edit" class="form-control" placeholder="Категорія3">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>

