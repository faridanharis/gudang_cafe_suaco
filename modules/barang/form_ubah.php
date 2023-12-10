<?php
// mencegah direct access file PHP agar file PHP tidak bisa diakses secara langsung dari browser dan hanya dapat dijalankan ketika di include oleh file lain
// jika file diakses secara langsung
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else {
  // mengecek data GET "id_barang"
  if (isset($_GET['id'] )) {
    
    // ambil data GET dari tombol ubah
    $id_barang = $_GET['id'];

   // sql statement untuk menampilkan data dari tabel "tbl_barang", dan tabel "tbl_jenis" berdasarkan "stok"
   $query = mysqli_query($mysqli,"SELECT id_barang, nama_barang, jenis, stok_minimum, satuan_barang, pemasok FROM tbl_barang WHERE id_barang='$id_barang'
                                  ")
                                  or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
  }
?>
  <!-- menampilkan pesan kesalahan unggah file -->
  <div id="pesan"></div>

  <div class="panel-header bg-secondary-gradient">
    <div class="page-inner py-4">
      <div class="page-header text-white">
        <!-- judul halaman -->
        <h4 class="page-title text-white"><i class="fas fa-clone mr-2"></i> Ubah Barang</h4>
       
        </ul>
      </div>
    </div>
  </div>

  <div class="page-inner mt--5">
  <div class="card">
    <div class="card-header">
      <div class="card-title">Data Barang</div>
    </div>
    <form action="modules/barang/proses_ubah.php" method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="row">
          <div class="col-md-7">
            <div class="form-group">
              
              <label>ID Barang <span class="text-danger">*</span></label>
              <input type="text" name="id_barang" class="form-control" value="<?php echo $data['id_barang']; ?>" readonly>
            </div>

            <div class="form-group col-lg-5">
            <label>Nama Barang <span class="text-danger">*</span></label>
            <input type="text" name="nama_barang" class="form-control" autocomplete="off" value="<?php echo $data['nama_barang']; ?>" required>
            <div class="invalid-feedback">Nama barang tidak boleh kosong</div>
          </div>

          <div class="form-group col-lg-5">
            <label>Jenis Barang <span class="text-danger">*</span></label>
            <input type="text" name="jenis" class="form-control" autocomplete="off" value="<?php echo $data['jenis']; ?>" required>
            <div class="invalid-feedback">Nama jenis tidak boleh kosong</div>
          </div>
            
          <div class="form-group col-lg-5">
            <label>Stok Minimum <span class="text-danger">*</span></label>
            <input type="text" name="stok_minimum" class="form-control" autocomplete="off" value="<?php echo $data['stok_minimum']; ?>" required>
            <div class="invalid-feedback">Nama jenis tidak boleh kosong</div>
          </div>

          <div class="form-group col-lg-5">
            <label>Satuan <span class="text-danger">*</span></label>
            <input type="text" name="satuan_barang" class="form-control" autocomplete="off" value="<?php echo $data['satuan_barang']; ?>" required>
            <div class="invalid-feedback">Nama jenis tidak boleh kosong</div>
          </div>

          <div class="form-group col-lg-5">
            <label>Pemasok <span class="text-danger">*</span></label>
            <input type="text" name="pemasok" class="form-control" autocomplete="off" value="<?php echo $data['pemasok']; ?>" required>
            <div class="invalid-feedback">Nama jenis tidak boleh kosong</div>
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