<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalibrasi_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'kalibrasi';
        $this->data['primary_key'] = 'id_kalibrasi';
    }
    

}

/* End of file ModelName.php */
