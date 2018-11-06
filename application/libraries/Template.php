<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Template {
	function __construct()
	{
		$this->ini =&get_instance();
		$this->ini->load->database();
		$this->ini->load->library('ion_auth');
		
		$this->layout = 'template/index.php';
		$this->groupname = $this->ini->ion_auth->get_users_groups()->row()->name;
	}

	// public function set_template($isi='')
	// {
		
	// 	return $this;
	// }
	public function render($isi='', $data=array())
	{
		$data['poin'] = $this->ini->db->select('point')->where('user_id', $this->ini->ion_auth->get_user_id())->get('users_rank')->row('point');
		$data['navbar'] = $this->ini->load->view('template/navbar/'.$this->groupname, $data, true);

		$data['content'] = $this->ini->load->view($isi, $data, true);

		$this->ini->load->view($this->layout, $data);
	}

	public function css($css='')
	{
		echo "<link href='".site_url("assets/css/".$css.".css")."' rel='stylesheet' type='text/css'/>";
	}
	public function js($js='')
	{
		echo "<script src='".site_url("assets/js/".$js.".js")."'></script>";
	}
}