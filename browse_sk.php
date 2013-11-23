
<?php
include ("general.php");
$search=$_GET['search'];
$search2=$_GET['search2'];
$sort=$_GET['sort'];
?>
<div class="CSSTableGenerator">
<table>
<tr><td>
<strong id="font-blue-white">Surat Keputusan</strong>&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp<a href="browse_sk.php" id="font-white">Daftar SK</a>&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp<a href="input_new_sk.php" id="font-white">Tambah SK Baru</a>&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp<a href="statistik_sk.php" id="font-white">Statistik SK</a>
</td></tr>
</table>
</div>
<br>
<strong>Daftar Surat Keputusan</strong>
<br>
<table><tr><td>Urutkan berdasarkan : 
	<a href="browse_sk.php?sort=pembuat"> Pembuat Keputusan </a>
 | 
<a href="browse_sk.php?sort=date"> Tanggal </a>
 |
<a href="browse_sk.php?sort=jenis"> Jenis SK </a>
 | atau Cari berdasarkan nama SK : 
</td><td>
<form action="browse_sk.php"><input type="text" name="search" value="<?php echo $search;?>"></input>
<input type="submit" value="Cari"></form>
</td></tr></table>
<!-- 
<form action="browse_sk.php"><input type="text" name="search2" value="<?php echo $search2;?>"></input>
	<input type="submit" value="Cari berdasarkan nama pegawai"></form> -->
</p>
<?php
echo "<div class=\"CSSTableGenerator\">";
echo "<table width=\"100%\">";
	echo "<tr>";
	echo "<td>";
	echo "No.";
	echo "</td>";
	echo "<td>";
	echo "Nama SK";
	echo "</td>";
	echo "<td>";
	echo "Pembuat Keputusan";
	echo "</td>";
	echo "<td width=\"100\">";
	echo "Tanggal SK";
	echo "</td>";
	echo "<td>";
	echo "Jenis SK";
	echo "</td>";
	echo "<td>";
	echo "Struktur";
	echo "</td>";
	echo "<td width=\"10\">";
	echo "</td>";
	// echo "<td width=\"10\">";
	// echo "</td>";
	echo "</tr>";

	$tabel_sk = new tabel_sk;
	$tabel_sk->get_sk_all($search,$sort);
echo "</table>";
?>
</body>
</html>
