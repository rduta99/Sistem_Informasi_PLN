<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'user';
        $this->data['primary_key'] = 'nip';
    }
    

}

/* End of file User_m.php */
