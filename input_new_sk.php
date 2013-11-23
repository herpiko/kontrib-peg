<?php
include ("general.php");
?>
<div class="CSSTableGenerator">
<table>
<tr><td>
<strong id="font-blue-white">Surat Keputusan</strong>&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp<a href="browse_sk.php" id="font-white">Daftar SK</a>&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp<a href="input_new_sk.php" id="font-white">Tambah SK Baru</a>&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp<a href="statistik_sk.php" id="font-white">Statistik SK</a>
</td></tr>
</table>
</div>
<br>
<strong>Surat Keputusan Baru</strong>
<p>
<form name="New_sk" action="prosesinput_new_sk.php" method="POST">
<table><tr>
<td width="200">
Nama SK : 
</td>
<td>
    <input type="text" size="75" name="sk_nama">

</td>
</tr>
<tr>
<td>
Pembuat Keputusan : 
</td>
<td>
    <input type="text" size="20" name="sk_pembuat">

</td>
</tr>
<tr style="vertical-align:top;">
<td>
Tanggal Pembuatan SK
</td>
<td>
    <select name="sk_tanggal_d"> 
        <option value="" selected="selected"></option>
        <?php
        for ($x=1; $x < 31 ; $x++) { 
            echo "<option value=\"";
            echo $x;
            echo "\">";
            echo $x;
            echo "</option>";
        }
        ?>
    </select>
    <select name="sk_tanggal_m"> 
        <option value="" selected="selected"></option>
        <option VALUE="1"> Januari</option>
        <option VALUE="2"> Februari</option>
        <option VALUE="3"> Maret</option>
        <option VALUE="4"> April</option>
        <option VALUE="5"> Mei</option>
        <option VALUE="6"> Juni</option>
        <option VALUE="7"> Juli</option>
        <option VALUE="8"> Agustus</option>
        <option VALUE="9"> September</option>
        <option VALUE="10"> Oktober</option>
        <option VALUE="11"> November</option>
        <option VALUE="12"> Desember</option>
    </select>
    <select name="sk_tanggal_y"> 
        <option value="" selected="selected"></option>
                <?php
        for ($x=2010; $x <= 2015 ; $x++) { 
            echo "<option value=\"";
            echo $x;
            echo "\">";
            echo $x;
            echo "</option>";
        }
        ?>
    </select>
</td>
</tr>
</table>
<table>
<tr>
<td width="200">
Jenis SK : </td>
<td width="250">

    <select name="sk_jenis"> 
        <option value="" selected="selected"></option>
        <option VALUE="1"> Tata Usaha</option>
        <option VALUE="2"> Wasdak</option>
        <option VALUE="3"> Karantina Hewan</option>   
        <option VALUE="4"> Karantina Tumbuhan</option>
        <option VALUE="5"> Karantina Tumbuhan dan Hewan</option>
        <option VALUE="6"> Lainnya </option>  
    </select>
</td>
</tr>
<tr>
<td>
    Pengarah : 
</td>
<td>
    <select name="sk_pengarah"> 
        <option value="" selected="selected"></option>
<?php
$sk_id=get_sk_last_id();
get_peg_list();
?>
    </select>
</td>
<td>
    Anggota 1 : 
</td>
<td>
    <select name="sk_member1"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>

</tr>

<tr>
<td>
	Penanggung Jawab : 
</td>
<td>
    <select name="sk_pjwb"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>
<td>
    Anggota 2 : 
</td>
<td>
    <select name="sk_member2"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>    </select>
</td>

</tr>
<tr>
<td>
    Ketua : 
</td>
<td>
    <select name="sk_ketua"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>

    </select>
</td>
<td>
    Anggota 3 : 
</td>
<td>
    <select name="sk_member3"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>
</tr>
<tr>
<td>
    Wakil Ketua : 
</td>
<td>
    <select name="sk_waket"> 
        <option value="" selected="selected"></option>

<?php
get_peg_list();
?>
    </select>
</td>
<td>
    Anggota 4 : 
</td>
<td>
    <select name="sk_member4"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>  

    </select>
</td>
</tr>
<tr>
<td>
    Sekretaris : 
</td>
<td>
    <select name="sk_sekretaris"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>

    </select>
</td>
<td>
    Anggota 5 : 
</td>
<td>
    <select name="sk_member5"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>  

    </select>
</td>
</tr>
<tr>
<td>
    Bendahara : 
</td>
<td>
    <select name="sk_bendahara"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>
</tr>
<tr><td><br></td></tr>
<tr>
<td>
    Pelaksana 1 : 
</td>
<td>
    <select name="sk_pelaksana1"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>
<td>
    Pelaksana 6 : 
</td>
<td>
    <select name="sk_pelaksana6"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>
</tr>
<tr>
<td>
    Pelaksana 2 : 
</td>
<td>
    <select name="sk_pelaksana2"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>
<td>
    Pelaksana 7 : 
</td>
<td>
    <select name="sk_pelaksana7"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>
</tr>
<tr>
<td>
    Pelaksana 3 : 
</td>
<td>
    <select name="sk_pelaksana3"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>
<td>
    Pelaksana 8 : 
</td>
<td>
    <select name="sk_pelaksana8"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>
</tr>
<tr>
<td>
    Pelaksana 4 : 
</td>
<td>
    <select name="sk_pelaksana4"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>
<td>
    Pelaksana 9 : 
</td>
<td>
    <select name="sk_pelaksana9"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>
</tr>
<tr>
<td>
    Pelaksana 5 : 
</td>
<td>
    <select name="sk_pelaksana5"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>
<td>
    Pelaksana 10 : 
</td>
<td>
    <select name="sk_pelaksana10"> 
        <option value="" selected="selected"></option>
<?php
get_peg_list();
?>
    </select>
</td>
</tr>

<tr>
<td></td>
<td>
<br>
<input type="hidden" name="sk_id"  value="<?php echo $sk_id; ?>">
<input type="submit" value="Simpan">
</form>
</td>
</tr>
</table>
</div>

</p>

</body>
</html>
