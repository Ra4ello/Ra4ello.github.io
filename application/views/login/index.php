<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <title><?= $title; ?></title>
</head>
 <body>  
      <div class="container">  
           <br /><br /><br />  
           <form method="post" action="/login/login_validation">  
                <div class="form-group">
                <strong>Login:admin
                Password:admin</strong>
                <br />  
                     <label>Enter Username</label>  
                     <input type="text" name="name_admin" class="form-control" />  
                     <span class="text-danger"><?php echo form_error('name_admin'); ?></span>                 
                </div>  
                <div class="form-group">  
                     <label>Enter Password</label>  
                     <input type="password" name="password_admin" class="form-control" />  
                     <span class="text-danger"><?php echo form_error('password_admin'); ?></span>  
                </div>  
                <div class="form-group">  
                     <input type="submit" name="insert" value="Login" class="btn btn-info" />  
                      <?php  
                          echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';  
                     ?> 
                </div>  
           </form>  
      </div>  
</body>
</html>