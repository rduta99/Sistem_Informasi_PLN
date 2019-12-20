<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Personel extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role'] = $this->session->userdata('id_role');
        if(isset($this->data['username'], $this->data['id_role'])) {
            if($this->data['id_role'] != 3) {
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('id_role');
                $this->flashmsg('Kamu Harus Login Dulu', 'warning');
                redirect('login');
                exit;
            }
        } else {
            $this->flashmsg('Kamu Harus Login Dulu', 'warning');
            redirect('login');
            exit;
        }

        $this->load->model('data_personil_m');
        $this->load->model('user_m');
        $this->load->model('role_m');
        $this->load->model('jabatan_m');
        $this->load->model('unit_m');
        $this->load->model('equipment_m');
        $this->load->model('tools_m');
        $this->load->model('teknologi_m');
    }
    

    public function index()
    {
        if($this->POST('simpan')) {
            $data = [
                'asset_id' => $this->POST('asset_id'),
                'kks_number' => $this->POST('kks_number'),
                'desk' => $this->POST('desk'),
                'unit' => $this->POST('unit'),
                ];
        }
        // echo $this->data['username'];
        $unit = $this->data_personil_m->get_row(['nip' => $this->data['username']]);
        // print_r($unit);
        // exit;
        $this->data['equipment'] = $this->equipment_m->get(['unit' => $unit->unit]);
        $this->data['active'] = 1;
        $this->data['content'] = 'main';
        $this->data['title'] = 'Personel | ';
        $this->load->view('personel/template/template', $this->data);
    }

    public function edit()
    {
        $data = [
            'nip' => $this->POST('nip'),
            'nama' => $this->POST('nama'),
            'jabatan' => $this->POST('jabatan'),
            'unit' => $this->POST('unit'),
            'no' => $this->POST('no'),
            'email' => $this->POST('email'),
        ];

        $this->data_personil_m->update($this->POST('nip'), $data);
        $this->flashmsg('Data berhasil disimpan');
        redirect('personel');
        exit;
    }

    public function delete($nip)
    {
        $this->user_m->delete($nip);
        $this->flashmsg('Data berhasil dihapus');
        redirect('personel');
        exit;
    }

    public function jab_unit()
    {
        $this->data['active'] = 2;
        $this->data['jabatan'] = $this->jabatan_m->get();
        $this->data['unit'] = $this->unit_m->get();
        $this->data['content'] = 'jab_unit';
        $this->data['title'] = 'Admin | ';
        $this->load->view('personel/template/template', $this->data);
    }

    public function jab_del($id)
    {
        $this->jabatan_m->delete($id);
        $this->flashmsg('Data berhasil dihapus');
        redirect('personel');
        exit;
    }

    public function unit_del($id)
    {
        $this->unit_m->delete($id);
        $this->flashmsg('Data berhasil dihapus');
        redirect('personel');
        exit;
    }

    public function lupa()
    {
        $this->data['active'] = 3;
        $this->data['pengguna'] = $this->user_m->getDataJoin(['data_personil'], ['user.nip = data_personil.nip']);
        $this->data['unit'] = $this->unit_m->get();
        $this->data['content'] = 'lupa_password';
        $this->data['title'] = 'Admin | ';
        $this->load->view('personel/template/template', $this->data);
    }

    public function setting()
    {
     if($this->POST('simpan')) {
            $config['upload_path'] = base_url().'/assets/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->upload->initialize($config);
            $this->upload->do_upload('gambar');
            $data = $this->upload->data();
            $gambar = file_get_contents($data['full_path']);

            $datas = [
                'id_pegawai' => $this->POST('id_pegawai'),
                'nama' => $this->POST('nama'),
                'unit' => $this->POST('unit'),
                'no' => $this->POST('no'),
                'email' => $this->POST('email'),
                'sertifikasi' => $this->POST('sertifikasi'),
                'gambar' => $gambar
            ];
            $this->data_personil_m->update($this->POST('nip'), $datas);
            unlink($data['full_path']);
            $this->flashmsg('Data berhasil disimpan');
        }
        $this->data['data_personil'] = $this->data_personil_m->get_row(['nip' => $this->data['username']]);
        $this->data['active'] = 3;
        $this->data['content'] = 'setting';
        $this->data['title'] = 'Personel | ';
        $this->load->view('personel/template/template', $this->data);   
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
            redirect('personel/setting');
            
        }

        $this->data['teknologi'] = $this->teknologi_m->get();
        $this->data['unit'] = $this->unit_m->get();
        $this->data['tools'] = $this->tools_m->getDataJoin(['unit', 'teknologi'], ['tools.unit = unit.id_unit', 'tools.teknologi = teknologi.id_teknologi']);
        $this->data['content'] = 'tools';
        $this->data['active'] = 2;
        $this->data['title'] = 'Personel | ';
        $this->load->view('personel/template/template', $this->data);

    }

    public function delete_tools($id_tools)
    {
        $this->tools_m->delete($id_tools);
        $this->flashmsg('Data berhasil dihapus');
        redirect('personel/tools');
        exit;
    }

    public function tools_edit()
    {
        $data = [
            'id_tools' => $this->POST('id_tools'),
            'type' => $this->POST('type'),
            'merk' => $this->POST('merk'),
            'unit' => $this->POST('unit'),
            'teknologi' => $this->POST('teknologi'),
            'tgl_kalibrasi' => $this->POST('tgl_kalibrasi'),
        ];
        $this->tools_m->update($this->POST('id_tools'), $data);
        $this->flashmsg('Data berhasil diubah');
        redirect('personel/tools');
    }


}

/* End of file Admin.php */
