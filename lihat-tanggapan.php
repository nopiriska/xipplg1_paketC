<?php
$id=$_GET['id'];

if(empty($id)){
 header("location:masyarakat.php");

}
include'koneksi.php';
$query=mysqli_query($koneksi,"SELECT*FROM  pengaduan,tanggapan WHERE pengaduan.id_pengaduan='$id'AND tanggapan.id_pengaduan=pengaduan.id_pengaduan");

?>

<div class="card shadow">
<div class="card-header">
<a href="?url=lihat-pengaduan" class="btn btn-primary-btn-split-icon">
<span class="icon text-white-50">
<i class="fa fa-arrow-left"></i>
</span>
<span class="text text-black-50">kembali</a>
</a>
</div>
<div class="card-body">
<?php  
if(mysqli_num_rows($query)==0){
echo"<div class
='alert alert-danger'>Mohon maaf,pengaduan anda belum ditanggapi.</div>";
}else{
$data=mysqly_fetch_array($query);
 ?>
<form method="post"action="proses-pengaduan.php"enctype="multipart/form-data">

<div class="form-group">
<label style="font-size:14px">Tanggal tanggapan</label>
<input type="text"name="tgl_pengaduan"class="form-control"readonly value="<?=$data['tgl_tanggapan'];?>">
</div>

<div class="form-group">
<label style="font-size:14px">isi pengaduan</label>
<textarea name="isi_pengaduan"class="form-control"required><?=$data['isi_laporan'];?>"</textarea>
</div>

<div class="form-group">
<label style="font-size:14px">isi tanggapan</label>
<textarea name="isi_pengaduan"class="form-control"required><?=$data['tanggapan'];?>"</textarea>
</div>

 

<div class="form-group">
<button type="submit"class="btn btn-success"> KIRIM </button>
<button type="reset"class="btn btn-warning"> HAPUS DATA</button>

</div>

</form>
<?php } ?>


</div>

</div>