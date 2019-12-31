<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisis_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'analisis_eq';
        $this->data['primary_key'] = 'id_anal';
    }
    

}

/* End of file Data_barang_m.php */
