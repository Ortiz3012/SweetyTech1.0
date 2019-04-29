<?php

include_once "../../controller/Ancheta_controller.php";
include_once "../../model/Ancheta_Model.php";
include_once "../../controller/TipoBase_controller.php";

$Base= new TipoBaseController();
$control= new AnchetaController();
$Ancheta= new AnchetaModel();
?>

<!DOCTYPE html>
<html lang="en">

<?php   require_once '../util/head.php';  ?>

<body>
      <?php include ("../util/menu.php"); ?>
    <main>
       <?php include ("../util/logo.php"); ?>

        <div class="row" id="cont">
            
            <div class="row col-md-12" id="migas">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
                        <li class="breadcrumb-item text-light" id="titulos"><a>Registrar</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page" id="titulos">Producto Terminado</li>
                    </ol>
                </nav>
            </div>

            <div class="container">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                    
                    </div>
                </div>

                <form method="POST" enctype="multipart/form-data">

                <div class="container" style="width: 100%;">

                             <div class="content-form col-md-12">

                                    <label for="campo" class="lbl-campo">Nombre Ancheta: </label>
                                    <input type="text" id="campo" name="NombreA">

                                    <label for="campo" class="lbl-campo">Descripcion: </label>
                                    <p><textarea name="Descripcion" rows="5" id="campo"></textarea></p>

                                    <label for="campo" class="lbl-campo">Precio Ancheta: </label>
                                    <input type="number" id="campo"name="Precio">

                                    <label for="campo" class="lbl-campo">Imagen Ancheta:</label>
                                    <input type="file" id="campo" name="Foto" accept="image/*"><br><br>
                                   
                                    <label for="campo" class="lbl-campo">Tipos de Base:</label>
                                    <select name="Id_Tipo_Base"><br><br>
      
                                    <?php
                                    
                                      foreach ($Base->Listar() as $Dato) {
                                      echo "<option value=".$Dato->__GET('Id_Tipo_Base').">".$Dato->__GET('Nombre')."</option>";
                                      }
                                    
                                     ?>
                         
                                     </select> 

                                     <span class="input-group-addon" id="plus"><?php include("../Base/Add_TipoBase.php");?></span>
                                 
                                    </div>
                                </form>

                            </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" style="float: right;" id="btnEnviar" name="btnEnviar">Registrar Ancheta</button>
                        </div>
                    </div>

                    <?php
                    if (isset($_POST["btnEnviar"])){

                        $NombreImagen = $_FILES["Foto"]["name"];
                        $Ruta = $_FILES["Foto"]["tmp_name"];
                        $Destino = "Imagenes/".$NombreImagen;
                        copy($Ruta, $Destino);

                        $Ancheta->__SET('Nombre',$_POST['NombreA']);
                        $Ancheta->__SET('Descripcion',$_POST['Descripcion']);
                        $Ancheta->__SET('Precio',$_POST['Precio']);   
                        $Ancheta->__SET('Foto',$NombreImagen);
                        // $NombreImagen=$_FILES['Foto']['name'];
                        $Ancheta->__SET('Tipo_Base',$_POST["Id_Tipo_Base"]);
            
                         if ($control->Insertar($Ancheta)){
                        echo "Registro Exitoso";
                    } else {
                        echo "Error al Registrar los Datos";
                    }
                }
                // $NombreImagen = $_FILES["Foto"]["name"];
                // echo $NombreImagen;
                    ?>
           </div>
           
             <?php include ("../util/Libscripts.php"); ?>
               <?php include ("../util/footer.php"); ?>

        </div>
    </main>
</body>
</html>