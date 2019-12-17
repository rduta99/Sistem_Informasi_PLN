<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_personil_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'data_personil';
        $this->data['primary_key'] = 'id_pegawai';
    }
    

}

/* End of file Data_personil_m.php */
