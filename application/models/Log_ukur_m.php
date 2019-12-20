<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_ukur_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'log_ukur';
        $this->data['primary_key'] = 'id_log';
    }
    

}

/* End of file Data_barang_m.php */
