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
                        <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Compra</li>
                    </ol>
                </nav>
            </div>
            <!-- / breadcrumbs -->
            <div class="container" style="width: 100%;">

                <div class="content-form col-md-12">
                    <form action=" " method="post">


                        <label for="campo" class="lbl-campo"> TIPO DOCUMENTO<span style="color:red;"> *</span></label>

                        <select name="Id_Tipo_Documento">
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

                        <label for="campo" class="lbl-campo">FECHA DE NACIMIENTO<span style="color:red;"> *</span></label>
                        <input type="date" name="Fecha_Nacimiento" id="campo" placeholder="Ingrese Correo" >


                        <label for="campo" class="lbl-campo"> CORREO<span style="color:red;"> *</span></label>
                        <input type="text" name="Email" id="campo" placeholder="Ingrese Correo" >

                        <label for="campo" class="lbl-campo"> FIJO <span style="color:red;"> *</span></label>
                        <input type="number" name="Telefono" id="campo" placeholder="Ingrese Tel" >

                        <label for="campo" class="lbl-campo"> CELULAR<span style="color:red;"> *</span> </label>
                        <input type="number" name="Celular" id="campo" placeholder="Ingrese Cel" >

                        <label for="campo" class="lbl-campo"> Direccion<span style="color:red;">*</span></label>
                        <input type="text" name="Direccion" id="campo" placeholder="Ingrese Cel" >


                        <label for="campo" class="lbl-campo"> CONTRASEÑA<span style="color:red;"> *</span> </label>
                        <input type="password" name="pwd" id="campo" placeholder="Ingrese Contraseña" >

                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary nextBtn btn-lg pull-right" type="button" name="enviar" style="float: right; margin-right:3%; margin-top:2%;" value="Registrar">
                        </div>

                    </form>

                </div>


                <?php 
					if (isset($_POST['enviar']))  {
                        
                        $id= validar_campo($_POST['Documento_Identificacion']);
                        $nombre= validar_campo($_POST['Nombre']);
                        $apellido= validar_campo($_POST['Apellido']);
                        $direccion= validar_campo($_POST['Direccion']);
                        $tel= validar_campo($_POST['Telefono']);
                        $cel= validar_campo($_POST['Celular']);
                        $fecha_n= validar_campo($_POST['Fecha_Nacimiento']);
                        $tipo_doc= validar_campo($_POST['Id_Tipo_Documento']);
                        $email= validar_campo($_POST['Email']);
                        $pass= validar_campo($_POST['pwd']);
                        
						$persona = new Usuariomodel($id,$nombre,$apellido,$direccion,$tel,$cel,$fecha_n,$tipo_doc,$email,$pass);

						 $control->insertar($persona);
                             
echo'<script type="text/javascript">
              swal({
  title: "REGISTRO",
  text: "Realizado con exito!",
  type: "success",
  confirmButtonColor: "#DB00DB",
  confirmButtonText: "OK!"
},
function(){
  window.location.href="C_clientes.php";
});
            </script>';



                        }
                    
                    ?>

            </div>
            <?php include ("../util/Libscripts.php"); ?>
            <?php include ("../util/footer.php"); ?>
        </div>
    </main>

</body>

</html>
