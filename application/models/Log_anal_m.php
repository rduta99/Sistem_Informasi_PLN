<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_anal_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'log_anal';
        $this->data['primary_key'] = 'id_log';
    }
    

}

/* End of file ModelName.php */
