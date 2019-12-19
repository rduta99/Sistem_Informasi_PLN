<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipment_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'data_barang';
        $this->data['primary_key'] = 'asset_id';
    }
    

}

/* End of file User_m.php */
