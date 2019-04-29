<?php 
include_once '../../controller/proveedor_controller.php';
require_once '../../model/Persona_model.php';
require_once '../../helps/helps.php';

$control = new Proveedor_controller ();

$estado=$_GET['Id_Persona'];

if($estado==0){
    $cambio=1;
} else {
    $cambio=0;
}

if ($control->cambiarestado($cambio,$estado)) {
    echo'<script type="text/javascript">
                swal({
                title: "Error en los campos",
                text: "Por favor llenar todos los campos!",
                type: "warning",
                confirmButtonColor: "#ce3a1e",
                confirmButtonText: "ok!",
                closeOnConfirm: false
                });
                </script>';} 
                
                
                ?>
    
    <meta http-equiv="refresh" content="0; url=C_Proveedor.php">
