<?php if ( ! defined('BASEPATH')) exit('Acceso directo no permitido');
class Tarea_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function obtener($tarea_id = NULL)
	{
		if ( ! is_null($tarea_id))
		{
			return $this->db->get_where('tareas', array('tarea_id' => $tarea_id))->row();
		}
		else
		{
			return $this->db->order_by('tarea_orden', 'asc')->get('tareas');
		}
	}
	
	function obtener_proceso ($proceso_id = NULL)
	{
		if ( ! is_null($proceso_id))
		{
			$proceso = $this->db
							->join('tareas', 'procesos.tarea_id = tareas.tarea_id', 'inner')
							->join('proyectos', 'procesos.proyecto_id = proyectos.proyecto_id')
							->join('etapas', 'procesos.etapa_id = etapas.etapa_id')
							->get_where('procesos', array('proceso_id' => $proceso_id));
			if ( $proceso->num_rows() > 0)
			{
				return $proceso;
			}
			else return false;
		}
		else return false;
	}
	
	function finalizar_proceso($proceso_id = NULL)
	{
		if ( ! is_null($proceso_id))
		{
			$proceso = $this->obtener_proceso($proceso_id);
			$proceso = $proceso->row();
			$this->db->where(array('proceso_id' => $proceso_id))->update('procesos', array(
				'proceso_terminado' => 1,
				'proceso_fecha_termino' => time()
			));
			$ultima_etapa = $proceso->etapa_id;
			$ultima_tarea = $proceso->tarea_id;
			$ultima_tarea_orden = $proceso->tarea_orden;
			$ultima_etapa_orden = $proceso->etapa_orden;
			
			// hay más tareas en la etapa?
			$tarea_siguiente = $this->db->where('tarea_orden > '.$ultima_tarea_orden)->where('etapa_id = '.$ultima_etapa)->order_by('tarea_orden','asc')->get('tareas');
			if ( $tarea_siguiente->num_rows() > 0)
			{
				$tarea_siguiente = $tarea_siguiente->row();				
				if ( $tarea_siguiente->tarea_rol == 'ES') $usuario = $proceso->ejecutivo_servicios_id;
				elseif ( $tarea_siguiente->tarea_rol == 'EN') $usuario = $proceso->ejecutivo_negocios_id;
				else $usuario = $this->auth->get_id();				
				$this->db->insert('procesos', array(
					'tarea_id' => $tarea_siguiente->tarea_id,
					'proyecto_id' => $proceso->proyecto_id,
					'usuario_id' => $usuario,
					'etapa_id' => $ultima_etapa
				));
				return true;
			}
			else
			{
				// busco tareas en la próxima etapa
				$etapa_siguiente = $this->db->where('etapa_orden > '.$ultima_etapa_orden)->order_by('etapa_orden','asc')->get('etapas');
				if ( $etapa_siguiente->num_rows() > 0)
				{
					$etapa_siguiente = $etapa_siguiente->row();
					$primera_tarea = $this->obtener_por_etapa($etapa_siguiente->etapa_id);
					$primera_tarea = $primera_tarea->row();
					if ( $primera_tarea->tarea_rol == 'ES') $usuario = $proceso->ejecutivo_servicios_id;
					elseif ( $primera_tarea->tarea_rol == 'EN') $usuario = $proceso->ejecutivo_negocios_id;
					else $usuario = $this->auth->get_id();					
					$this->db->insert('procesos', array(
						'tarea_id' => $primera_tarea->tarea_id,
						'proyecto_id' => $proceso->proyecto_id,
						'usuario_id' => $usuario,
						'etapa_id' => $etapa_siguiente->etapa_id
					));
					return true;					
				}
				else
				{
					$this->db->where(array('proyecto_id' => $proceso->proyecto_id))->update('proyectos', array('proyecto_terminado' => 1, 'proyecto_ft_real' => date('Y-m-d')));
					return true;
				}
			}
		}
		else return false;
	}
	
	function obtener_bitacora_por_proceso ( $proceso_id = NULL)
	{
		if ( ! is_null($proceso_id))
		{
			$bitacora = $this->db
							->join('bitacoras', 'procesos.proyecto_id = bitacoras.proyecto_id', 'inner')
							->join('usuarios', 'bitacoras.usuario_id = usuarios.usuario_id', 'left')
							->join('etapas', 'bitacoras.etapa_id = etapas.etapa_id', 'left')
							->join('tareas', 'bitacoras.tarea_id = tareas.tarea_id', 'left')						
							->get_where('procesos', array('procesos.proceso_id' => $proceso_id));
			if ( $bitacora->num_rows() > 0)
			{
				return $bitacora;
			}
			else return false;
		}
		else return false;
	}

	function obtener_adjuntos_por_proceso ( $proceso_id = NULL)
	{
		if ( ! is_null($proceso_id))
		{
			$adjunto = $this->db
							->join('adjuntos', 'procesos.proyecto_id = adjuntos.proyecto_id', 'inner')
							->join('usuarios', 'adjuntos.usuario_id = usuarios.usuario_id', 'left')
							->join('etapas', 'adjuntos.etapa_id = etapas.etapa_id', 'left')
							->join('tareas', 'adjuntos.tarea_id = tareas.tarea_id', 'left')						
							->get_where('procesos', array('procesos.proceso_id' => $proceso_id));
			if ( $adjunto->num_rows() > 0)
			{
				return $adjunto;
			}
			else return false;
		}
		else return false;
	}
	
	function obtener_por_etapa($etapa_id = NULL)
	{
		if ( ! is_null($etapa_id))
		{
			$tarea = $this->db->order_by('tarea_orden', 'asc')->get_where('tareas', array('etapa_id' => $etapa_id));
			if ( $tarea->num_rows() > 0)
			{
				return $tarea;
			}
			else return false;
		}
		else return false;
	}
	
	function ingresar()
	{
		$etapa_id = $this->uri->segment(3);
		$campos = array(
			'tarea_nombre',
			'tarea_orden',
			'tarea_rol'
		);
		$data = array();
		foreach ( $campos as $c)
		{
			$data[$c] = $this->input->post($c);
		}
		$data['etapa_id'] = $etapa_id;
		return $this->db->insert('tareas', $data);
	}
	
	function editar()
	{
		$tarea_id = $this->uri->segment(3);
		$campos = array(
			'tarea_nombre',
			'tarea_orden',
			'tarea_rol'			
		);
		$data = array();
		foreach ( $campos as $c)
		{
			$data[$c] = $this->input->post($c);
		}
		return $this->db->where(array('tarea_id' => $this->uri->segment(3)))->update('tareas', $data);		
	}
	
	function eliminar($tarea_id = NULL)
	{
		$this->db->delete('tareas', array('tarea_id' => $tarea_id));
		return $this->db->affected_rows();
	}
	
	function existe($tarea_id = NULL)
	{
		if ( ! is_null($tarea_id))
		{
			$tarea = $this->db->get_where('tareas', array('tarea_id' => $tarea_id));
			if ( $tarea->num_rows() > 0) return true;
			else return false;
		}
		return false;		
	}
}