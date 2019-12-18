<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

    public function index()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_role');
        redirect('login');
        exit;
    }

}

/* End of file Logout.php */
