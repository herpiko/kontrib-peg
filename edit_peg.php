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
<br>
<strong>Revisi Data Pegawai</strong>
<br>
<?php
$peg_id = htmlspecialchars($_GET["peg_id"]);
include ("cxn.php");
$query="SELECT * FROM peg WHERE peg_id = '$peg_id'";

$result = mysqli_query ($cxn, $query)
	or ("Tidak dapat terkoneksi");
$row = mysqli_fetch_assoc ($result);
extract ($row);
?>
<p>
<form name="edit_peg" action="prosesinput_edit_peg.php" method="POST">
<table>
<tr>
<td>
	Nama : 
</td>
<td>
	<input type="text" name="peg_nama" value="<?php echo $peg_nama; ?>">
</td>
</tr>
<tr>
<td>
Wilayah kerja : </td>
<td>
	<select name="peg_wilker"> 

        <?php
            switch ($peg_wilker) {
                case 1:
                    $selected1="selected=\"selected\"";
                    break;
                case 2:
                    $selected2="selected=\"selected\"";
                    break;
                case 3:
                    $selected3="selected=\"selected\"";
                    break;
                case 4:
                    $selected4="selected=\"selected\"";
                    break;
                case 5:
                    $selected5="selected=\"selected\"";
                    break;
                case 6:
                    $selected6="selected=\"selected\"";
                    break;
                case 7:
                    $selected7="selected=\"selected\"";
                    break;
                
                default:
                    # code...
                    break;
            }
        echo "<option VALUE=\"1\"".$selected1."> Kantor Induk</option>";
        echo "<option VALUE=\"2\"".$selected2."> Wilker Lembar</option>";
        echo "<option VALUE=\"3\"".$selected3."> Wilker BIL</option>";
        echo "<option VALUE=\"4\"".$selected4."> Wilker Kayangan</option>";   
        echo "<option VALUE=\"5\"".$selected5."> Wilker Pemenang</option>"; 
        echo "<option VALUE=\"6\"".$selected6."> Lab KH</option>";   
        echo "<option VALUE=\"7\"".$selected7."> Lab KT</option>"; 

        ?>
        
          
    </select>
</td>
</tr>

<tr>
<td>
	Telepon : 
</td>
<td>
	<input type="text" name="peg_telepon"  value="<?php echo $peg_telepon; ?>">
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
