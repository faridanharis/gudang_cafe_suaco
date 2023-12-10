<?php
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else { ?>
  <!-- menampilkan pesan kesalahan unggah file -->
  <div id="pesan"></div>

  <div class="panel-header bg-secondary-gradient">
    <div class="page-inner py-4">
      <div class="page-header text-white">
        <!-- judul halaman -->
        <h4 class="page-title text-white"><i class="fas fa-clone mr-2"></i> Tambah Barang</h4>
      </div>
    </div>
  </div>

<div class="page-inner mt--5">
  <div class="card">
    <div class="card-header">
      <div class="card-title">Data Barang</div>
    </div>
    <form action="modules/barang/proses_entri.php" method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="row">
          <div class="col-md-7">
            <div class="form-group">
              <?php
              // membuat "id_barang"
                // sql statement untuk menampilkan 4 digit terakhir dari "id_barang" pada tabel "tbl_barang"
                $query = mysqli_query($mysqli, "SELECT RIGHT(id_barang,4) as nomor FROM tbl_barang ORDER BY id_barang DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
                // ambil jumlah baris data hasil query
                $rows = mysqli_num_rows($query);

                // cek hasil query
                // jika "id_barang" sudah ada
                if ($rows <> 0) {
                  // ambil data hasil query
                  $data = mysqli_fetch_assoc($query);
                  // nomor urut "id_barang" yang terakhir + 1 (contoh nomor urut yang terakhir adalah 2, maka 2 + 1 = 3, dst..)
                  $nomor_urut = $data['nomor'] + 1;
                }
                // jika "id_barang" belum ada
                else {
                  // nomor urut "id_barang" = 1
                  $nomor_urut = 1;
                }

                // menambahkan karakter "B" diawal dan karakter "0" disebelah kiri nomor urut
                $id_barang = "B" . str_pad($nomor_urut, 4, "0", STR_PAD_LEFT);
                ?>
              <label>ID Barang <span class="text-danger">*</span></label>
              <input type="text" name="id_barang" class="form-control" value="<?php echo $id_barang; ?>" readonly>
            </div>

            <div class="form-group">
              <label>Nama Barang <span class="text-danger">*</span></label>
              <input type="text" name="nama_barang" class="form-control" autocomplete="off" required>
              <div class="invalid-feedback">Nama Barang tidak boleh kosong</div>
            </div>

            <div class="form-group">
              <label>Jenis Barang<span class="text-danger">*</span></label>
              <input type="text" name="jenis" class="form-control" autocomplete="off" required>
          
                  <?php
                  // sql statement untuk menampilkan data dari tabel "tbl_jenis"
                  $query_jenis = mysqli_query($mysqli, "SELECT * FROM tbl_barang ORDER BY jenis ASC")
                                                        or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
                  
                  ?>
                
              <div class="invalid-feedback">Jenis Barang tidak boleh kosong</div>
            </div>

            <div class="form-group">
              <label>Stok Minimum <span class="text-danger">*</span></label>
              <input type="text" name="stok_minimum" class="form-control" autocomplete="off" required>
              <div class="invalid-feedback">Stok Minimum tidak boleh kosong</div>
            </div>

            <div class="form-group">
              <label>Satuan <span class="text-danger">*</span></label>
              <input type="text" name="satuan_barang" class="form-control" autocomplete="off" required>
              <div class="invalid-feedback">Stok Minimum tidak boleh kosong</div>
            </div>

            <div class="form-group">
              <label>Pemasok <span class="text-danger">*</span></label>
              <input type="text" name="pemasok" class="form-control" autocomplete="off" required>
              <div class="invalid-feedback">Stok Minimum tidak boleh kosong</div>
            </div>

            
            <div class="card-action">
        <input type="submit" name="simpan" value="Simpan" class="btn btn-secondary btn-round pl-4 pr-4 mr-2">
        <a href="?module=barang" class="btn btn-default btn-round pl-4 pr-4">Batal</a>
      </div>
    </form>
  </div>
</div>
</script>
<?php } ?>