<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Teknologi_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'teknologi';
        $this->data['primary_key'] = 'id_teknologi';
    }
    

}

/* End of file Role_m.php */
