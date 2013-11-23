<?php

// Kelas SK
class sk {
	var $id;
	var $nama;
	var $sk_tanggal;
	var $jenis;
	var $pengarah;
	var $pjwb;
	var $pelaksana;
	var $ketua;
	var $waket;
	var $sekretaris;
	var $member;

	public function __construct($new_id, $new_nama, $new_pembuat, $new_tanggal, $new_jenis, $new_pengarah, $new_pjwb, $new_pelaksana, $new_ketua, $new_waket, $new_sekretaris, $new_bendahara, $new_member){
		$this->id=$new_id;
		$this->nama=$new_nama;
		$this->pembuat=$new_pembuat;
		$this->tanggal=$new_tanggal;
		$this->jenis=$new_jenis;
		$this->pengarah=$new_pengarah;
		$this->pjwb=$new_pjwb;
		$this->pelaksana=$new_pelaksana;
		$this->ketua=$new_ketua;
		$this->waket=$new_waket;
		$this->sekretaris=$new_sekretaris;
		$this->bendahara=$new_bendahara;
		$this->member=$new_member;
	}

	function sk_del($sk_id) {
		include ("cxn.php");
		$query="DELETE FROM sk WHERE sk_id = '$sk_id'";
		$result=mysqli_query ($cxn, $query)
		or die ("Tidak dapat terkoneksi");
		header('Location: browse_sk.php');
		mysql_close($cxn);

	}
	function set_db_new(){
	include ("cxn.php");
	$query="INSERT INTO sk (sk_id, sk_nama, sk_pembuat, sk_tanggal, sk_jenis, sk_pengarah, sk_pjwb, sk_pelaksana, sk_ketua, sk_waket, sk_sekretaris, sk_bendahara, sk_member) VALUES ('$this->id', '$this->nama', '$this->pembuat','$this->tanggal', '$this->jenis','$this->pengarah', '$this->pjwb', '$this->pelaksana', '$this->ketua', '$this->waket', '$this->sekretaris', '$this->bendahara',  '$this->member')";
	$result=mysqli_query ($cxn, $query)
		or die ("Tidak dapat terkoneksi (set_db_new_sk)");
	header( 'Location: browse_sk.php' ) ;
	}

	function set_db_update(){
	include ("cxn.php");
	$query="UPDATE sk set sk_id='$this->id', sk_nama='$this->nama',sk_pembuat='$this->pembuat', sk_tanggal='$this->tanggal', sk_jenis='$this->jenis', sk_pengarah='$this->pengarah', sk_pjwb='$this->pjwb', sk_pelaksana='$this->pelaksana', sk_ketua='$this->ketua', sk_waket='$this->waket', sk_sekretaris='$this->sekretaris', sk_bendahara='$this->bendahara', sk_member='$this->member' WHERE sk_id='$this->id'";
	$result=mysqli_query ($cxn, $query)
		or die ("Tidak dapat terkoneksi (set_db_update_sk)");
	header( 'Location: browse_sk.php' ) ;
	}

}

