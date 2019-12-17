<?php

class MY_Controller extends CI_Controller
{
  public $title = 'Sistem Informasi Peralatan';
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('lib_log');
	}

	public function template($data, $role = '')
	{
      if ($role == 'admin') {
        return $this->load->view('admin/template/template', $data);
      } elseif ($role == 'admin') {
        return $this->load->view('admin/template/layout', $data);
      }  elseif ($role == 'admin-ormawa') {
        return $this->load->view('admin-ormawa/template/layout', $data);
      }elseif ($role == 'super-admin') {
        return $this->load->view('super-admin/template/layout', $data);
      }elseif ($role == 'admindinas') {
        return $this->load->view('admindinas/template/layout', $data);
      }
      return false;
	}

	public function POST($name)
	{
		return $this->input->post($name);
	}

	public function flashmsg($msg, $type = 'success',$name='msg')
	{
		return $this->session->set_flashdata($name, '<div class="alert alert-'.$type.' alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$msg.'</div>');
	}

	public function upload($id, $directory, $tag_name = 'userfile')
	{
		if ($_FILES[$tag_name])
		{
			$upload_path = realpath(APPPATH . '../assets/img/' . $directory . '/');
			@unlink($upload_path . '/' . $id . '.jpg');
			$config = [
				'file_name' 		=> $id . '.jpg',
				'allowed_types'		=> 'jpg|png|bmp|jpeg',
				'upload_path'		=> $upload_path
			];
			$this->load->library('upload');
			$this->upload->initialize($config);
			return $this->upload->do_upload($tag_name);
		}
		return FALSE;
	}

	public function dump($var)
	{
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
