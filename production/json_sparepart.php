<?php
include "action/koneksi.php";
$arr=array();
$tampil=mysqli_query($koneksi,"SELECT * FROM tbl_sparepart where id_sparepart='$_GET[id_sparepart]'");
while($data=mysqli_fetch_array($tampil)){
	$temp = array(
	"id_sparepart" => $data["id_sparepart"],
	"harga_jual" => $data["harga_jual"]);
	array_push($arr, $temp);
}

$data= json_encode($arr);
echo"$data";
?>