// Kelas Tabel SK
class tabel_sk {
	function get_sk_all($search,$sort){
	// Cari berdasarkan nama SK
	if (!empty($search)){
		include ("cxn.php");
		$query="SELECT * FROM sk WHERE sk_nama LIKE '%$search%'";
		$result=mysqli_query ($cxn, $query)
		or ("Tidak dapat terkoneksi");
		$nrows=mysqli_num_rows ($result);		
		}
	// Cari berdasarkan nama pegawai
	elseif (!empty($sort)){
			switch ($sort) {
				case 'date':
					include ("cxn.php");
					$query="SELECT * FROM sk ORDER BY sk_tanggal";
					$result=mysqli_query ($cxn, $query)
					or ("Tidak dapat terkoneksi");
					$nrows=mysqli_num_rows ($result);
					break;
				case 'jenis':
					include ("cxn.php");
					$query="SELECT * FROM sk ORDER BY sk_jenis";
					$result=mysqli_query ($cxn, $query)
					or ("Tidak dapat terkoneksi");
					$nrows=mysqli_num_rows ($result);
					break;
				case 'pembuat':
					include ("cxn.php");
					$query="SELECT * FROM sk ORDER BY sk_pembuat";
					$result=mysqli_query ($cxn, $query)
					or ("Tidak dapat terkoneksi");
					$nrows=mysqli_num_rows ($result);
					break;
				
				default:
					# code...
					break;
			}
		
		}
	elseif (empty($sort) and empty($search2)) {
		include ("cxn.php");
		$query="SELECT * FROM sk ORDER BY lastupdate DESC";
		$result=mysqli_query ($cxn, $query)
		or ("Tidak dapat terkoneksi");
		$nrows=mysqli_num_rows ($result);
		}

	//pengulangan untuk baris tabel
	for ($i=0;$i<$nrows;$i++)
	{
		$row=mysqli_fetch_assoc ($result);
		extract ($row);
		echo "<tr>";
		echo "<td>";
		echo $i+1;
		echo "<td>";
		echo "<a href=\"edit_sk.php?sk_id=";
		echo $sk_id;
		echo "\" style=\"text-decoration: none; color:#000000;\">".$sk_nama."</a></td>";
		echo "<td>";
		if (empty($sk_pembuat)){
			$sk_pembuat="-";
		}
		echo $sk_pembuat;
		echo "</td>";
		echo "<td>";
		$array_tanggal=array();
		$array_tanggal=explode("-", $sk_tanggal);
		$array_tanggal[3]=$array_tanggal[0];
		$array_tanggal[0]=$array_tanggal[2];
		$array_tanggal[2]=$array_tanggal[3];
		unset($array_tanggal[3]);
		
		if ($array_tanggal[2]!="0000") {
		switch ($array_tanggal[1]) {
			case '01':
				$array_tanggal[1]="Januari";
				break;
			case '02':
				$array_tanggal[1]="Februari";
				break;
			case '03':
				$array_tanggal[1]="Maret";
				break;
			case '04':
				$array_tanggal[1]="April";
				break;
			case '05':
				$array_tanggal[1]="Mei";
				break;
			case '06':
				$array_tanggal[1]="Juni";
				break;
			case '07':
				$array_tanggal[1]="Juli";
				break;
			case '08':
				$array_tanggal[1]="Agustus";
				break;
			case '09':
				$array_tanggal[1]="September";
				break;
			case '10':
				$array_tanggal[1]="Oktober";
				break;
			case '11':
				$array_tanggal[1]="November";
				break;
			case '12':
				$array_tanggal[1]="Desember";
				break;			
			default:
				# code...
				break;
			}
		$sk_tanggal=implode(" ", $array_tanggal);
		
		}
		elseif ($array_tanggal[2]="0000") {
			$sk_tanggal="-";
		}
		echo $sk_tanggal;	
		echo "</td>";
		echo "<td>";
		switch ($sk_jenis) {
			case 1:
				$sk_jenis="Tata Usaha";
				break;
			case 2:
				$sk_jenis="Wasdak";
				break;
			case 3:
				$sk_jenis="Karantina Hewan";
				break;
			case 4:
				$sk_jenis="Karantina Tumbuhan";
				break;
			case 5:
				$sk_jenis="Karantina Hewan dan Tumbuhan";
				break;
			case 6:
				$sk_jenis="Lainnya";
				break;
			default:
				$sk_jenis="-";
				break;
		}
		echo $sk_jenis;
		echo "</td>";
		echo "<td>";

	// ambil nama pemegang jabatan struktur dalam SK
	if ($sk_pengarah <> "0") {
	echo "Pengarah : ";		
	$peg_query="SELECT * FROM peg WHERE peg_id='$sk_pengarah'";
	$peg_result=mysqli_query ($cxn, $peg_query)
		or ("Tidak dapat terkoneksi");
	$peg_nrows=mysqli_num_rows ($peg_result);
	$peg_row=mysqli_fetch_assoc ($peg_result);
	extract ($peg_row);
	echo get_nama_popup($peg_id, $peg_nama); echo "<br>";
	}

	if ($sk_pjwb <> "0") {
	echo "Penanggung Jawab : ";		
	$peg_query="SELECT * FROM peg WHERE peg_id='$sk_pjwb'";
	$peg_result=mysqli_query ($cxn, $peg_query)
		or ("Tidak dapat terkoneksi");
	$peg_nrows=mysqli_num_rows ($peg_result);
	$peg_row=mysqli_fetch_assoc ($peg_result);
	extract ($peg_row);
	echo get_nama_popup($peg_id, $peg_nama); echo "<br>";
	}
	

	if ($sk_ketua <> "0") {
	echo "Ketua : ";		
	$peg_query="SELECT * FROM peg WHERE peg_id='$sk_ketua'";
	$peg_result=mysqli_query ($cxn, $peg_query)
		or ("Tidak dapat terkoneksi");
	$peg_nrows=mysqli_num_rows ($peg_result);
	$peg_row=mysqli_fetch_assoc ($peg_result);
	extract ($peg_row);
	echo get_nama_popup($peg_id, $peg_nama); echo "<br>";
	}
	if ($sk_waket <> "0") {
	echo "Wakil Ketua : ";		
	$peg_query="SELECT * FROM peg WHERE peg_id='$sk_waket'";
	$peg_result=mysqli_query ($cxn, $peg_query)
		or ("Tidak dapat terkoneksi");
	$peg_nrows=mysqli_num_rows ($peg_result);
	$peg_row=mysqli_fetch_assoc ($peg_result);
	extract ($peg_row);
	echo get_nama_popup($peg_id, $peg_nama); echo "<br>";
	}
	if ($sk_sekretaris <> "0") {
	echo "Sekretaris : ";		
	$peg_query="SELECT * FROM peg WHERE peg_id='$sk_sekretaris'";
	$peg_result=mysqli_query ($cxn, $peg_query)
		or ("Tidak dapat terkoneksi");
	$peg_nrows=mysqli_num_rows ($peg_result);
	$peg_row=mysqli_fetch_assoc ($peg_result);
	extract ($peg_row);
	echo get_nama_popup($peg_id, $peg_nama); echo "<br>";
	}
	if ($sk_bendahara <> "0") {
	echo "Bendahara : ";		
	$peg_query="SELECT * FROM peg WHERE peg_id='$sk_bendahara'";
	$peg_result=mysqli_query ($cxn, $peg_query)
		or ("Tidak dapat terkoneksi");
	$peg_nrows=mysqli_num_rows ($peg_result);
	$peg_row=mysqli_fetch_assoc ($peg_result);
	extract ($peg_row);
	echo get_nama_popup($peg_id, $peg_nama); echo "<br>";
	}

	//fetch array pelaksana	
	$peg_query="SELECT sk_pelaksana FROM sk";
	$peg_result=mysqli_query ($cxn, $peg_query)
		or ("Tidak dapat terkoneksi");
	$peg_row=mysqli_fetch_field ($peg_result);
	extract ($peg_row);
	//echo $sk_pelaksana; 
	$array_pelaksana=explode("|", $sk_pelaksana);
	// $pelaksana1=$array_pelaksana[0];
	// $pelaksana2=$array_pelaksana[1];
	// $pelaksana3=$array_pelaksana[2];
	// $pelaksana4=$array_pelaksana[3];
	// $pelaksana5=$array_pelaksana[4];
	$x=0; //looping dari 0 sampai 4, meng-echo pelaksana
	while ($x <= 9) {
	 $pelaksana=$array_pelaksana[$x];
	 $x=$x+1;
	if (!empty($pelaksana)) { //cek array pelaksana kosong atau tidak
	$peg_query="SELECT * FROM peg WHERE peg_id='$pelaksana'";
	$peg_result=mysqli_query ($cxn, $peg_query)
		or ("Tidak dapat terkoneksi");
	$peg_nrows=mysqli_num_rows ($peg_result);
	$peg_row=mysqli_fetch_assoc ($peg_result);
	extract ($peg_row);
	echo "Pelaksana : "; echo get_nama_popup($peg_id, $peg_nama);
	echo "<br>";	}}

	//fetch array member
	$peg_query="SELECT sk_member FROM sk";
	$peg_result=mysqli_query ($cxn, $peg_query)
		or ("Tidak dapat terkoneksi");
	$peg_row=mysqli_fetch_field ($peg_result);
	extract ($peg_row);
	//echo $sk_member; 
	$array_member=explode("|", $sk_member);
	// $member1=$array_member[0];
	// $member2=$array_member[1];
	// $member3=$array_member[2];
	// $member4=$array_member[3];
	// $member5=$array_member[4];
	$x=0; //looping dari 0 sampai 4, meng-echo member
	while ($x <= 9) {
	 $member=$array_member[$x];
	 $x=$x+1;
	if (!empty($member)) { //cek array member kosong atau tidak
	$peg_query="SELECT * FROM peg WHERE peg_id='$member'";
	$peg_result=mysqli_query ($cxn, $peg_query)
		or ("Tidak dapat terkoneksi");
	$peg_nrows=mysqli_num_rows ($peg_result);
	$peg_row=mysqli_fetch_assoc ($peg_result);
	extract ($peg_row);
	echo "Anggota : "; echo get_nama_popup($peg_id, $peg_nama);
	echo "<br>";	}}

		echo "</td>";
		// echo "<td>";
		// echo "<a href=edit_sk.php?sk_id=";
		// echo $sk_id;
		// echo ">edit</a>";
		// echo "</td>";
		echo "<td>";
		echo "<a href=del_sk.php?sk_id=";
		echo $sk_id;
		echo "\" onclick = \"if (! confirm('Anda yakin ingin menghapus SK ".$sk_nama."?')) { return false; }\">hapus</a>";
		echo "</td>";
	} 


	
	}
}

