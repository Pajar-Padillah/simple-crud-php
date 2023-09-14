<?php include("server.php"); ?>
<?php $produk = mysqli_query($db, "SELECT * FROM produk"); ?>
<?php
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$record = mysqli_query($db, "SELECT * FROM produk WHERE id_produk=$id");

	if (count(array($record)) == 1) {
		$n = mysqli_fetch_array($record);
		$nama_produk = $n['nama_produk'];
		$keterangan = $n['keterangan'];
		$harga = $n['harga'];
		$jumlah = $n['jumlah'];
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Simple CRUD - Pajar Padillah</title>
	<style>
		.form {
			margin-bottom: 20px;
		}

		table,
		th,
		td {
			border: solid 1px #000;
			text-align: left;
		}
	</style>
</head>

<body>

	<h1>Data Produk</h1>
	<h2>Tess</h2>

	<?php if (isset($_SESSION['alert'])) : ?>
		<h3>
			<?php
			echo $_SESSION['alert'];
			unset($_SESSION['alert']);
			?>
		</h3>
	<?php endif ?>

	<form action="server.php" method="POST" class="form">
		<input type="hidden" name="id_produk" value="<?php echo $id; ?>">
		<label for="nama_produk">Nama Produk</label>
		<input type="text" required name="nama_produk" placeholder="Nama Produk" value="<?php echo $nama_produk; ?>">
		<label for="keterangan">Keterangan</label>
		<input type="text" required name="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>">
		<label for="harga">Harga</label>
		<input type="number" required name="harga" placeholder="Harga" value="<?php echo $harga; ?>">
		<label for="jumlah">Jumlah</label>
		<input type="number" required name="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>">
		<?php if ($update == true) : ?>
			<input type="submit" name="update" value="Update">
		<?php else : ?>
			<input type="submit" name="save" value="Save">
		<?php endif ?>
	</form>

	<table>
		<thead>
			<th>Nama Produk</th>
			<th>Keterangan</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th colspan="2">Aksi</th>
		</thead>
		<?php while ($row = mysqli_fetch_array($produk)) { ?>
			<tr>
				<td><?php echo $row['nama_produk']; ?></td>
				<td><?php echo $row['keterangan']; ?></td>
				<td><?php echo $row['harga']; ?></td>
				<td><?php echo $row['jumlah']; ?></td>
				<td><a href="index.php?edit=<?php echo $row['id_produk'] ?>">Edit</a></td>
				<td><a onclick="return confirm('You sure want to delete?')" href="server.php?del=<?php echo $row['id_produk'] ?>">Delete</a></td>
			</tr>
		<?php } ?>
	</table>

</body>

</html>