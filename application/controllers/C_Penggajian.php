<?php 

    class C_Penggajian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Master');
        if ( empty($this->session->userdata('nama_user')) ){ redirect( base_url() ); }
        
    }

    public function index() {
        $query                  =   "SELECT nama_cabang, id_cabang FROM tb_cabang ORDER BY id_cabang DESC";
        $kQuery                 =   "SELECT nama_karyawan, id_karyawan FROM tb_karyawan ORDER BY id_karyawan ASC";
        $data['cabang']          =   $this->Master->get_custom_query($query)->result();
        $data['karyawan']       =   $this->Master->get_custom_query($kQuery)->result();
        $data['konten']         =   $this->load->view('Admin/Transaksi/t_v_penggajian',$data,True);
        $this->load->view('Admin/index',$data);
    }

    public function createFormData() {
        $cabangId = @$_POST['cabang'];
        $startDate = @$_POST['dateNow'];
        $encDate = date('Y-m-d', strtotime($_POST['dateNow']));

        if (empty($cabangId) || empty($startDate) || $startDate == "NaN/NaN/NaN") {
            # code...
            echo json_encode(['status' => 'error', 'message' => 'Form Belum Lengkap'], 200);
        } else {
            $query = "SELECT created_at, form_id FROM tb_penggajian WHERE created_at = '$encDate' && status_del = 'T'";
            $cek = $this->Master->get_custom_query($query)->result();

            if (count($cek) <= 0) {
                # code...
                $formId = rand(00000,99999);
                $query = "SELECT id_karyawan FROM tb_karyawan WHERE id_cabang = $cabangId ORDER BY id_karyawan DESC";
                $cekUserList = $this->Master->get_custom_query($query)->result();

                if (count($cekUserList) <= 0) {
                    # code...
                    echo json_encode(['status' => 'error', 'message' => 'Karyawan Tidak Ditemukan'], 200);
                } else {
                    foreach ($cekUserList as $key) {
                        # code...
                        $data = [
                            'form_id' => $formId,
                            'karyawan_id' => $key->id_karyawan,
                            'created_at' => date('Y-m-d', strtotime($_POST['dateNow']))
                        ];

                        $ins = $this->Master->save_data('tb_penggajian', $data);
                    }

                    if ($ins) {
                        # code...
                        $this->getUserByCabang($formId);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Gagal Input Data'], 200);
                    }
                }
            } else {
                $idForm = "";
                foreach ($cek as $key) {
                    $idForm = $key->form_id;
                }

                $this->getUserByCabang($idForm);
            }
        }
    }

    public function getUserByCabang($formId) {
        $query = "SELECT tk.id_karyawan, tk.nama_karyawan, tk.gaji, tp.form_id, tp.bonus, tp.thr, tp.potongan, tbk.total_kasbon FROM tb_penggajian tp JOIN tb_karyawan tk ON tp.karyawan_id = tk.id_karyawan JOIN tb_kasbon tbk ON tp.karyawan_id = tbk.karyawan_id WHERE form_id = $formId GROUP BY tp.karyawan_id ORDER BY tp.id DESC";
        $karyawan = $this->Master->get_custom_query($query)->result();
        echo json_encode($karyawan);
    }

    public function getKasbonData() {
        $employeeId = @$_POST['idEmployee'];

        $query = "SELECT * FROM tb_kasbon WHERE karyawan_id = $employeeId ORDER BY id_kasbon DESC";
        $kasbon = $this->Master->get_custom_query($query)->result();
        if (count($kasbon) <= 0) {
            # code...
            $data = [
                'karyawan_id' => $employeeId,
                'total_kasbon' => 0
            ];

            $ins = $this->Master->save_data('tb_kasbon', $data);
            foreach ($kasbon as $key) {
                echo json_encode(['total_kasbon' => $key->total_kasbon, 'id_kasbon' => $key->id_kasbon], 200);
            }
        } else {
            foreach ($kasbon as $key) {
                echo json_encode(['total_kasbon' => $key->total_kasbon, 'id_kasbon' => $key->id_kasbon], 200);
            }
        }
    }

    public function postCicilanKasbon() {
        $employeeId = @$_POST['karyawanId'];
        $kasbon = @$_POST['kasbon'];
        $cicilan = @$_POST['pencicilan'];
        $idKasbon = @$_POST['idKasbon'];

        if ("" == trim($employeeId) || "" == trim($kasbon) || "" == trim($cicilan) || "" == trim($idKasbon)) {
            # code...
            echo json_encode(['status' => 'error', 'message' => 'Form Tidak Lengkap'], 200);
        } else {
            $query = "SELECT * FROM tb_kasbon WHERE id_kasbon = $idKasbon";
            $q = $this->Master->get_custom_query($query)->result();

            if (count($q) <= 0) {
                # code...
                echo json_encode(['status' => 'error', 'message' => 'Kasbon Tidak Ada'], 200);
            } else {
                if ($kasbon <= $cicilan) {
                    # code...
                    echo json_encode(['status' => 'error', 'message' => 'Anda Tidak Memiliki Kasbon'], 200);
                } else {
                    $data = [
                        'kasbon_id' => $idKasbon,
                        'cicilan' => $cicilan
                    ];

                    $ins = $this->Master->save_data('tb_cicilan', $data);
                    if ($ins) {
                        # code...
                        echo json_encode(['status' => 'success', 'message' => 'Cicilan Berhasil Ditambahkan'], 200);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Gagal Menambahkan Cicilan'], 200);
                    }
                }
            }
        }
    }

    public function setDeletedForm() {
        $formId = @$_POST['formId'];
        if (empty($formId)) {
            # code...
            echo json_encode(['status' => 'error', 'message' => 'Data Tidak Valid'], 200);
        } else {
            $query = "SELECT * FROM tb_penggajian WHERE form_id = $formId";
            $cek = $this->Master->get_custom_query($query)->result();

            if (count($cek) <= 0) {
                # code...
                echo json_encode(['status' => 'error', 'message' => 'Data Tidak Ditemukan'], 200);
            } else {
                $data = [
                    'form_id' => $formId
                ];
                $up = $this->Master->update('tb_penggajian', $data, 'delete');
                // print_r($this->db->last_query());
                if ($up) {
                    # code...
                    echo json_encode(['status' => 'success', 'message' => 'Data Berhasil Dihapus'], 200);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Gagal Menghapus Data'], 200);
                }
            }
        }
    }

    public function postAllGaji() {
        $formId = @$_POST['formId'];
        $idEmployee = @$_POST['idEmployee'];
        $bonus = @$_POST['bonus'];
        $thr = @$_POST['thr'];
        $potongan = @$_POST['potongan'];

        if ( empty($idEmployee) || empty($bonus) || empty($thr) || empty($potongan) ) {
            # code...
            echo json_encode(['status' => 'error', 'message' => 'Data Tidak Lengkap'], 200);
        } else {
            $query = "SELECT * FROM tb_penggajian WHERE form_id = $formId";
            $q = $this->Master->get_custom_query($query)->result();

            if (count($q) <= 0) {
                # code...
                echo json_encode(['status' => 'error', 'message' => 'No Form Tidak Ditemukan'], 200);
            } else {
                for ($i=0; $i < count($idEmployee); $i++) {
                    # code...
                    $where1 = [
                        'form_id' => $formId,
                        'karyawan_id' => $idEmployee[$i]
                    ];

                    $data = [
                        'bonus' => $bonus[$i],
                        'thr' => $thr[$i],
                        'potongan' => $potongan[$i]
                    ];

                    $up = $this->Master->update('tb_penggajian', $where1, 'update', $data);
                }

                if ($up) {
                    # code...
                    echo json_encode(['status' => 'success', 'message' => 'Penggajian Berhasil Diinput'], 200);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Gagal Input Penggajian'], 200);
                }
            }
        }
    }

    public function changeBonus() {
        $formId = @$_POST['formid'];
        $idEmployee = @$_POST['idEmployee'];
        $bonus = @$_POST['bonus'];

        if ( "" == trim($formId) || "" == trim($idEmployee) || "" == trim($bonus) ) {
            # code...
            echo json_encode(['status' => 'error', 'message' => 'Harap Lengkapi Form'], 200);
        } else {
            $query = "SELECT * FROM tb_penggajian WHERE form_id = $formId AND karyawan_id = $idEmployee";
            $q = $this->Master->get_custom_query($query)->result();

            if (count($q) <= 0) {
                # code...
                echo json_encode(['status' => 'error', 'message' => 'Form No Tidak Ditemukan'], 200);
            } else {
                $where = [
                    'form_id' => $formId,
                    'karyawan_id' => $idEmployee
                ];

                $data = [
                    'bonus' => $bonus
                ];

                $up = $this->Master->update('tb_penggajian', $where, 'update', $data);

                if ($up) {
                    # code...
                    echo json_encode(['status' => 'success', 'message' => 'Bonus Berhasil Diupdate'], 200);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Gagal Update Bonus'], 200);
                }
            }
        }
    }

    public function changeThr() {
        $formId = @$_POST['formid'];
        $idEmployee = @$_POST['idEmployee'];
        $thr = @$_POST['thr'];

        if ( "" == trim($formId) || "" == trim($idEmployee) || "" == trim($thr) ) {
            # code...
            echo json_encode(['status' => 'error', 'message' => 'Harap Lengkapi Form'], 200);
        } else {
            $query = "SELECT * FROM tb_penggajian WHERE form_id = $formId AND karyawan_id = $idEmployee";
            $q = $this->Master->get_custom_query($query)->result();

            if (count($q) <= 0) {
                # code...
                echo json_encode(['status' => 'error', 'message' => 'Form No Tidak Ditemukan'], 200);
            } else {
                $where = [
                    'form_id' => $formId,
                    'karyawan_id' => $idEmployee
                ];

                $data = [
                    'thr' => $thr
                ];

                $up = $this->Master->update('tb_penggajian', $where, 'update', $data);

                if ($up) {
                    # code...
                    echo json_encode(['status' => 'success', 'message' => 'THR Berhasil Diupdate'], 200);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Gagal Update THR'], 200);
                }
            }
        }
    }

    public function changePotongan() {
        $formId = @$_POST['formid'];
        $idEmployee = @$_POST['idEmployee'];
        $potongan = @$_POST['potongan'];

        if ( "" == trim($formId) || "" == trim($idEmployee) || "" == trim($potongan) ) {
            # code...
            echo json_encode(['status' => 'error', 'message' => 'Harap Lengkapi Form'], 200);
        } else {
            $query = "SELECT * FROM tb_penggajian WHERE form_id = $formId AND karyawan_id = $idEmployee";
            $q = $this->Master->get_custom_query($query)->result();

            if (count($q) <= 0) {
                # code...
                echo json_encode(['status' => 'error', 'message' => 'Form No Tidak Ditemukan'], 200);
            } else {
                $where = [
                    'form_id' => $formId,
                    'karyawan_id' => $idEmployee
                ];

                $data = [
                    'potongan' => $potongan
                ];

                $up = $this->Master->update('tb_penggajian', $where, 'update', $data);

                if ($up) {
                    # code...
                    echo json_encode(['status' => 'success', 'message' => 'Potongan Berhasil Diupdate'], 200);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Gagal Update Potongan'], 200);
                }
            }
        }
    }
}