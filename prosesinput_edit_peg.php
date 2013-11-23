<?php
include ("general.php");
include ("cxn.php");
echo "<br>";
$peg_id = $_POST['peg_id'];
$peg_nama = $_POST['peg_nama'];
$peg_wilker = $_POST['peg_wilker'];
$peg_telepon = $_POST['peg_telepon'];
/*
echo "Nama : " .$nama;
echo "<br>";
echo "Alamat : " .$alamat;
echo "<br>";
echo "Jabatan : " .$jabatan;
echo "<br>";
echo "Telepon : " .$telepon;
*/

//mengambil id terakhir yang ada di database
$peg_del = new pegawai;
$peg_del->peg_edit($peg_id, $peg_nama, $peg_wilker, $peg_telepon);
?>
</body>
</html>
