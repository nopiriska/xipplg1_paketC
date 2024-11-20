 <?php 

if(isset($_GET['url'])){

switch($_GET['url']){
case 'tulis-pengaduan';
include'tulis-pengaduan.php';
break;

case'lihat-pengaduan';
include'lihat-pengaduan.php';
break;

case'detail-pengaduan';
include'detail-pengaduan.php';
break;

case'lihat-tanggapan';
include'lihat-tanggapan.php';
break;


default:
echo'Halaman Tidak Ditemukan';
break;
}
}else{
echo'Selamat Datang Di aplikasi pengaduan masyarakat Aplikasi ini dibuat untuk melaporkan tindakan yang menyimpang dari ketentuan<hr>';
echo 'Anda Login sebagai : '.$_SESSION['nama'];
}