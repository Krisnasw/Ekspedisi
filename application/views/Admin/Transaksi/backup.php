<div class="row">
    <!-- 
        |
        | Data Pengirim -============================
        |
     -->
    <div class="col-md-6">
        <div class="white-box">
        <h3 class="box-title m-b-0">Form Data Pengirim</h3>
        <p class="text-muted m-b-30 font-13"> Isilah data Pengirim dengan benar</p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
            <form class="form-horizontal">
                
                <div class="form-group">
                    <label for="nama_pengirim" class="col-sm-3 control-label">Nama Toko</label>
                    <div class="col-sm-9">
                       <select class="form-control" onChange="get()" id='id_toko'>
                        <?php 

                            if ($nama_pengirim->num_rows() == 0) {
                               echo "<option  value='1'> Manual </option>";
                            } else {

                                echo "<option value='1'> Manual </option>";    

                                foreach ($nama_pengirim->result() as $key) {
                                    
                                    echo "<option value='".$key->id_toko."'>".$key->nama_toko."</option>";
                                }

                            }  
                         ?>
                       </select>
                   </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Toko</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="manual_toko" placeholder="Nama toko" ></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Telp Toko</label>
                    <div class="col-sm-9">
                        <input type="text" onkeypress='validate(event)' class="form-control" id="telp" placeholder="0821xxxx"></div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Pemilik Toko</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pemilik" placeholder="Nama Lengkap"></div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Alamat toko</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="alamat" placeholder="Alamat Lengkap"> </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword4" class="col-sm-3 control-label">Discount (%)</label>
                    <div class="col-sm-9">
                        <input type="number" min="1" max="100" class="form-control" id="disc"> </div>
                </div>

            </form>
                </div>
            </div>
        </div>
    </div>
    <!-- 
        |
        | Data Penerima -============================
        |
     -->
    <div class="col-md-6">
        <div class="white-box">
            <h3 class="box-title m-b-0">Form data Penerima</h3>
            <p class="text-muted m-b-30 font-13"> Isilah data Penerima dengan benar </p>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Toko</label>
                    <div class="col-sm-9">
                       <select class="form-control" onChange="ambil()" id='id_toko2'>
                        <?php 

                            if ($nama_penerima->num_rows() == 0) {
                               echo "<option value='0'> =Tidak ada Data Toko=</option>";
                            } else {

                                echo "<option value='0'> Manual </option>";                              
                                foreach ($nama_penerima->result() as $key) {
                                    
                                    echo "<option value='".$key->id_toko."'>".$key->nama_toko."</option>";

                                }

                            }

                            
                         ?>
                       </select>
                   </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Toko</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="penerima_toko" placeholder="Nama Toko Penerima"></div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Telp Toko</label>
                    <div class="col-sm-9">
                        <input type="text" onkeypress='validate(event)' class="form-control" id="terimatelp" placeholder="0821xxxx"></div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Pemilik Toko</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="terimapemilik" placeholder="Nama Lengkap"></div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Alamat toko</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="terimaalamat" placeholder="Alamat Lengkap"> </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword4" class="col-sm-3 control-label">Discount (%)</label>
                    <div class="col-sm-9">
                        <input type="number" min="1" max="100" class="form-control" disabled> </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ::Konten -->
        <div class="row">

    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Detail Pengiriman Order</h3>
                            <p class="text-muted m-b-30 font-13"> </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Barang</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""> </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jenis Barang</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Pakaian , Elektronik , etc.. . "> </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Ukuran Berat</label>
                                            <input type="number" class="form-control" onkeypress="validate(event)" placeholder="Satuan Kilogram (Kg)" max="40" min="1"> </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Ukuran Kubik</label>
                                            <input type="number" class="form-control" onkeypress="validate(event)" id="exampleInputPassword1" placeholder="Satuan Meter Kubik (m3)" max="40" min="1"> </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Perjalanan</label>
                                            <select class="form-control">
                                                <?php 
                                                    foreach ($tarif->result() as $key ) {
                                                        echo "<option>".$key->kota_asal." - ".$key->kota_tujuan."</option>";
                                                    }
                                                 ?>
                                            </select> </div>

                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



    <div class="col-sm-6">
            
        <div class="white-box">
            <h3 class="box-title m-b-0">Data Rincian Tarif</h3>
            <br>
            <div class="table-responsive">


                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Kota Tujuan</th>
                            <th>Kota Asal</th>
                            <th>Tarif per Kubik</th>
                            <th>Tarif per KG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tarif->result() as $data){ ?>
                        <tr>
                            <td><?php echo $data->kota_tujuan ?></td>
                            <td><?php echo $data->kota_asal ?></td>
                            <td><?php echo $data->tarif_kubik ?></td>
                            <td><?php echo $data->tarif_kg ?></td>
                        </tr>
                       <?php } ?>
                    </tbody>
                </table>
                <button onClick="window.location.href='<?php echo base_url('Tarif')?>'" class="btb btn-success"><i class="fa fa-plus"></i> Data Tarif</button>
            </div>
        </div>
    </div>