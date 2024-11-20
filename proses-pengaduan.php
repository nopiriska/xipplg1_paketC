<?php  
session_start();

$tgl_pengaduan = $_POST['tgl_pengaduan'];
$nik = $_SESSION['nik'];
$isi_laporan = $_POST['isi_pengaduan'];
$asal_foto = $_FILES['Foto']['tmp_name'];
$nama_foto = $_FILES['Foto']['name'];
$folder = "foto";
$status = 0;

// Pastikan folder untuk menyimpan foto ada, jika tidak, buat foldernya
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

// Proses upload file
if (move_uploaded_file($asal_foto, $folder . '/' . $nama_foto)) {
    include 'koneksi.php';

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) 
            VALUES ('$tgl_pengaduan', '$nik', '$isi_laporan', '$nama_foto', '$status')";

    // Cek apakah query berhasil dijalankan
    if (mysqli_query($koneksi, $sql)) {
        echo "
        <script>
            alert('Anda Berhasil Mengirim Laporan');
            window.location.assign('masyarakat.php');
        </script>";
    } else {
        echo "
        <script>
            alert('!!! Anda Gagal Mengirim Laporan');
            window.location.assign('masyarakat.php?url=tulis-pengaduan');
        </script>";
    }
} else {
    echo "
    <script>
        alert('MAAF ANDA GAGAL UPLOAD FOTO');
        window.location.assign('masyarakat.php?url=tulis-pengaduan');
    </script>";
}
?>
