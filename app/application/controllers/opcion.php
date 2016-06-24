<?php if ( ! defined('BASEPATH')) exit('Acceso Directo no Permitido');
class Opcion extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ( ! $this->auth->check()) redirect('usuario/entrar');
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->load->model(array('opcion_model'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
	}
	
	public function index()
	{
		// Nada por defecto
	}
	
	public function administrar()
	{
		if ( $this->auth->check('admin')): 
		$opcion = $this->opcion_model->obtener();
		$this->_view('opcion/administrar_opcion', array('opcion' => $opcion));
		endif;
	}
	
	public function ingresar()
	{
		if ( $this->auth->check('admin')): 
		if ( $this->form_validation->run('ingresar_opcion') == FALSE)
		{
			$this->_view('opcion/ingresar_opcion');
		}
		else
		{
			if ( $this->opcion_model->ingresar())
			{
				$this->session->set_flashdata('mensaje', 'Se agregó exitosamente la opción');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Ocurrió un error al ingresar la opción');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');				
			}
			redirect('opcion/administrar');
		}
		 endif;
	}
	
	public function editar()
	{
		if ( $this->auth->check('admin')): 
		$opcion_id = $this->uri->segment(3);
		if ( is_numeric($opcion_id))
		{
			if ( $this->opcion_model->existe($opcion_id))
			{
				$opcion = $this->opcion_model->obtener($opcion_id);
				if ( $this->form_validation->run('editar_opcion') == FALSE)
				{
					$this->_view('opcion/editar_opcion', array('opcion' => $opcion));
				}
				else
				{
					if ( $this->opcion_model->editar())
					{
						$this->session->set_flashdata('mensaje', 'Se editó exitosamente la opción');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
					}
					else
					{
						$this->session->set_flashdata('mensaje', 'Ocurrió un error al editar la opción');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');				
					}
					redirect('opcion/administrar');					
				}							
			}
		}
		 endif;
	}
	
	public function eliminar()
	{
		if ( $this->auth->check('admin')): 
		if ( $this->input->is_ajax_request())
		{
			$opcion_id = $this->uri->segment(3);
			if ( is_numeric($opcion_id))
			{
				if ( $this->opcion_model->eliminar($opcion_id))
				{
					$this->session->set_flashdata('mensaje', 'El registro se eliminó exitosamente');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-success');					
					echo json_encode(array('success' => true));
				}
				else echo json_encode(array('success' => false));
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Ocurrió un error al eliminar el registro');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
				echo json_encode(array('success' => false));
			}
		}
		 endif;
	}
	
	private function _view($view = 'opcion/administrar', $data = NULL, $layout = TRUE)
	{
		$data['mensaje'] = $this->session->flashdata('mensaje');
		$data['mensaje_clase'] = $this->session->flashdata('mensaje_clase');
		if ( $layout)
		{
			$this->load->view('header_app');
			$this->load->view($view, $data);
			$this->load->view('footer_app');
		}
		else
		{
			$this->load->view($view, $data);
		}		
	}
}