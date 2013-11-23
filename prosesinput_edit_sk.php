
<?php
include ("general.php");
include ("cxn.php");
echo "<br>";
$sk_id = $_POST['sk_id'];
$sk_nama = $_POST['sk_nama'];
$sk_pembuat = $_POST['sk_pembuat'];
$sk_tanggal_d = $_POST['sk_tanggal_d'];
$sk_tanggal_m = $_POST['sk_tanggal_m'];
$sk_tanggal_y = $_POST['sk_tanggal_y'];
$sk_jenis = $_POST['sk_jenis'];
$sk_pengarah = $_POST['sk_pengarah'];
$sk_pjwb = $_POST['sk_pjwb'];
$sk_ketua = $_POST['sk_ketua'];
$sk_waket = $_POST['sk_waket'];
$sk_sekretaris = $_POST['sk_sekretaris'];
$sk_bendahara = $_POST['sk_bendahara'];
$sk_pelaksana1 = $_POST['sk_pelaksana1'];
$sk_pelaksana2 = $_POST['sk_pelaksana2'];
$sk_pelaksana3 = $_POST['sk_pelaksana3'];
$sk_pelaksana4 = $_POST['sk_pelaksana4'];
$sk_pelaksana5 = $_POST['sk_pelaksana5'];
$sk_pelaksana6 = $_POST['sk_pelaksana6'];
$sk_pelaksana7 = $_POST['sk_pelaksana7'];
$sk_pelaksana8 = $_POST['sk_pelaksana8'];
$sk_pelaksana9 = $_POST['sk_pelaksana9'];
$sk_pelaksana10 = $_POST['sk_pelaksana10'];
$sk_member1 = $_POST['sk_member1'];
$sk_member2 = $_POST['sk_member2'];
$sk_member3 = $_POST['sk_member3'];
$sk_member4 = $_POST['sk_member4'];
$sk_member5 = $_POST['sk_member5'];

$array_pelaksana = array();
$array_pelaksana[0]=$sk_pelaksana1;
$array_pelaksana[1]=$sk_pelaksana2;
$array_pelaksana[2]=$sk_pelaksana3;
$array_pelaksana[3]=$sk_pelaksana4;
$array_pelaksana[4]=$sk_pelaksana5;
$array_pelaksana[5]=$sk_pelaksana6;
$array_pelaksana[6]=$sk_pelaksana7|
$array_pelaksana[7]=$sk_pelaksana8;
$array_pelaksana[8]=$sk_pelaksana9;
$array_pelaksana[9]=$sk_pelaksana10;
$sk_pelaksana=implode("|", $array_pelaksana);

$array_member = array();
$array_member[0]=$sk_member1;
$array_member[1]=$sk_member2;
$array_member[2]=$sk_member3;
$array_member[3]=$sk_member4;
$array_member[4]=$sk_member5;
$sk_member=implode("|",$array_member);

// Tambahin nol jika 1 digit
if (strlen($sk_tanggal_d)==1) {
	$sk_tanggal_d="0".$sk_tanggal_d;
}
if (strlen($sk_tanggal_m)==1) {
	$sk_tanggal_m="0".$sk_tanggal_m;
}

// dari array ke string untuk database
$array_tanggal=array();
$array_tanggal[0]=$sk_tanggal_y;
$array_tanggal[1]=$sk_tanggal_m;
$array_tanggal[2]=$sk_tanggal_d;
$sk_tanggal=implode("-",$array_tanggal);


$sk_edit = new sk($sk_id, $sk_nama, $sk_pembuat, $sk_tanggal, $sk_jenis, $sk_pengarah, $sk_pjwb, $sk_pelaksana, $sk_ketua, $sk_waket, 
			$sk_sekretaris, $sk_bendahara, $sk_member);
$sk_edit->set_db_update();

?>
</body>
</html>
