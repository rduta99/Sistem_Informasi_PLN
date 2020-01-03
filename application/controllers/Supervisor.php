<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

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
        $this->load->model('equipment_m');
        $this->load->model('tools_m');
        $this->load->model('teknologi_m');
        $this->load->model('unit_m');
        $this->load->model('data_personil_m');
        $this->load->model('jabatan_m');
        $this->load->model('user_m');
        $this->load->model('role_m');
        $this->load->model('his_pengukuran_m');
        $this->load->model('log_ukur_m');
        $this->load->model('analisis_m');
    }
    
    public function index()
    {
        if($this->POST('simpan')) {
            $data = [
                'asset_id' => $this->POST('asset_id'),
                'kks_number' => $this->POST('kks_number'),
                'unit' => $this->POST('unit'),
                'desk' => $this->POST('desk'),
                'spek_a' => $this->POST('spek_a'),
                'spek_b' => $this->POST('spek_b'),
                'spek_c' => $this->POST('spek_c'),
                'spek_d' => $this->POST('spek_d'),
                
            ];
            $this->data_barang_m->insert($data);
            $this->flashmsg('Data berhasil ditambahkan');
        }
        //$this->data['data_barang'] = $this->data_barang_m->getDataJoin(['unit'], ['data_barang.unit = unit.id_unit']);
        $id = $this->data_personil_m->get_row(['nip' => $this->data['username']])->unit;
        $this->data['data_barang'] = $this->data_barang_m->get_join_all_where(['unit'], ['data_barang.unit = unit.id_unit'], ['id_unit' => $id]);
        $this->data['teknologi'] = $this->teknologi_m->get();
        $this->data['unit'] = $this->unit_m->get();
        $this->data['active'] = 1;
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
        $id = $this->data_personil_m->get_row(['nip' => $this->data['username']])->unit;
        $this->data['tools'] = $this->tools_m->get_join_all_where(['unit'], ['tools.unit = unit.id_unit'], ['id_unit' => $id]);
        $this->data['active'] = 2;
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
        $id = $this->data_personil_m->get_row(['nip' => $this->data['username']])->unit;
        $this->data['personel'] = $this->data_personil_m->get_join_all_where(['unit'], ['data_personil.unit = unit.id_unit'], ['id_unit' => $id]);
        $this->data['content'] = 'personel';
        $this->data['active'] = 3;
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
            $k = $this->data_personil_m->get_row(['nip' => $this->data['username']]);
            $this->his_pengukuran_m->insert(['id_equipment' => $id, 'gambar' => $gambar, 'kondisi' => $max, 'waktu' => date('Y-m-d'), 'unit' => $k->unit]);
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
        $this->data['content'] = 'histori_me';
        $this->data['active'] = 4;
        $this->data['title'] = 'Supervisor | ';
        $this->load->view('supervisor/template/template', $this->data);
    }

    public function ukur_eq()
    {
        $this->data['equipment'] = $this->data_barang_m->getDataJoin(['unit'], ['data_barang.unit = unit.id_unit']);
        $this->data['tools'] = $this->tools_m->getDataJoin(['unit', 'teknologi'], ['tools.unit = unit.id_unit', 'tools.teknologi = teknologi.id_teknologi']);
        $this->data['active'] = 4;
        $this->data['content'] = 'ukur_eq';
        $this->data['title'] = 'Supervisor | ';
        $this->load->view('supervisor/template/template', $this->data);
    }

    public function tools_list()
    {
        echo json_encode($this->tools_m->getDataJoin(['unit', 'teknologi'], ['tools.unit = unit.id_unit', 'tools.teknologi = teknologi.id_teknologi']));
    }

    public function laporan_analisis()
    {
        $dompdf = new Dompdf\Dompdf();
        $html = $this->load->view('supervisor/laporan_analisis', [], true);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $options = new Dompdf\Options();
        $options->setIsRemoteEnabled(true);
        $dompdf->setOptions($options);
        $dompdf->render();
        $dompdf->stream('Laporan.pdf', array("Attachment" => 0));
    }

    public function list_analisis()
    {
        if($this->POST('anal')) {
            $this->data['input'] = [
                'id_equipment' => $this->POST('asset_id'),
                'mpi' => $this->POST('mpi'),
                'spek_a' => $this->POST('spek_a'),
                'spek_b' => $this->POST('spek_b'),
                'spek_c' => $this->POST('spek_c'),
                'spek_d' => $this->POST('spek_d'),
                'general_draw' => $this->POST('gen_dr'),
                'finding' => $this->POST('finding'),
                'diagnose' => $this->POST('diagnose'),
                'analysis' => $this->POST('analisis'),
                'recommendation' => $this->POST('recommend'),
                'waktu' => date('Y-m-d')
            ];
            $this->analisis_m->insert($this->data['input']);
            $this->flashmsg('Analisis Telah Ditambahkan');
        }
        $this->data['analisis'] = $this->analisis_m->getDataJoin(['data_barang'], ['analisis_eq.id_equipment = data_barang.asset_id']);
        $this->data['active'] = 5;
        $this->data['content'] = 'list_anal';
        $this->data['title'] = 'Supervisor | ';
        $this->load->view('supervisor/template/template', $this->data);
    }

    public function analisis_eq($id)
    {
        $this->data['barang'] = $this->his_pengukuran_m->get_join_where(['data_barang'], ['histori_pengukuran.id_equipment = data_barang.asset_id'], ['id_pengukuran' => $id]);
        $this->data['tools'] = $this->log_ukur_m->get_join_all_where(['tools'], ['log_ukur.id_tools = tools.id_tools'], ['id_histori' => $id]);
        $this->data['active'] = 4;
        $this->data['content'] = 'anal';
        $this->data['title'] = 'Supervisor | ';
        $this->load->view('supervisor/template/template', $this->data);
    }

    public function detail_pengukuran($id)
    {
        $this->data['barang'] = $this->his_pengukuran_m->get_join_where(['data_barang'], ['histori_pengukuran.id_equipment = data_barang.asset_id'], ['id_pengukuran' => $id]);
        $this->data['tools'] = $this->log_ukur_m->get_join_all_where(['tools'], ['log_ukur.id_tools = tools.id_tools'], ['id_histori' => $id]);
        $this->data['active'] = 4;
        $this->data['content'] = 'detail_pengukuran';
        $this->data['title'] = 'Supervisor | ';
        $this->load->view('supervisor/template/template', $this->data);
    }

    public function detail_analisis($id)
    {
        $this->data['analisis'] = $this->analisis_m->get_data_join_order(['data_barang'], ['analisis_eq.id_equipment = data_barang.asset_id'], 'waktu','DESC',['id_log' => $id]);
        $this->data['active'] = 5;
        $this->data['content'] = 'detail_anal';
        $this->data['title'] = 'Supervisor | ';
        $this->load->view('supervisor/template/template', $this->data);
    }

}

/* End of file Supervisor.php */
