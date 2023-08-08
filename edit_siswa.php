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
  <title>Edit</title>
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
              <strong>Edit Siswa</strong>
            </h5>
          </div>
          <div class="card-body">
            
            <?php 

              include_once 'koneksi.php';
              
              $id_siswa = $_GET['id_siswa'];
              $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'");
              $data = mysqli_fetch_assoc($query);

            ?>
            <?php 
              $pesan = isset($_GET['pesan']) ? $_GET['pesan'] : false;

              if ($pesan == 'form') {
                echo '<div class="alert alert-danger" role="alert">
                          Form tidak boleh kosong!
                      </div>';
              }
            ?>

            <form action="proses_edit_siswa.php" method="post">
              <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>">
              <div class="form-outline mb-3">
                <input type="text" name="nama" id="form12" class="form-control" value="<?php  echo $data['nama']; ?>" />
              </div>
              <div class="form-outline mb-3">
                <input type="text" name="no_hp" id="form12" class="form-control" value="<?php   echo $data['no_hp']; ?>" />
              </div>
              <div class="form-outline mb-3">
                <input type="text" name="alamat" id="form12" class="form-control" value="<?php  echo $data['alamat']; ?>" />
              </div>
              <div class="form-outline text-center">
                <button class="btn btn-warning px-4"><i class="fa-solid fa-pen-to-square me-2"></i> Edit</button>
              </div>
            </form>
           
          </div>
        </div>
      </section>
      <!--Section: Minimal statistics cards-->
      
    </div>
  </main>
 <?php include_once 'view/js.php'; ?>