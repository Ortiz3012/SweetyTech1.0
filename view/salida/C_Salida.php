<?php 
require_once "../../controller/salida_controller.php";
$control = new  salida_controller();
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once ("../util/head.php");?>

	<body>
		<?php require_once ("../util/menu.php"); ?>

		<main>
			<?php require_once ("../util/logo.php"); ?>

        <!-- breadcrumbs -->
        <div class="row col-md-12" id="migas">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
                    <li class="breadcrumb-item text-light" id="titulos"><a>Consultar</a></li>
                    <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Salida</li>
                </ol>
            </nav>
        </div>
        <!-- / breadcrumbs -->

        <div id="main-container">
            <div class="table-responsive">

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Codigo Salida</th>
                            <th>Fecha Salida</th>
                            <th>Motivo de la salida</th>
                            <th>Configuracion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
					<?php foreach ($control->listarDatos() as $r):?>
						<td><?php echo $r->__GET('Codigo_Salida'); ?></td>
						<td><?php echo $r->__GET('Fecha_Salida'); ?></td>
						<td><?php echo $r->__GET('Motivo_Salida'); ?></td>
						<td class="row"><a href="E_Salida.php?Codigo_Salida=<?php echo $r->Codigo_Salida; ?>" 
                        class="btn btn-primary nextBtn btn-lg pull-right" ><i class="lnr lnr-pencil"></i></a>
							<a href="eliminarS.php?Codigo_Salida=<?php echo $r->Codigo_Salida; ?>" class="btn btn-danger nextBtn btn-lg pull-right" style="margin-left:3%;" onclick="form_insumos"><i class="lnr lnr-trash"></i></button>
                        </td>
					</tr>
					<?php endforeach; ?> 
                    </tbody>
                </table>
               
            </div>

        </div>
        <footer style="width:100%; background:#272626; margin-top:5%;">
            <?php include ("../util/footer.php"); ?>
        </footer>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/search.js"></script>
        <script src="js/script.js"></script>
  

</body>

</html>
