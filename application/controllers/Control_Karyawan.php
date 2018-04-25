<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_Karyawan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Master');
		if ( empty($this->session->userdata('nama_user')) ){ redirect( base_url() ); }
		
		
	}

	public function index($id_karyawan='')
	{	
		

		if ($id_karyawan != null) {
			$where 					= array('id_karyawan' => $id_karyawan , 'status_del' => 'T');
			$order 					= 'id_karyawan DESC';
			$data['karyawan'] 		= $this->Master->get_orderby_desc( 'tb_karyawan' , $where  ,$order)->result();
			$data['konten'] 		= $this->load->view('Admin/v_karyawan-detail',$data,True);
			$this->load->view('Admin/index',$data);
		} else { 
			$order 					= 'id_karyawan DESC';
			$data['karyawan'] 		= $this->Master->get_orderby_desc( 'tb_karyawan' , array('status_del' => 'T') ,$order)->result();
			$data['konten'] 		= $this->load->view('Admin/v_karyawan',$data,True);
			$this->load->view('Admin/index',$data);
		}
	}

	public function Save(){
		
		$data 	=	array(
		/* Nama Field    => Isi Data $_Post */
			'nama_karyawan'   => $_POST['nama_karyawan'],
			'jenis_kelamin'   => $_POST['jk'],
			'tempat_lahir'    => $_POST['tempat_lahir'],
			'tgl_lahir'       => $_POST['tgl_lahir'],
			'nomor_telp'      => $_POST['no_telp'],
			'alamat_karyawan' => $_POST['alamat'] ,
			'gaji'            => $_POST['salary'] ,
			'status_del'      => 'T'
			);

		$this->Master->save_data('tb_karyawan' , $data);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Tambahkan');	

		redirect( base_url('Karyawan') );
	}

	// public function detail_karyawan($id_karyawan){
	// 	$where 	=	array(
	// 		'status_del' => 'T',
	// 		'id_karyawan'=> $id_karyawan 
	// 		);
	// 	$data['karyawan'] 		= $this->Master->get_orderby_desc( 'tb_karyawan' , $where ,$order)->result();
	// 	$data['konten'] 		= $this->load->view('Admin/v_karyawan',$data,True);
	// 	$this->load->view('Admin/index',$data);
	// }

	public function Delete($id_karyawan){

		$where = 	array('id_karyawan' => $id_karyawan);
		$this->Master->update('tb_karyawan',$where ,'delete');

		$this->session->set_flashdata('konten_err' , 'Data Berhasil di Hapus');	
		redirect( base_url('Karyawan') );
	}

	public function Update($id_karyawan){
		$where 		  = 	array('id_karyawan' => $id_karyawan);
		$update_data  =   	array(
			'nama_karyawan'   => $_POST['nama_karyawan'],
			'jenis_kelamin'   => $_POST['jk'],
			'tempat_lahir'    => $_POST['tempat_lahir'],
			'tgl_lahir'       => $_POST['tgl_lahir'],
			'nomor_telp'      => $_POST['no_telp'],
			'alamat_karyawan' => $_POST['alamat'] ,
			'gaji'            => $_POST['salary'] ,
			);

		$this->Master->update('tb_karyawan',$where ,'update' , $update_data);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Rubah');	
		redirect( base_url('Karyawan') );
	}
	
}
 ?>