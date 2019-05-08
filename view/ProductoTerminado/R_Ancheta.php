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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

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

                <form method="POST" enctype="multipart/form-data">

                <div class="container" style="width: 100%;">

                             <div class="content-form col-md-12">

                                    <label for="campo" class="lbl-campo">Nombre Ancheta: </label>
                                    <input type="text" id="campo" name="NombreA">

                                    <label for="campo" class="lbl-campo">Descripcion: </label>
                                    <p><textarea name="Descripcion" rows="5" id="campo"></textarea></p>

                                    <label for="campo" class="lbl-campo">Precio Ancheta: </label>
                                    <input type="number" id="campo"name="Precio">

                                    <label for="campo" class="lbl-campo">Imagen Ancheta *:</label>
                                    <input type="file" id="campo" name="Foto" accept="image/*"><br><br>

                                    <label for="campo" class="lbl-campo">Imagen Ancheta 2:</label>
                                    <input type="file" id="campo" name="Foto2" accept="image/*"><br><br>
                                   
                                    <label for="campo" class="lbl-campo">Imagen Ancheta 3:</label>
                                    <input type="file" id="campo" name="Foto3" accept="image/*"><br><br>

                                    <label for="campo" class="lbl-campo">Tipos de Base:</label>
                                    <select name="Id_Tipo_Base"><br><br>
      
                                    <?php
                                    
                                      foreach ($Base->Listar() as $Dato) {
                                      echo "<option value=".$Dato->__GET('Id_Tipo_Base').">".$Dato->__GET('Nombre')."</option>";
                                      }
                                    
                                     ?>
                         
                                     </select> 

                                     <span class="input-group-addon" id="plus"><?php include("../Base/Add_TipoBase.php");?></span>
                                 
                                    </div><br><br>
                                    
                                   <!--<script>
                                        $('#myModal').on('shown.bs.modal', function () {
                                         $('#myInput').trigger('focus')
                                       })
                                    </script>
                                    -->
                                    <button type="button" class="btn btn-primary" 
                                    data-toggle="modal" data-target="#exampleModalCenter"> 
                                    Asociar Plantilla
                                    </button>

                                   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                   <div class="modal-content">
                                    <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalCenterTitle">Plantilla</h5>
                                   
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                    </button>
                                       </div>
                             
                                       <div class="modal-body">
                                       <div class="input-group mb-3">
                                          <input type="text" class="form-control" placeholder="Buscar Nombre Plantilla" aria-label="Buscar Nombre Plantilla" aria-describedby="button-addon2" id="insumo" name="insumo">
                                            <div class="input-group-append" id="datos" name="datos">
                                          <button class="btn btn-outline-secondary" type="button" id="buscar" onclick="busqueda()">Buscar</button>
                                         <br> <div id="resultado">

                                          </div>
                                      </div>
                                 </div>
                                </div>
                          
                                     <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                     <button type="button" class="btn btn-primary" onclick="addInsumo()">Guardar</button>
                                 </div>
    
                                </div>
                            </div>
                        </div>

                        </div>
                                </form>

                            </div>

                           
                        <div class="col-md-12">
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" style="float: right;" id="btnEnviar" name="btnEnviar">Registrar Ancheta</button>
                        </div>
                    </div>
                    <script src="Funcion.js"></script>
                    <?php
                    if (isset($_POST["btnEnviar"])){

                        $NombreImagen = $_FILES["Foto"]["name"];
                        $Ruta = $_FILES["Foto"]["tmp_name"];
                        $Destino = "Imagenes/".$NombreImagen;
                        copy($Ruta, $Destino);

                        $NombreImagen2 = $_FILES["Foto2"]["name"];
                        $Ruta = $_FILES["Foto2"]["tmp_name"];
                        $Destino = "Imagenes/".$NombreImagen2;
                        copy($Ruta, $Destino);

                        $NombreImagen3 = $_FILES["Foto3"]["name"];
                        $Ruta = $_FILES["Foto3"]["tmp_name"];
                        $Destino = "Imagenes/".$NombreImagen3;
                        copy($Ruta, $Destino);


                        $Ancheta->__SET('Nombre',$_POST['NombreA']);
                        $Ancheta->__SET('Descripcion',$_POST['Descripcion']);
                        $Ancheta->__SET('Precio',$_POST['Precio']);   
                        $Ancheta->__SET('Foto',$NombreImagen);
                        $Ancheta->__SET('Foto2',$NombreImagen2);
                        $Ancheta->__SET('Foto3',$NombreImagen3);
                        // $NombreImagen=$_FILES['Foto']['name'];
                        $Ancheta->__SET('Tipo_Base',$_POST["Id_Tipo_Base"]);
            
                         if ($control->Insertar($Ancheta)){
                        echo '<script type="text/javascript">
                        swal({
            title: "REGISTRO",
            text: "Realizado con exito!",
            type: "success",
            confirmButtonColor: "#DB00DB",
            confirmButtonText: "OK!"
          },
          function(){
            window.location.href="C_Ancheta.php";
          });
                      </script>';
                    } 
                    else {
                      echo '<script type="text/javascript">
                      swal({
          title: "ERROR",
          text: "Por favor llenar los Campos!",
          type: "warning",
          confirmButtonColor: "#ce3a1e",
          confirmButtonText: "OK!",
          closeOnConfirm: false
        });
                    </script>';
                    }
                   
                }
                // $NombreImagen = $_FILES["Foto"]["name"];
                // echo $NombreImagen;
                    ?>
           </div>
           
             <?php include ("../util/Libscripts.php"); ?>
               <?php include ("../util/footer.php"); ?>

               <div id="Datos"></div>
               <script>
		function addInsumo(){
			var codigo=document.getElementById('idPlantilla').value;
			var insumo=document.getElementById('idInsumo').value;
			var cantidad=document.getElementById('Cantidad').value;
		
		localStorage.setItem(codigo, JSON.stringify);
		localStorage.setItem(insumo, JSON.stringify);
		localStorage.setItem(cantidad, JSON.stringify);
		
		mostrarDatos(codigo);
		}

		function mostrarDatos(){
			var datos=document.getElementById('Datos');
			datos.innerHTML='';
			for(var i=0; i<localStorage.length; i++){
				var codigo=localStorage.key(i);
				var insumo=JSON.parse(localStorage.getItem("codigo"));
				var cantidad=JSON.parse(localStorage.getItem("codigo"));
				datos.innerHTML += codigo;
			}
		}
		</script>
        </div>
    </main>
</body>
</html>