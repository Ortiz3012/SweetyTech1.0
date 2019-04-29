<?php
require_once '../../controller/Insumo_controller.php';
require_once '../../controller/Categoria_controller.php';
require_once '../../controller/Tamano_controller.php';
require_once '../../controller/TipoEnvoltura_controller.php';
require_once '../../model/Insumo_model.php';

$controlInsumo = new InsumoController ();
$Insumo = new InsumoModel();
$Categoria = new CategoriaController();
$Tamano = new TamanoController();
$TipoEnvoltura = new TipoEnvolturaController();

$resultado=$controlInsumo->buscar($_GET['Codigo_insumo']);

?>
 
 <!DOCTYPE html>
<html lang="en">

	<?php require_once ("../util/head.php");?>

	<body>
		<?php require_once ("../util/menu.php"); ?>
 
		<main>
			<?php require_once ("../util/logo.php"); ?>

			<div class="row" id="cont">

				<!-- breadcrumbs -->
				<div class="row col-md-12" id="migas">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
							<li class="breadcrumb-item text-light" id="titulos"><a>Modificar</a></li>
							<li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Insumo </li>
						</ol>
					</nav>
				</div>
				<!-- / breadcrumbs -->


		<div class="container" style="width: 100%;">
					<div class="content-form col-md-12">

						<form action="" method="post">

<div class="form-group">
  <label for="">CODIGO INSUMO: </label>
<input type="number" class="form-control" name="Codigo_insumo" id="campo" value="<?php echo $resultado->Codigo_insumo;?>" disabled >
  </div>

<div class="form-group">
  <label for="">NOMBRE INSUMO: </label>
  <input type="text" class="form-control" id="campo" name="Nombre_Insumo" value="<?php echo $resultado->Nombre_Insumo;?>"  >
</div>

<div class="form-group">
  <label for="">FECHA VENCIMIENTO: </label>
  <input type="date" class="form-control" id="campo" name="Fecha_Vencimiento" value="<?php echo $resultado->Fecha_Vencimiento;?>"  >
</div>

<div class="form-group">
  <label for="">PRECIO ENTRADA: </label>
  <input type="number" class="form-control" id="campo" name="Precio_Entrada" value="<?php echo $resultado->Precio_Entrada;?>" >
</div>

<div class="form-group">
  <label for="">PRECIO CLIENTE: </label>
  <input type="number" class="form-control" id="campo" name="Precio_Cliente" value="<?php echo $resultado->Precio_Cliente;?>"  >
</div>

<div class="form-group">
  <label for="">STOCKMINIMO: </label>
  <input type="number" class="form-control" id="campo" name="StockMinimo" value="<?php echo $resultado->StockMinimo;?>"  >
</div>

<div class="form-group">
  <label for="">CATEGORIA: </label>    
    <select id="campo" class="form-control" name="id_Categoria" >
    <option selected><?php echo $resultado->Nombre_Categoria;?></option>
      <?php          
				foreach ($Categoria->Listar() as $r):?>
        <option value="<?php echo $r->__GET('Id_Categoria'); ?>">
        <?php echo $r->__GET('Nombre_Categoria'); ?></option>
        <?php endforeach; ?>
    </select>

    </div>


<div class="form-group">
  <label for="">TAMAÑO: </label>
  <select id="campo" class="form-control" name="Id_Tamano">
    <option value="<?php echo $resultado->Nombre_Tamano;?>" selected><?php echo $resultado->Nombre_Tamano;?></option>
    <?php 
				foreach ($Tamano->Listar() as $r):?>
        <option value="<?php echo $r->__GET('Id_Tamano'); ?>">
        <?php echo $r->__GET('Nombre_Tamano'); ?></option>
        <?php endforeach; ?>
    </select></div>

<div class="form-group">
  <label for="">TIPO ENVOLTURA: </label>
  <select id="campo" class="form-control" name="Id_Tipo_Envoltura" >
  <option selected><?php echo $resultado->Nombre_Tipo_Envoltura;?></option>
    <?php 
				foreach ($TipoEnvoltura->Listar() as $r):?>
        <option value="<?php echo $r->__GET('Id_Tipo_Envoltura'); ?>">
        <?php echo $r->__GET('Nombre_Tipo_Envoltura'); ?></option>
        <?php endforeach; ?>
    </select></div>


  <input type="submit" class="btn btn-primary" value="Actualizar" name ="Actualizar">

</form>
</div>
<?php

if (isset($_POST['Actualizar'])) {
       
  $Insumo->__SET('Codigo_insumo', $_GET['Codigo_insumo']);
  $Insumo->__SET('Nombre_Insumo',$_POST['Nombre_Insumo']);
  $Insumo->__SET('Fecha_Vencimiento',$_POST['Fecha_Vencimiento']);
  $Insumo->__SET('Precio_Cliente',$_POST['Precio_Entrada']);
  $Insumo->__SET('Precio_Cliente',$_POST['Precio_Cliente']);		
  $Insumo->__SET('StockMinimo',$_POST['StockMinimo']);
  $Insumo->__SET('id_Categoria',$_POST['id_Categoria']);
  $Insumo->__SET('Id_Tamano',$_POST['Id_Tamano']);
  $Insumo->__SET('Id_Tipo_Envoltura',$_POST['Id_Tipo_Envoltura']);
      
  
     

     if($controlInsumo->actualizar($Insumo)){

      echo '<center>Datos Actualizados con exito.</center>';
     }

  }else{


  echo 'Debe llenar el formulario.';

}

?>
</body>
</html>