<?php
include 'config.php';
 
    // mengambil data barang dengan kode paling besar
    $sql = "SELECT max(kd_service) as kodeTerbesar FROM service";
    $query = mysqli_query($link, $sql);
    $data = mysqli_fetch_array($query);
    $kodeBarang = $data['kodeTerbesar'];
 
    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodeBarang, 3, 3);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "SER";
    $kodeBarang = $huruf . sprintf("%03s", $urutan);
    ?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Form Service</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
          <h1>Form Service</h1>
            <form method="POST" action="telegram_post_service.php">
                <label>No Service</label>
                <br>
                <input type="text" name="kd_service" value="<?php echo $kodeBarang ?>" readonly>
                <br>
                <label>Nama</label>
                <br>
                <input type="text" name="nama">
                <br>
                <label>Vendor</label>
                <br>
                <input type="text" name="vendor">
                <br>
                <label>Nama Barang</label>
                <br>
                <input type="text" name="nama_barang">
                <br>
                <label>No Asset</label>
                <br>
                <input type="text" name="no_asset">
                <br>
                <label>Serial Nomor</label>
                <br>
                <input type="text" name="sn">
                <br>
                <label>Tanggal</label>
                <br>
                <input type="date" name="tanggal">
                <br>
                <label>Keterangan</label>
                <br>
                <input type="text" name="ket">
                <br>
                <label>Jumlah Barang</label>
                <br>
                <input type="text" name="jml_barang">
                <br>
                <button type="submit" name="submit">Kirim</button>
                <br>
                <br>
                <a href="index.php" class="back">Kembali</a>
            </form>
        </div>
    </body>
</html>
