
<?php
include ("general.php");
echo "<br>";
$peg_id = $_GET['peg_id'];


$peg_del = new pegawai();
$peg_del->peg_del($peg_id);

?>
</body>
</html>
