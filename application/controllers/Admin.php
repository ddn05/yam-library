<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
        function __construct(){
		parent::__construct();
		// cek login
		if($this->session->userdata('status') != "login"){
                        redirect('auth?pesan=belumlogin');
		}
	}
	public function index()
	{
                $data['judul'] = 'Dashboard Admin';

                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar');
                $this->load->view('v_dashboard');
                $this->load->view('template/footer');
        }
        
        public function anggota(){
                $data['judul'] = 'Data Buku';
                $data['anggota'] = $this->m_master->get_data('tb_anggota')->result();

                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar');
                $this->load->view('anggota/v_anggota',$data);
                $this->load->view('template/footer');
        }

        public function input_anggota(){
                $nim = $this->input->post('nim');
                $nama = $this->input->post('nama');
                $jk = $this->input->post('jk');
                $alamat = $this->input->post('alamat');

                $data = array(
                        'nim'    => $nim,
                        'nama'   => $nama,
                        'jk'     => $jk,
                        'alamat' => $alamat
                );

                $this->form_validation->set_rules('nim','Nim','trim|required');
                $this->form_validation->set_rules('nama','Nama','trim|required');
                $this->form_validation->set_rules('jk','JK','trim|required');
                $this->form_validation->set_rules('alamat','Alamat','trim|required');

                if($this->form_validation->run() != false){
                        $this->m_master->insert_data($data,'tb_anggota');
                        redirect('admin/anggota?pesan=berhasil');
                }
                else{
                        redirect('admin/anggota?pesan=gagal');
                }
                
        }

        public function hapus_anggota($id){
                $where = array(
                        'nim' => $nim
                );
                $this->m_master->delete_data($where,'tb_anggota');
                redirect('admin/anggota?pesan=hapusberhasil');
        }

        public function edit_anggota($nim){
                $data['judul'] = 'Data Buku';
                $where = array(
                        'nim' => $nim
                );
                $data['anggota'] = $this->m_master->edit_data($where,'tb_anggota')->result();

                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar');
                $this->load->view('anggota/v_editanggota',$data);
                $this->load->view('template/footer');
        }

        public function update_anggota(){
                $nim = $this->input->post('nim');
                $nama = $this->input->post('nama');
                $jk = $this->input->post('jk');
                $alamat = $this->input->post('alamat');

                $data = array(
                        'nama'   => $nama,
                        'jk'     => $jk,
                        'alamat' => $alamat
                );

                $where = array(
                        'nim'    => $nim
                );

                $this->form_validation->set_rules('nim','Nim','trim|required');
                $this->form_validation->set_rules('nama','Nama','trim|required');
                $this->form_validation->set_rules('jk','JK','trim|required');
                $this->form_validation->set_rules('alamat','Alamat','trim|required');

                if($this->form_validation->run() != false){
                        $this->m_master->update_data($where,$data,'tb_anggota');
                        redirect('admin/anggota?pesan=update');
                }
                else{
                        redirect('admin/anggota?pesan=gagalupdate');
                }
        }

        public function petugas(){
                $data['judul'] = 'Data Petugas';
                $data['petugas'] = $this->m_master->get_data('tb_petugas')->result();

                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar');
                $this->load->view('petugas/v_petugas',$data);
                $this->load->view('template/footer');
        }

        public function input_petugas(){
                $nama     = $this->input->post('nama');
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $data = array(
                        'nama'     => $nama,
                        'username' => $username,
                        'password' => md5($password)
                );

                $this->form_validation->set_rules('nama','Nama','trim|required');
                $this->form_validation->set_rules('username','Username','trim|required');
                $this->form_validation->set_rules('password','Password','trim|required');

                if($this->form_validation->run() != false){
                        $this->m_master->insert_data($data,'tb_petugas');
                        redirect('admin/petugas?pesan=berhasil');
                }
                else{
                        redirect('admin/petugas?pesan=gagal');
                }
        }

        public function hapus_petugas($id){
                $where = array(
                        'id' => $id
                );
                $this->m_master->delete_data($where,'tb_petugas');
                redirect('admin/petugas?pesan=hapus');
        }

        public function buku(){
                $data['judul'] = 'Data Buku';
                $data['buku'] = $this->m_master->get_data('tb_buku')->result();

                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar');
                $this->load->view('buku/v_buku',$data);
                $this->load->view('template/footer');
        }

        public function input_buku(){
                $kode           = $this->input->post('kode');
                $judul          = $this->input->post('judul');
                $penulis        = $this->input->post('penulis');
                $tahun          = $this->input->post('tahun');
                $penerbit       = $this->input->post('penerbit');
                $kategori       = $this->input->post('kategori');
                $stok           = $this->input->post('stok');

                $data = array(
                        'kode'          => $kode,
                        'judul'         => $judul,
                        'penulis'       => $penulis,
                        'tahun'         => $tahun,
                        'penerbit'      => $penerbit,
                        'kategori'      => $kategori,
                        'stok'          => $stok
                );

                $this->form_validation->set_rules('kode','Kode','trim|required');
                $this->form_validation->set_rules('judul','Judul','trim|required');
                $this->form_validation->set_rules('penulis','Penulis','trim|required');
                $this->form_validation->set_rules('tahun','Tahun','trim|required');
                $this->form_validation->set_rules('penerbit','Penerbit','trim|required');
                $this->form_validation->set_rules('kategori','Kategori','trim|required');
                $this->form_validation->set_rules('stok','Stok','trim|required');

                if($this->form_validation->run() != false){
                        $this->m_master->insert_data($data,'tb_buku');
                        redirect('admin/buku?pesan=berhasil');
                }
                else{
                        redirect('admin/buku?pesan=gagal');
                }
        }

        public function hapus_buku($kode){
                $where = array(
                        'kode' => $kode
                );

                $this->m_master->delete_data($where,'tb_buku');
                redirect('admin/buku?pesan=hapus');
        }

        public function edit_buku($kode){
                $data['judul'] = 'Edit Buku';

                $where = array(
                        'kode' => $kode
                );

                $data['buku'] = $this->m_master->edit_data($where,'tb_buku')->result();

                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar');
                $this->load->view('buku/v_editbuku',$data);
                $this->load->view('template/footer');
        }

        public function update_buku(){
                $kode           = $this->input->post('kode');
                $judul          = $this->input->post('judul');
                $penulis        = $this->input->post('penulis');
                $tahun          = $this->input->post('tahun');
                $penerbit       = $this->input->post('penerbit');
                $kategori       = $this->input->post('kategori');
                $stok           = $this->input->post('stok');

                $data = array(
                        'judul'         => $judul,
                        'penulis'       => $penulis,
                        'tahun'         => $tahun,
                        'penerbit'      => $penerbit,
                        'kategori'      => $kategori,
                        'stok'          => $stok
                );

                $where = array(
                        'kode'          => $kode
                );

                $this->form_validation->set_rules('kode','Kode','trim|required');
                $this->form_validation->set_rules('judul','Judul','trim|required');
                $this->form_validation->set_rules('penulis','Penulis','trim|required');
                $this->form_validation->set_rules('tahun','Tahun','trim|required');
                $this->form_validation->set_rules('penerbit','Penerbit','trim|required');
                $this->form_validation->set_rules('kategori','Kategori','trim|required');
                $this->form_validation->set_rules('stok','Stok','trim|required');

                if($this->form_validation->run() != false){
                        $this->m_master->update_data($where,$data,'tb_buku');
                        redirect('admin/buku?pesan=update');
                }
                else{
                        redirect('admin/buku?pesan=gagalupdate');
                }
        }

        public function peminjaman(){
                $data['judul']   = 'Peminjaman';
                $data['anggota'] = $this->m_master->get_data('tb_anggota')->result();
                $data['buku']    = $this->m_master->get_data('tb_buku')->result();

                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar');
                $this->load->view('transaksi/v_peminjaman',$data);
                $this->load->view('template/footer');
        }

        public function act_peminjaman(){
                $nim_anggota    = $this->input->post('nim_anggota');
                $kode_buku      = $this->input->post('kode_buku');
                $tgl_pinjam     = $this->input->post('tgl_pinjam');
                $tgl_kembali    = $this->input->post('tgl_kembali');
                $denda          = $this->input->post('denda');
                $status         = 'Belum Dikembalikan';
                $id_petugas     = $this->session->userdata('id');

                $data = array(
                        'nim_anggota' => $nim_anggota,
                        'kode_buku'   => $kode_buku,
                        'tgl_pinjam'  => $tgl_pinjam,
                        'tgl_kembali' => $tgl_kembali,
                        'denda'       => $denda,
                        'status'      => $status,
                        'id_petugas'  => $id_petugas
                );

                $this->form_validation->set_rules('nim_anggota','Nim_anggota','trim|required');
                $this->form_validation->set_rules('kode_buku','Kode_buku','trim|required');
                $this->form_validation->set_rules('tgl_pinjam','Tgl_pinjam','trim|required');
                $this->form_validation->set_rules('tgl_kembali','Tgl_kembali','trim|required');
                $this->form_validation->set_rules('denda','Denda','trim|required');

                if($this->form_validation->run() != false){
                        $this->m_master->insert_data($data,'tb_transaksi');

                        //update stok buku
                        $this->db->where('kode',$kode_buku);
                        $this->db->select('stok');
                        $this->db->from('tb_buku');
                        $data  = $this->db->get();

                        $stok  = $data->row_array();
                        
                        $hasil = $stok['stok'] - 1;

                        //update stok buku
                        $d = array (
                                'stok' => $hasil
                        );

                        $w = array (
                                'kode' => $kode_buku
                        );

                        $this->m_master->update_data($w,$d,'tb_buku');

                        redirect('admin/peminjaman?pesan=berhasil');
                }
                else{
                        redirect('admin/peminjaman?pesan=gagal');
                }
                

        }

        public function lap_peminjaman(){
                $data['judul']   = 'Laporan Peminjaman';
                $data['pinjam'] = $this->db->query("select * from tb_transaksi,tb_anggota,tb_buku where nim_anggota=nim and kode_buku=kode and tgl_dikembalikan is NULL")->result();

                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar');
                $this->load->view('laporan/v_laptransaksi',$data);
                $this->load->view('template/footer');
        }

        public function batal($id_transaksi){
                //update stok buku
                $this->db->select('kode_buku');
                $this->db->from('tb_transaksi');
                $this->db->where('id_transaksi',$id_transaksi);
                $get_kode = $this->db->get();
                $get_kode_buku = $get_kode->row_array();
                $book_code = $get_kode_buku['kode_buku'];
                
                $this->db->where('kode',$book_code);
                $this->db->select('stok');
                $this->db->from('tb_buku');
                $data  = $this->db->get();

                $stok  = $data->row_array();
                
                $hasil = $stok['stok'] + 1;

                $d = array (
                        'stok' => $hasil
                );

                $where = array (
                        'kode' => $book_code
                );

                //hapus transaksi
                $this->m_master->update_data($where,$d,'tb_buku');

                
                $w = array(
                        'id_transaksi' => $id_transaksi
                );

                $this->m_master->delete_data($w,'tb_transaksi');

                redirect('admin/lap_peminjaman?pesan=berhasil');
        }

        public function filter_peminjaman(){
                $data['judul']   = 'Filter Laporan Peminjaman';

                $keyword = $this->input->post('keyword');

                $this->form_validation->set_rules('keyword','Keyword','trim|required');

                if($this->form_validation->run() != false){

                        $this->db->select('*');
                        $this->db->from('tb_transaksi');
                        $this->db->join('tb_anggota','tb_anggota.nim = tb_transaksi.nim_anggota');
                        $this->db->join('tb_buku','tb_buku.kode = tb_transaksi.kode_buku');
                        $this->db->where('tb_transaksi.tgl_dikembalikan is NULL');
                        $this->db->where('tb_anggota.nim',$keyword);
                        
                        $data['pinjam'] = $this->db->get()->result();

                        $this->load->view('template/header',$data);
                        $this->load->view('template/sidebar');
                        $this->load->view('laporan/v_laptransaksi_filter',$data);
                        $this->load->view('template/footer');
                }

                else{
                        redirect('admin/lap_peminjaman');
                }
        }

        public function pengembalian(){
                $data['judul']   = 'Pengembalian';

                $data['pinjam'] = $this->db->query("select * from tb_transaksi,tb_anggota,tb_buku where nim_anggota=nim and kode_buku=kode and tgl_dikembalikan is NULL")->result();

                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar');
                $this->load->view('transaksi/v_pengembalian',$data);
                $this->load->view('template/footer');
        }

        public function detail_kembali($id_transaksi){
                $data['judul']   = 'Detail Pengembalian';

                $data['detail'] = $this->db->query("select * from tb_transaksi,tb_anggota,tb_buku where nim_anggota=nim and kode_buku=kode and id_transaksi='$id_transaksi'")->result();

                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar');
                $this->load->view('transaksi/v_detkembali',$data);
                $this->load->view('template/footer');
        }

        public function act_pengembalian(){
                $id_transaksi      = $this->input->post('id_transaksi');
                $nim_anggota       = $this->input->post('nim_anggota');
                $kode_buku         = $this->input->post('kode_buku');
                $tgl_pinjam        = $this->input->post('tgl_pinjam');
                $tgl_kembali       = $this->input->post('tgl_kembali');
                $tgl_dikembalikan  = $this->input->post('tgl_dikembalikan');
                $denda             = $this->input->post('denda');
                $total_denda       = $this->input->post('total_denda');
                $status            = 'Dikembalikan';
                $id_petugas        = $this->session->userdata('id');

                $where = array(
                        'id_transaksi'          => $id_transaksi
                );

                $data = array(
                        'nim_anggota'           => $nim_anggota,
                        'kode_buku'             => $kode_buku,
                        'tgl_pinjam'            => $tgl_pinjam,
                        'tgl_kembali'           => $tgl_kembali,
                        'tgl_dikembalikan'      => $tgl_dikembalikan,
                        'denda'                 => $denda,
                        'status'                => $status,
                        'id_petugas'            => $id_petugas
                );

                $this->form_validation->set_rules('nim_anggota','Nim_anggota','trim|required');
                $this->form_validation->set_rules('kode_buku','Kode_buku','trim|required');
                $this->form_validation->set_rules('tgl_pinjam','Tgl_pinjam','trim|required');
                $this->form_validation->set_rules('tgl_kembali','Tgl_kembali','trim|required');
                $this->form_validation->set_rules('tgl_dikembalikan','tgl_dikembalikan','trim|required');
                $this->form_validation->set_rules('total_denda','Total_denda','trim|required');

                if($this->form_validation->run() != false){
                        $this->m_master->update_data($where,$data,'tb_transaksi');

                        //update stok buku
                        $this->db->where('kode',$kode_buku);
                        $this->db->select('stok');
                        $this->db->from('tb_buku');
                        $data  = $this->db->get();

                        $stok  = $data->row_array();
                        
                        $hasil = $stok['stok'] + 1;

                        //update stok buku
                        $d = array (
                                'stok' => $hasil
                        );

                        $w = array (
                                'kode' => $kode_buku
                        );

                        $this->m_master->update_data($w,$d,'tb_buku');

                        redirect('admin/pengembalian?pesan=berhasil');
                }
                else{
                        redirect('admin/pengembalian?pesan=gagal');
                }
        }
}