//Kelas Tabel Pegawai
class tabel_peg {

	var $query;
	var $result;
	var $nrows;
	var $row;

	public function row(){
				include ("cxn.php");
				$this->result=mysqli_query ($cxn, $this->query)
					or ("Tidak dapat terkoneksi");
				$this->nrows=mysqli_num_rows ($this->result);

				for ($i=0;$i<$this->nrows;$i++)
				{
					$this->	row=mysqli_fetch_assoc ($this->result);
					extract ($this->row);
					switch ($peg_wilker) {
		                case 1:
		                    $peg_wilker="Kantor Induk";
		                    break;
		                case 2:
		                    $peg_wilker="Wilker Lembar";
		                    break;
		                case 3:
		                    $peg_wilker="Wilker BIL";
		                    break;
		                case 4:
		                    $peg_wilker="Wilker Kayangan";
		                    break;
		                case 5:
		                    $peg_wilker="Wilker Pemenang";
		                    break;
		                case 6:
		                    $peg_wilker="Lab KH";
		                    break;
		                case 7:
		                    $peg_wilker="Lab KT";
		                    break;
		                
		                default:
		                    # code...
		                    break;
		            }

					echo "<tr>";
					echo "<td>";
					echo $peg_nama;
					echo "</td>";
					echo "<td>";
					echo $peg_wilker;
					echo "</td>";
					echo "<td>";
					echo $peg_telepon;
					echo "</td>";
					echo "<td>";
					echo get_nama_popup_lihat($peg_id, $peg_nama);
					echo "</td>";
					echo "<td>";
					echo "<a href=edit_peg.php?peg_id=";
					echo $peg_id;
					echo ">edit</a>";
					echo "</td>";

				} 
	}

