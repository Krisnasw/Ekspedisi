/* Hapus tipe toko */
ALTER TABLE `tb_toko` DROP `tipe_toko`;

/* tb - Karyawan */
ALTER TABLE `tb_karyawan` ADD `tgl_masuk` DATE NOT NULL AFTER `status_del`, ADD `domisili_cabang` INT NOT NULL AFTER `tgl_masuk`, ADD `no_ktp` VARCHAR(255) NOT NULL AFTER 
`domisili_cabang`, ADD `no_sim` VARCHAR(255) NOT NULL AFTER `no_ktp`, ADD `pendidikan_terakhir` VARCHAR(255) NOT NULL AFTER `no_sim`;
ALTER TABLE `tb_karyawan` ADD `no_npwp` VARCHAR(100) NOT NULL AFTER `no_sim`;
ALTER TABLE 'tb_karyawan' MODIFY COLUMN `status_del` ENUM('Y','T') AFTER `pendidikan_terakhir`;

/* tb - Supir */
ALTER TABLE `tb_supir` ADD `no_telp_2` INT NOT NULL AFTER `nomor_telp`, 
ADD `no_ktp` INT NOT NULL AFTER `no_telp_2`, ADD `tanggal_masuk` DATE NOT NULL AFTER `no_ktp`,
ADD `sim_b` INT NOT NULL AFTER `tanggal_masuk`, ADD `sim_c` INT NOT NULL AFTER `sim_b`

/* tb - tarif */
ALTER TABLE `tb_tarif` CHANGE `tarif_km` `tarif_kg` INT(255) NOT NULL;

/* tb - barang */
ALTER TABLE tb_barang MODIFY COLUMN id_nota varchar(255) AFTER id