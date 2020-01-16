<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_sertifikasi_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'log_sertifikasi';
        $this->data['primary_key'] = 'id_sertif';
    }
    

}

/* End of file ModelName.php */
