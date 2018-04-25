<?php 

	class Control_Tarif extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Master');
		if ( empty($this->session->userdata('nama_user')) ){ redirect( base_url() ); }
		
		}

	public function index(){
		$order 					= 'id_tarif DESC';
		$data['tarif'] 			= $this->Master->get_orderby_desc( 'tb_tarif' , array('status_del' => 'T') ,$order)->result();
		$data['konten'] 		= $this->load->view('Admin/v_tarif',$data,True);
		$this->load->view('Admin/index',$data);
	}

	public function Save(){

		$data 	=	array(
		/* Nama Field    => Isi Data $_Post */
			'kota_tujuan' => $_POST['kota_tujuan'],
			'kota_asal'   => $_POST['kota_asal'],
			'tarif_kubik' => $_POST['per_kubik'],
			'tarif_kg'    => $_POST['per_km'],
			'status_del'  => 'T'
			);

		$this->Master->save_data('tb_tarif' , $data);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Tambahkan');	

		redirect( base_url('Tarif') );

	}

	public function Update($id_tarif){
		$where 		    = 	array('id_tarif' => $id_tarif );
		$dataupdate 	=	array(
		/* Nama Field    => Isi Data $_Post */
			'kota_tujuan' => $_POST['kota_tujuan'],
			'kota_asal'   => $_POST['kota_asal'],
			'tarif_kubik' => $_POST['per_kubik'],
			'tarif_kg'    => $_POST['per_km'],
			);

		$this->Master->update('tb_tarif',$where ,'update' , $dataupdate);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Rubah');	
		redirect( base_url('Tarif') );

	}

	public function Delete($id_tarif){

		$where = 	array('id_tarif' => $id_tarif);
		$this->Master->update('tb_tarif',$where ,'delete');

		$this->session->set_flashdata('konten_err' , 'Data Berhasil di Hapus');	
		redirect( base_url('Tarif') );
	}
}