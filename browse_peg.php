<?php
include ("general.php");
	$search=$_GET['search'];
?>
<div class="CSSTableGenerator">
<table>
<tr><td>
<strong id="font-blue-white">Pegawai</strong>&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp<a href="browse_peg.php" id="font-white">Daftar Pegawai</a>&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp<a href="input_new_peg.php" id="font-white">Tambah Pegawai Baru</a>&nbsp&nbsp&nbsp</a>
</td></tr>
</table>
</div>
<br>
<strong>Daftar Pegawai</strong>
<br>
<table>
<tr style="vertical-align:top;">
<td>
<form action="browse_peg.php"><input type="text" name="search" value="<?php echo $search;?>"></input><input type="submit" value="Cari berdasarkan nama pegawai"></form>
</td>
</tr>
</table> 
<?php
	// Judul kolom.
	echo "<div class=\"CSSTableGenerator\">";
	echo "<table width=\"100%\">";
	echo "<tr>";
	echo "<td>";
	echo "Nama";
	echo "</td>";
	echo "<td>";
	echo "Wilker";
	echo "</td>";
	echo "<td>";
	echo "Telepon";
	echo "</td>";
	echo "<td>";
	echo "Surat Keputusan";
	echo "</td>";
	echo "<td width=\"10\">";
	echo "</td>";
	echo "<td width=\"10\">";
	echo "</td>";

	echo "</tr>";


	// Parse data...



	$tabel_peg_new = new tabel_peg;
	$tabel_peg_new->get_peg_all($search);
			
	echo "</table>";
	echo "</div>";

?>
</body>
</html>
