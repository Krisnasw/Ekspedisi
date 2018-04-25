<?php 

	class Control_Truck extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Master');
		if ( empty($this->session->userdata('nama_user')) ){ redirect( base_url() ); }
		
		}

	public function index(){
		$order 					= 'id_truck DESC';
		$query					=  "SELECT a.*, b.* FROM `tb_truck` a inner JOIN `tb_supir` b ON a.kode_supir = b.kode_supir where a.status_del and b.status_del = 'T' ";
		$data['truck'] 			= $this->Master->get_custom_query($query)->result();
		$data['konten'] 		= $this->load->view('Admin/v_truck_supir',$data,True);
		$this->load->view('Admin/index',$data);
	}

	public function Save(){

		$kode 		=	$this->random_code();

		$data_truck 	=	array(
		/* Nama Field    => Isi Data $_Post */
			'nomor_polisi'  => $_POST['nopol'],
			'tanggal_pajak' => $_POST['tgl_pajak'],
			'tanggal_kir'   => $_POST['tgl_kir'],
			'kode_supir'	=> $kode,
			'status_del'    => 'T'
			);

		$data_supir 	=  	array(
			'kode_supir' 		 => $kode,
			'nama_supir'         => $_POST['supir'],
			'tempat_lahir_supir' => $_POST['tempat_lahir'],	
			'tgl_lahir_supir'    => $_POST['tgl_lahir'],
			'nomor_telp'         => $_POST['no_telp'],
			'alamat_supir'       => $_POST['alamat'] ,
			'usia' 				 => $this->cari_usia($_POST['tgl_lahir']),
			'no_telp_2'		 => $_POST['no_telp_alt'], 
			'sim_b'				 => $_POST['sim_b'],
			'sim_c'				 => $_POST['sim_c'],
			'no_ktp'			 => $_POST['no_ktp'],
			'status_del'         => 'T'

			);

		$this->Master->save_data('tb_truck' , $data_truck);
		$this->Master->save_data('tb_supir' , $data_supir);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Tambahkan');	

		redirect( base_url('TruckSupir') );

	}

	public function Update($id_truck){
		$where 		    = 	array('id_truck' => $id_truck );
		$dataupdate 	=	array(
		/* Nama Field    => Isi Data $_Post */
			'nomor_polisi'  => $_POST['nopol'],
			'tanggal_pajak' => $_POST['tgl_pajak'],
			'tanggal_kir'   => $_POST['tgl_kir'],
			);

		$this->Master->update('tb_truck' , $where ,'update' , $dataupdate);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Rubah');	
		redirect( base_url('Truck') );

	}

	public function Delete($kode_supir){

		$where = 	array('kode_supir' => $kode_supir);
		$this->Master->update('tb_truck',$where ,'delete');
		$this->Master->update('tb_supir',$where ,'delete');

		$this->session->set_flashdata('konten_err' , 'Data Berhasil di Hapus');	
		redirect( base_url('TruckSupir') );
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

 	public function random_code(){

		$string 		=	'ASDFGHJKLQWERTYUIOPZXCVBNM1234567890';
		$kode           =   '';
        for ($i=0; $i<5; $i++) { 
            $pos        = rand(0 , strlen($string) -1);
            $kode      .= $string{$pos};
        }

        return $kode;

	}
}