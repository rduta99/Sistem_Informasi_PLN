<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role'] = $this->session->userdata('id_role');
        if(isset($this->data['username'], $this->data['id_role'])) {
            if($this->data['id_role'] != 2) {
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
        
        $this->load->model('data_barang_m');
        $this->load->model('tools_m');
        $this->load->model('teknologi_m');
        $this->load->model('unit_m');
        $this->load->model('data_personil_m');
        $this->load->model('jabatan_m');
        $this->load->model('user_m');
        $this->load->model('role_m');
        $this->load->model('his_pengukuran_m');
        $this->load->model('log_ukur_m');



    }
    
    public function index()
    {
        if($this->POST('simpan')) {
            $data = [
                'asset_id' => $this->POST('asset_id'),
                'kks_number' => $this->POST('kks_number'),
                'unit' => $this->POST('unit'),
                'desk' => $this->POST('desk'),
                
            ];
           // $this->user_m->insert(['asset_id' => $this->POST('asset_id'), 'kks_number' => $this->POST('kks_number'), 'desk' => $this->POST('desk')]);
            $this->data_barang_m->insert($data);
            $this->flashmsg('Data berhasil ditambahkan');
        }
        //$this->data['pegawai'] = $this->user_m->getDataJoin(['role', 'data_personil'], ['user.id_role = role.id_role', 'user.nip = data_personil.nip']);
        $this->data['data_barang'] = $this->data_barang_m->getDataJoin(['unit'], ['data_barang.unit = unit.id_unit']);
        $this->data['teknologi'] = $this->teknologi_m->get();
        $this->data['unit'] = $this->unit_m->get();
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
        $this->data['unit'] = $this->unit_m->get();
        $this->data['tools'] = $this->tools_m->getDataJoin(['unit', 'teknologi'], ['tools.unit = unit.id_unit', 'tools.teknologi = teknologi.id_teknologi']);
        $this->data['content'] = 'tool';
        $this->data['title'] = 'Supervisor | ';
        $this->load->view('supervisor/template/template', $this->data);

    }

    public function delete_tools($id_tools)
    {
        $this->tools_m->delete($id_tools);
        $this->flashmsg('Data berhasil dihapus');
        redirect('supervisor/tools');
        exit;
    }

    public function delete_eq($asset_id)
    {
        $this->data_barang_m->delete($asset_id);
        $this->flashmsg('Data berhasil dihapus');
        redirect('supervisor');
        exit;
    }

    public function eq_edit()
    {
        $data = [
            'asset_id' => $this->POST('asset_id'),
            'kks_number' => $this->POST('kks_number'),
            'desk' => $this->POST('desk'),
            'unit' => $this->POST('unit')
        ];
        $this->data_barang_m->update($this->POST('asset_id'), $data);
        $this->flashmsg('Data berhasil diubah');
        redirect('supervisor');
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
        redirect('supervisor/tools');
    }

    public function personel()
    {
        if($this->POST('simpan_personel')) {
            $data = [
                'nip' => $this->POST('nip'),
                'id_pegawai' => $this->POST('id_pegawai'),
                'nama' => $this->POST('nama'),
                'jabatan' => $this->POST('jabatan'),
                'unit' => $this->POST('unit'),
                'no' => $this->POST('no'),
                'email' => $this->POST('email')

            ];
            $this->user_m->insert(['nip' => $this->POST('nip'), 'password' => md5($this->POST('password')), 'id_role' => 3]);
            $this->data_personil_m->insert($data);
            $this->flashmsg('Data berhasil ditambahkan');
            
        }

        
        $this->data['unit'] = $this->unit_m->get();
        $this->data['jabatan'] = $this->jabatan_m->get();
        $this->data['personel'] = $this->data_personil_m->getDataJoin(['jabatan', 'unit'], ['data_personil.jabatan = jabatan.id_jabatan', 'data_personil.unit = unit.id_unit']);
        $this->data['content'] = 'personel';
        $this->data['title'] = 'Supervisor | ';
        $this->load->view('supervisor/template/template', $this->data);
    }

    public function delete_personel($nip)
    {
        $this->data_personil_m->delete($nip);
        $this->flashmsg('Data berhasil dihapus');
        redirect('supervisor/personel');
        exit;
    }

    public function personel_edit()
    {
        $data = [
                'nip' => $this->POST('nip'),
                'id_pegawai' => $this->POST('id_pegawai'),
                'nama' => $this->POST('nama'),
                'jabatan' => $this->POST('jabatan'),
                'unit' => $this->POST('unit'),
                'no' => $this->POST('no'),
                'email' => $this->POST('email'),
        ];
        $this->data_personil_m->update($this->POST('nip'), $data);
        $this->flashmsg('Data berhasil diubah');
        redirect('supervisor/personel');
    }

    public function his_pengukuran()
    {
        if($this->POST('simpan_ukur')) {
            $config['upload_path'] = './assets/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
            $data = $this->upload->data();
            $gambar = file_get_contents($data['full_path']);
            $id = $this->POST('equipment');
            $angka = $this->POST('angka');
            $kondisi = $this->POST('kondisi');
            $teknologi = $this->POST('teknologi');
            $max = $kondisi[0];
            for ($i=1; $i < count($kondisi); $i++) { 
                if($max < $kondisi[$i]) {
                    $max = $kondisi[$i];
                }
            }
            $this->his_pengukuran_m->insert(['id_equipment' => $id, 'gambar' => $gambar, 'kondisi' => $max, 'waktu' => date('Y-m-d')]);
            unlink($data['full_path']);
            $id = $this->his_pengukuran_m->get_row(['id_equipment' => $id, 'kondisi' => $max, 'waktu' => date('Y-m-d')])->id_pengukuran;
            for ($i=0; $i < count($angka); $i++) { 
                $data = [
                    'id_histori' => $id,
                    'id_tools' => $teknologi[$i],
                    'angka' => $angka[$i],
                    'kondisi' => $kondisi[$i],
                    'waktu' => date('Y-m-d')
                ];
                $this->log_ukur_m->insert($data);
                $this->flashmsg("Pengukuran berhasil disimpan"); 
            }
        }
        $this->data['pengukuran'] = $this->his_pengukuran_m->get_data_join_order(['data_barang', 'unit'], ['histori_pengukuran.id_equipment = data_barang.asset_id', 'data_barang.unit = unit.id_unit'], 'waktu', 'DESC');
        $this->data['active'] = 6;
        $this->data['content'] = 'histori_me';
        $this->data['title'] = 'Supervisor | ';
        $this->load->view('supervisor/template/template', $this->data);
    }

    public function ukur_eq()
    {
        $this->data['equipment'] = $this->data_barang_m->getDataJoin(['unit'], ['data_barang.unit = unit.id_unit']);
        $this->data['tools'] = $this->tools_m->getDataJoin(['unit', 'teknologi'], ['tools.unit = unit.id_unit', 'tools.teknologi = teknologi.id_teknologi']);
        $this->data['active'] = 6;
        $this->data['content'] = 'ukur_eq';
        $this->data['title'] = 'Supervisor | ';
        $this->load->view('supervisor/template/template', $this->data);
    }

    public function tools_list()
    {
        echo json_encode($this->tools_m->getDataJoin(['unit', 'teknologi'], ['tools.unit = unit.id_unit', 'tools.teknologi = teknologi.id_teknologi']));
    }

}

/* End of file Supervisor.php */
