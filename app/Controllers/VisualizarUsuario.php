<?php 
namespace App\Controllers;
use CodeIgniter\Controller;

class VisualizarUsuario extends Controller
{
	public function index()
	{
		$db = \Config\Database::connect();	
		$model = $db -> query('SELECT p.nombre AS nombreperfil, u.idusuario, u.nombreusuario, u.nombre, u.dni, u.telefono,u.estado AS estadousuario, p.estado AS estadoperfil FROM perfil AS p INNER JOIN usuario AS u ON p.idperfil = u.idperfil');
		$datos["Resultado"] = $model -> getResultArray();

		echo view( 'header' );
		echo view( 'menu' );
		echo view( 'visualizar_usuario', $datos );
		echo view( 'footer' );
	}
	public function update( $id )
	{

	}
	public function delete( $id )
	{	
		$db = \Config\Database::connect();	
		$model2 = $db -> query("UPDATE usuario SET estado = 0 WHERE idusuario = $id AND estado = 1");
		$model = $db -> query('SELECT p.nombre AS nombreperfil, u.idusuario, u.nombreusuario, u.nombre, u.dni, u.telefono,u.estado AS estadousuario, p.estado AS estadoperfil FROM perfil AS p INNER JOIN usuario AS u ON p.idperfil = u.idperfil');
		$datos["Resultado"] = $model -> getResultArray();
		$estructura = view( 'header' ).view( 'menu' ).view( 'visualizar_usuario', $datos ).view( 'footer' );
		return $estructura;
	}
}