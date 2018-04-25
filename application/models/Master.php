<?php 

	class Master extends CI_model{
		
		function get_orderby_desc($nama_table , $where , $order="" , $limit=""){
			if ($order != null) {
				$this->db->order_by($order);
			}

			if ($limit != null) {
				$this->db->limit(1);
			}


			$this->db->where($where);
		    $query 	=	$this->db->get($nama_table);

			if ($query->num_rows() > 0) {
				return $query;
			} else {
				return $query;
			}
		}

		function save_data($nama_table , $data){
			$this->db->insert($nama_table ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		function update($nama_table , $where , $komponen , $dataupdate=''){
			
			if ($komponen == 'delete') {	
				$this->db->where($where);
				$this->db->update($nama_table , $this->delete());

			} else if ($komponen == 'update' && !empty($dataupdate) ) {

				$this->db->where($where);
				$this->db->update($nama_table , $dataupdate);

			} else if ($komponen == 'update-delete') {
				
				$this->db->where($where);
				$this->db->update($nama_table , $dataupdate);
			} 

			if ($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}	
			
		}

		function check_session($tbl_user , $where){
			return $this->db->get_where($tbl_user , $where);

		}

		function delete(){
			return array('status_del' => 'Y');
		}

		public function get_join_two(){
			// $find_by 		=	$tbl1.'.'.$column.'='.$tbl2.'.'.$column;
			// $this->db->select($need);
			// $this->db->from($tbl2);
			// $this->db->join($tbl1 , $find_by ,$type );
			// $this->db->order_by($order);

			// return $this->db->query (
			// 	"SELECT a.*, b.* FROM $tbl1 a $type JOIN $tbl2 b ON a.$column = b.$column"
			// 	);
			
			return $this->db->query(
				"SELECT a.*, b.* FROM `tb_karyawan` a right JOIN `tb_cabang` b ON a.id_karyawan = b.id_karyawan where b.status_del = 'T' "
				);
		}
		public function get_table_order_limit_1($table , $order , $limit){
			$this->db->order_by($order);
			return $this->db->get($table , $limit);
		}

		public function get_cabang($where){
			return $this->db->get_where('tb_cabang',$where);
		}


		public function ambil_tujuan($table,$nama_asal) { // Kota tujuan di t_v_order

			$this->db->where($nama_asal);
			$result 	=	$this->db->get($table);

			if ($result->num_rows() > 0) {
				return $result->result_array();
			} else {
				return array();
			}


		}

		public function get_custom_query($query){

			return $this->db->query($query);
		}

	}


 ?>