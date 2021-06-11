<?php
include 'config.php';

$kd_peminjaman = $_POST['kd_peminjaman'];
$nama = $_POST['nama'];
$divisi = $_POST['divisi'];
$user = $_POST['user'];
$tgl_pinjam = date("Y-m-d");
$tgl_kembali = date("Y-m-d");
$nama_barang = $_POST['nama_barang'];
$jml_barang = $_POST['jml_barang'];

if ( isset($_POST['submit']) )
{
    $sql    = "INSERT INTO peminjaman set kd_peminjaman='$_POST[kd_peminjaman]',nama='$_POST[nama]',divisi='$_POST[divisi]',user='$_POST[user]',tgl_pinjam='$_POST[tgl_pinjam]',tgl_kembali='$_POST[tgl_kembali]',nama_barang='$_POST[nama_barang]',jml_barang='$_POST[jml_barang]'";
    $result = mysqli_query($link, $sql);
} 

define('BOT_TOKEN', '1730832450:AAGOuLlWjSzJq0DzHoIZBqGrmujnPSnPn4w');
define('CHAT_ID','-568727572');
 
function kirimTelegram($kd_peminjaman,$nama,$divisi,$user,$tgl_pinjam,$tgl_kembali,$nama_barang,$jml_barang) {
    $pesan = json_encode($pesan);
    $API = "https://api.telegram.org/bot".BOT_TOKEN."/sendmessage?chat_id=".CHAT_ID."&text=".urlencode("--PEMINJAMAN--"."\n"."Kode Peminjaman ="."$kd_peminjaman"."\n"."Nama =$nama"."\n"."Divisi ="."$divisi"."\n"."User ="."$user"."\n"."Tanggal Pinjam ="."$tgl_pinjam"."\n"."Tanggal Kembali ="."$tgl_kembali"."\n"."Nama Barang ="."$nama_barang"."\n"."Jumlah Barang ="."$jml_barang");
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_URL, $API);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
kirimTelegram($_POST['kd_peminjaman'],$_POST['nama'],$_POST['divisi'],$_POST['user'],$_POST['tgl_pinjam'],$_POST['tgl_kembali'],$_POST['nama_barang'],$_POST['jml_barang']);

header('Location:peminjaman.php');

?>