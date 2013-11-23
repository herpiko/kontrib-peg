
<?php
include ("general.php");
?>
<div class="CSSTableGenerator">
<table>
<tr><td>
<strong id="font-blue-white">Pegawai</strong>&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp<a href="browse_peg.php" id="font-white">Daftar Pegawai</a>&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp<a href="input_new_peg.php" id="font-white">Tambah Pegawai Baru</a>&nbsp&nbsp&nbsp</a>
</td></tr>
</table>
</div>
<?php
$peg_id=get_peg_last_id();
?>
<strong>Data Pegawai Baru</strong>
<p>
<form name="New_peg" action="prosesinput_new_peg.php" method="POST">
<table>
<tr>
<td>
	Nama : 
</td>
<td>
	<input type="text" name="peg_nama">
</td>
</tr>
<tr>
<td>
Wilayah kerja : </td>
<td>
	<select name="peg_wilker"> 
        <option value="" selected="selected"></option>
        <option VALUE="1"> Kantor Induk</option>
        <option VALUE="2"> Wilker Lembar</option>
        <option VALUE="3"> Wilker BIL</option>   
        <option VALUE="4"> Wilker Kayangan</option>   
        <option VALUE="5"> Wilker Pemenang</option>   
        <option VALUE="6"> Lab KH</option>   
        <option VALUE="7"> Lab KT</option>   
    </select>
</td>
</tr>
<tr>
<td>
	Telepon : 
</td>
<td>
	<input type="text" name="peg_telepon">
</td>
</tr>
<tr>
<td></td>
<td>
<input type="hidden" name="peg_id"  value="<?php echo $peg_id; ?>">
<input type="submit" value="Simpan">
</form>
</td>
</tr>
</table>

</p>
</body>
</html>
