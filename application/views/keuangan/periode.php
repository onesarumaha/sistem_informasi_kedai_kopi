<?php
    $dt1 = $_POST["tgl_1"];
    $dt2 = $_POST["tgl_2"];
?>

<?php
$koneksi = new mysqli("localhost","root","","skripsi8");
  $sql = $koneksi->query("SELECT * FROM keuangan WHERE AND tgl BETWEEN '$dt1' AND '$dt2'");
  
 

?>


   <title>Laporan Periode</title>
<body>
<center>
<h1>Kadai Kopi Samudera</h1>
<label>Laporan Periode</label> <br>
<label> Periode : <?php $a=$dt1; echo date("d-M-Y", strtotime($a))?> s/d <?php $b=$dt2; echo date("d-M-Y", strtotime($b))?> </label>

  <table border="1" cellspacing="0">
    <thead>
      <tr>
          <th>No</th>
          <th style="width: 200px" class="text-center">Tanggal Transaksi</th>
          <th style="width: 200px" class="text-center">Keterangan</th>
          <th style="width: 200px" class="text-center">Jenis Transaksi</th>
          <th style="width: 200px" class="text-center">Kategori</th>
          <th style="width: 170px" class="text-center">Jumlah</th>
      </tr>
    </thead>
    <tbody>
        <?php

        if(isset($_POST["periode"])){
           
            $sql_tampil = "SELECT * FROM keuangan where tgl BETWEEN '$dt1' AND '$dt2' ORDER BY tgl ASC";
            }
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
         <tr>
            <td style="text-align: center;"><?php echo $no; ?></td>
            <td style="text-align: center;"><?= date("d M Y", strtotime( $data['tgl']))?></td>
            <td style="text-align: center;"><?= $data['ket']?></td>
            <td style="text-align: center;"><?= $data['jenis_transaksi']?></td>
            <td style="text-align: center;"><?= $data['kategori']?></td>
            <td style="text-align: center;">Rp. <?= number_format($tot = $data['jumlah'])?></td>
           
        </tr>
        <?php
            $no++;
            @$jumtot += $tot;
            }
        ?>
        <tr>
          <th colspan="5">Total Penjualan</th>
          <th style="text-align: center;">Rp. <?= number_format(@$jumtot); ?></th>
        </tr>
    </tbody>

  </table>
</center>

 