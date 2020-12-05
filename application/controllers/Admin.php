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
}
