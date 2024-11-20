<?php  

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$telp = $_POST['telp'];

include 'koneksi.php';
$sql = "INSERT INTO masyarakat(nik, username, nama, password, telp) VALUES ('$nik', '$username', '$nama', '$password', '$telp')";
$query =mysqli_query($koneksi,$sql);

if($query){
echo"
<script>alert('Anda Berhasil Mendaftar Silakan Login');
window.location.assign('index.php');
</script>
";

}else{
echo"
<script>alert('Anda Gagal Mendaftar Silakan ulangi');
window.location.assign('register.php');
</script>
";

}