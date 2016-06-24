<?php if ( ! defined('BASEPATH')) exit('Acceso directo no permitido');
class Usuario_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function ingresar($token_activacion = NULL)
	{
		$activo_admin = $this->input->post('activo_admin');
		$activo_admin = ( empty($activo_admin)) ? 0 : 1;
		$enviar_mail = $this->input->post('novedades'); // no implementado aún en esta app
		$enviar_mail = ( ! empty($enviar_mail) ) ? true : false;		
		$permiso = $this->input->post('permiso');
		$data = array(
			'nombres' => $this->input->post('nombres'),
			'apellido_paterno' => $this->input->post('apellido_paterno'),
			'apellido_materno' => $this->input->post('apellido_materno'),
			'pais' => $this->input->post('pais'),
			'rut' => $this->input->post('rut'),
			'nacionalidad' => $this->input->post('nacionalidad'),
			'email' => $this->input->post('email'),
			'telefono' => $this->input->post('telefono'),
			'celular' => $this->input->post('celular'),
			'clave' => crypt($this->input->post('clave')),
			'enviar_mail' => $enviar_mail,
			'activo' => 0,
			'activo_admin' => $activo_admin,
			'token_activacion' => $token_activacion,
			'rol' => $this->input->post('rol')
		);
		if ( ! empty($permiso))
		{
			if ( is_array($permiso))
			{
				if ( $permiso[0] == 'cliente') $data['cliente'] = 1;
				$permiso = serialize($permiso);	
				$data['permiso'] = $permiso;					
			}
		}
		return $this->db->insert('usuarios', $data);
	}
	
	function editar()
	{
		$activo_admin = $this->input->post('activo_admin');
		$activo_admin = ( empty($activo_admin)) ? 0 : 1;
		$data = array(
			'nombres' => $this->input->post('nombres'),
			'apellido_paterno' => $this->input->post('apellido_paterno'),
			'apellido_materno' => $this->input->post('apellido_materno'),
			'telefono' => $this->input->post('telefono'),
			'email' => $this->input->post('email'),
			'empresa' => $this->input->post('empresa'),
			'permiso' => serialize($this->input->post('permiso')),
			'activo_admin' => $activo_admin,
			'pais' => $this->input->post('pais'),
			'rut' => $this->input->post('rut'),
			'nacionalidad' => $this->input->post('nacionalidad'),
			'email' => $this->input->post('email'),
			'celular' => $this->input->post('celular'),
			'rol' => $this->input->post('rol')
		);
		$clave = $this->input->post('clave');
		if ( ! empty($clave))
		{
			$data['clave'] = crypt($clave);
		}
		$usuario_id = $this->uri->segment(3);
		$this->db->where(array('usuario_id' => $usuario_id))->update('usuarios', $data);
		return $this->db->affected_rows();
	}
	
	function obtener($params = NULL)
	{
		$usuario_id = NULL;
		if ( is_array($params))
		{
			if ( array_key_exists('vista_cliente', $params))
			{
				if ( $params['vista_cliente'] === true)
				{
					return $this->db->order_by('apellido_paterno', 'asc')->get_where('usuarios', array('cliente' => 1));
				}
			}
		}
		elseif ( ! is_null($params))
		{
			$usuario_id = $params;
		}
		if ( ! is_null($usuario_id))
		{
			return $this->db->get_where('usuarios', array('usuario_id' => $usuario_id))->row();
		}
		else
		{
			return $this->db->order_by('activo_admin', 'asc')->order_by('apellido_paterno', 'asc')->get('usuarios');
		}
	}
	
	function eliminar($usuario_id = NULL)
	{
		$this->db->delete('usuarios', "usuario_id = $usuario_id");
		return $this->db->affected_rows();
	}
	
	function existe($usuario_id = NULL)
	{
		$usuario = $this->db->get_where('usuarios', array('usuario_id' => $usuario_id));
		if ( $usuario->num_rows() > 0 )
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function permiso()
	{
		$permiso = array(
			array('permiso' => 'admin', 'etiqueta' => 'Administrador'),
			array('permiso' => 'usuario', 'etiqueta' => 'Usuario')
		);
		return $permiso;
	}
	
}