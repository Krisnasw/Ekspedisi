<?php 

	class crud extends CI_controller {

		function __construct(){
			parent::__construct();
			$this->load->model('m_data');
			$this->load->helper('url');

		}

		function index(){
			$data['data_mahasiswa'] 	= $this->m_data->tampil_data()->result();
			$this->load->view('v_tampil',$data);
		}

		function tambah(){
			$this->load->view('v_input');
		}

		function tambah_aksi(){
			$nama 	=	$this->input->post('nama');
			$alamat = 	$this->input->post('alamat');
			$ktp	=	$this->input->post('no_ktp');
			$hp 	=	$this->input->post('no_hp');
			$email	=	$this->input->post('email');

			$data 	=	array(
				'nama' 		=> $nama,
				'alamat' 	=> $alamat,
				'no_ktp'	=> $ktp,
				'no_hp'		=> $hp,
				'email' 	=> $email
				);
			$this->m_data->input_data($data,'data_mahasiswa');
			redirect( base_url() );
		}

		function hapus($id){
			$where	=	array('id' => $id);
			$this->m_data->hapus_data($where,'data_mahasiswa');
			redirect( base_url() );
		}

		function edit($id){
			$where						= array('id' => $id);
			$data['data_mahasiswa']		= $this->m_data->edit_data($where,'data_mahasiswa')->result();
			$this->load->view('v_edit',$data);
		}

		function update(){
			$nama 	=	$this->input->post('nama');
			$alamat = 	$this->input->post('alamat');
			$ktp	=	$this->input->post('no_ktp');
			$hp 	=	$this->input->post('no_hp');
			$email	=	$this->input->post('email');

			$data 	=	array(
				'nama' 		=> $nama,
				'alamat' 	=> $alamat,
				'no_ktp'	=> $ktp,
				'no_hp'		=> $hp,
				'email' 	=> $email
				);
			$where 	=	$this->input->post('id');

			$this->m_data->update_data($where,$data,'data_mahasiswa');
			redirect( base_url() );
		}
	}

 ?>