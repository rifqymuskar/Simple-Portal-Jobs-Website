<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Company extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->view = $this->router->fetch_class()."/".$this->router->fetch_method();
	}
	public function index()
	{
		$this->template->render($this->view);
	}
	public function jobs()
	{
		$table = $this->router->fetch_method();
		$data['fields'] = $this->db->list_fields($table);
		$data['data'] = $this->db->where('users_id', $this->ion_auth->get_user_id())->get($table)->result();

		$this->template->render($this->view, $data);
	}

}