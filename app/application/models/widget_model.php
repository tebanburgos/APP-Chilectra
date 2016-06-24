<?php if ( ! defined('BASEPATH')) exit('Acceso directo no permitido');
class Widget_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
/* 	public function obtener_ultimos_proyectos()
	{
		$ultimos_proyectos = $this->db->order_by('proyecto_fecha_ingreso', 'ASC')->limit(5)->get('proyectos');
		if ( $ultimos_proyectos->num_rows() > 0) return $ultimos_proyectos;
		else return false;
	}
	
	public function obtener_actividad_reciente()
	{
		$actividad_reciente = $this->db->order_by('log_fecha', 'DESC')->limit(5)->get('logs');
		if ( $actividad_reciente->num_rows() > 0) return $actividad_reciente;
		else return false;		
	} */
	
	public function obtener_rol_del_usuario()
	{
		$this->db->select('rol');
		$this->db->from('usuarios');
		$this->db->where('usuario_id', $this->auth->get_id()); 
		
		$rol =  $this->db->get();
		
		if ( $rol->num_rows() > 0)
		{
			return $rol->row()->rol;
		}
		else return false;
	}
	
	public function obtener_responsable_de_la_etapa($etapa_v2_id)
	{
		$this->db->select('etapa_v2_responsable');
		$this->db->from('etapas_v2');
		$this->db->where('etapa_v2_id`', $etapa_v2_id); 
		
		$responsable =  $this->db->get();
		
		if ( $responsable->num_rows() > 0)
		{
			return $responsable->row()->etapa_v2_responsable;
		}
		else return false;
	}
	
	public function obtener_mis_tareas()
	{
		/*
		SELECT `proyectos`.`proyecto_id`, `proyectos`.`proyecto_nombre`, `etapas_v2`.`etapa_v2_nombre`, `etapas_v2_campos`.`etapa_v2_id`, `etapas_v2_campos`.`etapa_campo_id`, 
		`etapas_campos`.`etapa_campo_nombre`, `etapas_v2_campos`.`usuario_id` FROM `proyectos` 
		INNER JOIN `etapas_v2_campos` ON `proyectos`.`proyecto_id` = `etapas_v2_campos`.`proyecto_id` 
		INNER JOIN `etapas_campos` ON `etapas_v2_campos`.`etapa_campo_id` = `etapas_campos`.`etapa_campo_id`
		INNER JOIN `etapas_v2` ON `etapas_v2_campos`.`etapa_v2_id` = `etapas_v2`.`etapa_v2_id`
		WHERE `proyectos`.`proyecto_etapa_actual` = 1
		
		*/
		
		/*
		
		$tareas = $this->db
			->join('proyectos_usuarios', 'proyectos_usuarios.proyecto_id = proyectos.proyecto_id')
			->join('etapas_v2', 'proyectos.proyecto_etapa_actual = etapas_v2.etapa_v2_id')
			->get_where('proyectos', array('usuario_id' => $this->auth->get_id()));
		if ( $tareas->num_rows() > 0)
		{
			return $tareas;
		}

		else return false;
		*/
		
		$rol_del_usuario = $this->obtener_rol_del_usuario($this->auth->get_id());
		

		
		$this->db->select('*');
		$this->db->from('proyectos');
		$this->db->join('etapas_v2', 'proyectos.proyecto_etapa_actual = etapas_v2.etapa_v2_id');
		$where = '(ejecutivo_servicios_id='.$this->auth->get_id().' or ejecutivo_negocios_id ='.$this->auth->get_id().' and proyecto_terminado != 1)';
		$this->db->where($where);
		$this->db->order_by('proyecto_fecha_ingreso', 'DESC');
		$tareas =  $this->db->get();
		
	//	$tareas = $this->db
		//	->join('proyectos_usuarios', 'proyectos_usuarios.proyecto_id = proyectos.proyecto_id')
		//	->join('etapas_v2', 'proyectos.proyecto_etapa_actual = etapas_v2.etapa_v2_id')
		//	->get_where('proyectos', array('usuario_id' => $this->auth->get_id()));
		if ( $tareas->num_rows() > 0)
		{
			return $tareas;
		}
		else return false;
	}
}