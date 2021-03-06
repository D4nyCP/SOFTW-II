<?php 

namespace App\Controllers;
use App\Models\UsuarioModel;


class Usuario extends Perfil{

	/*public function index(){

	}*/

	public function create(){
		
		if(isset($_POST['idperfil'])){   #RECEPCION FORULARIO
			
			$perfil = new Perfil();

			$usuario_model = new UsuarioModel();
			$id_perfil = $_POST['idperfil'];	
			$existe_perfil = $perfil->validarPerfil($id_perfil);

			$data = array('nombreusuario' => $_POST['nombreusuario'], 
					  'nombre' => $_POST['nombre'],
			          'contrasena' => $_POST['contrasena'],
			          'dni' => $_POST['dni'],
			          'telefono' => $_POST['telefono'],
			          'idperfil' => $_POST['idperfil']);
				
			$mensaje;

			if($existe_perfil == 0){        #perfil no encontrado
				$mensaje = 'Perfil invalido';
				return $mensaje; die;
			}

			$contar = new Usuario();

			$contar_dni = $contar->contar($_POST['dni'],8);
			if($contar_dni['valor'] == false){
				$mensaje = 'El dni '.$contar_dni['mensaje']; /* Tamaño inadecuado*/
				return $mensaje; die;
			}

			$contar_telefono = $contar->contar($_POST['telefono'],9);
			if($contar_telefono['valor'] == false){
				$mensaje = 'El telefono '.$contar_telefono['mensaje']; /* Tamaño inadecuado*/
				return $mensaje; die;
			}

			$nombre_usuario = $_POST['nombreusuario'];
			$usuario = $usuario_model->where('nombreusuario', $nombre_usuario,'estado',1)->find();

			if(!empty($usuario)){
				#nombre de usuario no disponible
				$mensaje = 'Ya existe una cuenta de usuario llamada '.$_POST['nombreusuario'];
			}
			else{
				#nombre de usuario disponible
				$usuario = $usuario_model->insert($data);
				$mensaje = 'Usuario añadido';
			}
			
			return $mensaje;

		}#fin IF

		else{
			$data = 'ERROR-404';
			return $data;

		}#fin ELSE
	} 

	private function contar($input,$max_length){
		$length = strlen($input);
		$data;

		if($length != $max_length){
			$data = array('valor' => false, 'mensaje' => ' debe tener un tamaño de '.$max_length.		  ' caracteres');
		}
		else{
			$data = array('valor' => true);
		}
		return $data;
	}
			
}#fin CLASS