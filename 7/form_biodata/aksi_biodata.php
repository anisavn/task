<?php
	include 'koneksi.php';

	if($_GET['proses']=='entri') {

		if (isset($_POST['tambah']))
		{
			$simpan=mysqli_query($koneksi, "INSERT INTO users (full_name, place_of_birth_id, date_of_birth,   phone_number, address, last_education, religion) VALUES ('$_POST[full_name]','$_POST[place_of_birth_id]','$_POST[date_of_birth]','$_POST[phone_number]','$_POST[address]','$_POST[last_education]','$_POST[religion]')");

			if($simpan) {
				header('location:index.php?p=biodata');
			}
			else {
				echo "Gagal";
			}
		}
	}


	if($_GET['proses']=='ubah') {
		
		if (isset($_POST['update']))
		{
			$ubah=mysqli_query($koneksi, "UPDATE users SET 
						full_name='$_POST[full_name]',
						date_of_birth='$_POST[date_of_birth]',
						phone_number='$_POST[phone_number]',
						address='$_POST[address]', 
						last_education='$_POST[last_education]', 
						religion='$_POST[religion]'
						WHERE id='$_GET[id_ubah]'");

			if($ubah){
				header("location:index.php?p=biodata");
			}
			else{
				echo "Gagal";
			}
		}
	}
?>