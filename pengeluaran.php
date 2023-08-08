<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login&register.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Pengeluaran</title>
  <?php include_once 'view/css.php'; ?>
</head>

<body>
  <!-- Header -->
  <?php include_once 'view/header.php'; ?>

  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">

      <!--Section: Minimal statistics cards-->
      <section class="mb-4">

        <!-- Search -->
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <form action="" method="get" class="row mx-0">
                  <div class="col-md-4 mb-2">
                      <input type="date" name="tanggal_pengeluaran" class="form-control">
                  </div>
                  <div class="col-md-6 mb-2 text-end">
                      <input type="text" name="jumlah_pengeluaran" class="form-control" placeholder="Cari berdasarkan jumlah pengeluaran">
                  </div>
                  <div class="col-md-2 text-end">
                      <button class="btn btn-primary " type="submit">Cari</button>
                  </div>
              </form>
              <?php 
                if (isset($_GET['tanggal_pengeluaran']) && !empty($_GET['tanggal_pengeluaran']) || isset($_GET['jumlah_pengeluaran']) && !empty($_GET['jumlah_pengeluaran'])) :
                  $tanggal_pengeluaran = $_GET['tanggal_pengeluaran'];
                  $jumlah_pengeluaran = $_GET['jumlah_pengeluaran'];
                  $where = "WHERE jumlah_pengeluaran LIKE '%$jumlah_pengeluaran%' OR tanggal_pengeluaran = '$tanggal_pengeluaran'";
              ?>
              <div class="mt-2">
                <p class="text-center">Hasil pencarian kata kunci : <b class="text-info"><?php echo $tanggal_pengeluaran; ?> <?= $jumlah_pengeluaran; ?></b></p>
              </div>
              <?php else:
                  $where = '';
                endif; 
              ?>         
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
              <strong>Pengeluaran</strong>
            </h5>
          </div>
          <div class="card-body">
          <a href="tambah_pengeluaran.php" class="btn btn-primary ms-2 mb-2"><i class="fa-solid fa-plus me-2"></i>Tambah</a>
          <a href="cetak_pengeluaran.php" target="_blank" class="btn btn-secondary ms-2 mb-2"><i class="fa-solid fa-print me-2"></i>Cetak</a>      
            <div class="table-responsive">
              <table class="table text-nowrap">
                <thead>
                  <tr>
                    <th scope="col">Jumlah Pengeluaran</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tanggal Pengeluaran</th>
                    <th class="text-center" scope="col">Gambar</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>

                <?php 
                  include_once 'koneksi.php';
                  $query = mysqli_query($koneksi, "SELECT * FROM pengeluaran $where");
                  while($pengeluaran = mysqli_fetch_assoc($query)) :
                ?>
                <tbody>
                  <tr>
                    <td>Rp. <?php echo number_format($pengeluaran['jumlah_pengeluaran']); ?></td>
                    <td><?php echo $pengeluaran['keterangan']; ?></td>
                    <td><?php echo $pengeluaran['tanggal_pengeluaran']; ?></td>
                    <td><img class="img-fluid" src="img/<?php echo $pengeluaran['gambar'] ?>" alt="" ></td>
                    <td class="text-center">
                      <a href="edit_pengeluaran.php?id_pengeluaran=<?php echo $pengeluaran['id_pengeluaran']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a href="hapus_pengeluaran.php?id_pengeluaran=<?php echo $pengeluaran['id_pengeluaran']; ?>" class="btn btn-danger btn-sm rounded" onclick="return confirm(
                      'Apakah kamu yakin akan menghapusnya?')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>
                </tbody>
              <?php endwhile; ?>
              </table>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Minimal statistics cards-->
      
    </div>
  </main>
 <?php include_once 'view/js.php'; ?>