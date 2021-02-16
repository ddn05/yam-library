<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct(){
		parent::__construct();
		// cek login
		if($this->session->userdata('status') != "login"){
                redirect('user?pesan=belumlogin');
		}
    }

    public function index(){
        $this->load->view('user/v_login');
    }

    public function login(){
        $nim      = $this->input->post('nim');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('nim','Nim','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run() != false){
            $where = array(
                'nim' => $nim,
                'password' => md5($password)
            );

            $data = $this->m_master->edit_data($where,'tb_anggota')->num_rows();
            $d    = $this->m_master->edit_data($where,'tb_anggota')->row();

            if($data>0){
                $session = array (
                    'nim'     => $d->nim,
                    'nama'   => $d->nama,
                    'status' => 'login'
                );
                $this->session->set_userdata($session);
                redirect('user');
            }
            else{
                redirect('user?pesan=gagal'.md5($password));
            }
        }
        else{
            $this->load->view('user/v_login');
        }
    }

    public function userview(){
        $this->load->view('user/v_pinjam');
    }
}