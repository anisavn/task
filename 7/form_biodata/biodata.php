<?php
	include 'koneksi.php';

	$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
	switch ($aksi) {
		case 'list':
	
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Biodata</h1>
</div>

<a class="btn btn-primary" role ="button" href="index.php?p=biodata&aksi=input">Tambah Data</a>

<table id="example" class="table table-hover">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Lengkap</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>No. Hp</th>
			<th>Alamat</th>
			<th>Pendidikan Terakhir</th>
			<th>Agama</th>
			<th>Hobby</th>
			<th>Aksi</th>
		</tr>
	</thead>

	<tbody>
		<?php
			

			$db_panggil=mysqli_query($koneksi,"SELECT users.id, users.full_name, cities.name as place_of_birth, users.date_of_birth, users.phone_number, users.address, users.last_education, users.religion, hobbies.name FROM users JOIN cities ON users.place_of_birth_id=cities.id JOIN hobbies ON users.id=hobbies.id");
			$no=1;
			while ($data=mysqli_fetch_array($db_panggil))
			{

		?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $data['full_name']?></td>
		<td><?php echo $data['place_of_birth']?></td>
		<td><?php echo $data['date_of_birth']?></td>
		<td><?php echo $data['phone_number']?></td>
		<td><?php echo $data['address']?></td>
		<td><?php echo $data['last_education']?></td>
		<td><?php echo $data['religion']?></td>
		<td><?php echo $data['name']?></td>


		<td align="center">
			<a class="btn btn-primary" href="?p=biodata&aksi=edit&id_ubah=<?php echo $data['id'] ?>">Edit</a> 
		</td>
	</tr>
	<?php
		$no++;
		}
	?>
	</tbody>
</table>

<?php
	break;
	case 'input' : 
?>
<h1>Entri Biodata</h1>
	<form method="post" action="aksi_biodata.php?proses=entri">
		<label class="col-sm col-form-label">Nama Lengkap</label>
		<div class="form-group col-sm-6">
			<input type="text" class="form-control" placeholder="Nama Lengkap" name="full_name" required>
		</div>
		
		<label class="col-sm-2 col-form-label">Tempat Lahir</label>
		<div class="form-group col-sm-6">
			<select class="form-control col-sm-6" name="place_of_birth_id">
				<?php
					include 'koneksi.php';
					$input = mysqli_query($koneksi,"SELECT * FROM cities");
					$no=1;
					while($data_input = mysqli_fetch_array($input)){
						echo "<option value='$data_input[id]'>" . $data_input['name'] . "</option>";
							$no++;
						}
				?>
			</select>
		</div>

		<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
		<div class="form-group col-sm-6">
			<input type="date" class="form-control col-sm-6" placeholder="Tanggal Lahir" name="date_of_birth" required>
		</div>

		<label class="col-sm-2 col-form-label">No. Hp</label>
		<div class="form-group col-sm-6">
			<input type="text" class="form-control" placeholder="No. Hp" name="phone_number" required>
		</div>

		<label class="col-sm-2 col-form-label">Alamat</label>
		<div class="form-group col-sm-6">
			<textarea class="form-control" name="address" cols="25" rows="4"></textarea>
		</div>

		<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
		<div class="form-group col-sm-6">
			<select class="form-control col-sm-6" name="last_education">
				<option value="S1">S1</option>
				<option value="D3">D3</option>
				<option value="SMA/SMK">SMA/SMK</option>
			</select>
		</div>

		<label class="col-sm-2 col-form-label">Agama</label>
		<div class="form-group col-sm-6">
			<input type="radio" name="religion" value="Islam">Islam<br>
			<input type="radio" name="religion" value="Kristen">Kristen<br>
			<input type="radio" name="religion" value="Katolik">Katolik<br>
		</div>

		<label class="col-sm-2 col-form-label">Hobby</label>
		<div class="form-group col-sm-6">
          <div class="checkbox">
            <label><input name="hobby" type="checkbox">Renang</label>
          </div>
          <div class="checkbox">
            <label><input name="hobby" type="checkbox" value="Mancing">Mancing</label>
          </div>
          <div class="checkbox">
            <label><input name="hobby" type="checkbox" value="Game">Game</label>
          </div>
          <div class="checkbox">
            <label><input name="hobby" type="checkbox" value="Gibah">Gibah</label>
          </div>
          <div class="checkbox">
            <label><input name="hobby" type="checkbox" value="Programming">Programming</label>
          </div>      
        </div>
		
		<div class="form-group row">
			<div class="col-sm-5">
				<input class="btn btn-success" type="submit" name="tambah" value="Simpan">
				<input class="btn btn-warning" type="reset" name="reset" value="Reset">
				<a class="btn btn-danger" role="button" href="index.php?p=biodata">Kembali</a>
			</div>
		</div>
	</form>

<?php
	break;
	case 'edit' : 
		include 'koneksi.php';
			$db_panggil=mysqli_query($koneksi, "SELECT users.id, users.full_name, users.date_of_birth, users.place_of_birth_id, users.phone_number, users.address, users.last_education, users.religion  FROM users INNER JOIN cities ON users.place_of_birth_id=cities.id WHERE users.id='$_GET[id_ubah]'");
			$data=mysqli_fetch_array($db_panggil);
?>
	<h1>Update Form Biodata</h1>
	<form method="post" action="aksi_biodata.php?proses=ubah&id_ubah=<?php echo $data['id']?>">
		<table>
			
			<tr>
				<td>Nama Lengkap</td>
				<td> : </td>
				<td><input type="text" value="<?php echo $data['full_name'] ?>" name="full_name"></td>
			</tr>

			<tr>
				<td>Tempat Lahir</td>
				<td> : </td>
				<td>
					<select>
						<?php
							include 'koneksi.php';
							$input = mysqli_query($koneksi, "SELECT * FROM cities");
							$no=1;
							while($data_input = mysqli_fetch_array($input)){
								echo "<option value='$data_input[id]'>" . $data_input['name'] . "</option>";
									$no++;
								}

							
						?>
					</select>
				</td>
			</tr>

			<tr>
				<td>Tanggal Lahir</td>
				<td> : </td>
				<td><input type="date" value="<?php echo $data['date_of_birth'] ?>" name="date_of_birth"></td>
			</tr>

			<tr>
				<td>No Hp</td>
				<td> : </td>
				<td><input type="number" value="<?php echo $data['phone_number'] ?>" name="phone_number"></td>
			</tr>

			<tr>
				<td>Alamat</td>
				<td> : </td>
				<td><textarea name="address" cols="25" rows="5"><?php echo $data['address'] ?></textarea></td>
			</tr>

			<tr>
				<td>Pendidikan Terakhir</td>
				<td> : </td>
				<td>
					<?php
						if($data['last_education']=='SMA'){

						
					?>

						<input type="radio" name="last_education" value="SMA" checked>SMA
						<input type="radio" name="last_education" value="S1">S1


					<?php
						}
							else {
					?>
						<input type="radio" name="last_education" value="SMA">SMA
						<input type="radio" name="last_education" value="S1" checked>S1
					<?php
						}
					?>
				</td>
			</tr>			

			<tr>
				<td>Agama</td>
				<td> : </td>
				<td>
					<?php
						if($data['religion']=='Islam'){
			
					?>

						<input type="radio" name="religion" value="Islam" checked>Islam
						<input type="radio" name="religion" value="Kristen">Kristen
						<input type="radio" name="religion" value="Katolik">Katolik

					<?php
						}
							else {
					?>
						<input type="radio" name="religion" value="Islam">Islam
						<input type="radio" name="religion" value="Katolik">Kristen
						<input type="radio" name="religion" value="Katolik" checked>Katolik

					<?php	
						}
					?>
				</td>
			</tr>			

			<tr>
				<td></td>
				<td></td>
				<td><input class="btn btn-primary" type="submit" name="update" value="Update">
					<input class="btn btn-primary" type="reset" name="reset" value="Reset">
					<a class="btn btn-primary" href="index.php?p=biodata" role="button ">Back
				</td>
			</tr>
		</table>
	</form>
<?php
 	break;
 	}
 ?>