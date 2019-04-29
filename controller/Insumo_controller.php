<?php

include_once '../../model/configuracion.php';
include_once '../../model/Insumo_model.php';


class InsumoController extends conexion
{
  public function Listar()
  {
    $datosInsumo=array();
    $consultar="SELECT I.Codigo_insumo, I.Nombre_Insumo, I.Fecha_Vencimiento, I.Estado, I.Precio_Entrada, I.Precio_Cliente, I.StockMinimo, C.Nombre_Categoria, T.Nombre_Tamano, TI.Nombre_Tipo_Envoltura 
    FROM tbl_insumo I INNER JOIN tbl_categoria C ON I.id_Categoria=C.Id_Categoria 
    INNER JOIN tbl_Tamano T ON I.Id_Tamano=T.Id_Tamano
    INNER JOIN tbl_tipo_envoltura TI ON I.Id_Tipo_Envoltura=TI.Id_Tipo_Envoltura
    ORDER BY Codigo_insumo ASC";
 
     try {
           $resultado=$this->conexion->query($consultar);
          // $resultado->execute();

           foreach ($resultado->fetchALL(PDO::FETCH_OBJ) as $dato) {
               $Insumo=new InsumoModel();
               $Insumo->__SET('Codigo_insumo',$dato->Codigo_insumo);
               $Insumo->__SET('Nombre_Insumo',$dato->Nombre_Insumo);
               $Insumo->__SET('Fecha_Vencimiento',$dato->Fecha_Vencimiento);
               $Insumo->__SET('Estado',$dato->Estado);
               $Insumo->__SET('Precio_Entrada',$dato->Precio_Entrada);
               $Insumo->__SET('Precio_Cliente',$dato->Precio_Cliente);
               $Insumo->__SET('StockMinimo',$dato->StockMinimo);
               $Insumo->__SET('Nombre_Categoria',$dato->Nombre_Categoria);
               $Insumo->__SET('Nombre_Tamano',$dato->Nombre_Tamano);
               $Insumo->__SET('Nombre_Tipo_Envoltura',$dato->Nombre_Tipo_Envoltura);

               $datosInsumo[]=$Insumo;
           }

         return $datosInsumo; 

        } catch (Exception $error) {
            echo 'Se ha presentado un error en la conexion'.$error->getMessage();
            die($error->getMessage());
        }

  }
public function Insertar(InsumoModel $Insumo)
{
 $Insertar="INSERT INTO tbl_insumo (Codigo_insumo, Nombre_Insumo, Fecha_Vencimiento, Precio_Entrada, 
 Precio_Cliente, StockMinimo, id_Categoria, Id_Tamano, Id_Tipo_Envoltura) VALUES (?,?,?,?,?,?,?,?,?)";
 try{
   $this->conexion->prepare($Insertar)->execute(array(
    $Insumo->__GET('Codigo_insumo'),
    $Insumo->__GET('Nombre_Insumo'),
    $Insumo->__GET('Fecha_Vencimiento'),
    $Insumo->__GET('Precio_Entrada'),
    $Insumo->__GET('Precio_Cliente'),
    $Insumo->__GET('StockMinimo'),
    $Insumo->__GET('id_Categoria'),
    $Insumo->__GET('Id_Tamano'),
    $Insumo->__GET('Id_Tipo_Envoltura')
    
   ));
   return true;

 }catch(\Exeption $error){
  echo 'error al insertar los datos'.$error->getMessage();

 }

}

public function buscar($Codigo_insumo)
{
  $buscar="SELECT I.Codigo_insumo, I.Nombre_Insumo, I.Fecha_Vencimiento, I.Precio_Entrada, I.Precio_Cliente, I.StockMinimo, C.Nombre_Categoria, T.Nombre_Tamano, TI.Nombre_Tipo_Envoltura 
  FROM tbl_insumo I INNER JOIN tbl_categoria C ON I.id_Categoria=C.Id_Categoria 
  INNER JOIN tbl_Tamano T ON I.Id_Tamano=T.Id_Tamano
  INNER JOIN tbl_tipo_envoltura TI ON I.Id_Tipo_Envoltura=TI.Id_Tipo_Envoltura WHERE Codigo_insumo=?";

  try{
    
    $resultado=$this->conexion->prepare($buscar);
    $resultado->execute(array($Codigo_insumo));

    $dato=$resultado->fetch(PDO::FETCH_OBJ);
    $Insumo=new InsumoModel();
    $Insumo->__SET('Codigo_insumo',$dato->Codigo_insumo);
    $Insumo->__SET('Nombre_Insumo',$dato->Nombre_Insumo);
    $Insumo->__SET('Fecha_Vencimiento',$dato->Fecha_Vencimiento);
    $Insumo->__SET('Precio_Entrada',$dato->Precio_Entrada);
    $Insumo->__SET('Precio_Cliente',$dato->Precio_Cliente);
    $Insumo->__SET('StockMinimo',$dato->StockMinimo);
    $Insumo->__SET('Nombre_Categoria',$dato->Nombre_Categoria);
    $Insumo->__SET('Nombre_Tamano',$dato->Nombre_Tamano);
    $Insumo->__SET('Nombre_Tipo_Envoltura',$dato->Nombre_Tipo_Envoltura);
    
    

    return $Insumo;

  }catch(\Exeption $error){
   echo 'error al buscar los datos'.$error->getMessage();
 
  }

}

public function actualizar(InsumoModel $Insumo)
{
  $insertar="UPDATE tbl_insumo SET Nombre_Insumo=?, Fecha_Vencimiento=?, Precio_Entrada=?, Precio_Cliente=?, StockMinimo=?, id_Categoria=?,
   Id_Tamano=?, Id_Tipo_Envoltura=?  WHERE Codigo_insumo=? ";

  try{
    
   $this->conexion->prepare($insertar)->execute(array(
     
             
               $Insumo->__GET('Nombre_Insumo'),
               $Insumo->__GET('Fecha_Vencimiento'),
               $Insumo->__GET('Precio_Entrada'),
               $Insumo->__GET('Precio_Cliente'),  
               $Insumo->__GET('StockMinimo'),
               $Insumo->__GET('id_Categoria'),
               $Insumo->__GET('Id_Tamano'),  
               $Insumo->__GET('Id_Tipo_Envoltura'),
               $Insumo->__GET('Codigo_insumo') 
               
    

   ));

     return true;

  }catch(\Exeption $error){
   echo 'error al actualizar los datos'.$error->getMessage();
 
  }
}

public function activar(InsumoModel $Insumo){
  $activar="UPDATE tbl_insumo SET Estado=? WHERE Codigo_insumo=? ";
  
  try{

    $this->conexion->prepare($activar)->execute(array(
      $Insumo->__GET('Estado'),
      $Insumo->__GET('Codigo_insumo')

    ));
      return true;
   }catch(\Exeption $error){
    echo 'error al desactivar el insumo'.$error->getMessage();
   }
}


public function desactivar(InsumoModel $Insumo){
  $desactivar="UPDATE tbl_insumo SET Estado=? WHERE Codigo_insumo=? ";
  try{
    $this->conexion->prepare($desactivar)->execute(array(
      $Insumo->__GET('Estado'),
      $Insumo->__GET('Codigo_insumo')
    ));
      return true;
   }catch(\Exeption $error){
    echo 'error al desactivar el insumo'.$error->getMessage();
   }
}

}