	public function get_peg_all($search){
	if (!empty($search)) {
				$this->query="SELECT * FROM peg WHERE peg_nama LIKE '%$search%'";
				$this->row();
				mysql_close($cxn);
	} 
	elseif (empty($search)) {
		$this->query="SELECT * FROM peg";
				$this->row();
				mysql_close($cxn);
	}

		// Pilihan filter
		// switch ($filter) {
		// 	case 'Kantor Induk':
		// 		echo $filter;
		// 		include ("cxn.php");
		// 		$this->query="SELECT * FROM peg WHERE peg_wilker = '1'";
		// 		$this->row();
		// 		mysql_close($cxn);
		// 		break;

		// 	case 'Wilker Lembar':
		// 		echo $filter;
		// 		include ("cxn.php");
		// 		$this->query="SELECT * FROM peg WHERE peg_wilker = '2'";
		// 		$this->row();
		// 		mysql_close($cxn);
		// 		break;
			
		// 	default:	
		// 		// Pilihan default tanpa filter
		// 		$this->query="SELECT * FROM peg";
		// 		$this->row();
		// 		mysql_close($cxn);
		// 		break;
		// }
	}	
}

// Kelas Pegawai
class pegawai {
    var $nama;
    var $id;
    var $telepon;
    var $wilker;
    var $row;

    // Construct awal untuk objek baru
    public function __construct($new_id, $new_nama, $new_wilker, $new_telepon){
    $this->id = $new_id;
    $this->nama = $new_nama;
    $this->wilker = $new_wilker;
    $this->telepon = $new_telepon;	
    }

    // Set Get masing-masing property
    function get_id() {
        return $this->id;
    }
    function get_nama() {
        return $this->nama;
    }
    function get_wilker() {
        return $this->wilker;
    }
    function get_telepon() {
        return $this->telepon;
    }


    // Insert pegawai baru ke database.
    function set_db_new() {
    include ("cxn.php");
	$query="INSERT INTO peg (peg_id, peg_nama, peg_wilker, peg_telepon) 
    VALUES ('$this->id','$this->nama','$this->wilker','$this->telepon')";
    $result=mysqli_query ($cxn, $query)
	or die ("Tidak dapat terkoneksi");
		header( 'Location: browse_peg.php' ) ;
		mysql_close($cxn);
    }


    // Hapus pegawai baru dari database.
    function peg_del($peg_id) {
    include ("cxn.php");
	$query="DELETE FROM peg WHERE peg_id = '$peg_id'";
    $result=mysqli_query ($cxn, $query)
	or die ("Tidak dapat terkoneksi");
		header( 'Location: browse_peg.php' ) ;
		mysql_close($cxn);
    }

