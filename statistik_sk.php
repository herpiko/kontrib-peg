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
<strong>Statistik </strong>
<br> 
Jumlah peran pegawai dalam Surat Keputusan (10 besar)
<br>
<br>
<table width="100%">
<tr style="vertical-align:top;">
<td>
    <strong>Sebagai Pengarah</strong>
    <br>
    <div class="CSSTableGenerator">
    <table width="100%">
    <tr>
    <td>Nama</td>
    <td width="10"></td>
    </tr>
    <?php
    top_pengarah();
    ?>
    </table>
</td>
<td>
    <strong>Sebagai Penanggung Jawab</strong>
    <br>
    <div class="CSSTableGenerator">
    <table width="100%">
    <tr>
    <td>Nama</td>
    <td width="10"></td>
    </tr>
    <?php
    top_pjwb();
    ?>
    </table>
</td>
<td>
    <strong>Sebagai Ketua</strong>
    <br>
    <div class="CSSTableGenerator">
    <table width="100%">
    <tr>
    <td>Nama</td>
    <td width="10"></td>
    </tr>
    <?php
    top_ketua();
    ?>
    </table>
</td>
<td>
    <strong>Sebagai Wakil Ketua</strong>
    <br>
    <div class="CSSTableGenerator">
    <table width="100%">
    <tr>
    <td>Nama</td>
    <td width="10"></td>
    </tr>
    <?php
    top_waket();
    ?>
    </table>
</td>
</tr>
<tr><td><br></td></tr>
<tr style="vertical-align:top;">
<td>
    <strong>Sebagai Sekretaris</strong>
    <br>
    <div class="CSSTableGenerator">
    <table width="100%">
    <tr>
    <td>Nama</td>
    <td width="10"></td>
    </tr>
    <?php
    top_sekretaris();
    ?>
    </table>
</td>
<td>
    <strong>Sebagai Bendahara</strong>
    <br>
    <div class="CSSTableGenerator">
    <table width="100%">
    <tr>
    <td>Nama</td>
    <td width="10"></td>
    </tr>
    <?php
    top_bendahara();
    ?>
    </table>
</td>
<td>
    <strong>Sebagai Pelaksana</strong>
    <br>
    <div class="CSSTableGenerator">
    <table width="100%">
    <tr>
    <td>Nama</td>
    <td width="10"></td>
    </tr>
    <?php
    top_pelaksana();
    ?>
    </table>
</td>
<td>
    <strong>Sebagai Anggota</strong>
    <br>
    <div class="CSSTableGenerator">
    <table width="100%">
    <tr>
    <td>Nama</td>
    <td width="10"></td>
    </tr>
    <?php
    top_member();
    ?>
    </table>
</td>
</tr>
</table>
</div>
    