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
                        'id' => $id
                );
                $this->m_master->delete_data($where,'tb_anggota');
                redirect('admin/anggota?pesan=hapusberhasil');
        }
}
