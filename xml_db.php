<?php

$connect = mysqli_connect("localhost", "root", "mysql");
$database_select = mysqli_select_db($connect, "ponpes");

$dataxml = simplexml_load_file('guru.xml');

foreach($dataxml->dataguru as $guru ) //mengurai file xml ke objek
{
$id = $guru['id'];
$nama = $guru ->nama; //mendapatkan child node nama
$umur = $guru ->umur; //mendapatkan child node umur
$jobdesk = $guru ->jobdesk; //mendapatkan child node jobdesk
$alamat = $guru ->alamat; //mendapatkan child node alamat

echo 'id : '.$id. '<br />'; //menampilkan id ke layar
echo 'nama : '.$nama.'<br />'; //menampilkan nama ke layar
echo 'umur : '.$umur.'<br />'; //menampilkan umur ke layar
echo 'jobdesk : '.$jobdesk.'<br />'; //menampilkan jobdesk ke layar
echo 'alamat : '.$alamat.'<br />'; //menampilkan alamat ke layar
echo '<br>';

//menyimpan ke database
$query = "INSERT INTO dataguru VALUES('$id','$nama','$umur','$jobdesk','$alamat')";
mysqli_query($connect, $query);
}
?>