<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Cow Management > Add</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>

 
 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Agregar nueva vaca</h2>

 	<div class="col-md-6">
      
      <?php
      if(isset($_POST['submit']))
      {
      	if(isset($_FILES['cowphoto']['tmp_name'])){

	      	$n_cow = $_POST['cow'];
	      	$n_weight = $_POST['weight'];
	      	$n_arrived = $_POST['arrived'];
	      	$n_breed = $_POST['breed'];
	      	$n_remark = $_POST['remark'];
	      	$n_status = $_POST['status'];
	      	$n_gender = $_POST['gender'];

      	
      		$res1_name = basename($_FILES['cowphoto']['name']);
			$tmp_name = $_FILES['cowphoto']['tmp_name'];
			$type = $_FILES['cowphoto']['type'];
			$max_size = 2097152;
			$size = $_FILES['cowphoto']['size'];

			if (isset($res1_name)) {
				$location = 'uploadfolder/';
				$move = move_uploaded_file($tmp_name, $location.$res1_name);
				$path1 = $location.$res1_name;

			
				if (!$move) {
					$fileerror = $_FILES['cowphoto']['error'];
					$message = $upload_errors[$fileerror];
					
				}
			}
		}
      	

   

    

      	$insert = $db->query("INSERT INTO vacs(cow,weight,arrived,breed_id,remark,health_status,img,gender) VALUES('$n_cow','$n_weight','$n_arrived','$n_breed','$n_remark','$n_status','$path1','$n_gender') ");

      	if($insert){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>El ganado creado con éxito <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error al crear datos del ganado. Por favor, intente de nuevo <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }
      
      }

     ?>




 		<form method="post" autocomplete="off" enctype="multipart/form-data">
 			<div class="form-group">
	 			<label class="control-label">Vaca No.</label>
	 			<input type="text" name="cow" class="form-control" value="vac#-<?php echo mt_rand(0000,9999); ?>" readonly="on" required>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Peso del Ganado</label>
	 			<input type="text" name="weight" class="form-control" required>
	 		</div>

	 		<div class="form-group date" data-provide="datepicker">
	 			<label class="control-label">Fecha de LLegada</label>
	 			<input type="text" name="arrived" class="form-control" required>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Sexo</label>
	 			<select name="gender" class="form-control" required>
	 				<option value="male">Macho</option>
	 				<option value="female">Hembra</option>
	 			</select>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Estado de Salud</label>
	 			<select name="status" class="form-control" required>
	 				<option value="active">Active</option>
	 				<option value="inactive">Inactive</option>
	 				<option value="on treatment">On treatment</option>
	 				<option value="sick">Sick</option>
	 			</select>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Raza</label>
	 			<select name="breed" class="form-control" required>
	 				<option value=""></option>
	 				<?php
	                   $getBreed = $db->query("SELECT * FROM breed");
	                   $res = $getBreed->fetchAll(PDO::FETCH_OBJ);
	                   foreach($res as $r){ ?>
	                     <option value="<?php echo $r->id; ?>"><?php echo $r->name; ?></option>   
	                   <?php
	                   }
	 				?>
	 			</select>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Descripcion</label>
	 			<textarea class="form-control" name="remark" required></textarea>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Agregar foto</label>
	 			<input type="file" name="cowphoto" class="form-control" required>
	 		</div>

	 		<button name="submit" type="submit" name="submit" class="btn btn-sn btn-default">Update</button>
 		</form>
 	</div>
 </div>
</div>

</div>
<?php include 'theme/foot.php'; ?>