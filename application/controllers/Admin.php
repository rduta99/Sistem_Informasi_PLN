<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

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
        $this->load->model('log_ukur_m');
        $this->load->model('his_pengukuran_m');
        $this->load->model('analisis_m');
        $this->load->model('log_anal_m');
        $this->load->model('log_kalibrasi_m');
        $this->load->model('kalibrasi_m');
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

    public function master_eq_add()
    {
        if($this->POST('simpan')) {
            $data = [
                'asset_id' => $this->POST('asset_id'),
                'kks_number' => $this->POST('kks_number'),
                'desk' => $this->POST('desk'),
                'unit' => $this->POST('unit'),
                'spek_a' => $this->POST('spek_a'),
                'spek_b' => $this->POST('spek_b'),
                'spek_c' => $this->POST('spek_c'),
                'spek_d' => $this->POST('spek_d'),
            ];
            $this->data_barang_m->insert($data);
            $this->flashmsg('Data berhasil ditambah');
            redirect('admin/master_eq');
            exit;
        }
        $this->data['unit'] = $this->unit_m->get();
        $this->data['equipment'] = $this->data_barang_m->getDataJoin(['unit'], ['data_barang.unit = unit.id_unit']);
        $this->data['active'] = 4;
        $this->data['content'] = 'master_eq_add';
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
        $this->data['unit'] = $this->unit_m->get();
        $this->data['teknologi'] = $this->teknologi_m->get();
        $this->data['equipment'] = $this->tools_m->getDataJoin(['unit', 'teknologi'], ['tools.unit = unit.id_unit', 'tools.teknologi = teknologi.id_teknologi']);
        $this->data['active'] = 5;
        $this->data['content'] = 'master_to';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
    }

    public function tools_list()
    {
        echo json_encode($this->tools_m->getDataJoin(['unit', 'teknologi'], ['tools.unit = unit.id_unit', 'tools.teknologi = teknologi.id_teknologi']));
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
        $this->data['pengukuran'] = $this->his_pengukuran_m->get_data_join_order(['data_barang'], ['histori_pengukuran.id_equipment = data_barang.asset_id'], 'waktu', 'DESC');
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
        redirect('admin/jab_unit');
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
        if($this->POST('simpan')) {
            $this->user_m->update($this->POST('nip'), ['password' => md5($this->POST('pass_baru'))]);
            $this->flashmsg('Password berhasil diubah');
        }
        $this->data['active'] = 3;
        $this->data['pengguna'] = $this->user_m->getDataJoin(['data_personil'], ['user.nip = data_personil.nip']);
        $this->data['unit'] = $this->unit_m->get();
        $this->data['content'] = 'lupa_password';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
    }

    public function analisis_eq($id)
    {
        $this->data['barang'] = $this->his_pengukuran_m->get_join_where(['data_barang'], ['histori_pengukuran.id_equipment = data_barang.asset_id'], ['id_pengukuran' => $id]);
        $this->data['tools'] = $this->log_ukur_m->get_join_all_where(['tools'], ['log_ukur.id_tools = tools.id_tools'], ['id_histori' => $id]);
        $this->data['active'] = 6;
        $this->data['content'] = 'anal';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
    }

    public function list_analisis()
    {
        if($this->POST('anal')) {
            $cek = $this->log_anal_m->get_row(['id_equip' => $this->POST('asset_id')]);
            if($cek == null) {
                $this->log_anal_m->insert(['id_equip' => $this->POST('asset_id')]);
                $id = $this->log_anal_m->get_row(['id_equip' => $this->POST('asset_id')])->id_log;
            } else {
                $id = $cek->id_log;
                $this->log_anal_m->update($id, ['id_equip' => $this->POST('asset_id')]);
            }
            
            $this->data['input'] = [
                'id_equipment' => $this->POST('asset_id'),
                'id_log' => $id,
                'mpi' => $this->POST('mpi'),
                'general_draw' => $this->POST('gen_dr'),
                'finding' => $this->POST('finding'),
                'diagnose' => $this->POST('diagnose'),
                'analysis' => $this->POST('analisis'),
                'recommendation' => $this->POST('recommend'),
                'waktu' => date('Y-m-d')
            ];
            $this->analisis_m->insert($this->data['input']);
            $this->flashmsg('Analisis Telah Ditambahkan');
            exit;
        }
        $this->data['analisis'] = $this->log_anal_m->getDataJoin(['data_barang'], ['log_anal.id_equip = data_barang.asset_id']);
        $this->data['active'] = 7;
        $this->data['content'] = 'list_anal';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
    }

    public function detail_analisis($id)
    {
        $this->data['analisis'] = $this->analisis_m->get_data_join_order(['data_barang'], ['analisis_eq.id_equipment = data_barang.asset_id'], 'waktu','DESC',['id_log' => $id]);
        $this->data['active'] = 7;
        $this->data['content'] = 'detail_anal';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
    }

    public function detail_tools()
    {
        $this->data['tools'] = $this->tools_m->get_row(['id_tools' => $this->uri->segment(3)]);
        $this->data['list_kalibrasi'] = $this->kalibrasi_m->get(['id_equipment' => $this->uri->segment(3)]);
        $this->data['active'] = 5;
        $this->data['content'] = 'list_kalibrasi';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
    }

    public function detail_kalibrasi()
    {
        $file = $this->kalibrasi_m->get_row(['id_kalibrasi' => $this->uri->segment(3)])->file;
        $filename = 'filename.pdf';
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        @readfile($file);
    }

    public function upload_kalibrasi()
    {
        $config['upload_path'] = './assets/file_kalibrasi';
        $config['allowed_types'] = 'pdf';
        $this->upload->initialize($config);
        $this->upload->do_upload('file_pdf');
        $data = $this->upload->data();
        $gambar = $data['full_path'];
        $data = [
            'id_equipment' => $this->POST('id')
        ];
        $id = $this->log_kalibrasi_m->get_row($data);
        if($id == null) {
            $this->log_kalibrasi_m->insert($data);
        } else {
            $this->log_kalibrasi_m->update($id->id_log, $data);
            $id = $this->log_kalibrasi_m->get_row($data);
        }

        $data = [
            'id_equipment' => $this->POST('id'),
            'id_log' => $id->id_log,
            'tgl' => date('Y-m-d'),
            'file' => $gambar,
        ];
        $this->kalibrasi_m->insert($data);
        redirect('admin/detail_tools/'.$this->POST('id'));
        exit;
    }

    public function laporan_analisis()
    {
        $this->data['input'] = $this->analisis_m->get_join_where(['data_barang'], ['analisis_eq.id_equipment = data_barang.asset_id'],['id_anal' => 2]);
        
        $dompdf = new Dompdf\Dompdf();
        $html = $this->load->view('admin/laporan_analisis', $this->data, true);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $options = new Dompdf\Options();
        $options->setIsRemoteEnabled(true);
        $dompdf->setOptions($options);
        $dompdf->render();
        $dompdf->stream('Tes.pdf', ['Attachment' => 0]);
        // file_put_contents($_SERVER['DOCUMENT_ROOT'].'/pln/assets/'.$this->data['input']->desk.' Analysis '.date('d-m-Y'), $dompdf->output());
        // $this->data['url'] = $_SERVER['DOCUMENT_ROOT'].'/pln/assets/'.$this->data['input']->desk.' Analysis '.date('d-m-Y');
        // $this->load->view('admin/pdf_view', $this->data);
        
        // $dompdf->stream('Laporan.pdf', array("Attachment" => 0));
    }

    public function mon_analisis()
    {
        $dompdf = new Dompdf\Dompdf();
        $html = $this->load->view('admin/mon_analisis', [], true);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $options = new Dompdf\Options();
        $options->setIsRemoteEnabled(true);
        $dompdf->setOptions($options);
        $dompdf->render();
        $dompdf->stream('Laporan.pdf', array("Attachment" => 0));
    }


    public function data_pengukuran()
    {
        $dompdf = new Dompdf\Dompdf();
        $html = $this->load->view('admin/data_pengukuran', [], true);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $options = new Dompdf\Options();
        $options->setIsRemoteEnabled(true);
        $dompdf->setOptions($options);
        $dompdf->render();
        $dompdf->stream('Laporan.pdf', array("Attachment" => 0));
    }

    public function detail_pengukuran($id)
    {
        $this->data['barang'] = $this->his_pengukuran_m->get_join_where(['data_barang'], ['histori_pengukuran.id_equipment = data_barang.asset_id'], ['id_pengukuran' => $id]);
        $this->data['tools'] = $this->log_ukur_m->get_join_all_where(['tools'], ['log_ukur.id_tools = tools.id_tools'], ['id_histori' => $id]);
        $this->data['active'] = 6;
        $this->data['content'] = 'detail_pengukuran';
        $this->data['title'] = 'Admin | ';
        $this->load->view('admin/template/template', $this->data);
    }

}

/* End of file Admin.php */
