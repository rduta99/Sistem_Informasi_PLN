<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

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
        $this->load->model('data_barang_m');
        $this->load->model('his_pengukuran_m');
        $this->load->model('log_ukur_m');
        $this->load->model('log_anal_m');
        $this->load->model('analisis_m');
        $this->load->model('kalibrasi_m');
        $this->load->model('log_kalibrasi_m');
        $this->load->model('log_sertifikasi_m');
        $this->data['user'] = $this->data_personil_m->get_row(['nip' => $this->data['username']]);
    }
    

    public function index()
    {
        $id = $this->data_personil_m->get_row(['nip' => $this->data['username']])->unit;
        if($this->POST('simpan')) {
            $config['upload_path'] = './assets/equip/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->upload->initialize($config);
            $this->upload->do_upload('gambar');
            $data = $this->upload->data();
            $gambar = $data['file_name'];
            $data = [
                'asset_id' => $this->POST('asset_id'),
                'kks_number' => $this->POST('kks_number'),
                'unit' => $id,
                'desk' => $this->POST('desk'),
                'spek_a' => $this->POST('spek_a'),
                'spek_b' => $this->POST('spek_b'),
                'spek_c' => $this->POST('spek_c'),
                'spek_d' => $this->POST('spek_d'),
                'gambar' => $gambar,
                
            ];
            $this->data_barang_m->insert($data);
            $this->flashmsg('Data berhasil ditambahkan');
        }
        $this->data['data_barang'] = $this->data_barang_m->get_join_all_where(['unit'], ['data_barang.unit = unit.id_unit'], ['id_unit' => $id]);
        $this->data['teknologi'] = $this->teknologi_m->get();
        $this->data['unit'] = $this->unit_m->get();
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
            $datas = [];
            if($_FILES['gambar']['error'] == 0) { 
                $config['upload_path'] = './assets/profil/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->upload->initialize($config);
                $this->upload->do_upload('gambar');
                $data = $this->upload->data();
                $gambar = $data['file_name'];
                $datas = [
                    'id_pegawai' => $this->POST('id_pegawai'),
                    'nama' => $this->POST('nama'),
                    'unit' => $this->POST('unit'),
                    'no' => $this->POST('no'),
                    'email' => $this->POST('email'),
                    'sertifikasi' => $this->POST('sertifikasi'),
                    'gambar' => $gambar
                ];
            } else {
                $datas = [
                    'id_pegawai' => $this->POST('id_pegawai'),
                    'nama' => $this->POST('nama'),
                    'unit' => $this->POST('unit'),
                    'no' => $this->POST('no'),
                    'email' => $this->POST('email'),
                    'sertifikasi' => $this->POST('sertifikasi')
                ];
            }

            $this->data_personil_m->update($this->POST('nip'), $datas);
            $this->flashmsg('Data berhasil disimpan');
        }
        $this->data['data_personil'] = $this->data_personil_m->get_row(['nip' => $this->data['username']]);
        $this->data['pegawai'] = $this->user_m->getDataJoin(['role', 'data_personil', 'jabatan', 'unit'], ['user.id_role = role.id_role', 'user.nip = data_personil.nip', 'data_personil.jabatan = jabatan.id_jabatan', 'data_personil.unit = unit.id_unit']);
        $this->data['unit'] = $this->unit_m->get();
        $this->data['jabatan'] = $this->jabatan_m->get();
        $this->data['active'] = 5;
        $this->data['content'] = 'setting';
        $this->data['title'] = 'Personel | ';
        $this->load->view('personel/template/template', $this->data);   
    }

    public function tools(){
        $id = $this->data_personil_m->get_row(['nip' => $this->data['username']])->unit;
        if($this->POST('simpan_tool')) {
            $config['upload_path'] = './assets/tools';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->upload->initialize($config);
            $this->upload->do_upload('gambar');
            $datas = $this->upload->data();
            $data = [
                'id_tools' => $this->POST('id_tools'),
                'type' => $this->POST('type'),
                'merk' => $this->POST('merk'),
                'unit' => $id,
                'teknologi' => $this->POST('teknologi'),
                'tgl_kalibrasi' => $this->POST('tgl_kalibrasi'),
                'gambar' => $datas['file_name']
            ];
            $this->tools_m->insert($data);
            $this->flashmsg('Data berhasil ditambahkan');
            
        }

        $this->data['teknologi'] = $this->teknologi_m->get();
        $this->data['unit'] = $this->unit_m->get();
        $id = $this->data_personil_m->get_row(['nip' => $this->data['username']])->unit;
        $this->data['tools'] = $this->tools_m->get_join_all_where(['unit'], ['tools.unit = unit.id_unit'], ['id_unit' => $id]);
        $this->data['active'] = 2;
        $this->data['content'] = 'tools';
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
        redirect('supervisor/personel');
    }

    public function ukur_eq()
    {
        $this->data['equipment'] = $this->data_barang_m->getDataJoin(['unit'], ['data_barang.unit = unit.id_unit']);
        $this->data['tools'] = $this->tools_m->getDataJoin(['unit', 'teknologi'], ['tools.unit = unit.id_unit', 'tools.teknologi = teknologi.id_teknologi']);
        $this->data['active'] = 3;
        $this->data['content'] = 'ukur_eq';
        $this->data['title'] = 'Personel | ';
        $this->load->view('personel/template/template', $this->data);
    }
        public function his_pengukuran()
        {
            if($this->POST('simpan_ukur')) {
            
                $config['upload_path'] = './assets/ukur_eq/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->upload->initialize($config);
                $this->upload->do_upload('gambar');
                $data = $this->upload->data();
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
                $this->his_pengukuran_m->insert(['id_equipment' => $id, 'gambar' => $data['file_name'], 'kondisi' => $max, 'waktu' => date('Y-m-d'), 'unit' => $k->unit]);
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
            $this->data['active'] = 3;
            $this->data['title'] = 'Personel | ';
            $this->load->view('personel/template/template', $this->data);
        }

    public function analisis_eq($id)
    {
        $this->data['barang'] = $this->his_pengukuran_m->get_join_where(['data_barang'], ['histori_pengukuran.id_equipment = data_barang.asset_id'], ['id_pengukuran' => $id]);
        $this->data['tools'] = $this->log_ukur_m->get_join_all_where(['tools'], ['log_ukur.id_tools = tools.id_tools'], ['id_histori' => $id]);
        $this->data['active'] = 6;
        $this->data['content'] = 'anal';
        $this->data['title'] = 'Personel | ';
        $this->load->view('personel/template/template', $this->data);
    }

    public function eq_edit()
    {
        $data = [
            'asset_id' => $this->POST('asset_id'),
            'kks_number' => $this->POST('kks_number'),
            'desk' => $this->POST('desk'),
            'spek_a' => $this->POST('spek_a'),
            'spek_b' => $this->POST('spek_b'),
            'spek_c' => $this->POST('spek_c'),
            'spek_d' => $this->POST('spek_d'),
        ];
        $this->data_barang_m->update($this->POST('asset_id'), $data);
        $this->flashmsg('Data berhasil diubah');
        redirect('personel');
    }



    public function tools_list()
    {
        echo json_encode($this->tools_m->getDataJoin(['unit', 'teknologi'], ['tools.unit = unit.id_unit', 'tools.teknologi = teknologi.id_teknologi']));
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
                'waktu' => date('Y-m-d'),
                'username' => $this->data['username'],
                // $username = mysql_real_escape_string($_POST[username]);
                
            ];
            
            $this->analisis_m->insert($this->data['input']);
            $this->flashmsg('Analisis Telah Ditambahkan');
        }
        $this->data['analisis'] = $this->log_anal_m->getDataJoin(['data_barang'], ['log_anal.id_equip = data_barang.asset_id']);
        $this->data['active'] = 4;
        $this->data['content'] = 'list_anal';
        $this->data['title'] = 'Personel | ';
        $this->load->view('personel/template/template', $this->data);
    }

    public function detail_pengukuran($id)
    {
        $this->data['barang'] = $this->his_pengukuran_m->get_join_where(['data_barang'], ['histori_pengukuran.id_equipment = data_barang.asset_id'], ['id_pengukuran' => $id]);
        $this->data['gmbr'] = $this->his_pengukuran_m->get_row(['id_pengukuran' => $id])->gambar;
        $this->data['tools'] = $this->log_ukur_m->get_join_all_where(['tools'], ['log_ukur.id_tools = tools.id_tools'], ['id_histori' => $id]);
        $this->data['active'] = 3;
        $this->data['content'] = 'detail_pengukuran';
        $this->data['title'] = 'Personel | ';
        $this->load->view('personel/template/template', $this->data);
    }

    public function detail_analisis($id)
    {
        $this->data['analisis'] = $this->analisis_m->get_data_join_order(['data_barang'], ['analisis_eq.id_equipment = data_barang.asset_id'], 'waktu','DESC',['id_log' => $id]);
        $this->data['active'] = 4;
        $this->data['content'] = 'detail_anal';
        $this->data['title'] = 'Personel | ';
        $this->load->view('personel/template/template', $this->data);
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
            $id = $this->log_kalibrasi_m->get_row($data);
        } else {
            $this->log_kalibrasi_m->update($id->id_log, $data);
        }

        $data = [
            'id_equipment' => $this->POST('id'),
            'id_log' => $id->id_log,
            'tgl' => date('Y-m-d'),
            'file' => $gambar,
        ];
        $this->kalibrasi_m->insert($data);
        redirect('personel/detail_tools/'.$this->POST('id'));
        exit;
    }


        public function detail_tools()
        {
            $this->data['tools'] = $this->tools_m->get_row(['id_tools' => $this->uri->segment(3)]);
        $this->data['list_kalibrasi'] = $this->kalibrasi_m->get(['id_equipment' => $this->uri->segment(3)]);
        $this->data['active'] = 2;
        $this->data['content'] = 'list_kalibrasi';
        $this->data['title'] = 'Personel | ';
        $this->load->view('personel/template/template', $this->data);
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

    public function delete_eq($asset_id)
    {
        $this->data_barang_m->delete($asset_id);
        $this->flashmsg('Data berhasil dihapus');
        redirect('personel');
        exit;
    }

    public function laporan_analisis()
    {
        $this->data['input'] = $this->analisis_m->get_join_where(['data_barang'], ['analisis_eq.id_equipment = data_barang.asset_id'],['id_anal' => $this->uri->segment(3)]);
        
        $dompdf = new Dompdf\Dompdf();
        $html = $this->load->view('supervisor/laporan_analisis', $this->data, true);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $options = new Dompdf\Options();
        $options->setIsRemoteEnabled(true);
        $dompdf->setOptions($options);
        $dompdf->render();
        $dompdf->stream('Laporan.pdf', ['Attachment' => 0]);
    }

    public function detail_sertifikat()
    {   
        $this->data['list_sertifikasi'] = $this->log_sertifikasi_m->get(['nip' => $this->data['username']]);
        $this->data['active'] = 6;
        $this->data['content'] = 'sertifikasi';
        $this->data['title'] = 'Personel | ';
        $this->load->view('personel/template/template', $this->data);
    }

    public function upload_sertifikasi()
    {
        $config['upload_path'] = './assets/file_sertifikasi';
        $config['allowed_types'] = 'pdf';
        $this->upload->initialize($config);
        $this->upload->do_upload('file_pdf');
        $data = $this->upload->data();
        $gambar = $data['full_path'];

        $id = $this->log_sertifikasi_m->get_row(['nip' => $this->data['username']]);
        if($id == null) {
            $data = [
                'nip' => $this->data['username'],
                'tgl_sertif' => date('Y-m-d'),
                'file' => $gambar,
            ];
            $this->log_sertifikasi_m->insert($data);
            $id = $this->log_sertifikasi_m->get_row(['nip' => $this->data['username'], 'file' => $gambar, 'tgl_sertif' => date('Y-m-d ')])->id_sertif;
            $this->data_personil_m->update($this->data['username'], ['sertifikasi' => $id]);
        } else {
            $data = [
                'nip' => $this->data['username'],
                'tgl_sertif' => date('Y-m-d'),
                'file' => $gambar,
            ];
            $this->log_sertifikasi_m->update($id->id_sertif, $data);
            // $this->kalibrasi_m->insert($data);
        }
        redirect('personel/detail_sertifikat/'.$this->POST('id'));
        exit;
    }

    public function detail_sertifikasi()
    {
        $file = $this->log_sertifikasi_m->get_row(['id_sertif' => $this->uri->segment(3)])->file;
        $filename = 'filename.pdf';
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        @readfile($file);
    }

}

/* End of file Admin.php */
