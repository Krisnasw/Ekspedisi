<?php 

	class C_Transaksi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Master');
		if ( empty($this->session->userdata('nama_user')) ){ redirect( base_url() ); }
		
		
	}

	public function index(){
		$order 					= 'id_toko DESC';
		$data['nama_toko']	 	= $this->get_nama( array( 'status_del' => 'T') , $order);
		$data['tarif'] 			= $this->Master->get_orderby_desc('tb_tarif' , array('status_del' => 'T') , "id_tarif DESC" );
		$data['barang'] 		= $this->Master->get_orderby_desc('tb_barang' , array('status_del' => 'T') , "id DESC" );
		$data['konten'] 		= $this->load->view('Admin/Transaksi/t_v_order',$data,True);
		$this->load->view('Admin/index',$data);
	}

	public function ajax_nama(){
		$id_toko 		= $_GET['id_toko'];

		$query 	=	$this->get_nama( array('status_del' => 'T' , 'id_toko' => $id_toko ) , null );

		foreach ($query->result_array() as $data) {
			$json 	=	array(
				'telp'    => $data['telp_toko'],
				'pemilik' => $data['owner_toko'],
				'alamat'  => $data['alamat_toko'],
				'disc'    => $data['disc'],
				'nama_toko'=> $data['nama_toko'],
				);

		}

		echo json_encode($json);

	}

	public function get_nama_except($id_toko){

		$query = "SELECT * FROM `tb_toko` WHERE `id_toko` <> $id_toko and status_del = 'T' ";


		$result = $this->Master->get_custom_query($query)->result();
		
		echo json_encode($result);


	}


	public function get_nama( $where , $order){
		
		$data 		=	$this->Master->get_orderby_desc('tb_toko' , $where , $order);
		return $data;

	}

	public function tujuan(){
		$asal 	=	$_GET['asal'] ; 
		$where 	=   array(
			'kota_asal'	=> $asal ,
			'status_del' => 'T'
		);

		$query 	= $this->Master->get_orderby_desc('tb_tarif' , $where  , null );

		$hasil  = "<option value='0'> Tujuan </option>";
		

		foreach ($query->result_array() as $data) {
			 $hasil .= "<option value='".$data['kota_tujuan']."'>".$data['kota_tujuan']."</option>";
		}

		echo $hasil;
	}

	public function Save_barang(){

		$harga_kubik	=	$_POST['tarif_kubik'];
		$harga_kilo 	= 	$_POST['tarif_kilo'];
		$berat_barang 	=	$_POST['berat_barang'];
		$kubik_barang	=	$_POST['kubik_barang'];
		$jumlah_barang  = 	$_POST['jumlah_bar'];
 
		/* Perhitungan */

		$harga_based_kubik = $harga_kubik * $kubik_barang ;
		$harga_based_kilo  = $harga_kilo * $berat_barang  ;

		$cari_type 		   = '';
		$harga_fix		   = '';

		if ($harga_based_kilo > $harga_based_kubik) {

			$cari_type 	   = 'Kilo';

		} else if($harga_based_kubik > $harga_based_kilo){

			$cari_type 		= 'Kubik';
		
		} else if($harga_based_kilo == $harga_based_kubik) {

			$cari_type  	= 'Kubik' ;
		}


		/* Memakai Harga */

		if ($cari_type == 'Kilo') {
		
			$harga_fix  	=	$harga_based_kilo;

		} elseif ($cari_type == 'Kubik') {

			$harga_fix 		=	$harga_based_kubik;
		}

		$data 	= array(
			'nama_barang'	=> $_POST['nama_barang'],		
			'jumlah_barang'	=> $jumlah_barang,
			'berat_barang' 	=> $berat_barang,
			'kubik_barang'	=> $kubik_barang,
			'type_harga' 	=> $cari_type,
			'harga_barang'  => $harga_fix,
			'id_nota' 		=> $_POST['nota'],
			'status_del'	=> 'T'
			);


		$result 	=	$this->Master->save_data('tb_barang' , $data);

		$msg['success'] = false;	
		if ($result) {
			$msg['success'] = true;
		}

		echo json_encode($msg);


	}

	public function cari_harga(){
		$kota_asal = $_GET['kota_asal'];
		$kota_tujuan= $_GET['kota_tujuan'];

		$where 		= array(
			'kota_asal' => $kota_asal,
			'kota_tujuan'=> $kota_tujuan,
			'status_del' => 'T'
			);

		$query 	= $this->Master->get_orderby_desc('tb_tarif' , $where  , null );

		foreach ($query->result() as $data){
			$json 	= array(
				'tarif_kubik' => $data->tarif_kubik,
				'tarif_kilo'  => $data->tarif_kg
				);
		}

		echo json_encode($json);
	}

	public function showBarang($id_nota){
		$order 	=	'id DESC';
		$where  = array(
			'status_del' => 'T' , 
			'id_nota' 	 => $id_nota
			);

		$result = $this->Master->get_orderby_desc('tb_barang' , $where , $order)->result();
		echo json_encode($result);

	}

	public function buat_nota($kode_nota){
		$barang 		=	0;
		$total_harga 	=	0;
		$diskon 		=	$_POST['disc_penerima'];
		$value_nerima	=   $_POST['toko_penerima_manual'];

		if ($_POST['toko_pengirim_manual'] == null) {
			$value_kirim 	=	$_POST['toko_pengirim_auto'];
		} else {
			$value_kirim 	=   $_POST['toko_pengirim_manual'];
		}

		if ($_POST['toko_penerima_manual'] == null){
			$value_nerima  	=	$_POST['toko_penerima_auto'];
		} else {
			$value_nerima   =   $_POST['toko_pengirim_manual'];
		}

		$data_pengirim 	=	array(
			'id_nota_penerima'     =>	$kode_nota,
			'id_toko'     =>	$_POST['toko_pengirim'],
			'nama_toko_pengirim'   =>  	$value_kirim,	
			'telp_toko_pengirim'   =>	$_POST['telp_pengirim'],
			'alamat_toko_pengirim' =>  	$_POST['alamat_pengirim']
		);
		$barang_where	  = array(
			'id_nota' 	=> $kode_nota
		);
		/* Ambil barang */
		$data_barang 		=	$this->Master->get_orderby_desc('tb_barang' , $barang_where);
		foreach ($data_barang->result() as $val) {
			$total_harga 	+=  $val->harga_barang;
			$barang 		+=  $val->jumlah_barang;
		}

		$jumlah_harga 	=	$total_harga * $diskon / 100;
		$data_penerima 	= 	array(
			'id_nota'     =>	$kode_nota,
			'id_toko'     =>	$_POST['toko_penerima'],
			'nama_toko'   =>  	$value_nerima,
			'telp_toko'   =>	$_POST['telp_penerima'],
			'alamat_toko' => 	$_POST['alamat_penerima'],
			'harga_sebelum_disc' => $total_harga ,
			'disc'	 			 => $diskon ,
			'total_harga' 		 => $jumlah_harga ,
			'jumlah_barang' 	 => $data_barang->num_rows() ,
			'jumlah_coli' 		 => $barang
		);

		$resultpengirim  = $this->Master->save_data('tb_nota_pengirim' , $data_pengirim);
		$resultpenerima  = $this->Master->save_data('tb_nota_penerima' , $data_penerima);

		$msg['success'] = false;	
		if ($resultpengirim && $resultpenerima) {
			$msg['success'] = true;
		}

		echo json_encode($msg);


	}
	public function delete_barang(){
		$id_barang  = $_GET['id'];
		$where      = array(
			'id' => $id_barang
		);

		$result 	=	$this->Master->update('tb_barang', $where , 'delete');

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}

	public function delete_all_barang(){
		$id_barang  = $_GET['id_nota'];
		$where      = array(
			'id_nota' => $id_barang
		);

		$result 	=	$this->Master->update('tb_barang', $where , 'delete');

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}

	function cari_id_nota(){
		$order 	=	'id DESC';
		$where 	=	array('status_del' => 'T');
		$query 	=	$this->Master->get_orderby_desc('tb_barang' , $where , $order , 'yes' );
		$idnota = 0;

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $data) {
				$id_nota 	=	str_pad($data->id_nota + 1, 5 , 0 , STR_PAD_LEFT);
			}

		} else {

			$id_nota  = "00001";

			

		}



		$json 	=	array(
			'kode_nota'	=>	$id_nota
		);

		echo json_encode($json);


	}



	/*
	 * Hasil Nota
	 */

	public function Nota($kode_nota=""){	

		if ($kode_nota == null) {
			
			$query 					= 
			"SELECT a.*, b.* FROM `tb_nota_penerima` a INNER JOIN `tb_nota_pengirim` b ON a.id_nota = b.id_nota_penerima";
			$data['nota'] 			=  $this->Master->get_custom_query($query);
			$data['konten'] 		=  $this->load->view('Admin/Transaksi/t_v_nota',$data,True);
			$this->load->view('Admin/index',$data);
			
		} else {

			$query 	= 
			"SELECT a.*, b.* FROM `tb_nota_penerima` a 
			INNER JOIN `tb_nota_pengirim` b ON a.id_nota = b.id_nota_penerima
			where a.id_nota 	=	$kode_nota
 			";

 			$get_data 	=	$this->Master->get_custom_query($query);

 			foreach ($get_data->result() as $data) {

 				$fix 	=	$data->harga_sebelum_disc * $data->disc / 100;
 				$new_fix 	=	$data->harga_sebelum_disc - $fix;

 				$json 	=	array(
 					 	'id_nota' 		  => str_pad($kode_nota , 5 , 0 , STR_PAD_LEFT),
						'nama_pengirim'   => $data->nama_toko_pengirim,
						'alamat_pengirim' => $data->alamat_toko_pengirim,
						'telp_pengirim'   => $data->telp_toko_pengirim,
						'nama_penerima'   => $data->nama_toko,
						'alamat_penerima' => $data->alamat_toko,
						'telp_penerima'   => $data->telp_toko,
						'total_harga' 	  => "Rp" . number_format($data->harga_sebelum_disc) ,
						'jumlah_barang'   => $data->jumlah_barang .' Pcs',
						'jumlah_coli' 	  => $data->jumlah_coli,
						'disc' 			  => $data->disc.' %',
						'fix' 			  => "Rp" . number_format($new_fix),
						'total_disc' 	  => "Rp" . number_format($fix),

 				);
 				
 			}

 			echo json_encode($json);


		}
	}

	public function nota_barang($kode_nota){
		$id_nota = 	str_pad($kode_nota , 5 , 0 , STR_PAD_LEFT);
		$order 	=	'id DESC';
		$where  = array(
			'status_del' => 'T' , 
			'id_nota' 	 => $id_nota
			);

		$result = $this->Master->get_orderby_desc('tb_barang' , $where , $order)->result();
		echo json_encode($result);

	}

}
?>