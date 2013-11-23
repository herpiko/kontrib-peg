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

<?php
$sk_id = htmlspecialchars($_GET["sk_id"]);
$query="SELECT * FROM sk WHERE sk_id = '$sk_id'";
$result = mysqli_query ($cxn, $query)
    or ("Tidak dapat terkoneksi");
$row = mysqli_fetch_assoc ($result);
extract ($row);

    $array_tanggal=array();
        $array_tanggal=explode("-", $sk_tanggal);
        $array_tanggal[3]=$array_tanggal[0];
        $array_tanggal[0]=$array_tanggal[2];
        $array_tanggal[2]=$array_tanggal[3];
        unset($array_tanggal[3]);
        $sk_tanggal_d=$array_tanggal[0];
        $sk_tanggal_m=$array_tanggal[1];
        $sk_tanggal_y=$array_tanggal[2];

    
?>
<br>
<br>
<strong>Surat Keputusan (edit)</strong>
<p>
<form name="New_sk" action="prosesinput_edit_sk.php" method="POST">
<table><tr>
<td width="200">
Nama SK : 
</td>
<td>
    <input type="text" size="75" value="<?php echo $sk_nama;?>" name="sk_nama">
</td>
</tr>
<tr>
<td>
Pembuat Keputusan : 
</td>
<td>
    <input type="text" size="20" value="<?php echo $sk_pembuat; ?>" name="sk_pembuat">

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
            if ($x==$sk_tanggal_d) {
            echo "<option value=\"";
            echo $x;
            echo "\" selected=\"selected\">";
            echo $x;
            echo "</option>";
             } 
            elseif ($x!=$sk_tanggal_d) {
            echo "<option value=\"";
            echo $x;
            echo "\">";
            echo $x;
            echo "</option>";
            }

        }
        ?>
    </select>
    <select name="sk_tanggal_m">
        <?php
            switch ($sk_tanggal_m) {
                case "01": $bulan1="selected=\"selected\""; break;
                case "02": $bulan2="selected=\"selected\""; break;
                case "03": $bulan3="selected=\"selected\""; break;
                case "04": $bulan4="selected=\"selected\""; break;
                case "05": $bulan5="selected=\"selected\""; break;
                case "06": $bulan6="selected=\"selected\""; break;
                case "07": $bulan7="selected=\"selected\""; break;
                case "08": $bulan8="selected=\"selected\""; break;
                case "09": $bulan9="selected=\"selected\""; break;
                case "10": $bulan10="selected=\"selected\""; break;
                case "11": $bulan11="selected=\"selected\""; break;
                case "12": $bulan12="selected=\"selected\""; break;
                default:
                    # code...
                    break;
            }
        echo "<option VALUE=\"0\"".$bulan0."></option>";
        echo "<option VALUE=\"1\"".$bulan1."> Januari</option>";
        echo "<option VALUE=\"2\"".$bulan2."> Februari</option>";
        echo "<option VALUE=\"3\"".$bulan3."> Maret</option>";
        echo "<option VALUE=\"4\"".$bulan4."> April</option>";
        echo "<option VALUE=\"5\"".$bulan5."> Mei</option>";
        echo "<option VALUE=\"6\"".$bulan6."> Juni</option>";
        echo "<option VALUE=\"7\"".$bulan7."> Juli</option>";
        echo "<option VALUE=\"8\"".$bulan8."> Agustus</option>";
        echo "<option VALUE=\"9\"".$bulan9."> September</option>";
        echo "<option VALUE=\"10\"".$bulan10."> Oktober</option>";
        echo "<option VALUE=\"11\"".$bulan11."> November</option>";
        echo "<option VALUE=\"12\"".$bulan12."> Desember</option>";
        ?>
    </select>
    <select name="sk_tanggal_y"> 
        <option value="" selected="selected"></option>
        <?php
        for ($x=2010; $x <= 2015 ; $x++) {
            if ($x==$sk_tanggal_y) {
            echo "<option value=\"";
            echo $x;
            echo "\" selected=\"selected\">";
            echo $x;
            echo "</option>";
             } 
            elseif ($x!=$sk_tanggal_y) {
            echo "<option value=\"";
            echo $x;
            echo "\">";
            echo $x;
            echo "</option>";
            }

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
        <?php
            switch ($sk_jenis) {
                case 0:
                    $selected0="selected=\"selected\"";
                    break;
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
                default:
                    # code...
                    break;
            }
        echo "<option VALUE=\"0\"".$selected0."></option>";
        echo "<option VALUE=\"1\"".$selected1."> Tata Usaha</option>";
        echo "<option VALUE=\"2\"".$selected2."> Wasdak</option>";
        echo "<option VALUE=\"3\"".$selected3."> Karantina Hewan</option>";
        echo "<option VALUE=\"4\"".$selected4."> Karantina Tumbuhan</option>";
        echo "<option VALUE=\"5\"".$selected5."> Karantina Hewan dan Tumbuhan</option>";
        echo "<option VALUE=\"6\"".$selected6."> Lainnya</option>";
        ?>
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
get_peg_list($sk_pengarah);
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
    get_peg_list_member($sk_id, 0);
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
get_peg_list($sk_pjwb);
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
    get_peg_list_member($sk_id, 1);
?>
 </select>
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
get_peg_list($sk_ketua);
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
    get_peg_list_member($sk_id, 2);
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
get_peg_list($sk_waket);
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
    get_peg_list_member($sk_id, 3);
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
get_peg_list($sk_waket);
?>
</td>
<td>
    Anggota 5 : 
</td>
<td>
    <select name="sk_member5"> 
        <option value="" selected="selected"></option>
<?php
    get_peg_list_member($sk_id, 4);
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
get_peg_list($sk_bendahara);
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
    get_peg_list_pelaksana($sk_id, 0);
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
    get_peg_list_pelaksana($sk_id, 7);
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
    get_peg_list_pelaksana($sk_id, 1);
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
    get_peg_list_pelaksana($sk_id, 6);
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
    get_peg_list_pelaksana($sk_id, 2);
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
    get_peg_list_pelaksana($sk_id, 7);
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
    get_peg_list_pelaksana($sk_id, 3);
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
    get_peg_list_pelaksana($sk_id, 8);
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
    get_peg_list_pelaksana($sk_id, 4);
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
    get_peg_list_pelaksana($sk_id, 9);
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
</p>
</body>
</html>
