<?php 

require_once '../../model/configuracion.php';
require_once '../../model/user_model.php';
require_once '../../model/Persona_model.php';


class User_Controller extends Conexion
{
    public function ListaDatos()
    {
        $datos=array();
        $consulta="SELECT * FROM tbl_persona ORDER BY Id_Persona ";
        try {
            $resultado=$this->conexion->prepare($consulta);
            $resultado->execute();
            foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $datos) {
                $persona = new PersonasModel();
                $persona->__SET('Id_Persona',$datos->Id_Persona);
                $persona->__SET('Nombre',$datos->Nombre);
                $persona->__SET('Apellido',$datos->Apellido);
                $persona->__SET('Documento_Identificacion',$datos->Documento_Identificacion);
                $persona->__SET('Direccion',$datos->Direccion);
                $persona->__SET('Telefono',$datos->Telefono);
                $persona->__SET('Celular',$datos->Celular);
                $persona->__SET('Fecha_Nacimiento',$datos->Fecha_Nacimiento);
                $persona->__SET('Estado',$datos->Estado);
                $persona->__SET('Nit_Empresa',$datos->Nit_Empresa);
                $persona->__SET('Id_Tipo_Persona',$datos->Id_Tipo_Persona);
                $persona->__SET('Id_Tipo_Documento',$datos->Id_Tipo_Documento);
                $dato[]=$persona;
            }
            return $dato;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
public function iniciar($usuario,$pass)
    {    
    
      session_start();
        $usu=$usuario;
        $password=hash('md5',$_POST['pwd']);
    
        $iniciar="SELECT Email,id_Rol FROM tbl_usuario WHERE Email='$usu' AND  Pass ='$password' ";

        try {
            $resul=$this->conexion->prepare($iniciar);
            $resul->execute();
            $dato=$resul->rowCount();

            if ($dato > 0) {
                $datos=$resul->fetch(PDO::FETCH_ASSOC);
                $_SESSION['usu']=$datos['Email'];
                $perfil=$datos['id_Rol'];
                
                switch ($perfil) {
					case '1':
					header("location:../../view/gestion/principal.php");
                        break;
                        case '2':
						header("location:../../view/index.html");
                        break;
                    default:
                        echo "error al iniciar sesion";
                        break;
                }
                
            }
            
        } catch (Exception $e) {
            echo "error al ingresar datos ".$e->getMessage();
        }
    }
    public function insertar(Usuariomodel $persona)
    {
        var_dump($persona);
        $insertar="INSERT INTO tbl_persona (Documento_Identificacion,Nombre,Apellido,Direccion,Telefono,
        Celular,Fecha_Nacimiento,Estado,Id_Tipo_Persona,Id_Tipo_Documento) values (?,?,?,?,?,?,?,?,?,?)";
        
        try {
            $this->conexion->prepare($insertar)->execute(array(
                $persona->__GET('Documento_Identificacion'),
                $persona->__GET('Nombre'),
                $persona->__GET('Apellido'),
                $persona->__GET('Direccion'),
                $persona->__GET('Telefono'),
                $persona->__GET('Celular'),
                $persona->__GET('Fecha_Nacimiento'),
                $persona->__GET('Estado'),
                $persona->__GET('Id_Tipo_Persona'),
                $persona->__GET('Id_Tipo_Documento')
            ));
             
            $Id_Persona = $this->ConsultarPersona($persona->__GET('Documento_Identificacion'));
              
            $insertarUser="INSERT INTO tbl_usuario(Email,Pass,id_Persona,Id_Rol) values (?,?,?,?)";
            $this->conexion->prepare($insertarUser)->execute(array(
                $persona->__GET('Email'),
                $persona->__GET('password'),
                $Id_Persona,
                '2'
                
            ));


            return true;
        } catch (Exception $e) {
            echo "error al ingresar datos ".$e->getMessage();
            return false ;
        }
    }
    
    private function ConsultarPersona($cedula){

         $sql="Select Id_Persona from tbl_Persona  where Documento_Identificacion  = '$cedula' ";
         try {
             $nueva_consulta = $this->conexion->prepare($sql);
             //ejecutamos la consulta
             $nueva_consulta->execute();
             if($nueva_consulta->rowCount() > 0)
             {
                 $datos=$nueva_consulta->fetch(PDO::FETCH_ASSOC);         
                  return  $datos['Id_Persona'];
     
             }else
             return '<script>swal("ohh ocuurio un problema :) !", "Intenta mas tarde!", "error");</script>';
          

         } catch (\Exeption $e) {
             
         }
    }
    

    public function buscar($Id_Persona)
    {
        $buscar="SELECT * FROM tbl_Persona where Id_Persona=?";
        try {
            $resultado=$this->conexion->prepare($buscar);
            $resultado->execute(array($Id_Persona));
            $datos=$resultado->fetch(PDO::FETCH_OBJ);
            $persona= new PersonasModel();
            
                $persona->__SET('Documento_Identificacion',$datos->Documento_Identificacion);
                $persona->__SET('Id_Persona',$datos->Id_Persona);
                $persona->__SET('Nombre',$datos->Nombre);
                $persona->__SET('Apellido',$datos->Apellido);
                $persona->__SET('Direccion',$datos->Direccion);
                $persona->__SET('Telefono',$datos->Telefono);
                $persona->__SET('Celular',$datos->Celular);
                $persona->__SET('Fecha_Nacimiento',$datos->Fecha_Nacimiento);
                $persona->__SET('Estado',$datos->Estado);
                $persona->__SET('Nit_Empresa',$datos->Nit_Empresa);
                $persona->__SET('Id_Tipo_Persona',$datos->Id_Tipo_Persona);
                $persona->__SET('Id_Tipo_Documento',$datos->Id_Tipo_Documento);
                $persona->__SET('Email',$datos->Email);
            return $persona;
        } catch (Exception $e) {
            echo "error al buscar ".$e->getMessage();
        }
    }

     public function actualizar(Usuariomodel $persona)
    {
        $actualizar="call  ActualizarUser(?,?,?,?,?,?)";
        try {
            $this->conexion->prepare($actualizar)->execute(array(
                
                $persona->__GET('Nombre'),
                $persona->__GET('Apellido'),
                $persona->__GET('Direccion'),
                $persona->__GET('Telefono'),
                $persona->__GET('Celular'),
                $persona->__GET('Documento_Identificacion')
               

            ));
             var_dump($persona);

        } catch (Exception $e) {
            echo "error al ingresar datos ".$e->getMessage();
        }
    }
    
    public function CambiarEstado($cambio,$id)
	{
		$cambiar="UPDATE  tbl_persona SET Estado=$cambio WHERE Documento_Identificacion=$id";
		try {
			$this->conexion->prepare($cambiar)->execute(array());
			return true;

		} catch (Exception $e) {
			echo "error al cambiar estado".$e->getMessage();
		}



    
        
}
}


?>