<?php 

	class C_Pengiriman_Toko extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Master');
		if ( empty($this->session->userdata('nama_user')) ){ redirect( base_url() ); }
		
	}

	public function index() {
		$query 					=	"SELECT a.*, b.* FROM `tb_truck` a INNER JOIN `tb_supir` b ON a.kode_supir = b.kode_supir where b.status_del = 'T'";
		$data['supir'] 			=	$this->Master->get_custom_query($query)->result();
		$data['konten'] 		=	$this->load->view('Admin/Transaksi/t_v_pengiriman_toko',$data,True);
		$this->load->view('Admin/index',$data);
	}
}