<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'jabatan';
        $this->data['primary_key'] = 'id_jabatan';
    }
    

}

/* End of file Unit_m.php */
