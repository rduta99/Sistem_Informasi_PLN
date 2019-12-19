<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role'] = $this->session->userdata('id_role');
        if(isset($this->data['username'], $this->data['id_role'])) {
            if($this->data['id_role'] != 1) {
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
        $this->load->model('data_barang_m');
        $this->load->model('tools_m');
        $this->load->model('teknologi_m');
    }
    

    public function index()
    {
        if($this->POST('simpan')) {
            $data = [
                'nip' => $this->POST('nip'),
                'nama' => $this->POST('nama'),
                'jabatan' => $this->POST('jabatan'),
                'unit' => $this->POST('unit'),
                'no' => $this->POST('no'),
                'email' => $this->POST('email'),
            ];

            $this->user_m->insert(['nip' => $this->POST('nip'), 'password' => md5($this->POST('password')), 'id_role' => $this->POST('role')]);
            $this->data_personil_m->insert($data);
            $this->flashmsg('Data berhasil ditambahkan');
        }
        $this->data['jab'] = $this->jabatan_m->get();
        $this->data['unit'] = $this->unit_m->get();
        $this->data['pegawai'] = $this->user_m->getDataJoin(['role', 'data_personil', 'jabatan', 'unit'], ['user.id_role = role.id_role', 'user.nip = data_personil.nip', 'data_personil.jabatan = jabatan.id_jabatan', 'data_personil.unit = unit.id_unit']);
        $this->data['role'] = $this->role_m->get();
        $this->data['active'] = 1;
        $this->data['content'] = 'main';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
    }

    public function master_eq()
    {
        if($this->POST('simpan')) {
            $data = [
                'asset_id' => $this->POST('asset_id'),
                'kks_number' => $this->POST('kks_number'),
                'desk' => $this->POST('desk'),
                'unit' => $this->POST('unit')
            ];
            $this->data_barang_m->insert($data);
            $this->flashmsg('Data berhasil ditambah');
        }
        $this->data['unit'] = $this->unit_m->get();
        $this->data['equipment'] = $this->data_barang_m->getDataJoin(['unit'], ['data_barang.unit = unit.id_unit']);
        $this->data['active'] = 4;
        $this->data['content'] = 'master_eq';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
    }

    public function master_eq_edit()
    {
        $data = [
            'asset_id' => $this->POST('asset_id'),
            'kks_number' => $this->POST('kks_number'),
            'desk' => $this->POST('desk'),
            'unit' => $this->POST('unit')
        ];
        $this->data_barang_m->update($this->POST('asset_id'), $data);
        $this->flashmsg('Data berhasil diubah');
        redirect('admin/master_eq');
    }

    public function del_eq($id)
    {
        $this->data_barang_m->delete($id);
        $this->flashmsg('Data berhasil dihapus');
        redirect('admin/master_eq');
        exit;
    }

    public function master_to()
    {
        $this->data['unit'] = $this->unit_m->get();
        $this->data['teknologi'] = $this->teknologi_m->get();
        $this->data['equipment'] = $this->tools_m->getDataJoin(['unit', 'teknologi'], ['tools.unit = unit.id_unit', 'tools.teknologi = teknologi.id_teknologi']);
        $this->data['active'] = 5;
        $this->data['content'] = 'master_to';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
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

        $this->user_m->update($this->POST('nip'), ['id_role' => $this->POST('role')]);
        $this->data_personil_m->update($this->POST('nip'), $data);
        $this->flashmsg('Data berhasil disimpan');
        redirect('admin');
        exit;
    }

    public function delete($nip)
    {
        $this->user_m->delete($nip);
        $this->flashmsg('Data berhasil dihapus');
        redirect('admin');
        exit;
    }

    public function his_pengukuran()
    {
        $this->data['active'] = 6;
        $this->data['content'] = 'histori_me';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
    }

    public function ukur_eq()
    {
        $this->data['equipment'] = $this->data_barang_m->getDataJoin(['unit'], ['data_barang.unit = unit.id_unit']);
        $this->data['tools'] = $this->tools_m->getDataJoin(['unit', 'teknologi'], ['tools.unit = unit.id_unit', 'tools.teknologi = teknologi.id_teknologi']);
        $this->data['active'] = 6;
        $this->data['content'] = 'ukur_eq';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
    }

    public function jab_unit()
    {
        if($this->POST('jabatan')) {
            $data = [
                'id_jabatan' => $this->POST('id_jabatan'),
                'nama_jabatan' => $this->POST('nama_jabatan'),
            ];
            $cek = $this->jabatan_m->get_row(['id_jabatan' => $this->POST('id_jabatan')]);
            if($cek == null) {
                $this->flashmsg('Data berhasil ditambah');
                $this->jabatan_m->insert($data);
            } else {
                $this->flashmsg('Data sudah ada', 'warning');
            }
        } else if($this->POST('unit')) {
            $data = [
                'id_unit' => $this->POST('id_unit'),
                'nama_unit' => $this->POST('nama_unit'),
            ];
            $cek = $this->unit_m->get_row(['id_unit' => $this->POST('id_unit')]);
            if($cek == null) {
                $this->flashmsg('Data berhasil ditambah');
                $this->unit_m->insert($data);
            } else {
                $this->flashmsg('Data sudah ada', 'warning');
            }
        }
        $this->data['active'] = 2;
        $this->data['jabatan'] = $this->jabatan_m->get();
        $this->data['unit'] = $this->unit_m->get();
        $this->data['content'] = 'jab_unit';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
    }

    public function jab_edit()
    {
        $data = [
            'id_jabatan' => $this->POST('id_jabatan'),
            'nama_jabatan' => $this->POST('nama_jabatan')
        ];
        $this->jabatan_m->update($this->POST('id_jabatan'), $data);
        $this->flashmsg('Data berhasil diubah');
        redirect('admin/jab_unit');
    }

    public function jab_del($id)
    {
        $this->jabatan_m->delete($id);
        $this->flashmsg('Data berhasil dihapus');
        redirect('jab_unit');
        exit;
    }

    public function unit_edit()
    {
        $data = [
            'id_unit' => $this->POST('id_unit'),
            'nama_unit' => $this->POST('nama_unit')
        ];
        $this->unit_m->update($this->POST('id_unit'), $data);
        $this->flashmsg('Data berhasil diubah');
        redirect('admin/jab_unit');
    }

    public function unit_del($id)
    {
        $this->unit_m->delete($id);
        $this->flashmsg('Data berhasil dihapus');
        redirect('admin/jab_unit');
        exit;
    }

    public function lupa()
    {
        $this->data['active'] = 3;
        $this->data['pengguna'] = $this->user_m->getDataJoin(['data_personil'], ['user.nip = data_personil.nip']);
        $this->data['unit'] = $this->unit_m->get();
        $this->data['content'] = 'lupa_password';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
    }

}

/* End of file Admin.php */
