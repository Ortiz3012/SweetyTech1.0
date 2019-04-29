<?php 

require_once '../../controller/user_controller.php';
require_once '../../controller/TipoDocumento_controller.php';
require_once '../../model/user_model.php';
require_once '../../helps/helps.php';
$control = new User_controller();
$control2 = new TipoDocumentoController();

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
                    <li class="breadcrumb-item text-light" id="titulos"><a></a></li>

                </ol>
            </nav>
        </div>
        <!-- / breadcrumbs -->
        <div class="table-responsive">

            <table>
                <thead class="thead-dark">
                    <tr>
                        <th>DOCUMENTO</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>Fecha Nacimiento</th>
                        <th>FIJO</th>
                        <th>CELULAR</th>
                        <th>ESTADO</th>
                        <th>Modificar</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($control->ListaDatos() as $r):?>
                        <td> <?php echo $r->__GET('Documento_Identificacion'); ?> </td>
                        <td> <?php echo $r->__GET('Nombre'); ?> </td>
                        <td> <?php echo $r->__GET('Apellido');?> </td>
                        <td> <?php echo $r->__GET('Fecha_Nacimiento');?> </td>
                        <td> <?php echo $r->__GET('Telefono'); ?> </td>
                        <td> <?php echo $r->__GET('Celular'); ?> </td>
                        <td> <?php echo $r->__GET('Estado')== 1 ? 'Activo' : 'Inactivo';?> </td>

                        <td> <a href="estado.php?id=<?php echo $r->Documento_Identificacion; ?>&estado= <?php echo $r->__GET('Estado')?>" class="btn" style="  background: #DB00DB; color:white"><span class="lnr lnr-sync"></span> </a>
                            <a href="EditarCliente.php?id=<?php echo $r->Id_Persona; ?>" class="btn btn-primary">&#128393; </a>
                        </td>

                </tbody>
                <?php endforeach; ?>
            </table>
            <?php include ("../util/footer.php"); ?>
        </div>

    </main>



</body>

</html>
