<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php include 'session.php'; ?>

<?php 
 if(!$_GET['id'] OR empty($_GET['id']) OR $_GET['id'] == '')
 {
 	header('location: manage-cow.php');

 }else{
 	
 	$cow = $weight = $gender = $remark = $arr = $bname = $b_id = $health = $img = "";
 	$id = (int)$_GET['id'];
 	$query = $db->query("SELECT * FROM vacs WHERE id = '$id' ");
 	$fetchObj = $query->fetchAll(PDO::FETCH_OBJ);

 	foreach($fetchObj as $obj){
       $cow = $obj->cow;
       $weight = $obj->weight;
	   $gender = $obj->gender;
	   $remark = $obj->remark;
	   $arr = $obj->arrived;
	   $b_id = $obj->breed_id;
	   $health = $obj->health_status;
	   $img = $obj->img;

	     $k = $db->query("SELECT * FROM breed WHERE id = '$b_id' ");
       	 $ks = $k->fetchAll(PDO::FETCH_OBJ);
       	 foreach ($ks as $r) {
       	 	$bname = $r->name;
       	 }
 	}
 }

?>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>Mi tablero</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>

 
<div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
  
 	<div class="col-md-6">

     <?php
      if(isset($_POST['submit']))
      {
      	$n_cow = $_POST['cow'];
      	$n_weight = $_POST['weight'];
      	$n_arrived = $_POST['arrived'];
      	$n_breed = $_POST['breed'];
      	$n_remark = $_POST['remark'];
      	$n_status = $_POST['status'];

      	$n_id = $_GET['id'];

      	$update_query = $db->query("UPDATE vacs SET cow = '$n_cow',weight = '$n_weight',arrived = '$n_arrived', breed_id = '$n_breed', remark = '$n_remark',health_status = '$n_status' WHERE id = '$n_id' ");

      	if($update_query){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Los detalles del cerdo se actualizan correctamente <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error al actualizar los datos del cerdo Inténtalo de nuevo <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }

      }

     ?>




 		<h2>Editar Animal</h2>
	 	<form method="post">
	 		<div class="form-group">
	 			<label class="control-label">No.Cow</label>
	 			<input type="text" name="cow" class="form-control" value="<?php echo $cow; ?>">
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Peso del Animal</label>
	 			<input type="text" name="weight" class="form-control" value="<?php echo $weight; ?>">
	 		</div>

	 		<div class="form-group date" data-provide="datepicker">
	 			<label class="control-label">Fecha de llegada</label>
	 			<input type="text" name="arrived" class="form-control" value="<?php echo $arr; ?>">
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Estado de salud</label>
	 			<input type="text" name="status" class="form-control" value="<?php echo $health; ?>">
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Raza</label>
	 			<select name="breed" class="form-control">
	 				<option value="<?php echo $b_id; ?>" selected><?php echo $bname; ?></option>
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
	 			<textarea class="form-control" name="remark"><?php echo $remark; ?></textarea>
	 		</div>

	 		<button name="submit" type="submit" name="submit" class="btn btn-sn btn-default">Actualizar</button>
	 	</form>
 </div>
 <div class="col-md-4 col-md-offset-2">
 	<h2>Foto de Animal</h2>
 	<img src="<?php echo $img; ?>" width="130" height="120" class="thumbnail img img-responsive">
 	<p class="text-justify text-center">
 		<?php echo $remark; ?>
 	</p>
 	<a class="btn btn-danger btn-md" onclick="return confirm('Seguro que desea eliminar ?')" href="delete.php?id=<?php echo $id ?>"><i class="fa fa-trash"></i> Eliminar</a>
 </div>
</div>
</div>
</div>


<?php include 'theme/foot.php'; ?>