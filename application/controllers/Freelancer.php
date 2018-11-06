<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Freelancer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->view = $this->router->fetch_class()."/".$this->router->fetch_method();

		$this->change_point();
	}
	public function index()
	{
		$this->template->render($this->view);
	}
	public function jobs()
	{
		$table = $this->router->fetch_method();
		$data['fields'] = $this->db->list_fields($table);

		$proposal = $this->db->select('jobs_id')->where('users_id', $this->ion_auth->get_user_id())->get('proposal')->result_array();
		$poin = $this->db->select('point')->where('user_id', $this->ion_auth->get_user_id())->get('users_rank')->row('point');
		if($poin > 0){
			if(isset($proposal) && !empty($proposal)){

				foreach ($proposal as $key => $value) {
				$array[$key] = $proposal[$key]['jobs_id'];
				}

				$a = $this->db->where_not_in('id', $array)->get('jobs')->result();
				foreach ($a as $key1 => $value1) {
					$a[$key1]->status = 'upload';
				}
				$b = $this->db->where_in('id', $array)->get('jobs')->result();
				foreach ($b as $key2 => $value2) {
					$b[$key2]->status = 'uploaded';
				}
				$data['data']  = array_merge($a, $b);

			}else{
				$c = $this->db->get('jobs')->result();
				foreach ($c as $key3 => $value3) {
						$c[$key3]->status = 'upload';
					}
				$data['data'] = $c;
			}
		}else{
			$c = $this->db->get('jobs')->result();
			foreach ($c as $key3 => $value3) {
					$c[$key3]->status = 'uploaded';
				}
			$data['data'] = $c;
		}
		
		// $this->db->select('jobs.id as id, jobs.users_id as users_id, judul, jobs.date as date');    
		// $this->db->from('jobs');
		// $this->db->join('proposal', 'jobs.id = proposal.jobs_id');

		// $data['data1'] = $this->db->get()->result();

		$this->template->render($this->view, $data);
	}

	private function change_point()
	{
		$tanggal = $this->db->get('users_rank')->result();
		foreach ($tanggal as $key => $value) {
			$old_date_timestamp = strtotime($value->last_update);
			$new_date = date('Y-m-d H:i:s', $old_date_timestamp);  
			$day = date('d', $old_date_timestamp);  
			if($day == 06 && $new_date > date('Y-m-d H:i:s')){
				switch ($value->rank_id) {
					case 1:
						$a['point'] = 40;
						$a['last_update'] = date('Y-m-d H:i:s');

						$this->db->where('user_id', $this->ion_auth->get_user_id())->update('users_rank', $a);
						break;
					case 2:
						$a['point'] = 20;
						$a['last_update'] = date('Y-m-d H:i:s');

						$this->db->where('user_id', $this->ion_auth->get_user_id())->update('users_rank', $a);
						break;
				}
			}
		}		
	}

}