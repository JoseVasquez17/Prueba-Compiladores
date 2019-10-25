<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php include 'session.php'; ?>

<?php 
 if(!$_GET['id'] OR empty($_GET['id']) OR $_GET['id'] == '')
 {
 	header('location: manage-cow.php');

 }else{
 	
 	$cow = $bname = $b_id = $health = "";
 	$id = (int)$_GET['id'];
 	$query = $db->query("SELECT * FROM vacs WHERE id = '$id' ");
 	$fetchObj = $query->fetchAll(PDO::FETCH_OBJ);

 	foreach($fetchObj as $obj){
       $cow = $obj->cow;
	   $b_id = $obj->breed_id;
	   $health = $obj->health_status;

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
    <h5><b><i class="fa fa-dashboard"></i>Gestión del cerdo</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>

 
 <div class="w3-container" style="padding-top:22px">
	 <div class="w3-row">
	 	<h2>Lista de cuarentena</h2>
	 	<div class="col-md-6">
	 		<table class="table table-hover" id="table">
	 			<thead>
	 				<tr>
	 					<th>No Vaca</th>
	 				<th> Fecha en  </th>
	 				<th> Raza </th>
	 				<th> Razón </th>
	 				</tr>
	 			</thead>
	 			<tbody>
	 				<?php

	 				$get = $db->query("SELECT * FROM quarantine");
	 				$res = $get->fetchAll(PDO::FETCH_OBJ);
	 				foreach($res as $n){ ?>
                         <tr>
                         	<td> <?php echo $n->cow_no; ?> </td>
                         	<td>  <?php echo $n->date_q; ?> </td>
                         	<td><?php echo $n->breed; ?> </td>
                         	<td> <?php echo $n->reason; ?> </td>
                         </tr> 
	 				<?php }

	 				?>
	 			</tbody>
	 		</table>
	 	</div>

	 	<div class="col-md-6">

     <?php
      if(isset($_POST['submit']))
      {
      	$n_cow = $_POST['cow'];
     
      	$n_breed = $_POST['breed'];
      	$n_remark = $_POST['reason'];
      	$now = date('Y-m-d');
  

      	$n_id = $_GET['id'];

      	$insert_query = $db->query("INSERT INTO quarantine(cow_no,breed,reason,date_q)VALUES('$n_cow','$n_breed','$n_remark','$now') ");

      	if($insert_query){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Vaca exitosamente puesto en <i class="fa fa-check"></i></strong>
        </div>
       <?php
         header('refresh: 5');
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error al insertar datos de cerdo Inténtalo de nuevo<i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }

      }

     ?>


	 		<form role='form' method="post">
	 			<div class="form-group">
	 				<label class="control-label">No Cerdo</label>
	 				<input type="text" name="cow" readonly="on" class="form-control" value="<?php echo $cow; ?>">
	 			</div>

	 			<div class="form-group">
	 				<label class="control-label">Raza</label>
	 				<input type="text" name="breed" readonly="on" class="form-control" value="<?php echo $bname; ?>">
	 			</div>

	 			<div class="form-group">
	 				<label class="control-label">Razón</label>
	 				<textarea name="reason" placeholder="Enter reason for quarantine" class="form-control" value=""></textarea>
	 			</div>

	 			<button name="submit" type="submit" class="btn btn-sm  btn-default">Agregar a la lista</button>
	 		</form>
	 	</div>
	 </div>
</div>

</div>

<?php include 'theme/foot.php'; ?>