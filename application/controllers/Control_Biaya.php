<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_Biaya extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Master');
		if ( empty($this->session->userdata('nama_user')) ){ redirect( base_url() ); }
		
	}

	public function index(){
		$order 					    = 'id_operation DESC';
		$data['operation'] 			= $this->Master->get_orderby_desc( 'tb_operation' , array('status_del' => 'T') ,$order)->result();
		$data['konten'] 		    = $this->load->view('Admin/v_biayaoperasi',$data,True);
		$this->load->view('Admin/index',$data);
	}

	public function Save(){

		$data 	=	array(
		/* Nama Field    => Isi Data $_Post */
			'nama_operation'  => $_POST['nama_operation'],
			'biaya_operation' => $_POST['biaya_operation'],
			'status_del'      => 'T'
			);

		$this->Master->save_data('tb_operation' , $data);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Tambahkan');	

		redirect( base_url('Biaya') );

	}

	public function Update($id_operation){
		$where 		    = 	array('id_operation' => $id_operation );
		$dataupdate 	=	array(
		/* Nama Field    => Isi Data $_Post */
			'nama_operation'  => $_POST['nama_operation'],
			'biaya_operation' => $_POST['biaya_operation'],
			);

		$this->Master->update('tb_operation',$where ,'update' , $dataupdate);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Rubah');	
		redirect( base_url('Biaya') );

	}

	public function Delete($id_operation){

		$where = 	array('id_operation' => $id_operation);
		$this->Master->update('tb_operation',$where ,'delete');

		$this->session->set_flashdata('konten_err' , 'Data Berhasil di Hapus');	
		redirect( base_url('Biaya') );
	}

}
?>