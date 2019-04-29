<?php 
require_once '../../controller/proveedor_controller.php';
require_once '../../controller/TipoDocumento_controller.php';
require_once '../../controller/Empresa_controller.php';
require_once '../../model/Proveedor_model.php';
require_once '../../helps/helps.php';


$control = new Proveedor_controller();
$control2 = new TipoDocumentoController();
$control3 = new EmpresaController();
?>
<!DOCTYPE html>
<html lang="en">

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
                        
                        <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Proveedor</li>
                        
                    </ol>
                </nav>
            </div>
            
            <!-- / breadcrumbs -->
            <div class="container" style="width: 100%;">
                    <a href="R_Empresa.php">Registrar una empresa</a>
                <div class="content-form col-md-12">
                    <form action=" " method="post">

                    <label for="campo" class="lbl-campo"> TIPO DOCUMENTO <span style="color:red;">*</span> </label>
                    <select name="Id_Tipo_Documento">
                    <option value="">Elegir...</option>
                            <?php foreach ($control2->Listar() as $r):?>
                            <option value="<?php echo $r->__GET('Id_Tipo_Documento'); ?>">
                                <?php echo $r->__GET('Nombre'); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                           
                       
                        <label for="campo" class="lbl-campo"> DOCUMENTO <span style="color:red;">*</span> </label>
                        <input type="number" name="Documento_Identificacion" id="campo" placeholder="Ingrese Documento">


                        <label for="campo" class="lbl-campo"> NOMBRE<span style="color:red;"> *</span> </label>
                        <input type="text" name="Nombre" id="campo" placeholder="Ingrese Nombre" >


                        <label for="campo" class="lbl-campo"> APELLIDO<span style="color:red;"> *</span></label>
                        <input type="text" name="Apellido" id="campo" placeholder="Ingrese Apellido" >

                      
                        <label for="campo" class="lbl-campo"> DIRECCION<span style="color:red;">*</span></label>
                        <input type="text" name="Direccion" id="campo" placeholder="Ingrese la Direccion" >

                        <label for="campo" class="lbl-campo"> TELEFONO <span style="color:red;"> *</span></label>
                        <input type="number" name="Telefono" id="campo" placeholder="Ingrese Tel" >

                        <label for="campo" class="lbl-campo"> CELULAR<span style="color:red;"> *</span> </label>
                        <input type="number" name="Celular" id="campo" placeholder="Ingrese Cel" >

                        <label for="campo" class="lbl-campo">FECHA DE NACIMIENTO<span style="color:red;"> *</span></label>
                        <input type="date" name="Fecha_Nacimiento" id="campo" placeholder="Ingrese Correo" >

                        <label for="campo" class="lbl-campo"> ESTADO<span style="color:red;">*</span></label>
                        <select name="Estado" id="">
                        <option value="">Elegir...</option>
                        <option value="1">Activo</option>
                        
                        </select>

                        <label for="campo" class="lbl-campo"> TIPO PERSONA<span style="color:red;">*</span></label>
                        <select name="Id_Tipo_Persona" id="">
                        <option value="">Elegir...</option>
                        <option value="3">Proveedor</option>
                        </select>

                        <label for="campo" class="lbl-campo">NIT EMPRESA<span style="color:red;"> *</span></label>
                        <input type="number" name="Nit_Empresa" id="campo" placeholder="Ingrese el nit" >

                        


                    <div class="col-md-12">
                            <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right"  name="enviar" style="float: right; margin-right:3%; margin-top:2%;" value="Registrar">
                        </div>

                    </form>

                </div>

       
                <?php
        
        if (isset($_POST['enviar'])) {
            if(empty($_POST['Documento_Identificacion']) || empty($_POST['Nombre']) || empty($_POST['Apellido']) || empty($_POST['Direccion']) || empty($_POST['Telefono']) || empty($_POST['Celular']) || empty($_POST['Fecha_Nacimiento']) || empty($_POST['Estado']) || empty($_POST['Id_Tipo_Persona']) || empty($_POST['Nit_Empresa'])){
                echo'<script type="text/javascript">
                swal({
                title: "Error en los campos",
                text: "Por favor llenar todos los campos!",
                type: "warning",
                confirmButtonColor: "#ce3a1e",
                confirmButtonText: "ok!",
                closeOnConfirm: false
                });
                </script>';
                               
                    }else {
                        $id= validar_campo($_POST['Documento_Identificacion']);
                        $nombre= validar_campo($_POST['Nombre']);
                        $apellido= validar_campo($_POST['Apellido']);
                        $direccion= validar_campo($_POST['Direccion']);
                        $tel= validar_campo($_POST['Telefono']);
                        $cel= validar_campo($_POST['Celular']);
                        $fecha_n= validar_campo($_POST['Fecha_Nacimiento']);
                        $estado= validar_campo($_POST['Estado']);
                        $nit_empre= validar_campo($_POST['Nit_Empresa']);
                        $tipo_per= validar_campo($_POST['Id_Tipo_Persona']);
                        $tipo_doc= validar_campo($_POST['Id_Tipo_Documento']);
                        
                        $proveedor = new PersonasModel($id,$nombre,$apellido,$direccion,$tel,$cel,$fecha_n,$estado,$nit_empre,$tipo_per,$tipo_doc);
                        $control->insertar($proveedor);

                        echo'<script type="text/javascript">
                        swal({
                            title: "REGISTRO",
                            text: "Realizado con exito!",
                            type: "success",
                            confirmButtonColor: "#DB00DB",
                            confirmButtonText: "OK!"
                        },
                        function(){
                            window.location.href="C_Proveedor.php";
                        });
                      </script>';                         
                    }

                }
                ?>
                            
                      
       

            </div>
            <?php include ("../util/Libscripts.php"); ?>
            <?php include ("../util/footer.php"); ?>
        </div>
    </main>

</body>

</html>