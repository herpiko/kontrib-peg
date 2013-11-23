
<?php
include ("general.php");
echo "<br>";
$peg_id = $_POST['peg_id'];
$peg_nama = $_POST['peg_nama'];
$peg_wilker = $_POST['peg_wilker'];
$peg_telepon = $_POST['peg_telepon'];


$peg_new = new pegawai($peg_id, $peg_nama, $peg_wilker, $peg_telepon);
$peg_new->set_db_new();



?>
</body>
</html>
