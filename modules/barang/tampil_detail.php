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
  if (isset($_GET['id'])) {
    // ambil data GET dari tombol detail
    $id_barang = $_GET['id'];

    // sql statement untuk menampilkan data dari tabel "tbl_barang", dan tabel "tbl_jenis" berdasarkan "stok"
    $query = mysqli_query($mysqli, "SELECT a.id_barang, a.nama_barang, a.jenis, a.stok_minimum, a.stok, a.jenis, b.nama_jenis
                                    FROM tbl_barang as a INNER JOIN tbl_jenis as b
                                    ON a.jenis=b.id_jenis
                                    WHERE a.stok<=a.stok_minimum ORDER BY a.id_barang ASC")
                                    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
    
  }
?>
  <div class="panel-header bg-secondary-gradient">
    <div class="page-inner py-45">
      <div class="d-flex align-items-left align-items-md-top flex-column flex-md-row">
        <div class="page-header text-white">
          <!-- judul halaman -->
          <h4 class="page-title text-white"><i class="fas fa-clone mr-2"></i> Barang</h4>
          
        </div>
        <div class="ml-md-auto py-2 py-md-0">
          <!-- tombol kembali ke halaman data barang -->
          <a href="?module=barang" class="btn btn-secondary btn-round">
            <span class="btn-label"><i class="far fa-arrow-alt-circle-left mr-2"></i></span> Kembali
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="page-inner mt--5">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <!-- judul form -->
            <div class="card-title">Detail Data Barang</div>
          </div>
          <!-- detail data -->
          <div class="card-body">
            <table class="table table-striped">
              <tr>
                <td width="120">ID Barang</td>
                <td width="10">:</td>
                <td><?php echo $data['id_barang']; ?></td>
              </tr>
              <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td><?php echo $data['nama_barang']; ?></td>
              </tr>
              <tr>
                <td>Jenis Barang</td>
                <td>:</td>
                <td><?php echo $data['nama_jenis']; ?></td>
              </tr>
              <tr>
                <td>Stok Minimum</td>
                <td>:</td>
                <td><?php echo $data['stok_minimum']; ?></td>
              </tr>
              <tr>
                <td>Stok</td>
                <td>:</td>
                <td><?php echo $data['stok']; ?></td>
              </tr>
              <tr>
            </table>
          </div>
        </div>
      </div>
<?php } ?>