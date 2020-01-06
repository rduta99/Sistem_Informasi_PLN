<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->data['username'] = $this->session->userdata('username');
		$this->data['id_role'] = $this->session->userdata('id_role');
		if(isset($this->data['username'], $this->data['id_role'])) {
			switch ($this->data['id_role']) {
				case 1:
					redirect('admin');
					break;
				
				case 2:
					redirect('supervisor');
					break;

				case 3:
					redirect('personel');
					break;
			}
			exit;
		}

		$this->load->model('user_m');
	}

	public function index()
	{
		if($this->POST('login')) {
			$data = [
				'nip' => $this->POST('nip'),
				'password' => md5($this->POST('password')),
			];

			$cek = $this->user_m->get_row($data);
			if($cek == null) {
				$this->flashmsg('Username / Password salah', 'danger');
                redirect('login');
                exit;
			} else {
				$array = [
					'username' => $cek->nip,
					'id_role' => $cek->id_role
				];
				
				$this->session->set_userdata( $array );
				redirect('login');
                exit;
			}
		}
		$this->load->view('login');
	}

	public function cek_use()
	{
		$data = [
			'nip' => $this->POST('nip'),
			'password' => md5($this->POST('password'))
		];
		$cek = $this->user_m->get_row($data);
		if($cek == null) {
			$arr = ['status' => true];
			echo json_encode($arr);
		} else {
			$arr = ['status' => false];
			echo json_encode($arr);
		}
	}
}
