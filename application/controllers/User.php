<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct(){
		parent::__construct();
		// cek login
		if($this->session->userdata('status') != "login"){
                        redirect('auth_user?pesan=belumlogin');
		}
	}
    public function index(){
        $nim = $this->session->userdata('nim');
        $date = date("Y-m-d");

        $data['pinjam'] = $this->db->query("SELECT * FROM tb_transaksi,tb_anggota,tb_buku WHERE nim_anggota=nim AND kode_buku=kode AND tgl_dikembalikan IS NULL AND nim_anggota=".$nim)->result();       
        $data['melebihi'] = $this->db->query("SELECT * FROM tb_transaksi,tb_anggota,tb_buku WHERE nim_anggota=nim AND kode_buku=kode AND tgl_kembali < '$date' AND tgl_dikembalikan AND NULL AND nim_anggota=".$nim)->result();
        $data['kembali'] = $this->db->query("SELECT * FROM tb_transaksi,tb_anggota,tb_buku WHERE nim_anggota=nim AND kode_buku=kode AND tgl_dikembalikan IS NOT NULL AND nim_anggota=".$nim)->result();

        $data['j_pinjam'] = $this->db->query("SELECT * FROM tb_transaksi,tb_anggota,tb_buku WHERE nim_anggota=nim AND kode_buku=kode AND tgl_dikembalikan IS NULL AND nim_anggota=".$nim)->num_rows();       
        $data['j_melebihi'] = $this->db->query("SELECT * FROM tb_transaksi,tb_anggota,tb_buku WHERE nim_anggota=nim AND kode_buku=kode AND tgl_kembali < '$date' AND tgl_dikembalikan AND NULL AND nim_anggota=".$nim)->num_rows();
        $data['j_kembali'] = $this->db->query("SELECT * FROM tb_transaksi,tb_anggota,tb_buku WHERE nim_anggota=nim AND kode_buku=kode AND tgl_dikembalikan IS NOT NULL AND nim_anggota=".$nim)->num_rows();

        $this->load->view('user/v_user',$data);
    }

    public function password(){
        $this->load->view('user/v_password');
    }

    public function act_password(){
        $key1 = $this->input->post('key1');
        $key2 = $this->input->post('key2');

        $this->form_validation->set_rules('key1','Key1', 'required|matches[ulangpass]');
        $this->form_validation->set_rules('key2','Key2 Password Baru','required');

        if($key1 == '' && $key2 == ''){
            redirect('user/password?pesan=ulang');
        }

        else if($key1 == $key2){
            $nim = array(
                'nim' => $this->session->userdata('nim')
            );

            $password = array(
                'password' => md5($key1)
            );

            $this->m_master->update_data($nim,$password,'tb_anggota');
            redirect('user?pesan=berhasilubah');
            
        }

        else{
            redirect('user/password?pesan=ulang');
        }
    }
}