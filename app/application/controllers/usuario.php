<?php if ( ! defined('BASEPATH')) exit('Acceso Directo no Permitido');
Class Usuario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->load->model(array('usuario_model'));
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
	}
	
	public function index()
	{
		// Nada por defecto
	}
	
	public function entrar()
	{
		if ( $this->auth->check()) redirect('escritorio');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
		if ( $this->form_validation->run('entrar') == FALSE )
		{
			$this->load->view('header');
			$this->_view('usuario/entrar', NULL, FALSE);	
			$this->load->view('footer');
		}
		else
		{
			if ( $this->auth->login($this->input->post('usuario'), $this->input->post('clave')) )
			{
				redirect('escritorio/escritorio');
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Usuario y/o contraseña incorrectos, o su cuenta aún no ha sido autorizada por un Administrador');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
				redirect('usuario/entrar');
			}
		}
	}
	
	public function salir()
	{
		$this->auth->logout();
		redirect('usuario/entrar');
	}
	
	public function administrar()
	{
		if ( $this->auth->check('admin')): 
		$usuario = $this->usuario_model->obtener();
		$this->_view('usuario/administrar_usuario', array('usuario' => $usuario));
		endif;
	}
	
	
	public function ingresar()
	{
		if ( $this->auth->check('admin')): 
		$this->load->library('form_validation');
		$this->load->helper('form');
		if ( $this->form_validation->run('ingresar_usuario') == FALSE )
		{
			$permiso = $this->usuario_model->permiso();
			$this->_view('usuario/ingresar_usuario', array('permiso' => $permiso));
		}
		else
		{
			if ( $this->usuario_model->ingresar() )
			{
				$this->session->set_flashdata('mensaje', 'Usuario ingresado exitosamente');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
				redirect('usuario/administrar');
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Ocurrió un error al ingresar el usuario. Por favor inténtelo nuevamente');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
				redirect('usuario/administrar');
			}
		}
		endif;
	}	

	public function editar()
	{
		if ( $this->auth->check('admin')): 
		if ( is_numeric($this->uri->segment(3)))
		{
			if ( $this->usuario_model->existe($this->uri->segment(3)))
			{
				$usuario_id = $this->uri->segment(3);
				$usuario = $this->usuario_model->obtener($usuario_id);
				$permiso = $this->usuario_model->permiso();
				$permiso_bd = unserialize($usuario->permiso);
				$this->load->library('form_validation');
				$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
				$this->load->helper('form');
				if ( $this->form_validation->run('editar_usuario') == FALSE)
				{
					$this->_view('usuario/editar_usuario', array('usuario' => $usuario, 'permiso' => $permiso, 'permiso_bd' => $permiso_bd));
				}
				else
				{
					if ( $this->usuario_model->editar() )
					{
						$this->session->set_flashdata('mensaje', 'Usuario actualizado exitosamente');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-success');						
						redirect('usuario/administrar');
					}
					else
					{
						$this->session->set_flashdata('mensaje', 'Ocurrió un error al actualizar el Usuario');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');							
						redirect('usuario/administrar');
					}
				}
			}
			else echo "Usuario no existente";
		}
		endif;
	}
	
	public function eliminar()
	{
		if ( $this->auth->check('admin')): 
		$usuario_id = (int)$this->uri->segment(3);
		if ( $this->usuario_model->eliminar($usuario_id) )
		{
			$this->session->set_flashdata('mensaje', 'Usuario eliminado exitosamente');
			$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
			echo json_encode(array('success' => true));
		}
		else
		{
			echo json_encode(array('success' => false));
		}
		endif;
	}
	
	public function recuperar_clave()
	{
		$this->load->library('email');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ( $this->form_validation->run('recuperar_clave') == false )
		{			
			$this->load->view('header');
			$this->_view('usuario/recuperar_clave', NULL, FALSE);
			$this->load->view('footer');			
		}
		else
		{
			if ( $this->auth->recuperar($this->input->post('email')) )
			{
				$this->session->set_flashdata('mensaje', 'Hemos enviado un correo electrónico con las instruciones para recuperar su contraseña');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-info');
				redirect('usuario/entrar');
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Este email no se encuentra registrado');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-info');
				$this->load->view('header');
				$this->_view('usuario/recuperar_clave', NULL, FALSE);
				$this->load->view('footer');
			}
		}		
	}
	
	function cambiar_clave()
	{
		$token_recuperar_clave = $this->uri->segment(3);
		$token_sesion = $this->session->flashdata('token_recuperar_clave');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
		if ( ! empty($token_recuperar_clave) )
		{
			$usuario = $this->db->get_where('usuarios', array('token_recuperar_clave' => $this->uri->segment(3)))->row();
			if (count($usuario) == 1)
			{
				$this->session->set_flashdata('token_recuperar_clave', $token_recuperar_clave);
			}
			else redirect('usuario/entrar');
		}
		elseif ( ! empty($token_sesion) )
		{
			$token_recuperar_clave = $this->session->flashdata('token_recuperar_clave');
			$this->session->keep_flashdata('token_recuperar_clave');
		}
		elseif ( $this->auth->check()) $token_recuperar_clave = NULL;
		else redirect('usuario/entrar');
		if ( $this->form_validation->run('cambiar_clave') == FALSE )
		{
				$this->_view('usuario/cambiar_clave');
		}
		else
		{
			$clave = $this->input->post('clave');
			$hash = crypt($clave);
			if ( empty($token_recuperar_clave) && $this->auth->check() )
			{
				$this->db->where(array('usuario_id' => $this->auth->get_id()));
			}
			else
			{
				$this->db->where(array('token_recuperar_clave' => $token_recuperar_clave))	;
			}
			$this->db->update('usuarios', array('clave' => $hash));
			$this->session->set_flashdata('mensaje', 'Contraseña cambiada exitosamente');
			$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
			redirect('usuario/entrar');
		}
	}		
	
	private function _view($view = 'usuario/administrar', $data = NULL, $layout = TRUE)
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

?>