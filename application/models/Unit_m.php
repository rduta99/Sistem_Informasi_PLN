<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'unit';
        $this->data['primary_key'] = 'id_unit';
    }
    

}

/* End of file Unit_m.php */
