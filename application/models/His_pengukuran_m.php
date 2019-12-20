<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class His_pengukuran_m extends MY_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'histori_pengukuran';
        $this->data['primary_key'] = 'id_pengukuran';
    }
    

}

/* End of file Data_barang_m.php */