    // Edit pegawai baru dari database.
    public function peg_edit($peg_id, $peg_nama, $peg_wilker, $peg_telepon) {
    include ("cxn.php");
	$query="UPDATE peg set peg_nama='$peg_nama', peg_wilker='$peg_wilker', peg_telepon='$peg_telepon'
			WHERE peg_id='$peg_id'";
	$result=mysqli_query ($cxn, $query)
		or die ("Tidak dapat terkoneksi");
	header( 'Location: browse_peg.php' ) ;
		

    }


}

	// Get name with popup
	function get_nama_popup($peg_id, $peg_nama) {
	// include("cxn.php");
	// $query="SELECT peg_nama, peg_id FROM peg WHERE peg_id LIKE '$peg_id'";
	// $result=mysqli_query ($cxn, $query)
	// 	or die ("Tidak dapat terkoneksi popup");
	// $data=mysqli_fetch_field($result);
	// mysql_close($cxn);
	// extract($data);

	// CSS Style khusus untuk setiap id popup
	echo "<style type=\"text/css\">#popUpDiv".$peg_id;
	echo "{
     position:absolute;
     width:1000px;
     height:300px;
     z-index:99999;
     top:200px;
     top:50%;
     left:50%;
     margin:-0px 0 0 -400px;
     background:#ffffff;
	}
	p {
		margin:10px;
	}
	#popUpDiv";
	echo $peg_id;
	echo "{ a position:fixed; top:0; left:0;}
	</style>";

	echo "<div id=\"blanket\" style=\"display:none;\"></div>";
    echo "<div id=\"popUpDiv";
    echo $peg_id;
    echo "\" style=\"display:none;\">";

    echo "<a href=\"#\" onclick=\"popup('popUpDiv";
    echo $peg_id;
    echo "')\" >[ X ]</a><br>";
	echo "<p name=\"xtop\"><strong>"; // data dalam popup
	include ("cxn.php");
	echo $peg_nama." memiliki jabatan dalam SK berikut :</strong><br><br>";
		
		// sebagai pengarah
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_pengarah='$peg_id'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Pengarah ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}
		
		// sebagai penanggung jawab
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_pjwb='$peg_id'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Penanggung Jawab ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}

		// sebagai ketua
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_ketua='$peg_id'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Ketua ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}
	
		// sebagai wakil ketua
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_waket='$peg_id'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Wakil Ketua ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}

		// sebagai sekretaris
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_sekretaris='$peg_id'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Sekretaris ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}

		// sebagai bendahara
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_bendahara='$peg_id'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Bendahara ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}

		// sebagai pelaksana
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_pelaksana LIKE '%$peg_id%'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Pelaksana ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}

		// sebagai anggota
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_member LIKE '%$peg_id%'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Anggota ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}
    echo "</p>";
    echo "</div>";
   	echo "<a id=\"link\" onclick=\"popup('popUpDiv";
    echo $peg_id;
    echo "')\">";
   	echo $peg_nama;
   	echo "</a>";
   }

  	// Get name with popup
	function get_nama_popup_lihat($peg_id, $peg_nama) {
	// include("cxn.php");
	// $query="SELECT peg_nama, peg_id FROM peg WHERE peg_id LIKE '$peg_id'";
	// $result=mysqli_query ($cxn, $query)
	// 	or die ("Tidak dapat terkoneksi popup");
	// $data=mysqli_fetch_field($result);
	// mysql_close($cxn);
	// extract($data);

	// CSS Style khusus untuk setiap id popup
	echo "<style type=\"text/css\">#popUpDiv".$peg_id;
	echo "{
     position:absolute;
     width:1000px;
     height:300px;
     z-index:99999;
     top:200px;
     top:50%;
     left:50%;
     margin:-0px 0 0 -400px;
     background:#ffffff;
	}
	p {
		margin:10px;
	}
	#popUpDiv";
	echo $peg_id;
	echo "{ a position:relative; top:20px; left:20px;}
	</style>";

	echo "<div id=\"blanket\" style=\"display:none;\"></div>";
    echo "<div id=\"popUpDiv";
    echo $peg_id;
    echo "\" style=\"display:none;\">";

    echo "<a href=\"#\" onclick=\"popup('popUpDiv";
    echo $peg_id;
    echo "')\" >[ X ]</a><br>";
	echo "<p><strong>"; // data dalam popup
	include ("cxn.php");
	echo $peg_nama." memiliki jabatan dalam SK berikut :</strong><br><br>";
		
		// sebagai pengarah
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_pengarah='$peg_id'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Pengarah ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}
		
		// sebagai penanggung jawab
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_pjwb='$peg_id'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Penanggung Jawab ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}

		// sebagai ketua
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_ketua='$peg_id'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Ketua ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}
	
		// sebagai wakil ketua
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_waket='$peg_id'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Wakil Ketua ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}

		// sebagai sekretaris
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_sekretaris='$peg_id'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Sekretaris ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}

		// sebagai bendahara
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_bendahara='$peg_id'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Bendahara ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}

		// sebagai pelaksana
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_pelaksana LIKE '%$peg_id%'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Pelaksana ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}

		// sebagai anggota
		$query="SELECT sk_nama, sk_id FROM sk WHERE sk_member LIKE '%$peg_id%'";
		$result=mysqli_query ($cxn, $query)
			or ("Tidak dapat terkoneksi");
		$rows=mysqli_num_rows($result);
		for ($i=0; $i < $rows ; $i++) { 
		$data=mysqli_fetch_assoc($result);
		extract($data);
		echo "<strong>".$sk_nama."</strong>";
		if (!empty($sk_nama)){
			echo " sebagai Anggota ";
			echo "<a href=\"edit_sk.php?sk_id=".$sk_id."\">[edit]</a>";
			}
		echo "<br>";
		}

    echo "</p>";
    echo "</div>";
   	echo "<a id=\"link\" onclick=\"popup('popUpDiv";
    echo $peg_id;
    echo "')\">";
   	echo "Lihat jabatan dalam SK";
   	echo "</a>";
   }



// NON CLASS FUNCTION

// Mengambil nomor id paling besar, lalu ditambah dengan 1.
function get_peg_last_id(){
include ("cxn.php");
//tentukan nomor urut
$query="SELECT peg_id FROM peg ORDER BY peg_id DESC LIMIT 1";
$result=mysqli_query ($cxn, $query)
	or ("Tidak dapat terkoneksi");
echo "<br>";
$row = mysqli_fetch_assoc ($result);
extract ($row);
$peg_id = $peg_id + 1;
return $peg_id;
mysql_close($cxn);
}

// Mengambil nomor id paling besar, lalu ditambah dengan 1.
function get_sk_last_id(){
include ("cxn.php");
//tentukan nomor urut
$query="SELECT sk_id FROM sk ORDER BY sk_id DESC LIMIT 1";
$result=mysqli_query ($cxn, $query)
	or ("Tidak dapat terkoneksi");
echo "<br>";
$row = mysqli_fetch_assoc ($result);
extract ($row);
$sk_id = $sk_id + 1;
return $sk_id;
mysql_close($cxn);
}

