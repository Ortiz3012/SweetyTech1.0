<?php
require_once "../../model/configuracion.php";
include_once "../../model/Plantilla_model.php";
include_once "../../model/TipoPlan_model.php";

class PlantillaController extends Conexion {

         public function Insertar(PlantillaModel $Plantilla){
               $insertar="INSERT INTO tbl_plantilla (codigo_plantilla,Nombre_plantilla,Fecha_Registro,Id_Tipo_Plantilla) values (?,?,?,?)";
               try {
                $this->conexion->prepare($insertar)->execute(array(
				$Plantilla->__GET('Codigo_Plantilla'),
				$Plantilla->__GET('Nombre_plantilla'),
                $Plantilla->__GET('Fecha_Registro'),
                $Plantilla->__GET('Id_Tipo_Plantilla')
                
            ));

            return true;
           } catch (Exception $e) {
            echo "Error al ingresar datos ".$e->getMessage();
          }
       }

        public function Listar(){

            $Datos=array();
            $listar="SELECT P.Codigo_Plantilla, P.Nombre_Plantilla, P.Fecha_Registro, 
            Plan.Nombre_Tipo, I.Nombre_Insumo, C.Nombre_Categoria FROM tbl_plantilla P JOIN tbl_tipo_plantilla 
            Plan JOIN tbl_insumo I JOIN tbl_insumo_has_plantilla D JOIN tbl_categoria C where 
            P.Id_Tipo_Plantilla=Plan.Id_Tipo_Plantilla and i.Codigo_insumo=D.Codigo_insumo and 
            C.Id_Categoria=I.id_Categoria";
              try {
               $resultado=$this->conexion->prepare($listar);
               $resultado->execute();
                foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $dato) {

               $Lista= new PlantillaModel();

               $Lista->__SET('Codigo_Plantilla', $dato->Codigo_Plantilla);//resultado conjunto de datos, transforma a array asociativo
               $Lista->__SET('Nombre_plantilla', $dato->Nombre_Plantilla);
               $Lista->__SET('Fecha_Registro', $dato->Fecha_Registro); //modelo, segundo a la base de datos
               $Lista->__SET('Id_Tipo_Plantilla', $dato->Nombre_Tipo);
               $Lista->__SET('Codigo_Insumo', $dato->Nombre_Insumo);
               $Lista->__SET('id_Categoria', $dato->Nombre_Categoria);
        
               $Datos[]=$Lista;
       
           } return $Datos;
       
           } catch (Exception $e) {
       
           echo "Error al Consultar".$e->getMessage();
           }
         }

         public function Buscar($Codigo_Plantilla){
            $buscar="SELECT * from tbl_plantilla where Codigo_Plantilla=?";
            try {
                $resultado=$this->conexion->prepare($buscar);
                $resultado->execute(array($Codigo_Plantilla));
                $dato=$resultado->fetch(PDO::FETCH_OBJ);
                $DatosUser= new PlantillaModel();
    
                $DatosUser->__SET('Codigo_Plantilla',$dato->Codigo_Plantilla);
                $DatosUser->__SET('Nombre_plantilla',$dato->Nombre_Plantilla);
                $DatosUser->__SET('Fecha_Registro',$dato->Fecha_Registro);
                $DatosUser->__SET('Id_Tipo_Plantilla',$dato->Id_Tipo_Plantilla);
               
    
                return $DatosUser;
                
            } catch (Exception $e) {
              echo 'Error al buscar los Datos'.$e->getMessage();
            }
        }

        public function Modificar(PlantillaModel $Plantilla){
            $actualizar="UPDATE tbl_plantilla SET Nombre_plantilla=?, Fecha_Registro=? where Codigo_Plantilla=? ";
            try {
                $this->conexion->prepare($actualizar)->execute(array(

                    $Plantilla->__GET('Nombre_plantilla'),
                    $Plantilla->__GET('Fecha_Registro'),
                    $Plantilla->__GET('Codigo_Plantilla')
                ));
                return true;
            } catch (Exception $e) {
                echo 'Error al Actualizar Datos'.$e->getMessage();
            }
        }

        public function Eliminar($Codigo_Plantilla){
            $borrar="DELETE from tbl_plantilla where Codigo_Plantilla=?";
            try {
                $this->conexion->prepare($borrar)->execute(array($Codigo_Plantilla));
                return true;
            } catch (Exception $e) {
                echo "Error al eliminar los Datos".$e->getmessage();
            }
        }
    
}

?>