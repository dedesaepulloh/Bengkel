<?php
include "action/koneksi.php";
$arr=array();
$tampil=mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan where id_pelanggan='$_GET[id_pelanggan]'");
while($data=mysqli_fetch_array($tampil)){
	$temp = array(
	"id_pelanggan" => $data["id_pelanggan"],
	"no_polisi" => $data["no_polisi"]);
	array_push($arr, $temp);
}

$data= json_encode($arr);
echo"$data";
?>