// ambil daftar untuk form new sk dan edit sk (selected)
function get_peg_list($selected){
//cek $selected untuk form edit
if (!empty($selected)){
include ("cxn.php");
$query="SELECT * FROM peg";
$result=mysqli_query ($cxn, $query)
or ("Tidak dapat terkoneksi");
$nrows=mysqli_num_rows ($result);
	for ($i=0;$i<$nrows;$i++) {
    $row=mysqli_fetch_assoc ($result);
    extract ($row);
    $peg_nama;
        echo "<option value=\"";
        echo $peg_id;
        echo "\"";
		if ($selected==$peg_id) {
		echo "selected=\"selected\"";
		} elseif ($selected!=$peg_id) {
			echo "";
		}
		
        echo "/>";
        echo $peg_nama;
        echo"</option>";
	}
} 
//jika $selected kosong atau -, lanjut seperti biasa, tanpa selected
include ("cxn.php");
$query="SELECT * FROM peg";
$result=mysqli_query ($cxn, $query)
or ("Tidak dapat terkoneksi");
$nrows=mysqli_num_rows ($result);
	for ($i=0;$i<$nrows;$i++) {
    $row=mysqli_fetch_assoc ($result);
    extract ($row);
        echo "<option value=\"";
        echo $peg_id;
        echo "\"/>";
        echo $peg_nama;
        echo"</option>";
}
}



// Fungsi Statistik

	function top_pjwb(){
	include ("cxn.php");
	$query="SELECT sk.sk_pjwb, peg.peg_nama, peg.peg_id,  COUNT(sk.sk_pjwb) AS total FROM sk INNER JOIN peg ON peg.peg_id = sk.sk_pjwb GROUP BY sk_pjwb ORDER BY total DESC LIMIT 0,10";
	$result=mysqli_query($cxn, $query)
		or die ("Gagal mengambil data...");
	mysql_close($cxn);
	$nrows=mysqli_num_rows ($result);
				for ($i=0;$i<$nrows;$i++)
				{
					$row=mysqli_fetch_assoc ($result);
					extract ($row);
					echo "<tr><td>";
					echo get_nama_popup($peg_id, $peg_nama);
					echo "</td><td>";
					echo $total;
					echo "</td></tr>";
				}
	}

	function top_pengarah(){
	include ("cxn.php");
	$query="SELECT sk.sk_pjwb, peg.peg_nama, peg.peg_id,  COUNT(sk.sk_pengarah) AS total FROM sk INNER JOIN peg ON peg.peg_id = sk.sk_pengarah GROUP BY sk_pengarah ORDER BY total DESC LIMIT 0,10";
	$result=mysqli_query($cxn, $query)
		or die ("Gagal mengambil data...");
	mysql_close($cxn);
	$nrows=mysqli_num_rows ($result);
				for ($i=0;$i<$nrows;$i++)
				{
					$row=mysqli_fetch_assoc ($result);
					extract ($row);
					echo "<tr><td>";
					echo get_nama_popup($peg_id, $peg_nama);
					echo "</td><td>";
					echo $total;
					echo "</td></tr>";
				}
	}

	function top_ketua(){
	include ("cxn.php");
	$query="SELECT sk.sk_ketua, peg.peg_nama, peg.peg_id, COUNT(sk.sk_ketua) AS total FROM sk INNER JOIN peg ON peg.peg_id = sk.sk_ketua GROUP BY sk_ketua ORDER BY total DESC LIMIT 0,10";
	$result=mysqli_query($cxn, $query)
		or die ("Gagal mengambil data...");
	mysql_close($cxn);
	$nrows=mysqli_num_rows ($result);
				for ($i=0;$i<$nrows;$i++)
				{
					$row=mysqli_fetch_assoc ($result);
					extract ($row);
					echo "<tr><td>";
					echo get_nama_popup($peg_id, $peg_nama);
					echo "</td><td>";
					echo $total;
					echo "</td></tr>";
				}
	}

function top_waket(){
	include ("cxn.php");
	$query="SELECT sk.sk_waket, peg.peg_nama, peg.peg_id, COUNT(sk.sk_waket) AS total FROM sk INNER JOIN peg ON peg.peg_id = sk.sk_waket GROUP BY sk_waket ORDER BY total DESC LIMIT 0,10";
	$result=mysqli_query($cxn, $query)
		or die ("Gagal mengambil peg.peg_id, data...");
	mysql_close($cxn);
	$nrows=mysqli_num_rows ($result);
				for ($i=0;$i<$nrows;$i++)
				{
					$row=mysqli_fetch_assoc ($result);
					extract ($row);
					echo "<tr><td>";
					echo get_nama_popup($peg_id, $peg_nama);
					echo "</td><td>";
					echo $total;
					echo "</td></tr>";
				}
	}

