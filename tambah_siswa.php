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
  <title>Tambah Siswa</title>
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
              <strong>Tambah Siswa</strong>
            </h5>
          </div>
          <div class="card-body">
            
            <form action="proses_tambah_siswa.php" method="post">
              <div class="form-outline mb-3">
                <input type="text" name="nama" id="form12" class="form-control" />
                <label class="form-label" for="form12">Nama</label>
              </div>
              <div class="form-outline mb-3">
                <input type="text" name="no_hp" id="form12" class="form-control" />
                <label class="form-label" for="form12">No Handphone</label>
              </div>
              <div class="form-outline mb-3">
                <input type="text" name="alamat" id="form12" class="form-control" />
                <label class="form-label" for="form12">Alamat</label>
              </div>
              <div class="form-outline text-center">
                <button class="btn btn-primary px-5"><i class="fa-solid fa-plus"></i> Tambah</button>
              </div>
            </form>
           
          </div>
        </div>
      </section>
      <!--Section: Minimal statistics cards-->
      
    </div>
  </main>
 <?php include_once 'view/js.php'; ?>