<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Control_Bank extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Master');
		if ( empty($this->session->userdata('nama_user')) ){ redirect( base_url() ); }

		
	}

	public function index(){
		$where 				=	array('status_del' => 'T');
		$order 				=	'id_bank DESC';
		$data['bank'] 		=   $this->Master->get_orderby_desc('tb_bank' ,$where ,$order)->result();
		$data['konten'] 	=	$this->load->view('Admin/v_bank' , $data , True);
		$this->load->view('Admin/index',$data);
	}

	public function Save(){
		// $this->load->helper('session');
		$data 	=	array(
		/* Nama Field    => Isi Data $_Post */
			'nama_bank'  => $_POST['nama_bank'],
			'no_rek'     => $_POST['nomor_rek'],
			'cabang'     => $_POST['cabang'],
			'kota'       => $_POST['kota'],
			'status_del' => 'T'
			);

		$this->Master->save_data('tb_bank' , $data);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Tambahkan');	

		redirect( base_url('Bank') );
	}

	public function Delete($idbank){
		$where = 	array('id_bank' => $idbank);
		$this->Master->update('tb_bank',$where ,'delete');

		$this->session->set_flashdata('konten_err' , 'Data Berhasil di Hapus');	
		redirect( base_url('Bank') );
	}

	public function Update($idbank){
		$where 		  = 	array('id_bank' => $idbank);
		$update_data  =   	array(
			'nama_bank'  => $_POST['nama_bank'],
			'no_rek'     => $_POST['nomor_rek'],
			'cabang'     => $_POST['cabang'],
			'kota'       => $_POST['kota'],
			);

		$this->Master->update('tb_bank',$where ,'update' , $update_data);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Rubah');	
		redirect( base_url('Bank') );
	}
}
?>