function top_sekretaris(){
	include ("cxn.php");
	$query="SELECT sk.sk_sekretaris, peg.peg_nama, peg.peg_id, COUNT(sk.sk_sekretaris) AS total FROM sk INNER JOIN peg ON peg.peg_id = sk.sk_sekretaris GROUP BY sk_sekretaris ORDER BY total DESC LIMIT 0,10";
	$result=mysqli_query($cxn, $query)
		or die ("Gagal mengambil data...");
	mysql_close($cxn);
	$nrows=mysqli_num_rows ($result);
				for ($i=0;$i<$nrows;$i++)
				{
					$row=mysqli_fetch_assoc ($result);
					extract ($row);
					echo "<tr><td>";
					echo get_nama_popup($peg_id, $peg_nama);
					echo "</td><td>";
					echo $total;
					echo "</td></tr>";
				}
	}

function top_bendahara(){
	include ("cxn.php");
	$query="SELECT sk.sk_bendahara, peg.peg_nama, COUNT(sk.sk_bendahara) AS total FROM sk INNER JOIN peg ON peg.peg_id = sk.sk_bendahara GROUP BY sk_bendahara ORDER BY total DESC LIMIT 0,10";
	$result=mysqli_query($cxn, $query)
		or die ("Gagal mengambil data...");
	mysql_close($cxn);
	$nrows=mysqli_num_rows ($result);
				for ($i=0;$i<$nrows;$i++)
				{
					$row=mysqli_fetch_assoc ($result);
					extract ($row);
					echo "<tr><td>";
					echo get_nama_popup($peg_id, $peg_nama);
					echo "</td><td>";
					echo $total;
					echo "</td></tr>";
				}
	}


function top_pelaksana(){
	include ("cxn.php");
	$query="SELECT sk_pelaksana FROM sk";
	$result=mysqli_query($cxn, $query)
		or die ("Gagal mengambil data...");
	mysql_close($cxn);
	$nrows=mysqli_num_rows ($result);
	$array_pelaksana=array();
				// Penggabungan string array
				for ($i=0;$i<$nrows;$i++)
				{
					$row=mysqli_fetch_assoc ($result);
					extract ($row);
					$pelaksana_string=$pelaksana_string.$sk_pelaksana;
				}
				// Pemisahan string menjadi array
				$array_pelaksana=explode("|",$pelaksana_string);
				$array_pelaksana=array_filter($array_pelaksana); // hapus elemen kosong
				$array_pelaksana=array_values($array_pelaksana); // urutkan kembali key elemen mulai dari 0
				$count_pelaksana=array_count_values($array_pelaksana);
				//urutkan berdasarkan duplikat
				$array_pelaksana=array_count_values($array_pelaksana);
				arsort($array_pelaksana);
				$array_pelaksana=array_keys($array_pelaksana);
				//print_r($array_pelaksana);
				$count=count($array_pelaksana);
				if ($count>10) {
					$count=10;
				} elseif ($count<10) {
					$count=$count;
				}
				for ($i=0;$i<$count;$i++){
					$id=$array_pelaksana[$i];
					//$x=count($array_pelaksana); //hitung jumlah i dalam semua array
					//echo $id;
					//mengambil nama dari setiap id x
					$query="SELECT * FROM peg WHERE peg_id='$id'";
					$result=mysqli_query($cxn,$query)
						or die ("Gagal mengambil data...");
					$data=mysqli_fetch_assoc($result);
					extract($data);
					echo "<tr><td>";
					echo get_nama_popup($peg_id, $peg_nama);
					echo "<br>";			
					echo "</td><td>";
					echo $count_pelaksana[$id];
					echo "</td>";
					echo "</td></tr>";
					//}
					
				
				}
	}

function top_member(){
	include ("cxn.php");
	$query="SELECT sk_member FROM sk";
	$result=mysqli_query($cxn, $query)
		or die ("Gagal mengambil data...");
	mysql_close($cxn);
	$nrows=mysqli_num_rows ($result);
	$array_member=array();
				// Penggabungan string array
				for ($i=0;$i<$nrows;$i++)
				{
					$row=mysqli_fetch_assoc ($result);
					extract ($row);
					$member_string=$member_string.$sk_member;
				}
				// Pemisahan string menjadi array
				$array_member=explode("|",$member_string);
				$array_member=array_filter($array_member); // hapus elemen kosong
				$array_member=array_values($array_member); // urutkan kembali key elemen mulai dari 0
				$count_member=array_count_values($array_member);
				//urutkan berdasarkan duplikat
				$array_member=array_count_values($array_member);
				arsort($array_member);
				$array_member=array_keys($array_member);
				//print_r($array_member);
				$count=count($array_member);
				if ($count>10) {
					$count=10;
				} elseif ($count<10) {
					$count=$count;
				}
				for ($i=0;$i<$count;$i++){
					$id=$array_member[$i];
					//$x=count($array_member); //hitung jumlah i dalam semua array
					//echo $id;
					//mengambil nama dari setiap id x
					$query="SELECT * FROM peg WHERE peg_id='$id'";
					$result=mysqli_query($cxn,$query)
						or die ("Gagal mengambil data...");
					$data=mysqli_fetch_assoc($result);
					extract($data);
					echo "<tr><td>";
					echo get_nama_popup($peg_id, $peg_nama);
					echo "<br>";			
					echo "</td><td>";
					echo $count_member[$id];
					echo "</td>";
					echo "</td></tr>";
					//}
					
				
				}
	}



