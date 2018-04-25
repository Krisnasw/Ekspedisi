<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_Cabang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Master');
		if ( empty($this->session->userdata('nama_user')) ){ redirect( base_url() ); }
		
	}

	public function index($id_cabang='')
	{	
		
		$order 					= 'id_cabang DESC';	
		$order_karyawan 		= 'id_karyawan DESC';
		$where 					= array('id_cabang' => $id_cabang , 'status_del' => 'T');

		if ($id_cabang != null) {
			$data['karyawan'] 		= $this->Master->get_orderby_desc( 'tb_karyawan' , array('id_cabang' => $id_cabang )  ,$order_karyawan);
			$data['cabang'] 		= $this->Master->get_cabang($where)->result();
			$data['konten'] 		= $this->load->view('Admin/v_cabang-detail',$data,True);
			$this->load->view('Admin/index',$data);
		} else {
			$data['karyawan_select']= $this->Master->get_orderby_desc( 'tb_karyawan', array('status_del' => 'T' , 'id_cabang' => "NOT NULL") ,$order_karyawan);
			$data['karyawan'] 		= $this->Master->get_orderby_desc( 'tb_karyawan', array('status_del' => 'T') ,$order_karyawan)->result();
			$data['cabang'] 		= $this->Master->get_join_two()->result();
			$data['konten'] 		= $this->load->view('Admin/v_cabang',$data,True);
			$this->load->view('Admin/index',$data);
		}
	}

	public function Save(){

		
		if ($_POST['nama_karyawan'] == 'zero') {
			
			$this->session->set_flashdata('konten_err' , 'Karyawan tidak boleh kosong');
			redirect( base_url('Cabang') );
		} else {

			$kode_cabang 	 =	$this->random_code();

			$check 			 = 	$this->Master->get_orderby_desc('tb_cabang',array('kode_cabang' => $kode_cabang), 'id_cabang DESC' )->num_rows();
			do {
				$kode_cabang 	 =	$this->random_code();
			} while ($check > 1);


			$data 	=	array(
			/* Nama Field    => Isi Data $_Post */
				'nama_cabang'  => $_POST['nama_cabang'],
				'kode_cabang'  => $kode_cabang,
				'alamat'       => $_POST['alamat'],
				'telp_cabang'  => $_POST['telp_cabang'],
				'id_karyawan'  => $_POST['nama_karyawan'],
				'status_del'   => 'T'
				);




		$this->Master->save_data('tb_cabang', $data);

		$query 	=	$this->check_cabang();
		foreach ($query as $zdata) {
			$id_cabang = $zdata->id_cabang ;
		}
			

		$wherekaryawan 	   = array('id_karyawan' => $_POST['nama_karyawan']);
		$data_karyawan 	   = array('id_cabang'   => $id_cabang);

		$this->Master->update('tb_karyawan',$wherekaryawan ,'update' , $data_karyawan);

		$this->session->set_flashdata('konten' , 'Data Berhasil di Tambahkan');	
		redirect( base_url('Cabang') );

		}

		
	}

	public function Delete($id_cabang){
		$order = 'id_cabang DESC';	
		$where = array('id_cabang' => $id_cabang);

		$query 		=	$this->Master->get_orderby_desc( 'tb_cabang' , array('id_cabang' => $id_cabang)  ,$order)->result();

		foreach ($query as $karyawan) {
			$id_karyawan 		=	$karyawan->id_karyawan;
		}
			$this->Master->update('tb_karyawan' , array('id_karyawan' => $id_karyawan) , 'update' , array('id_cabang' => 0));
			$this->Master->update('tb_cabang',$where ,'update' , array('status_del' => 'Y' , 'id_karyawan' => 0));

		$this->session->set_flashdata('konten_err' , 'Data Berhasil di Hapus');	
		redirect( base_url('Cabang') );
	}

	public function Update($id_cabang){
		$where 		    = 	array('id_cabang' => $id_cabang );
		$query 	=	$this->Master->get_orderby_desc( 'tb_cabang' ,$where ,'');

		foreach ($query->result() as $datazz) {
			$id_karyawan 	= $datazz->id_karyawan;
		}
		$this->Master->Update('tb_karyawan' , array('id_karyawan' => $id_karyawan) ,'update' ,array('id_cabang' => 0));



		$dataupdate 	=	array(
		/* Nama Field    => Isi Data $_Post */
			'nama_cabang'  => $_POST['nama_cabang'],
			'alamat'       => $_POST['alamat'],
			'telp_cabang'  => $_POST['telp_cabang'],
			'id_karyawan'  => $_POST['nama_karyawan']
			
			);

		
		$this->Master->update('tb_cabang',$where ,'update' , $dataupdate);

		$wherekaryawan 	   = array('id_karyawan' => $_POST['nama_karyawan']);
		$data_karyawan 	   = array('id_cabang'   => $id_cabang);

		$this->Master->update('tb_karyawan',$wherekaryawan ,'update' , $data_karyawan);

		$this->session->set_flashdata('konten' , 'Data Berhasil di Rubah');	
		redirect( base_url('Cabang') );
	}


	public function random_code(){

		$string 		=	'ASDFGHJKLQWERTYUIOPZXCVBNM1234567890';
		$kode           =   '';
        for ($i=0; $i<9; $i++) { 
            $pos        = rand(0 , strlen($string) -1);
            $kode      .= $string{$pos};
        }

        return $kode;

	}

	public function check_cabang(){
		$limit 	=	1;
		$order 	=	'id_cabang desc';
		$query 	=	$this->Master->get_table_order_limit_1('tb_cabang' , $order , $limit )->result();

		return $query;
	}

}
?>