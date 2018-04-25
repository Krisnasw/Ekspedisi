<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('Master');
		
	}

	public function index()
	{
		$this->load->view('v_login');
	}

	public function do_login(){
		$user        =	$_POST['username'];
		$pass        =	md5($_POST['password']);
		
		$session_now =  $this->check_user($user , $pass);
		$text 		 =  'Selamat Datang '.$user;
		if ($session_now != null) {
			$this->session->set_flashdata('konten' , $text);
			redirect( base_url('Beranda') );
		} else {
			redirect( base_url() );
		}
	}

	public function check_user($user , $pass){

		$where 		=	array(
			'nama_user' 	=> $user ,
			'password' 		=> $pass,
			);
		$query 		=	$this->Master->check_session('tb_user' , $where);

		if ($query->num_rows() == 1) {
		
			$data 	=	$query->result();
			
			foreach ($data as $login) {	
				$config['nama_user'] 	= $login->nama_user;
				$config['id_role'] 		= $login->id_role;
				$config['id_user'] 		= $login->id_user;
				$this->session->set_userdata($config);	

			}

			return $this->session->userdata();
		
		} else {

			return NULL;
		}

		
	}

	public function do_logout(){
		$this->session->sess_destroy();
		redirect( base_url() );
	}


}