// EDIT section : get peg pelaksana untuk select khusus pelaksana
function get_peg_list_pelaksana($sk_id, $array){
	include ("cxn.php");
	$query="SELECT sk_pelaksana FROM sk WHERE sk_id='$sk_id'";
	$result=mysqli_query($cxn, $query)
		or die ("Gagal mengambil data...");
	mysql_close($cxn);
	$data0=mysqli_fetch_assoc ($result);
	extract ($data0);
	//echo $sk_pelaksana;
	$array_pelaksana=array();	
	$array_pelaksana=explode("|",$sk_pelaksana);
	$count=count($array_pelaksana);
	if (!empty($array_pelaksana[$array])) {
		$selected=$array_pelaksana[$array];
		include ("cxn.php");
		$query="SELECT * FROM peg";
		$result=mysqli_query ($cxn, $query)
		or ("Tidak dapat terkoneksi");
		$nrows=mysqli_num_rows ($result);
		for ($i=0;$i<$nrows;$i++) {
		    $row=mysqli_fetch_assoc ($result);
		    extract ($row);
	        echo "<option value=\"";
	        echo $peg_id;
	        echo "\"";
			if ($selected==$peg_id) {
				echo "selected=\"selected\"";
				} 
			elseif ($selected!=$peg_id) {
				echo "";
				}
			echo "/>";
	        echo $peg_nama;
	        echo"</option>";
		}
	} 
	elseif (empty($array_pelaksana[$array])) {
		$selected=$array_pelaksana[$array];
		include ("cxn.php");
		$query="SELECT * FROM peg";
		$result=mysqli_query ($cxn, $query)
		or ("Tidak dapat terkoneksi");
		$nrows=mysqli_num_rows ($result);
		for ($i=0;$i<$nrows;$i++) {
		    $row=mysqli_fetch_assoc ($result);
		    extract ($row);
	        echo "<option value=\"";
	        echo $peg_id;
	        echo "\"";
			if ($selected==$peg_id) {
				echo "selected=\"selected\"";
				} 
			elseif ($selected!=$peg_id) {
				echo "";
				}
			echo "/>";
	        echo $peg_nama;
	        echo"</option>";
		}
	}
}
//en of get_peg_list_pelaksana

// EDIT section : get peg member untuk select khusus member
function get_peg_list_member($sk_id, $array){
	include ("cxn.php");
	$query="SELECT sk_member FROM sk WHERE sk_id='$sk_id'";
	$result=mysqli_query($cxn, $query)
		or die ("Gagal mengambil data...");
	mysql_close($cxn);
	$data0=mysqli_fetch_assoc ($result);
	extract ($data0);
	//echo $sk_member;
	$array_member=array();	
	$array_member=explode("|",$sk_member);
	$count=count($array_member);
	if (!empty($array_member[$array])) {
		$selected=$array_member[$array];
		include ("cxn.php");
		$query="SELECT * FROM peg";
		$result=mysqli_query ($cxn, $query)
		or ("Tidak dapat terkoneksi");
		$nrows=mysqli_num_rows ($result);
		for ($i=0;$i<$nrows;$i++) {
		    $row=mysqli_fetch_assoc ($result);
		    extract ($row);
	        echo "<option value=\"";
	        echo $peg_id;
	        echo "\"";
			if ($selected==$peg_id) {
				echo "selected=\"selected\"";
				} 
			elseif ($selected!=$peg_id) {
				echo "";
				}
			echo "/>";
	        echo $peg_nama;
	        echo"</option>";
		}
	} 
	elseif (empty($array_member[$array])) {
		$selected=$array_member[$array];
		include ("cxn.php");
		$query="SELECT * FROM peg";
		$result=mysqli_query ($cxn, $query)
		or ("Tidak dapat terkoneksi");
		$nrows=mysqli_num_rows ($result);
		for ($i=0;$i<$nrows;$i++) {
		    $row=mysqli_fetch_assoc ($result);
		    extract ($row);
	        echo "<option value=\"";
	        echo $peg_id;
	        echo "\"";
			if ($selected==$peg_id) {
				echo "selected=\"selected\"";
				} 
			elseif ($selected!=$peg_id) {
				echo "";
				}
			echo "/>";
	        echo $peg_nama;
	        echo"</option>";
		}
	}
}
//en of get_peg_list_member
function get_sk_tanggal_edit(){
	$array_tanggal=array();
		$array_tanggal=explode("-", $sk_tanggal);
		$array_tanggal[3]=$array_tanggal[0];
		$array_tanggal[0]=$array_tanggal[2];
		$array_tanggal[2]=$array_tanggal[3];
		unset($array_tanggal[3]);
		
		if ($array_tanggal[2]!="0000") {
		$sk_tanggal=implode("/", $array_tanggal);
		
		}
		elseif ($array_tanggal[2]="0000") {
			$sk_tanggal=" ";
		}
		echo $sk_tanggal;	
}
?>