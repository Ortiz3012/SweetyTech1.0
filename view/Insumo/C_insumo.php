<?php 
include_once '../../controller/Insumo_controller.php';
include_once '../../model/Insumo_model.php';

$ControlInsumo = new InsumoController ();
$Insumo= new InsumoModel();
?>
<!DOCTYPE html>
<html lang="en">
	<?php   require_once '../util/head.php';  ?>
	<body>
		<?php include ("../util/menu.php"); ?>
		<main>
			<?php include ("../util/logo.php"); ?>

			<!-- breadcrumbs -->
			<div class="row col-md-12" id="migas">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
						<li class="breadcrumb-item text-light" id="titulos"><a>Consultar</a></li>
						<li class="breadcrumb-item text-light" id="titulos"><a>Insumo</a></li>

					</ol>
				</nav>
			</div>
			<!-- / breadcrumbs -->
         
			<div class="table-responsive" style="margin:0;">

				<table>
					<thead class="thead-dark">
						<tr>
							<th>CODIGO</th>
							<th>NOMBRE</th>
							<th>VENCIMIENTO</th>
							<th>ESTADO</th>
							<th>PRECIO ENTRADA</th>
							<th>PRECIO CLIENTE</th> 
							<th>STOCKMINIMO </th>
							<th>CATEGORIA</th>
							<th>TAMAÑO</th>
							<th>ENVOLTURA</th>
							<th>EDITAR</th>
							<th>CAMBIAR ESTADO</th>

						</tr>
					</thead>
					<tbody>
						<tr>
							<?php foreach ($ControlInsumo->Listar() as $fila):?>
							<td><?php echo $fila->Codigo_insumo; ?> </td>
							<td><?php echo $fila->Nombre_Insumo; ?> </td>
							<td><?php echo $fila->Fecha_Vencimiento; ?> </td>
							<td><?php echo $fila->Estado; ?> </td>
							<td><?php echo $fila->Precio_Entrada; ?> </td>
							<td><?php echo $fila->Precio_Cliente; ?> </td>
							<td><?php echo $fila->StockMinimo; ?> </td>
							<td><?php echo $fila->Nombre_Categoria; ?> </td>
							<td><?php echo $fila->Nombre_Tamano; ?> </td>	
							<td><?php echo $fila->Nombre_Tipo_Envoltura; ?> </td>
							

							<td><a href="E_Insumo.php?Codigo_insumo=<?php echo $fila->Codigo_insumo;?>" class="btn btn-primary">Editar</a></td>
							<?php 
							if($fila->__GET('Estado')==1){?>
							<td><a href="Desactivar.php?Codigo_insumo=<?php echo $fila->Codigo_insumo;?>" class="btn btn-danger"></a></td>
							<?php }else if($fila->__GET('Estado')==0){?>
							<td><a href="Activar.php?Codigo_insumo=<?php echo $fila->Codigo_insumo;?>" class="btn btn-primary"></a></td>
							<?php }?>
						</tr>
					</tbody>

					<?php endforeach; ?>

				</table>

			</div>
		</main>
			</body>
		</html>