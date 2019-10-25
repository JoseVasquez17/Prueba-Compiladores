<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>

<div class="container">
	<div class="row" style="margin-top: 10%">

		<h1 class="text-center"><?php echo NAME_X; ?></h1><br>
   <div class="col-md-2 col-md-offset-2">
     <img src="img/finca.jpg" class="img img-responsive">
   </div>
		<div class="col-md-4">
			<form method="post" autocomplete="off">
				<div class="form-group">
				   <label class="control-label">Usuario administrador</label>
				   <input type="text" name="username" class="form-control input-sm" required>
			    </div>

			    <div class="form-group">
				   <label class="control-label">Clave de administrador</label>
				   <input type="password" name="password" class="form-control input-sm" required>
			    </div>
                
			    <button name="submit" type="submit" class="btn btn-md btn-dark">Iniciar sesión </button>
			</form>

			<?php

      
              if (isset($_POST['submit'])) {
              	$username = trim($_POST['username']);
                $password = $_POST['password'];
                

              	$hash = md5($password);
                
                $q = $db->query("SELECT * FROM admin WHERE username = '$username' AND password = '$hash'  ");
               

                $count = $q->rowCount();
                $rows = $q->fetchAll(PDO::FETCH_OBJ);

                
                               
                
                
                if($count > 0){
                   foreach($rows as $row){
                     $user_id = $row->id;
                     $user = $row->username;
                     $pass = $row->password;
                     $tip = $row->tipo;
                     $var ='admin';
                     $_SESSION['id'] = $user_id;
                     $_SESSION['user'] = $user;
                     $_SESSION['tipo'] = $tipo;
                     
                     if($tip == $var){

                      header('location: dashboard.php'); // abre el admin

                     } else { // si no abre el usuario normal

                      header('location: dashboard2.php'); // vista para  el usuario normal

                     }


                  
                   }
                }else{
                	$error = 'incorrect login details';
                }

              }


            if(isset($error)){ ?>
            <br><br>
               <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><?php echo $error; ?>.</strong>
              </div>
            <?php }
			?>


		</div>
	</div>
</div>


<?php include 'theme/foot.php'; ?>
