<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'tools';
        $this->data['primary_key'] = 'id_tools';
    }
    

}

/* End of file tools_m.php */
