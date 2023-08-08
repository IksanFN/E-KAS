<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login&register.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'view/css.php'; ?>
    <title>Cetak Pengeluaran</title>
</head>
<body>
    

    <div class="container p-4 my-4">
        <h4 class="text-center mb-4">Data pengeluaran uang kas</h4>
       <div class="table-responsive">
           <table class="table table-bordered table-sm text-nowrap">
               <thead>
                   <tr>
                       <th>Pengeluaran</th>
                       <th>Keterangan</th>
                       <th>Tanggal Pengeluaran</th>
                   </tr>
               </thead>
               <?php 
                    include_once 'koneksi.php';
                   
                    $query = mysqli_query($koneksi, "SELECT * FROM pengeluaran");
               ?>
               <?php foreach($query as $data) : ?>
               <tbody>
                   <tr>
                       <td>Rp. <?= number_format($data['jumlah_pengeluaran']); ?></td>
                       <td><?= $data['keterangan']; ?></td>
                       <td><?= $data['tanggal_pengeluaran']; ?></td>
                   </tr>
               </tbody>
               <?php endforeach; ?>
           </table>
       </div> 
    </div>

    <script>
        window.print();
    </script>
    <?php include_once 'view/js.php'; ?>
</body>
</html>