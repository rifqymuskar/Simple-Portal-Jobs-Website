<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Ajax extends CI_Controller
{
	public function post($table="", $jobs_id="")
	{

		$this->load->helper('form');
    	$this->load->library('form_validation');

		$data = $this->input->post(NULL, TRUE);

		foreach ($data as $key => $value) {
			$this->form_validation->set_rules($key, $key, 'required');
		}

		$data['users_id'] = $this->ion_auth->get_user_id();
		$data['date'] = date('Y-m-d H:i:s');


        if ($this->form_validation->run() != FALSE)
        {
			if($table == "proposal"){
				$this->insert_proposal($table, $jobs_id, $data);
			}
			if($table == "jobs"){
				$this->insert_jobs($table, $data);
			}

        }else{
            echo 'validation_errors()';
        }

	}

	public function get($table="")
	{
		$id = $this->input->get('id');
		$query['data'] = $this->db->where('jobs_id', $id)->get($table)->result();
		$query['table'] = $this->db->list_fields($table);
		echo json_encode($query);
	}

	private function insert_proposal($table="", $jobs_id="", $data=array())
	{
		$get_pts = $this->db->select('point')->where('user_id', $this->ion_auth->get_user_id())->get('users_rank')->row('point');
		if($get_pts >= 0){

			$this->db->set('point', 'point-2', FALSE)->where('user_id', $data['users_id'])->update('users_rank');

			if($jobs_id){
				$data['jobs_id'] = $jobs_id;
			}

			$myDate = new DateTime($data['date']);
			$formattedDate = $myDate->format('d M Y');

			$config['upload_path']          = './assets/proposal';
	        $config['allowed_types']        = 'pdf';
	        $config['file_name']        = $jobs_id."_".$data['users_id']."_".$formattedDate;

			$this->load->library('upload', $config);

            if ($this->upload->do_upload('proposal'))
            {
                 $file = array('upload_data' => $this->upload->data());
                 $data['file'] = $file['upload_data']['file_name'];
            }

			$this->db->insert($table, $data);

			if($this->db->affected_rows() > 0){
				echo "sukses";
			}else{
				echo "gagal memasukkan data " . $table;
			}

		}else{
			echo "gagal, anda tidak cukup poin";
		}
	}

	private function insert_jobs($table="", $data=array())
	{
		$check = $this->db->where('judul', $data['judul'])->get('jobs')->num_rows();
		if($check == 0){
			$this->db->insert($table, $data);

			if($this->db->affected_rows() > 0){
				echo "sukses";
			}else{
				echo "gagal memasukkan data jobs ".$table;
			}
			
		}else{
			echo "gagal, judul yang anda masukkan sudah ada";
		}
		
	}
}