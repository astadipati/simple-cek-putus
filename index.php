<!DOCTYPE html>
<html>
<head>
	<title>Simple SIPP Status</title>
</head>
<body>
	<h2>Simple SIPP Status</h2>
		
	<h3>Perkara Putus Belum Minut</h3>
	
	<table cellpadding="5" cellspacing="0" border="1">
		<tr bgcolor="#CCCCCC">
			<th>No</th>
			<th>No Perkara</th>
			<th>Tanggal Putusan</th>
			<th>Status Putusan</th>
			<th>Amar Putusan </th>
			<th>Tanggal Minutasi</th>
		</tr>
		
		<?php
		//iclude file koneksi ke database
		include('koneksi.php');
		
		//query ke database dg SELECT table siswa diurutkan berdasarkan NIS paling besar
		$query = mysql_query("SELECT a.nomor_perkara, b.tanggal_putusan,b.status_putusan_nama, b.amar_putusan, b.tanggal_minutasi FROM perkara AS a LEFT JOIN perkara_putusan AS b ON a.perkara_id = b.perkara_id WHERE b.tanggal_putusan IS NOT NULL AND b.tanggal_minutasi IS NULL") or die(mysql_error());
		
		//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
		if(mysql_num_rows($query) == 0){	//ini artinya jika data hasil query di atas kosong
			
			//jika data kosong, maka akan menampilkan row kosong
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
			
		}else{	//else ini artinya jika data hasil query ada (data diu database tidak kosong)
			
			//jika data tidak kosong, maka akan melakukan perulangan while
			$no = 1;	//membuat variabel $no untuk membuat nomor urut
			while($data = mysql_fetch_assoc($query)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
				
				//menampilkan row dengan data di database
				echo '<tr>';
					echo '<td>'.$no.'</td>';	//menampilkan nomor urut
					echo '<td>'.$data['nomor_perkara'].'</td>';	//menampilkan data nis dari database
					echo '<td>'.$data['tanggal_putusan'].'</td>';	//menampilkan data nama lengkap dari database
					echo '<td>'.$data['status_putusan_nama'].'</td>';	//menampilkan data kelas dari database
					echo '<td>'.$data['amar_putusan'].'</td>';	//menampilkan data jurusan dari database
					echo '<td>'.$data['tanggal_minutasi'].'</td>';
					// echo '<td><a href="edit.php?id='.$data['siswa_id'].'">Edit</a> / <a href="hapus.php?id='.$data['siswa_id'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
				
				$no++;	//menambah jumlah nomor urut setiap row
				
			}
			
		}
		?>
	</table>
</body>
</html>