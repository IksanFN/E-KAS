<?php
session_start(); 
include_once 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login&register.php");
}

$id_bulan_pembayaran = $_GET['id_bulan_pembayaran'];

$query = mysqli_query($koneksi, "SELECT * FROM uang_kas INNER JOIN bulan_pembayaran ON bulan_pembayaran.id_bulan_pembayaran = uang_kas.id_bulan_pembayaran INNER JOIN siswa ON uang_kas.id_siswa = siswa.id_siswa WHERE bulan_pembayaran.id_bulan_pembayaran = '$id_bulan_pembayaran'");

$total = mysqli_query($koneksi, "SELECT SUM(minggu_ke_1 + minggu_ke_2 + minggu_ke_3 + minggu_ke_4) AS total_uang_kas FROM uang_kas WHERE id_bulan_pembayaran = '$id_bulan_pembayaran'");

$sumTotalUangKas = mysqli_fetch_assoc($total);
$totalUangKas = $sumTotalUangKas['total_uang_kas'];

$result = mysqli_fetch_assoc($query);

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<?php include_once 'view/css.php'; ?>
 	<title>Cetak Pembayaran <?php echo $result['nama_bulan']; ?> <?php echo $result['tahun']; ?></title>
 </head>
 <body>

 	<div class="container p-4 my-4">
 		<h4 class="text-center mb-3">Data Pembayaran Uang Kas <?php echo $result['nama_bulan'];?> <?php echo $result['tahun']; ?></h4>
 		<p>Total uang masuk : <b>Rp. <?php echo number_format($totalUangKas); ?></b></p>
 		<div class="table-responsive">
              <table class="table table-bordered table-sm text-nowrap">
                <thead>
                  <tr>
                    <th scope="col" style="min-width: 50px; max-width: 50px;">Nama</th>
                    <th scope="col" class="text-center" style="min-width: 50px; max-width: 50px;">1</th>
                    <th scope="col" class="text-center"style="min-width: 50px; max-width: 50px;">2</th>
                    <th scope="col" class="text-center"style="min-width: 50px; max-width: 50px;">3</th>
                    <th scope="col" class="text-center"style="min-width: 50px; max-width: 50px;">4</th>
                    <th scope="col" class="text-center"style="min-width: 50px; max-width: 50px;">Status</th>
                  </tr>
                </thead>
                <?php 
                	foreach ($query as $data) :
                ?>
                <tbody>
                  <tr>
                    <td><?= $data['nama']; ?></td>
                    <td><?= number_format($data['minggu_ke_1']); ?></td>
                    <td><?= number_format($data['minggu_ke_2']); ?></td>
                    <td><?= number_format($data['minggu_ke_3']); ?></td>
                    <td><?= number_format($data['minggu_ke_4']); ?></td>
                    <td><?php echo $data['status']; ?></td>
                  </tr>
                </tbody>
              <?php endforeach; ?>
              </table>
            </div>
 	</div>
 	
 	<!-- Print -->
 	<script type="text/javascript">
 		window.print();
 	</script>

 	<?php include_once 'view/js.php'; ?>
 </body>
 </html>