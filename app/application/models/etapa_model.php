<?php if ( ! defined('BASEPATH')) exit('Acceso directo no permitido');
class Etapa_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function obtener($etapa_id = NULL)
	{
		if ( ! is_null($etapa_id))
		{
			return $this->db->get_where('etapas', array('etapa_id' => $etapa_id))->row();
		}
		else
		{
			return $this->db->order_by('etapa_orden', 'asc')->get('etapas');
		}
	}
	
	function ingresar()
	{
		$campos = array(
			'etapa_nombre',
			'etapa_requerido',
			'etapa_orden'
		);
		$data = array();
		foreach ( $campos as $c)
		{
			$data[$c] = $this->input->post($c);
		}
		return $this->db->insert('etapas', $data);
	}
	
	function editar()
	{
		$campos = array(
			'etapa_nombre',
			'etapa_requerido',
			'etapa_orden'
		);
		$data = array();
		foreach ( $campos as $c)
		{
			$data[$c] = $this->input->post($c);
		}
		return $this->db->where(array('etapa_id' => $this->uri->segment(3)))->update('etapas', $data);		
	}
	
	function eliminar($etapa_id = NULL)
	{
		$this->db->delete('etapas', array('etapa_id' => $etapa_id));
		return $this->db->affected_rows();
	}
	
	function existe($etapa_id = NULL)
	{
		if ( ! is_null($etapa_id))
		{
			$etapa = $this->db->get_where('etapas', array('etapa_id' => $etapa_id));
			if ( $etapa->num_rows() > 0) return true;
			else return false;
		}
		return false;		
	}
}