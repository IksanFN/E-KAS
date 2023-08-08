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
  <title>Siswa</title>
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
        <div class="card mb-2">
          <div class="card-body">
            <form action="" method="get" class="d-flex col-md-12">
                <input type="search" class="form-control mx-1" name="keyword" placeholder="Cari berdasarkan nama, no handphone, alamat">
                <button class="btn btn-primary mx-1" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <?php 
          if (isset($_GET['keyword']) AND !empty($_GET['keyword'])) :
              $keyword = $_GET['keyword'];
              $where = "WHERE nama LIKE '%$keyword%' OR no_hp LIKE '%$keyword%' OR alamat LIKE '%$keyword%'";
          ?>
              <div class="my-1 text-center">
                <p class="">Hasil pencarian kata kunci : <b class="text-info"><?php echo $keyword; ?></b></p>
              </div>
          <?php else:
              $where = '';
              endif; 
          ?>
          </div>
        </div>

        <div class="card">
          <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
              <strong>Siswa</strong>
            </h5>
          </div>
          <div class="card-body">
            <div class="row">
             
             <div class="col-sm-3">
               <a href="tambah_siswa.php" class="btn btn-primary ms-1 mb-3"><i class="fa-solid fa-plus me-2"></i> Tambah</a>
             </div>
                          
            </div>
            <div class="table-responsive">
              <table class="table text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Alamat</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>

                <?php 
                  include_once 'koneksi.php';
                  $query = mysqli_query($koneksi, "SELECT * FROM siswa $where");
                  $no = 1;
                  while($siswa = mysqli_fetch_assoc($query)) :
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><b><?php echo $siswa['nama']; ?></b></td>
                    <td><?php echo $siswa['no_hp']; ?></td>
                    <td><?php echo $siswa['alamat']; ?></td>
                    <td class="text-center">
                      <a href="edit_siswa.php?id_siswa=<?php echo $siswa['id_siswa']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a href="hapus_siswa.php?id_siswa=<?php echo $siswa['id_siswa']; ?>" class="btn btn-danger btn-sm rounded" onclick="return confirm(
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