<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

                $data = array(
                        'kode'          => $kode,
                        'judul'         => $judul,
                        'penulis'       => $penulis,
                        'tahun'         => $tahun,
                        'penerbit'      => $penerbit,
                        'kategori'      => $kategori
                );

                $this->form_validation->set_rules('kode','Kode','trim|required');
                $this->form_validation->set_rules('judul','Judul','trim|required');
                $this->form_validation->set_rules('penulis','Penulis','trim|required');
                $this->form_validation->set_rules('tahun','Tahun','trim|required');
                $this->form_validation->set_rules('penerbit','Penerbit','trim|required');
                $this->form_validation->set_rules('kategori','Kategori','trim|required');

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

                $data = array(
                        'judul'         => $judul,
                        'penulis'       => $penulis,
                        'tahun'         => $tahun,
                        'penerbit'      => $penerbit,
                        'kategori'      => $kategori
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

                if($this->form_validation->run() != false){
                        $this->m_master->update_data($where,$data,'tb_buku');
                        redirect('admin/buku?pesan=update');
                }
                else{
                        redirect('admin/buku?pesan=gagalupdate');
                }
        }
}
