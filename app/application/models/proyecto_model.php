<?php if ( ! defined('BASEPATH')) exit('Acceso directo no permitido');
class Proyecto_model extends CI_Model
{
	
	/* Lo que está con doble slash es parte del código original  */
	
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function obtener($proyecto_id = NULL)
	{
		if ( ! is_null($proyecto_id))
		{
			return $this->db->get_where('proyectos', array('proyecto_id' => $proyecto_id))->row();
		}
		else
		{
			return $this->db->order_by('proyecto_id', 'desc')->get('proyectos');
		}
	}
	
		public function obtener_campos_de_las_etapas($proyecto_id, $etapa_campo_id)
	{
/* 		if ( ! is_null($proyecto_id))
		{
			return $this->db->get_where('etapas_v2_campos', array('proyecto_id' => $proyecto_id))->row();
		}
		else
		{
			return $this->db->order_by('proyecto_id', 'desc')->get('proyectos');
		}
		 */
		
		$this->db->select('etapa_v2_campo_contenido');
		$this->db->from('etapas_v2_campos');
		$this->db->where('proyecto_id', $proyecto_id); 
		$this->db->where('etapa_campo_id', $etapa_campo_id); 
		
		$campos_de_las_etapas =  $this->db->get();
		
			if ( $campos_de_las_etapas->num_rows() > 0)
			{
			//	$row = $campos_de_las_etapas->row();   
			//	echo $row->etapa_v2_campo_contenido;
				
				$row = $campos_de_las_etapas->row_array(); 
				return $row['etapa_v2_campo_contenido'];
			}
			else return false;
		
		
	}
	
	
	public function ingresar()
	{
		$campos = array(
			'proyecto_nombre',
			'proyecto_tipo',
			'proyecto_cliente',
			'proyecto_linea',
			'proyecto_area'
		);
		$data = array();

		foreach ( $campos as $c)
		{
			$data[$c] = $this->input->post($c);
		}
		
//		$data['etapa_id'] = $this->obtener_primera_etapa();
		/* la línea de abajo está adaptada para ingresar un proyecto desde la etapa 1  */
		$data['proyecto_etapa_actual'] = $this->obtener_primera_etapa();
//		$data['tarea_id'] = $this->obtener_primera_tarea();		
	
		if ( $this->db->insert('proyectos', $data))
		{
			$proyecto_id = $this->db->insert_id();
			$this->db->insert('logs', array(
				'log_descripcion' => 'Se ingresó un nuevo proyecto llamado '.$data['proyecto_nombre'],
				'proyecto_id' => $proyecto_id,
				'usuario_id' => $this->auth->get_id()
			));
			$this->db->insert('procesos', array(
				//'etapa_id' => $data['etapa_id'],
				/* la línea de abajo está adaptada  */
				'etapa_v2_id' => $data['proyecto_etapa_actual'],
				//'tarea_id' => $data['tarea_id'],
				/* la línea de abajo está adaptada  */
				'tarea_id' => 0,
				'usuario_id' => $this->auth->get_id(),
				'proceso_terminado' => 0,
				'proyecto_id' => $proyecto_id
			));
			/* las 3 líneaa de abajo fueron creadas  */
			/* Este insert para que en el Escritorio muestre los proyectos que maneja el usuario  */
			
			$this->db->insert('proyectos_usuarios', array(
				'usuario_id' => $this->auth->get_id(),
				'proyecto_id' => $proyecto_id
			));
			
			return true;
		}
		else return false;
	}
	
	public function eliminar($proyecto_id = NULL)
	{
		$this->db->delete('proyectos', array('proyecto_id' => $proyecto_id));
		if ( $this->db->affected_rows() > 0)
		{
			$this->db->insert('logs', array(
				'log_descripcion' => 'Se eliminó el proyecto ID: '.$proyecto_id,
				'usuario_id' => $this->auth->get_id()
			));
			return true;
		}
		
		else return false;		
	}
	
	public function existe($proyecto_id = NULL)
	{
		if ( ! is_null($proyecto_id))
		{
			$proyecto = $this->db->get_where('proyectos', array('proyecto_id' => $proyecto_id));
			if ( $proyecto->num_rows() > 0) return true;
			else return false;
		}
		return false;			
	}
	
	public function ingresar_info()
	{
		$proyecto_id = $this->uri->segment(3);
		$campos = array(
			'ejecutivo_negocios_id',
			'ejecutivo_servicios_id',
			'proyecto_area',
			'proyecto_ingreso_proyectado',
			'proyecto_costo_proyectado',
			'proyecto_ft_proyectada',
			'proyecto_ingreso_real',
			'proyecto_costo_real',
			'proyecto_ft_real'
		);
		$data = array();
		foreach ( $campos as $c)
		{
			$data[$c] = $this->input->post($c);
		}
		$this->db->where(array('proyecto_id' => $proyecto_id))->update('proyectos', $data);
		if ( $this->db->affected_rows() > 0)
		{
			$this->db->insert('logs', array(
				'log_descripcion' => 'Se ingresó información adicional al proyecto ID: <a href="'.site_url('proyecto/ingresar_info/').'/'.$proyecto_id.'">'.$proyecto_id.'</a>',
				'usuario_id' => $this->auth->get_id()
			));
			return true;			
		}
		else return false;
	}
	
	public function editar()
	{
		$campos = array(
			'proyecto_nombre',
			'proyecto_tipo',
			'proyecto_cliente',
			'proyecto_linea',
			'proyecto_area'
		);
		$data = array();
		foreach ( $campos as $c)
		{
			$data[$c] = $this->input->post($c);
		}
		$this->db->where(array('proyecto_id' => $this->uri->segment(3)))->update('proyectos', $data);
		if ( $this->db->affected_rows() > 0)
		{
			$this->db->insert('logs', array(
				'log_descripcion' => 'Se editó el proyecto ID: <a href="'.site_url('proyecto/ingresar_info/').'/'.$this->uri->segment(3).'">'.$this->uri->segment(3).'</a>',
				'proyecto_id' => $this->uri->segment(3),
				'usuario_id' => $this->auth->get_id()
			));
			return true;
		}
		else return false;
	}
	
	
	public function obtener_primera_etapa()
	{
// 		$etapas = $this->db->order_by('etapa_orden', 'asc')->get('etapas');
//		if ( $etapas->num_rows() > 0)
//		{
//			$etapa = $etapas->row();
//			return $etapa->etapa_id;
//		}
//		else return NULL;
		
		/* las 7 líneaa de abajo fueron creadas  */
		
		$etapas = $this->db->order_by('etapa_v2_id', 'asc')->get('etapas_v2');
		if ( $etapas->num_rows() > 0)
		{
			$etapa = $etapas->row();
			return $etapa->etapa_v2_id;
		}
		else return NULL;
		
	}
	
	public function obtener_primera_tarea()
	{
		$etapa_id = $this->obtener_primera_etapa();
		if ( ! is_null($etapa_id))
		{
			$tareas = $this->db->order_by('tarea_orden', 'asc')->get('tareas');
			if ( $tareas->num_rows() > 0)
			{
				$tarea = $tareas->row();
				return $tarea->tarea_id;
			}
			else return NULL;
		}
		else return NULL;
	}	
}