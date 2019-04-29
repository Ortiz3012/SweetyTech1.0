<?php 
include_once '../../controller/proveedor_controller.php';
require_once '../../model/Persona_model.php';
require_once '../../helps/helps.php';
$control = new Proveedor_controller ();
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
						<li class="breadcrumb-item text-light" id="titulos"><a></a>Proveedor</li>

					</ol>
				</nav>
			</div>
			<!-- / breadcrumbs -->
			<div class="table-responsive" >

				<table>
					<thead class="thead-dark">
						<tr>
							<th>Id </th>
							<th>Documento </th>
							<th>Nombre </th>
							<th>Apellido </th>
							<th>Telefono</th>
							<th>Direccion </th>						
							<th>Nit Empresa</th>
							<th>Estado</th>	
							<th>Modificar</th>
							

						</tr>
					</thead>
					<tbody>
					<tr>
							<?php foreach ($control->ListarDatos() as $f):?>
							<td><?php echo $f->Id_Persona; ?> </td>
							<td><?php echo $f->Documento_Identificacion; ?> </td>
							<td><?php echo $f->Nombre ?> </td>
							<td><?php echo $f->Apellido; ?> </td>			
							<td><?php echo $f->Telefono; ?> </td>
							<td><?php echo $f->Direccion; ?> </td>
							<td><?php echo $f->Nit_Empresa; ?> </td>
							<td><?php echo $f->Estado== 1 ? 'Activo' : 'Inactivo'; ?> </td>
							<td><a href="E_Proveedor.php?Id_Persona=<?php echo $f->Id_Persona;?>" class="btn btn-primary">&#128393;</a><a style="  background: #DB00DB; color:white" href="CE_Proveedor.php?Id_Persona=<?php echo $f->Id_Persona;?>" class="btn btn-primary"><span class="lnr lnr-sync"></span></a></td>
							
						</tr>
					</tbody>

					<?php endforeach; ?>
					
				</table>
				<?php include ("../util/footer.php"); ?>
			</div>

		</main>



	</body>

</html>
