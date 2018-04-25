<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_Supir extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Master');
		if ( empty($this->session->userdata('nama_user')) ){ redirect( base_url() ); }
		
		
	}

	public function index($id_supir='')
	{	
		

		if ($id_supir != null) {
			$where 					= array('id_supir' => $id_supir , 'status_del' => 'T');
			$order 					= 'id_supir DESC';
			$data['supir'] 			= $this->Master->get_orderby_desc( 'tb_supir' , $where  ,$order);
			$data['konten'] 		= $this->load->view('Admin/v_supir-detail',$data,True);
			$this->load->view('Admin/index',$data);
		} else { 
			$order 					= 'id_supir DESC';
			$data['supir'] 			= $this->Master->get_orderby_desc( 'tb_supir' , array('status_del' => 'T') , $order);
			$data['konten'] 		= $this->load->view('Admin/v_supir',$data,True);
			$this->load->view('Admin/index',$data);
		}
	}

	public function Save(){
		
		$data 	=	array(
		/* Nama Field    => Isi Data $_Post */
			'nama_supir'         => $_POST['nama_supir'],
			'tempat_lahir_supir' => $_POST['tempat_lahir'],	
			'tgl_lahir_supir'    => $_POST['tgl_lahir'],
			'nomor_telp'         => $_POST['no_telp'],
			'alamat_supir'       => $_POST['alamat'] ,
			'usia' 				 => $this->cari_usia($_POST['tgl_lahir']),
			'status_del'         => 'T'
			);

		$this->Master->save_data('tb_supir' , $data);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Tambahkan');	

		redirect( base_url('Supir') );
	}


	public function Delete($id_supir){

		$where = 	array('id_supir' => $id_supir);
		$this->Master->update('tb_supir',$where ,'delete');

		$this->session->set_flashdata('konten_err' , 'Data Berhasil di Hapus');	
		redirect( base_url('Supir') );
	}

	public function Update($id_supir){
		$where 		  = 	array('id_supir' => $id_supir);
		$update_data 	=	array(
		/* Nama Field    => Isi Data $_Post */
			'nama_supir'         => $_POST['nama_supir'],
			'tempat_lahir_supir' => $_POST['tempat_lahir'],	
			'tgl_lahir_supir'    => $_POST['tgl_lahir'],
			'nomor_telp'         => $_POST['no_telp'],
			'alamat_supir'       => $_POST['alamat'] ,
			'usia' 				 => $this->cari_usia($_POST['tgl_lahir']),
			);

		$this->Master->update('tb_supir',$where ,'update' , $update_data);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Rubah');	
		redirect( base_url('Supir') );
	}

	public function cari_usia($birthdate){
		/* Membagi Array        = Convert String => Array dengan pemisah '-' */ 
		list($year,$month,$day) = 		explode("-",$birthdate);

	    $year_diff  = date("Y") - $year;
	    $month_diff = date("m") - $month;
	    $day_diff   = date("d") - $day;
	    if ( ($month_diff < 0) || ( ($month_diff==0) && ($day_diff < 0) ) ) { 
	    	 $year_diff-- ;
	    }
	    return $year_diff;
 	}
}
 ?>