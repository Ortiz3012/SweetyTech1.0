<?php
require_once '../../controller/Insumo_controller.php';
require_once '../../controller/Categoria_controller.php';
require_once '../../controller/Tamano_controller.php';
require_once '../../controller/TipoEnvoltura_controller.php';
require_once '../../model/Insumo_model.php';

$ControlInsumo = new InsumoController ();
$Categoria = new CategoriaController();
$Tamano = new TamanoController();
$TipoEnvoltura = new TipoEnvolturaController();
$Insumo = new InsumoModel();
 
?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<?php include ("../util/head.php"); ?>


<body>
    <?php include ("../util/menu.php"); ?>
    <main>
        <?php include ("../util/logo.php"); ?>


        <div class="row" id="cont">

				<!-- breadcrumbs -->
				<div class="row col-md-12" id="migas">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
							<li class="breadcrumb-item text-light" id="titulos"><a>Registrar</a></li>
							<li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Insumo</li>
						</ol>
					</nav>
				</div>

          <div class="container" style="width: 100%;">
					<div class="content-form col-md-12">


<form action="R_Insumo.php" method="post">


    <div class="form-group">
    <label for="campo" class="lbl-campo">NOMBRE INSUMO: <span style="color:red;"> *</span></label>
    <input type="text" class="form-control" id="campo" name="Nombre_Insumo" placeholder="Ingrese el Nombre" >
    </div>
 
  <div class="form-group">
    <label for="campo" class="lbl-campo">FECHA VENCIMIENTO: </label>
    <input type="date" class="form-control" id="campo" name="Fecha_Vencimiento" >
  </div>


  <div class="form-group">
    <label for="campo" class="lbl-campo">PRECIO ENTRADA: <span style="color:red;"> *</span></label>
    <input type="number" class="form-control" id="campo" name="Precio_Entrada" >
</div>

<div class="form-group">
    <label for="campo" class="lbl-campo">PRECIO CLIENTE: <span style="color:red;"> *</span></label>
    <input type="number" class="form-control" id="campo" name="Precio_Cliente" >
</div>

  <div class="form-group">
    <label for="campo" class="lbl-campo">STOCKMINIMO: <span style="color:red;"> *</span></label>
    <input type="text" class="form-control" id="campo" name="StockMinimo" >
  </div>

  <div class="form-group">
    <label for="campo" class="lbl-campo">CATEGORIA: <span style="color:red;"> *</span></label>
    <select id="campo" class="form-control" name="id_Categoria" >
    <option selected>Seleccionar</option>
			<?php 
				foreach ($Categoria->Listar() as $r):?>
        <option value="<?php echo $r->__GET('Id_Categoria'); ?>">
        <?php echo $r->__GET('Nombre_Categoria'); ?></option>
        <?php endforeach; ?>
    </select> 
    <br><?php include ("../Categoria/R_Categoria.php"); ?> 
    
  </div>

    <div class="form-group">
    <label for="campo" class="lbl-campo">TAMAÑO: <span style="color:red;"> *</span></label>
    <select id="campo" class="form-control" name="Id_Tamano" >
    <option selected>Seleccionar</option>
    <?php 
				foreach ($Tamano->Listar() as $r):?>
        <option value="<?php echo $r->__GET('Id_Tamano'); ?>">
        <?php echo $r->__GET('Nombre_Tamano'); ?></option>
        <?php endforeach; ?>
    </select> <br>
    <?php include ("../Tamaño/R_Tamano.php"); ?> 
  </div>

  <div class="form-group">
    <label for="campo" class="lbl-campo">TIPO ENVOLTURA: <span style="color:red;"> *</span></label>
    <select id="campo" class="form-control" name="Id_Tipo_Envoltura" >
    <option selected>Seleccionar</option>
    <?php 
				foreach ($TipoEnvoltura->Listar() as $r):?>
        <option value="<?php echo $r->__GET('Id_Tipo_Envoltura'); ?>">
        <?php echo $r->__GET('Nombre_Tipo_Envoltura'); ?></option>
        <?php endforeach; ?>
    </select> <br>
   <?php include ("../Envoltura/R_TipoEnvoltura.php"); ?>
  </div>


    <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right" type="button"  style="float: right; margin-right:3%; margin-top:2%;" value="Registrar" name ="Registrar">

</form>
</div>
</div>
</div>


        <?php

if (isset($_POST['Registrar'])) {
  if (!empty($_POST['Nombre_Insumo'])  && !empty($_POST['Precio_Entrada']) && !empty($_POST['Precio_Cliente']) && !empty($_POST['StockMinimo']) && !empty($_POST['id_Categoria']) && !empty($_POST['Id_Tamano']) && !empty($_POST['Id_Tipo_Envoltura']) ) {
    
    $Insumo->__SET('Nombre_Insumo',$_POST['Nombre_Insumo']);
    $Insumo->__SET('Fecha_Vencimiento',$_POST['Fecha_Vencimiento']);
    $Insumo->__SET('Precio_Entrada',$_POST['Precio_Entrada']);
    $Insumo->__SET('Precio_Cliente',$_POST['Precio_Cliente']);
    $Insumo->__SET('StockMinimo',$_POST['StockMinimo']);
    $Insumo->__SET('id_Categoria',$_POST['id_Categoria']);
    $Insumo->__SET('Id_Tamano',$_POST['Id_Tamano']);
    $Insumo->__SET('Id_Tipo_Envoltura',$_POST['Id_Tipo_Envoltura']);



if($ControlInsumo->Insertar($Insumo)){

  echo 'Datos ingresados con exito.';
 }

}else{

  echo 'Debe llenar todos los campos.';

}

}else{

echo 'Debe llenar el formulario.';

}
       
?>
<br>
<br>
<br>
		
    </body>
</html>
