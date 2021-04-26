<?php

Header('Content-type: text/xml');
//koneksi ke database
$con = mysqli_connect("localhost", "root", "mysql", "ponpes") or die("Error " . mysqli_error($con));
$dataxml = new SimpleXMLElement('<xml/>');
//menampilkan data dari database tabel santri
$query = "select * from santri ";
$result = mysqli_query($con, $query) or die("Error " . mysqli_error($con));

//membuat array
while ($row = mysqli_fetch_array($result)) {

    $view = $dataxml->addChild('santri');
    $view->addChild('id', $row['id']);
    $view->addChild('nama', $row['nama']);
    $view->addChild('umur', $row['umur']);
    $view->addChild('tingkat', $row['tingkat']);
    $view->addChild('alamat', $row['alamat']);
}

print($dataxml->asXML());
//tutup koneksi ke database
mysqli_close($con);
?>