<?php
include_once '../../model/configuracion.php';
include_once '../../model/salida_model.php';
class salida_controller extends  conexion
{
    public function listardatos()
    {
        $datos=array();
        $consulta="SELECT * FROM tbl_salida ORDER BY Codigo_Salida";

        try {
            $resultado = $this->conexion->prepare($consulta);
            $resultado->execute();
            foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $datos ) {
               $salida = new salida();
               $salida->__SET('Codigo_Salida',$datos->Codigo_Salida);
               $salida->__SET('Fecha_Salida',$datos->Fecha_Salida);
               $salida->__SET('Motivo_Salida',$datos->Motivo_Salida);
               $dato[]=$salida;
            }
            return $dato;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
 //--------------------------------------------------------------------------------------------------------   
    public function eliminar($Codigo_Salida)
    {
        $borrar = "DELETE  FROM tbl_salida WHERE Codigo_Salida=?";
        try {
            $this->conexion->prepare($borrar)->execute(array($Codigo_Salida));
			return true;
        } catch (Exception $e) {
            echo "error al eliminar datos ".$e->getMessage();
        }
    }
//-----------------------------------------------------------------------------------------------------------
    public function insertar(salida $salida)
    {
        $insertar= "INSERT INTO tbl_salida (Codigo_Salida, Fecha_Salida, Motivo_Salida) values (?,?,?)";
        try {
            $this->conexion->prepare($insertar)->execute(array(
				
				$salida->__GET('Codigo_Salida'),
				$salida->__GET('Fecha_Salida'),
				$salida->__GET('Motivo_Salida')
				));

			return true;
        } catch (Exception $e) {
            echo "error al ingresar datos ".$e->getMessage();
        }
    }
//---------------------------------------------------------------------------------------------------------------
    public function buscar($Codigo_Salida)
    {
        $buscar="SELECT *  FROM tbl_salida where Codigo_Salida=?";
		try {
			$resultado=$this->conexion->prepare($buscar);
			$resultado->execute(array($Codigo_Salida));
			$datos=$resultado->fetch(PDO::FETCH_OBJ);
			$salida= new salida();
			$salida->__SET('Codigo_Salida',$datos->Codigo_Salida);
			$salida->__SET('Fecha_Salida',$datos->Fecha_Salida);
			$salida->__SET('Motivo_Salida',$datos->Motivo_Salida);
			return $salida;
		} catch (Exception $e) {
			echo "error al buscar ".$e->getMessage();
		}
    }
//-----------------------------------------------------------------------------------------------------------------
    public function actualizar(salida $salida)
    {
        $actualizar="UPDATE  tbl_salida SET Fecha_Salida=?,Motivo_Salida=? where Codigo_Salida=? ";
		try {
			$this->conexion->prepare($actualizar)->execute(array(
				$salida->__GET('Fecha_Salida'),
				$salida->__GET('Motivo_Salida'),
				$salida->__GET('Codigo_Salida'),
				));
			return true;

		} catch (Exception $e) {
			echo "error al ingresar datos ".$e->getMessage();
		}
    }


}



?>