<?php if ( ! defined('BASEPATH')) exit('Acceso directo no permitido');
class Etapa_v2_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	
/* 	public function obtener_mi_etapa_actual()
	{
		$tareas = $this->db
			->join('tareas', 'procesos.tarea_id = tareas.tarea_id')
			->join('proyectos', 'procesos.proyecto_id = proyectos.proyecto_id')
			->join('etapas', 'procesos.etapa_id = etapas.etapa_id')
			->get_where('procesos', array('usuario_id' => $this->auth->get_id(), 'proceso_terminado' => 0));
		if ( $tareas->num_rows() > 0)
		{
			return $tareas;
		}
		else return false;
	} */
	
		public function obtener_mi_etapa_actual($proyecto_id)
	{
		$this->db->select('proyecto_etapa_actual');
		$this->db->from('proyectos');
		$this->db->where('proyecto_id', $proyecto_id); 
		
		$proyecto_actual =  $this->db->get();
		
		if ( $proyecto_actual->num_rows() > 0)
		{
			return $proyecto_actual->row()->proyecto_etapa_actual;
		}
		else return false;
	}
	
		public function obtener_nombre_de_etapa_actual($etapa_v2_id)
	{
		$this->db->select('etapa_v2_nombre');
		$this->db->from('etapas_v2');
		$this->db->where('etapa_v2_id', $etapa_v2_id); 
		
		$nombre_etapa_actual =  $this->db->get();
		
		if ( $nombre_etapa_actual->num_rows() > 0)
		{
			return $nombre_etapa_actual->row()->etapa_v2_nombre;
		}
		else return false;
	}
	
	
		public function obtener_nombre_del_proyecto($proyecto_id)
	{
		$this->db->select('proyecto_nombre');
		$this->db->from('proyectos');
		$this->db->where('proyecto_id', $proyecto_id); 
		
		$nombre_proyecto =  $this->db->get();
		
		if ( $nombre_proyecto->num_rows() > 0)
		{
			return $nombre_proyecto->row()->proyecto_nombre;
		}
		else return false;
	}
	
		public function actualizar_proyecto($etapa_actual, $proyecto_id)
	{
		$numero_de_etapa_actual = $etapa_actual + 1;
		$data = array(
            'proyecto_etapa_actual' => $numero_de_etapa_actual
			);

		$this->db->where('proyecto_id', $proyecto_id);
		$proyecto_actualizado = $this->db->update('proyectos', $data); 

		if ( $proyecto_actualizado )
		{
			return $proyecto_actualizado;
		}
		else return false;
	}
	
	public function disminuir_una_etapa($etapa_actual, $proyecto_id)
	{
		$numero_de_etapa_actual = $etapa_actual - 1;
		$data = array(
            'proyecto_etapa_actual' => $numero_de_etapa_actual
			);

		$this->db->where('proyecto_id', $proyecto_id);
		$proyecto_actualizado = $this->db->update('proyectos', $data); 

		if ( $proyecto_actualizado )
		{
			return $proyecto_actualizado;
		}
		else return false;
	}
	
		public function eliminar_registros_al_rechazar_etapa($etapa_actual, $proyecto_id)
	{
		$numero_de_etapa_actual = $etapa_actual - 1;
		
		$this->db->where('proyecto_id',$proyecto_id);
		$this->db->where('etapa_v2_id',$numero_de_etapa_actual);
		$this->db->delete('etapas_v2_campos');
		
		if ( $this->db->affected_rows() > 0)
		{
			$this->db->where('proyecto_id',$proyecto_id);
			$this->db->where('etapa_v2_id',$numero_de_etapa_actual);
			$this->db->delete('procesos_v2');
			return true;
		}
		else return false;		
	}
	
	
	
		function obtener_proyecto ($etapa_v2 = NULL)
	// funcion que une las tablas (join) tareas, proyectos, etapas y selecciona procesos por un proceso especifico (where proceso_id)
	{
		//if ( ! is_null($etapa_v2))
		//{
			$etapa_v2 = $this->db
							//->join('tareas', 'procesos.tarea_id = tareas.tarea_id', 'inner')
							//->join('proyectos', 'procesos.proyecto_id = proyectos.proyecto_id')
							//->join('etapas_v2', 'procesos.etapa_v2_id = etapas_v2.etapa_v2_id')
							->get_where('proyectos_usuarios', array('proyecto_id' => $etapa_v2));
			if ( $etapa_v2->num_rows() > 0)
			{
				return $etapa_v2;
			}
			else return false;
		//}
//		else return false;
	}
	
	public function obtener_fecha_del_proyecto($proyecto_id)
	{
		$this->db->select('proyecto_fecha_ingreso');
		$this->db->from('proyectos');
		$this->db->where('proyecto_id', $proyecto_id); 
		
		$proyecto_actual =  $this->db->get();
		
		if ( $proyecto_actual->num_rows() > 0)
		{
			return $proyecto_actual->row()->proyecto_fecha_ingreso;
		}
		else return false;
	}
	
		public function obtener_fecha_de_la_etapa_anterior($proyecto_id, $etapa_v2_id)
	{
		$this->db->select('fecha_de_termino');
		$this->db->from('procesos_v2');
		$this->db->where('etapa_v2_id', $etapa_v2_id  - 1); 
		$this->db->where('proyecto_id', $proyecto_id); 
		
		
		$fecha_de_la_etapa_anterior =  $this->db->get();
		
			if ( $fecha_de_la_etapa_anterior->num_rows() > 0)
			{
				$row = $fecha_de_la_etapa_anterior->row_array(); 
				return $row['fecha_de_termino'];
			}
			else return false;
		
	}
	
	public function insert_fecha($proyecto_id,$etapa_actual,$fecha_final){
		if($etapa_actual == 1){
			$fecha_inicial = $this->obtener_fecha_del_proyecto($proyecto_id);
			$query = $this->db->insert('procesos_v2', array('proyecto_id'=>$proyecto_id, 'etapa_v2_id'=>$etapa_actual, 'fecha_de_inicio'=>$fecha_inicial, 'fecha_de_termino'=>$fecha_final));
		}
		else{
			if($etapa_actual > 1){
				$fecha_inicial = $this->obtener_fecha_de_la_etapa_anterior($proyecto_id,$etapa_actual);
				$query = $this->db->insert('procesos_v2', array('proyecto_id'=>$proyecto_id, 'etapa_v2_id'=>$etapa_actual, 'fecha_de_inicio'=>$fecha_inicial, 'fecha_de_termino'=>$fecha_final));
			}
			else {
			return false;			
			}
		}
			
	}
	

	public function insert_etapa_1($etapa_v2_id, $proyecto_id, $usuario_id, $nombre_proyecto,$cliente,$tipo_de_proyecto,$linea_de_negocio,$adjuntar_archivo,$direccion,$telefono,$email,$bitacora,$rut){
		if($etapa_v2_id >= 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'1', 'etapa_v2_campo_contenido'=>$nombre_proyecto));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'2', 'etapa_v2_campo_contenido'=>$cliente)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'3', 'etapa_v2_campo_contenido'=>$tipo_de_proyecto));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'4', 'etapa_v2_campo_contenido'=>$linea_de_negocio));			
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'5', 'etapa_v2_campo_contenido'=>$adjuntar_archivo));			
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'6', 'etapa_v2_campo_contenido'=>$direccion)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'7', 'etapa_v2_campo_contenido'=>$telefono)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'8', 'etapa_v2_campo_contenido'=>$email));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'9', 'etapa_v2_campo_contenido'=>$rut));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'10', 'etapa_v2_campo_contenido'=>$bitacora));
				
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_2($etapa_v2_id, $proyecto_id, $usuario_id, $fecha_de_inicio,$adjuntar_archivo,$contratista,$propuesta,$bitacora,$rechazar){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'12', 'etapa_v2_campo_contenido'=>$fecha_de_inicio));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'13', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'14', 'etapa_v2_campo_contenido'=>$contratista)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'15', 'etapa_v2_campo_contenido'=>$propuesta)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'17', 'etapa_v2_campo_contenido'=>$bitacora)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'16', 'etapa_v2_campo_contenido'=>$rechazar));
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_3($etapa_v2_id, $proyecto_id, $usuario_id, $fecha_de_inicio,$adjuntar_archivo,$itemizado_generico_nombre1,$itemizado_generico_nombre2,$itemizado_generico_nombre3,$itemizado_generico_nombre4,$itemizado_generico_nombre5,$itemizado_generico_nombre6,$itemizado_generico_nombre7,$itemizado_generico_nombre8,$itemizado_generico_nombre9,$itemizado_generico_nombre10,$itemizado_generico_costo,$plazo_construccion,$garantia_equipo,$garantia_instalacion,$bitacora,$rechazar){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'18', 'etapa_v2_campo_contenido'=>$fecha_de_inicio));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'19', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'20', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre1)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'126', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre2));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'127', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre3));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'128', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre4));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'129', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre5));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'130', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre6));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'131', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre7));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'132', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre8));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'133', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre9));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'134', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre10));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'21', 'etapa_v2_campo_contenido'=>$itemizado_generico_costo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'22', 'etapa_v2_campo_contenido'=>$plazo_construccion)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'23', 'etapa_v2_campo_contenido'=>$garantia_equipo));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'24', 'etapa_v2_campo_contenido'=>$garantia_instalacion));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'25', 'etapa_v2_campo_contenido'=>$bitacora));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'26', 'etapa_v2_campo_contenido'=>$rechazar));
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_4($etapa_v2_id, $proyecto_id, $usuario_id, $fecha_de_inicio,$adjuntar_archivo,$margen,$bitacora,$rechazar){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'27', 'etapa_v2_campo_contenido'=>$fecha_de_inicio));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'28', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'29', 'etapa_v2_campo_contenido'=>$margen));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'30', 'etapa_v2_campo_contenido'=>$bitacora));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'31', 'etapa_v2_campo_contenido'=>$rechazar));
			
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_5($etapa_v2_id, $proyecto_id, $usuario_id, $fecha_de_inicio,$adjuntar_archivo,$margen_propuesto,$bitacora,$rechazar){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'32', 'etapa_v2_campo_contenido'=>$fecha_de_inicio));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'33', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'34', 'etapa_v2_campo_contenido'=>$margen_propuesto)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'35', 'etapa_v2_campo_contenido'=>$bitacora)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'36', 'etapa_v2_campo_contenido'=>$rechazar));
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_6($etapa_v2_id, $proyecto_id, $usuario_id, $fecha_de_inicio,$adjuntar_archivo,$bitacora,$terminar_proyecto){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'37', 'etapa_v2_campo_contenido'=>$fecha_de_inicio));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'38', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'39', 'etapa_v2_campo_contenido'=>$bitacora)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'40', 'etapa_v2_campo_contenido'=>$terminar_proyecto));
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_7($etapa_v2_id, $proyecto_id, $usuario_id, $fecha_de_inicio,$adjuntar_archivo,$margen_cierre,$bitacora,$check_orden_de_compra){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'41', 'etapa_v2_campo_contenido'=>$fecha_de_inicio));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'42', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'43', 'etapa_v2_campo_contenido'=>$margen_cierre)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'44', 'etapa_v2_campo_contenido'=>$bitacora)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'45', 'etapa_v2_campo_contenido'=>$check_orden_de_compra));
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_8($etapa_v2_id, $proyecto_id, $usuario_id, $fecha_de_inicio,$adjuntar_archivo,$fecha_de_acta_de_entrega,$bitacora,$check_se_adjunta_entrega_de_terreno,$check_boleta_garantia_ejecucion_contratista){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'46', 'etapa_v2_campo_contenido'=>$fecha_de_inicio));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'47', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'48', 'etapa_v2_campo_contenido'=>$fecha_de_acta_de_entrega)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'49', 'etapa_v2_campo_contenido'=>$bitacora)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'50', 'etapa_v2_campo_contenido'=>$check_se_adjunta_entrega_de_terreno));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'51', 'etapa_v2_campo_contenido'=>$check_boleta_garantia_ejecucion_contratista));
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_9($etapa_v2_id, $proyecto_id, $usuario_id,$adjuntar_archivo,$ingreso_de_plazo_en_dias,$bitacora,$email_adquisicion){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'52', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'53', 'etapa_v2_campo_contenido'=>$ingreso_de_plazo_en_dias)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'54', 'etapa_v2_campo_contenido'=>$bitacora)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'55', 'etapa_v2_campo_contenido'=>$email_adquisicion));
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_10($etapa_v2_id, $proyecto_id, $usuario_id,$adjuntar_archivo,$ingreso_de_plazo_en_dias,$bitacora,$ingenieria_de_detalle_aprobada,$memoria_de_calculo,$aprobacion_emplazamiento){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'56', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'57', 'etapa_v2_campo_contenido'=>$ingreso_de_plazo_en_dias)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'58', 'etapa_v2_campo_contenido'=>$bitacora)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'59', 'etapa_v2_campo_contenido'=>$ingenieria_de_detalle_aprobada));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'60', 'etapa_v2_campo_contenido'=>$memoria_de_calculo));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'61', 'etapa_v2_campo_contenido'=>$aprobacion_emplazamiento));
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_11($etapa_v2_id, $proyecto_id, $usuario_id,$adjuntar_archivo,$ingreso_de_plazo_en_dias,$bitacora,$registro_fotografico,$ipal){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'62', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'63', 'etapa_v2_campo_contenido'=>$ingreso_de_plazo_en_dias)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'64', 'etapa_v2_campo_contenido'=>$bitacora)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'65', 'etapa_v2_campo_contenido'=>$registro_fotografico));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'66', 'etapa_v2_campo_contenido'=>$ipal));
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_12($etapa_v2_id, $proyecto_id, $usuario_id,$adjuntar_archivo,$ingreso_de_plazo_en_dias,$bitacora,$itemizado_generico_nombre1,$itemizado_generico_nombre2,$itemizado_generico_nombre3,$itemizado_generico_nombre4,$itemizado_generico_nombre5,$itemizado_generico_nombre6,$itemizado_generico_nombre7,$itemizado_generico_nombre8,$itemizado_generico_nombre9,$itemizado_generico_nombre10,$itemizado_generico1,$itemizado_generico2,$itemizado_generico3,$itemizado_generico4,$itemizado_generico5,$itemizado_generico6,$itemizado_generico7,$itemizado_generico8,$itemizado_generico9,$itemizado_generico10,$itemizado_generico11,$itemizado_generico12,$itemizado_generico13,$itemizado_generico14,$itemizado_generico15,$itemizado_generico16,$itemizado_generico17,$itemizado_generico18,$itemizado_generico19,$itemizado_generico20,$registro_fotografico,$ipal){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'67', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'68', 'etapa_v2_campo_contenido'=>$ingreso_de_plazo_en_dias)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'69', 'etapa_v2_campo_contenido'=>$bitacora)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'135', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre1)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'136', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre2)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'137', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre3)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'138', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre4)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'139', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre5)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'140', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre6)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'141', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre7)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'142', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre8)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'143', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre9)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'144', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre10)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'70', 'etapa_v2_campo_contenido'=>$itemizado_generico1)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'97', 'etapa_v2_campo_contenido'=>$itemizado_generico2)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'98', 'etapa_v2_campo_contenido'=>$itemizado_generico3)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'99', 'etapa_v2_campo_contenido'=>$itemizado_generico4)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'100', 'etapa_v2_campo_contenido'=>$itemizado_generico5)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'101', 'etapa_v2_campo_contenido'=>$itemizado_generico6)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'102', 'etapa_v2_campo_contenido'=>$itemizado_generico7)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'103', 'etapa_v2_campo_contenido'=>$itemizado_generico8)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'104', 'etapa_v2_campo_contenido'=>$itemizado_generico9)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'105', 'etapa_v2_campo_contenido'=>$itemizado_generico10)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'106', 'etapa_v2_campo_contenido'=>$itemizado_generico11)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'107', 'etapa_v2_campo_contenido'=>$itemizado_generico12)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'108', 'etapa_v2_campo_contenido'=>$itemizado_generico13)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'109', 'etapa_v2_campo_contenido'=>$itemizado_generico14)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'110', 'etapa_v2_campo_contenido'=>$itemizado_generico15)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'111', 'etapa_v2_campo_contenido'=>$itemizado_generico16)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'112', 'etapa_v2_campo_contenido'=>$itemizado_generico17)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'113', 'etapa_v2_campo_contenido'=>$itemizado_generico18)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'114', 'etapa_v2_campo_contenido'=>$itemizado_generico19)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'115', 'etapa_v2_campo_contenido'=>$itemizado_generico20)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'71', 'etapa_v2_campo_contenido'=>$registro_fotografico));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'72', 'etapa_v2_campo_contenido'=>$ipal));
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_13($etapa_v2_id, $proyecto_id, $usuario_id,$adjuntar_archivo,$anexo_SEC,$pruebas_operaciones,$registro_fotografico,$fecha_de_puesta_en_marcha){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'73', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'74', 'etapa_v2_campo_contenido'=>$anexo_SEC)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'75', 'etapa_v2_campo_contenido'=>$pruebas_operaciones)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'76', 'etapa_v2_campo_contenido'=>$registro_fotografico));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'77', 'etapa_v2_campo_contenido'=>$fecha_de_puesta_en_marcha));
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_14($etapa_v2_id, $proyecto_id, $usuario_id,$adjuntar_archivo,$plazo_de_correcciones_de_observaciones,$observaciones,$observaciones_corregidas){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'78', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'79', 'etapa_v2_campo_contenido'=>$plazo_de_correcciones_de_observaciones)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'80', 'etapa_v2_campo_contenido'=>$observaciones)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'81', 'etapa_v2_campo_contenido'=>$observaciones_corregidas));	
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_15($etapa_v2_id, $proyecto_id, $usuario_id,$adjuntar_archivo,$recepcion_provisoria,$plazo_de_correcciones_de_observaciones){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'82', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'83', 'etapa_v2_campo_contenido'=>$recepcion_provisoria)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'84', 'etapa_v2_campo_contenido'=>$plazo_de_correcciones_de_observaciones)); 	
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_16($etapa_v2_id, $proyecto_id, $usuario_id,$adjuntar_archivo,$itemizado_generico_nombre1,$itemizado_generico_nombre2,$itemizado_generico_nombre3,$itemizado_generico_nombre4,$itemizado_generico_nombre5,$itemizado_generico_nombre6,$itemizado_generico_nombre7,$itemizado_generico_nombre8,$itemizado_generico_nombre9,$itemizado_generico_nombre10,$itemizado_generico1,$itemizado_generico2,$itemizado_generico3,$itemizado_generico4,$itemizado_generico5,$itemizado_generico6,$itemizado_generico7,$itemizado_generico8,$itemizado_generico9,$itemizado_generico10,$boleta_periodo_garantia_contratista){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'85', 'etapa_v2_campo_contenido'=>$adjuntar_archivo));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'145', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre1));			
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'146', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre2));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'147', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre3));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'148', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre4));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'149', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre5));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'150', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre6));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'151', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre7));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'152', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre8));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'153', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre9));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'154', 'etapa_v2_campo_contenido'=>$itemizado_generico_nombre10));
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'86', 'etapa_v2_campo_contenido'=>$itemizado_generico1)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'116', 'etapa_v2_campo_contenido'=>$itemizado_generico2)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'117', 'etapa_v2_campo_contenido'=>$itemizado_generico3)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'118', 'etapa_v2_campo_contenido'=>$itemizado_generico4)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'119', 'etapa_v2_campo_contenido'=>$itemizado_generico5)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'120', 'etapa_v2_campo_contenido'=>$itemizado_generico6)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'121', 'etapa_v2_campo_contenido'=>$itemizado_generico7)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'122', 'etapa_v2_campo_contenido'=>$itemizado_generico8)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'123', 'etapa_v2_campo_contenido'=>$itemizado_generico9)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'124', 'etapa_v2_campo_contenido'=>$itemizado_generico10)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'87', 'etapa_v2_campo_contenido'=>$boleta_periodo_garantia_contratista)); 	
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_17($etapa_v2_id, $proyecto_id, $usuario_id,$adjuntar_archivo,$acta_de_capacitacion,$fecha_de_capacitacion){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'88', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'89', 'etapa_v2_campo_contenido'=>$acta_de_capacitacion)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'90', 'etapa_v2_campo_contenido'=>$fecha_de_capacitacion)); 	
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_18($etapa_v2_id, $proyecto_id, $usuario_id,$adjuntar_archivo,$entrega_manuales_equipos,$acta_de_garantia_y_postventa){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'91', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'92', 'etapa_v2_campo_contenido'=>$entrega_manuales_equipos)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'93', 'etapa_v2_campo_contenido'=>$acta_de_garantia_y_postventa)); 	
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_19($etapa_v2_id, $proyecto_id, $usuario_id,$adjuntar_archivo,$bitacora,$archivos_fotograficos){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'94', 'etapa_v2_campo_contenido'=>$adjuntar_archivo)); 	
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'95', 'etapa_v2_campo_contenido'=>$bitacora)); 
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'96', 'etapa_v2_campo_contenido'=>$archivos_fotograficos)); 	
		}
		else{
			return false;			
		}
			
	}
	
	public function insert_etapa_20($etapa_v2_id, $proyecto_id, $usuario_id,$cuadro_check_acta_recepcion_definitiva){
		if($etapa_v2_id > 1){
			$query = $this->db->insert('etapas_v2_campos', array('etapa_v2_id'=>$etapa_v2_id, 'proyecto_id'=>$proyecto_id, 'usuario_id'=>$usuario_id, 'etapa_campo_id'=>'125', 'etapa_v2_campo_contenido'=>$cuadro_check_acta_recepcion_definitiva)); 	
		}
		else{
			return false;			
		}
			
	}
	
	public function terminar_proyecto($proyecto_id)
	{
		
		if ($proyecto_id > 0){

			
			$data = array('proyecto_terminado' => 1);

			$this->db->where('proyecto_id', $proyecto_id);
			$this->db->update('proyectos', $data); 
		}
	}
	
}