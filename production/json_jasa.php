<?php
include "action/koneksi.php";
$arr=array();
$tampil=mysqli_query($koneksi,"SELECT * FROM tbl_jasa where id_jasa='$_GET[id_jasa]'");
while($data=mysqli_fetch_array($tampil)){
	$temp = array(
	"id_jasa" => $data["id_jasa"],
	"harga" => $data["harga"]);
	array_push($arr, $temp);
}

$data= json_encode($arr);
echo"$data";
?>