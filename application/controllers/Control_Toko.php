<?php 

	class Control_Toko extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Master');
		if ( empty($this->session->userdata('nama_user')) ){ redirect( base_url() ); }
		
		
	}

	public function index($id_toko='')
	{	
		if ($id_toko != null) {
			$where 					= array('id_toko' => $id_toko , 'status_del' => 'T');
			$order 					= 'id_toko DESC';
			$data['toko'] 			= $this->Master->get_orderby_desc( 'tb_toko' , $where  ,$order)->result();
			$data['konten'] 		= $this->load->view('Admin/v_toko-detail',$data,TRUE);
			$this->load->view('Admin/index',$data);
		} else { 
			$order 					= 'id_toko DESC';
			$data['toko'] 			= $this->Master->get_orderby_desc( 'tb_toko' , array('status_del' => 'T') ,$order)->result();
			$data['konten'] 		= $this->load->view('Admin/v_toko',$data,True);
			$this->load->view('Admin/index',$data);
		}
	}

	public function Save(){
		
		$data 	=	array(
		/* Nama Field    => Isi Data $_Post */
			'owner_toko'  => $_POST['owner_toko'],
			'jenis_toko'  => $_POST['jenis_toko'],
			'alamat_toko' => $_POST['alamat'],
			'email_toko'  => $_POST['email_toko'],
			'telp_toko'   => $_POST['telp_toko'] ,
			'nama_toko'   => $_POST['nama_toko'] ,
			'disc'        => $_POST['disc_toko'] ,
			'nama_npwp'   => $_POST['nama_npwp_toko'] ,
			'npwp'        => $_POST['npwp_toko'] ,
			'status_del'  => 'T'
			);

		$this->Master->save_data('tb_toko' , $data);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Tambahkan');	

		redirect( base_url('Toko') );
	}


	public function Delete($id_toko){

		$where = 	array('id_toko' => $id_toko);
		$this->Master->update('tb_toko',$where ,'delete');

		$this->session->set_flashdata('konten_err' , 'Data Berhasil di Hapus');	
		redirect( base_url('Toko') );
	}

	public function Update($id_toko){
		$where 		    = 	array('id_toko' => $id_toko);
		$dataupdate 	=	array(
		/* Nama Field    => Isi Data $_Post */
			'owner_toko'  => $_POST['owner_toko'],
			'jenis_toko'  => $_POST['jenis_toko'],
			'alamat_toko' => $_POST['alamat'],
			'email_toko'  => $_POST['email_toko'],
			
			'telp_toko'   => $_POST['telp_toko'] ,
			'nama_toko'   => $_POST['nama_toko'] ,
			'disc'        => $_POST['disc_toko'] ,
			'nama_npwp'   => $_POST['nama_npwp_toko'] ,
			'npwp'        => $_POST['npwp_toko'] ,
			);


		$this->Master->update('tb_toko',$where ,'update' , $dataupdate);
		$this->session->set_flashdata('konten' , 'Data Berhasil di Rubah');	
		redirect( base_url('Toko') );
	}

	// function asdasd(){
	// 	return asdasdasdasd;
	// }

}
 ?>