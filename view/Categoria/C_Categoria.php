<?php 
include_once '../../controller/Categoria_controller.php';
$ControlCategoria = new CategoriaController ();
$Categoria = new CategoriaModel();
?>
<!DOCTYPE html>
<html lang="en">
	<?php   require_once ('../util/head.php');  ?>
	<body>
		<?php include ("../util/menu.php"); ?>
		<main>
			<?php include ("../util/logo.php"); ?>

			<!-- breadcrumbs -->
			<div class="row col-md-12" id="migas">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
						<li class="breadcrumb-item text-light" id="titulos"><a>Consultar</a></li>
						<li class="breadcrumb-item text-light" id="titulos"><a>Categoria</a></li>

					</ol>
				</nav>
			</div>

      <!-- / breadcrumbs -->
         
			<div class="table-responsive" style="margin:0;">

				<table>
					<thead class="thead-dark">
						<tr>
          
							<th>NOMBRE</th>
							<th>ESTADO</th>
							<th>EDITAR</th>
							<th>CAMBIAR ESTADO</th>
							
						

						</tr>
					</thead>
					<tbody>
						<tr>
							<?php foreach ($ControlCategoria->Listar() as $fila):?>

       
							<td><?php echo $fila->Nombre_Categoria; ?> </td>
              <td><?php echo $fila->Estado; ?> </td>

							<td><a href="E_Categoria.php?Id_Categoria=<?php echo $fila->Id_Categoria;?>" class="btn btn-primary">Editar</a></td>
							<?php 
							if($fila->__GET('Estado')==1){?>
							<td><a href="Desactivar.php?Codigo_insumo=<?php echo $fila->Id_Categoria;?>" class="btn btn-danger"></a></td>
							<?php }else if($fila->__GET('Estado')==0){?>
							<td><a href="Activar.php?Codigo_insumo=<?php echo $fila->Id_Categoria;?>" class="btn btn-primary"></a></td>
							<?php }?>

						</tr>
					</tbody>

					<?php endforeach; ?>

				</table>

			</div>
      </main>
</body>
</html>