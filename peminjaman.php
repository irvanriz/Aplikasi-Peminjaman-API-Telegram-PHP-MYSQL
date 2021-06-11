
<?php
    include 'config.php';
 
    // mengambil data barang dengan kode paling besar
    $sql = "SELECT max(kd_peminjaman) as kodeTerbesar FROM peminjaman";
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
    $huruf = "REQ";
    $kodeBarang = $huruf . sprintf("%03s", $urutan);
    ?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Form Peminjaman</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
          <h1>Form Peminjaman</h1>
            <form method="POST" action="telegram_post.php">
                <label>No Peminjaman</label>
                <br>
                <input type="text" name="kd_peminjaman" value="<?php echo $kodeBarang ?>" readonly>
                <br>
                <label>Nama</label>
                <br>
                <input type="text" name="nama">
                <br>
                <label>Divisi</label>
                <br>
                <input type="text" name="divisi">
                <br>
                <label>User</label>
                <br>
                <input type="text" name="user">
                <br>
                <label>Tanggal Pinjam</label>
                <br>
                <input type="date" name="tgl_pinjam">
                <br>
                <label>Tanggal Kembali</label>
                <br>
                <input type="date" name="tgl_kembali">
                <br>
                <label>Nama Barang</label>
                <br>
                <input type="text" name="nama_barang">
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
