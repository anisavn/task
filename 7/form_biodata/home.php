 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
 </div>

<?php
	include 'koneksi.php';
?>

<div class="container">
    <h1 class="mt-5">Biodata</h1>

    <table class="table table-striped table-sm lead">
    <thead>
        <tr>
          <th>Nama Lengkap</th>
          <th>ID Tempat Lahir</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>No. Hp</th>
         <th>Pendidikan Terakhir</th>
          <th>Agama</th>
          <th>Hobby</th>
        </tr>
    </thead>

	    <?php
	      	$db_panggil=mysqli_query($koneksi, "SELECT users.full_name, users.place_of_birth_id, cities.name as place_of_birth, users.date_of_birth, users.phone_number, users.last_education, users.religion, hobbies.name FROM users JOIN cities ON users.place_of_birth_id=cities.id JOIN hobbies on users.id=hobbies.id");

				while ($data=mysqli_fetch_array($db_panggil)){
		?>
	
	<tr>
		<td><?php echo $data['full_name']?></td>
		<td><?php echo $data['place_of_birth_id']?></td>
		<td><?php echo $data['place_of_birth']?></td>
		<td><?php echo $data['date_of_birth']?></td>
		<td><?php echo $data['phone_number']?></td>		
		<td><?php echo $data['last_education']?></td>
		<td><?php echo $data['religion']?></td>	
		<td><?php echo $data['name']?></td>
	</tr>		
	
	<?php
		}
	?>
           
</table>

</div>
