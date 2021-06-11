<?php
include 'config.php';

$kd_service = $_POST['kd_service'];
$nama = $_POST['nama'];
$vendor = $_POST['vendor'];
$nama_barang = $_POST['nama_barang'];
$no_asset = $_POST['no_asset'];
$sn = $_POST['sn'];
$tanggal = date("Y-m-d");
$ket = $_POST['ket'];
$jml_barang = $_POST['jml_barang'];

if ( isset($_POST['submit']) )
{
    $sql    = "INSERT INTO service set kd_service='$_POST[kd_service]',nama='$_POST[nama]',vendor='$_POST[vendor]',nama_barang='$_POST[nama_barang]',no_asset='$_POST[no_asset]',sn='$_POST[sn]',tanggal='$_POST[tanggal]',ket='$_POST[ket]',jml_barang='$_POST[jml_barang]'";
    $result = mysqli_query($link, $sql);
} 

define('BOT_TOKEN', '1730832450:AAGOuLlWjSzJq0DzHoIZBqGrmujnPSnPn4w');
define('CHAT_ID','-568727572');
 
function kirimTelegram($kd_service,$nama,$vendor,$nama_barang,$no_asset,$sn,$tanggal,$ket,$jml_barang) {
    $pesan = json_encode($pesan);
    $API = "https://api.telegram.org/bot".BOT_TOKEN."/sendmessage?chat_id=".CHAT_ID."&text=".urlencode("--SERVICE--"."\n"."Kode Service ="."$kd_service"."\n"."Nama =$nama"."\n"."Vendor ="."$vendor"."\n"."Nama Barang ="."$nama_barang"."\n"."No Asset ="."$no_asset"."\n"."Serial Number ="."$sn"."\n"."Tanggal ="."$tanggal"."\n"."Keterangan ="."$ket"."\n"."Jumlah Barang ="."$jml_barang");
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_URL, $API);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
kirimTelegram($_POST['kd_service'],$_POST['nama'],$_POST['vendor'],$_POST['nama_barang'],$_POST['no_asset'],$_POST['sn'],$_POST['tanggal'],$_POST['ket'],$_POST['jml_barang']);

header('Location:service.php');

?>