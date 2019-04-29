<?php

require_once '../../model/configuracion.php';
require_once '../../model/Ancheta_model.php';

class AnchetaController extends Conexion {

    public function Insertar(AnchetaModel $Ancheta){

        $Consulta="INSERT INTO tbl_Ancheta(Nombre_Ancheta, Descripcion, Precio, Foto, 
        Tipo_Base) VALUES (?,?,?,?,?)";

        try {
            $this->conexion->prepare($Consulta)->execute(array(
                // $Ancheta->__GET('CodigoAncheta'),
                $Ancheta->__GET('Nombre'),
                $Ancheta->__GET('Descripcion'),
                $Ancheta->__GET('Precio'),
                $Ancheta->__GET('Foto'),
                $Ancheta->__GET('Tipo_Base')

            ));

            return true;
            
        } catch (Exception $error) {
            echo "Error al Ingresar los Datos".$error->getMessage();
        }
    }

    public function Listar(){

        $Ancheta=array();
        $Consulta="SELECT tbl_ancheta.Codigo_Ancheta, tbl_ancheta.Nombre_Ancheta, tbl_ancheta.Descripcion, tbl_ancheta.Precio, tbl_ancheta.Foto, tbl_tipo_base.Nombre FROM tbl_ancheta JOIN tbl_tipo_base ON tbl_ancheta.Tipo_Base=tbl_tipo_base.Id_Tipo_Base";

        try {
        $Datos=$this->conexion->prepare($Consulta);
        $Datos->execute();

        foreach ($Datos->fetchAll(PDO::FETCH_OBJ) as $valores) {
            $DatosAncheta= new AnchetaModel();
            $DatosAncheta->__SET('CodigoAncheta', $valores->Codigo_Ancheta);
            $DatosAncheta->__SET('Nombre', $valores->Nombre_Ancheta);
            $DatosAncheta->__SET('Descripcion', $valores->Descripcion);
            $DatosAncheta->__SET('Precio', $valores->Precio);
            $DatosAncheta->__SET('Foto', $valores->Foto);
            $DatosAncheta->__SET('TipoBase', $valores->Nombre);
            $Ancheta[]=$DatosAncheta;
        } 

        return $Ancheta;

        } catch (\Exception $error) {
            echo ("Ha Ocurrido Un Error al Listar los Datos, Intentalo nuevamente".$error->getMessage());
        }
    }

}

?>