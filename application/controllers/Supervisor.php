<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role'] = $this->session->userdata('id_role');

        $this->load->model('data_barang_m');
        $this->load->model('tools_m');
        $this->load->model('teknologi_m');
    }
    
    public function index()
    {
        if($this->POST('simpan')) {
            $data = [
                'asset_id' => $this->POST('asset_id'),
                'kks_number' => $this->POST('kks_number'),
                'id_unit' => $this->POST('id_unit'),
                'desk' => $this->POST('desk'),
                
            ];
           // $this->user_m->insert(['asset_id' => $this->POST('asset_id'), 'kks_number' => $this->POST('kks_number'), 'desk' => $this->POST('desk')]);
            $this->data_barang_m->insert($data);
            $this->flashmsg('Data berhasil ditambahkan');
        }
        //$this->data['pegawai'] = $this->user_m->getDataJoin(['role', 'data_personil'], ['user.id_role = role.id_role', 'user.nip = data_personil.nip']);
        $this->data['data_barang'] = $this->data_barang_m->get();
        $this->data['teknologi'] = $this->teknologi_m->get();
        $this->data['content'] = 'eq';
        $this->data['title'] = 'Supervisor | ';
        $this->load->view('supervisor/template/template', $this->data);
    }

    public function tools(){

        if($this->POST('simpan_tool')) {
            $data = [
                'id_tools' => $this->POST('id_tools'),
                'type' => $this->POST('type'),
                'merk' => $this->POST('merk'),
                'unit' => $this->POST('unit'),
                'teknologi' => $this->POST('teknologi'),
                'tgl_kalibrasi' => $this->POST('tgl_kalibrasi'),
            ];

            $this->tools_m->insert($data);
            $this->flashmsg('Data berhasil ditambahkan');
        }

        $this->data['teknologi'] = $this->teknologi_m->get();
        $this->data['tools'] = $this->tools_m->get();
        $this->data['data_barang'] = $this->data_barang_m->get();
        $this->data['content'] = 'tool';
        $this->data['title'] = 'Supervisor | ';
        $this->load->view('supervisor/template/template', $this->data);

    }

    public function delete($id_tools)
    {
        $this->tools_m->delete($id_tools);
        $this->flashmsg('Data berhasil dihapus');
        redirect('supervisor');
        exit;
    }

}

/* End of file Supervisor.php */
