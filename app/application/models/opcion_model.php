<?php if ( ! defined('BASEPATH')) exit('Acceso directo no permitido');
class Opcion_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function obtener($opcion_id = NULL)
	{
		if ( ! is_null($opcion_id))
		{
			return $this->db->get_where('opciones', array('opcion_id' => $opcion_id))->row();
		}
		else
		{
			return $this->db->order_by('opcion_titulo', 'asc')->get('opciones');
		}
	}
	
	function obtener_por_tipo($opcion_tipo = NULL)
	{
		if ( ! is_null($opcion_tipo))
		{
			$opcion = $this->db->get_where('opciones', array('opcion_titulo' => $opcion_tipo));
			if ( $opcion->num_rows() > 0)
			{
				return $opcion;
			}
			else return false;
		}
		else return false;
	}
	
	function ingresar()
	{
		$campos = array(
			'opcion_titulo',
			'opcion_valor',
		);
		$data = array();
		foreach ( $campos as $c)
		{
			$data[$c] = $this->input->post($c);
		}
		return $this->db->insert('opciones', $data);
	}
	
	function editar()
	{
		$campos = array(
			'opcion_titulo',
			'opcion_valor',
		);
		$data = array();
		foreach ( $campos as $c)
		{
			$data[$c] = $this->input->post($c);
		}
		return $this->db->where(array('opcion_id' => $this->uri->segment(3)))->update('opciones', $data);		
	}
	
	function eliminar($opcion_id = NULL)
	{
		$this->db->delete('opciones', array('opcion_id' => $opcion_id));
		return $this->db->affected_rows();
	}
	
	function existe($opcion_id = NULL)
	{
		if ( ! is_null($opcion_id))
		{
			$opcion = $this->db->get_where('opciones', array('opcion_id' => $opcion_id));
			if ( $opcion->num_rows() > 0) return true;
			else return false;
		}
		return false;		
	}
}