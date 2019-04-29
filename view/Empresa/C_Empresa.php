<?php 
include_once '../../controller/Empresa_controller.php';
$ControlEmpresa = new EmpresaController ();
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
						<li class="breadcrumb-item text-light" id="titulos"><a>Empresa</a></li>

					</ol>
				</nav>
			</div>
			<!-- / breadcrumbs -->
         
			<div class="table-responsive" style="margin:0;">

				<table>
					<thead class="thead-dark">
						<tr>
							<th>NIT EMPRESA</th>
							<th>NOMBRE</th>
							<th>TELEFONO</th>
							<th>DIRECCION</th>
							<th>EDITAR</th>
							
						

						</tr>
					</thead>
					<tbody>
						<tr>
							<?php foreach ($ControlEmpresa->Listar() as $fila):?>

							<td><?php echo $fila->Nit_Empresa; ?> </td>
							<td><?php echo $fila->Nombre; ?> </td>
							<td><?php echo $fila->Telefono; ?> </td>
							<td><?php echo $fila->Direccion; ?> </td>

							<td><a href="E_Empresa.php?Nit_Empresa=<?php echo $fila->Nit_Empresa;?>" class="btn btn-primary">Editar</a></td>
							
						</tr>
					</tbody>

					<?php endforeach; ?>

				</table>

			</div>
		</main>
			</body>
		</html>