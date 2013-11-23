<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form" id="form">
    <p class="style1">Masukkan Kode :
      <input name="kode" type="text" id="kode" />
      <input name="submit1" type="submit" id="submit1" value="&lt;&lt; Cek Pulsa &gt;&gt;" />
    </p>
</form>  
<?
if ($_POST['submit1']) 
{
ini_set('max_execution_time', 300);

exec("gammu -c gammurc getussd $kode", $hasil);

// proses filter hasil output
for ($i=0; $i<=count($hasil)-1; $i++)
{
   if (substr_count($hasil[$i], 'Service reply') > 0) $index = $i;
}

// menampilkan sisa pulsa

echo $hasil[$index];
}
?>
