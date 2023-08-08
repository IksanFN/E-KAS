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
  <title>Tambah Pengeluaran</title>
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
        <div class="card">
          <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
              <strong>Tambah Pengeluaran</strong>
            </h5>
          </div>
          <div class="card-body">

            <form action="proses_tambah_pengeluaran.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_pengeluaran">
              <div class="form-outline mb-3">
                <input type="text" name="jumlah_pengeluaran" id="form12" class="form-control"/>
                <label class="form-label" for="form12">Jumlah Pengeluaran</label>
              </div>
              <div class="form-outline mb-3">
                <input type="text" name="keterangan" id="form12" class="form-control"/>
                <label class="form-label" for="form12">Keterangan</label>
              </div>
              <div class="form-outline mb-3">
                <input type="file" name="gambar" id="form12" class="form-control"/>
              </div>
              <div class="form-outline mb-3">
                <input type="date" name="tanggal_pengeluaran" id="form12" class="form-control"/>
              </div>
              <div class="form-outline text-center">
                <button class="btn btn-primary px-4"><i class="fa-solid fa-plus me-2"></i> Tambah</button>
              </div>
            </form>
           
          </div>
        </div>
      </section>
      <!--Section: Minimal statistics cards-->
      
    </div>
  </main>
 <?php include_once 'view/js.php'; ?>