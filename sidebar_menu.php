<?php
session_start(); // Mulai sesi jika belum dimulai

if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  header('location: 404.html'); // Redirect jika file diakses secara langsung
} else {
  if ($_SESSION['hak_akses'] == 'Administrator') { 
    // Bagian menu Dashboard
    $dashboardActive = ($_GET['module'] == 'dashboard') ? 'active' : '';

    // Bagian menu Master Barang
    $barangActive = ($_GET['module'] == 'barang' || $_GET['module'] == 'tampil_detail_barang' || $_GET['module'] == 'form_entri_barang' || $_GET['module'] == 'form_ubah_barang') ? 'active' : '';

    // Bagian menu Transaksi Barang Masuk
    $barangMasukActive = ($_GET['module'] == 'barang_masuk' || $_GET['module'] == 'form_entri_barang_masuk') ? 'active' : '';

    // Bagian menu Transaksi Barang Keluar
    $barangKeluarActive = ($_GET['module'] == 'barang_keluar' || $_GET['module'] == 'form_entri_barang_keluar') ? 'active' : '';

    // Bagian menu Laporan
    $laporanStokActive = ($_GET['module'] == 'laporan_stok') ? 'active' : '';
    $laporanMasukActive = ($_GET['module'] == 'laporan_barang_masuk') ? 'active' : '';
    $laporanKeluarActive = ($_GET['module'] == 'laporan_barang_keluar') ? 'active' : '';

    // Bagian menu User
    $manajemenUserActive = ($_GET['module'] == 'form_entri_user' || $_GET['module'] == 'form_ubah_user') ? 'active' : '';
    
?>
  

<!-- Bagian HTML untuk tampilan menu -->
<li class="nav-item <?= $dashboardActive ?>">
  <a href="?module=dashboard">
    <i class="fas fa-home"></i>
    <p>Dashboard</p>
  </a>
</li>

<li class="nav-item <?= $barangActive ?>">
  <a href="?module=barang">
    <i class="fas fa-clone"></i>
    <p>Data Barang</p>
  </a>
</li>

<li class="nav-item <?= $barangMasukActive ?>">
  <a href="?module=barang_masuk">
    <i class="fas fa-sign-in-alt"></i>
    <p>Barang Masuk</p>
  </a>
</li>

<li class="nav-item <?= $barangKeluarActive ?>">
  <a href="?module=barang_keluar">
    <i class="fas fa-sign-out-alt"></i>
    <p>Barang Keluar</p>
  </a>
</li>

<li class="nav-item <?= $laporanStokActive ?>">
  <a href="?module=laporan_stok">
    <i class="fas fa-file-signature"></i>
    <p>Laporan Stok</p>
  </a>
</li>

<li class="nav-item <?= $laporanMasukActive ?>">
  <a href="?module=laporan_barang_masuk">
    <i class="fas fa-file-import"></i>
    <p>Laporan Barang Masuk</p>
  </a>
</li>

<li class="nav-item <?= $laporanKeluarActive ?>">
  <a href="?module=laporan_barang_keluar">
    <i class="fas fa-file-export"></i>
    <p>Laporan Barang Keluar</p>
  </a>
</li>

<li class="nav-item <?= $userActive ?>">
    <a href="?module=user">
      <i class="fas fa-user"></i>
      <p>User</p>
    </a>
  </li>
<?php
  }

  else if ($_SESSION['hak_akses'] == 'Admin Gudang') { 
    // Bagian menu Dashboard
    $dashboardActive = ($_GET['module'] == 'dashboard') ? 'active' : '';

    // Bagian menu Master Barang
    $barangActive = ($_GET['module'] == 'barang' || $_GET['module'] == 'tampil_detail_barang' || $_GET['module'] == 'form_entri_barang' || $_GET['module'] == 'form_ubah_barang') ? 'active' : '';

    // Bagian menu Transaksi Barang Masuk
    $barangMasukActive = ($_GET['module'] == 'barang_masuk' || $_GET['module'] == 'form_entri_barang_masuk') ? 'active' : '';

    // Bagian menu Transaksi Barang Keluar
    $barangKeluarActive = ($_GET['module'] == 'barang_keluar' || $_GET['module'] == 'form_entri_barang_keluar') ? 'active' : '';

    
?>
  

<!-- Bagian HTML untuk tampilan menu -->
<li class="nav-item <?= $dashboardActive ?>">
  <a href="?module=dashboard">
    <i class="fas fa-home"></i>
    <p>Dashboard</p>
  </a>
</li>

<li class="nav-item <?= $barangActive ?>">
  <a href="?module=barang">
    <i class="fas fa-clone"></i>
    <p>Data Barang</p>
  </a>
</li>

<li class="nav-item <?= $barangMasukActive ?>">
  <a href="?module=barang_masuk">
    <i class="fas fa-sign-in-alt"></i>
    <p>Barang Masuk</p>
  </a>
</li>

<li class="nav-item <?= $barangKeluarActive ?>">
  <a href="?module=barang_keluar">
    <i class="fas fa-sign-out-alt"></i>
    <p>Barang Keluar</p>
  </a>
</li>


<?php
  }
}
?>

  

  