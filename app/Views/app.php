<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>File Manager</title>
</head>
<body>
	<h3>File Manager</h3>
	<form action="<?= base_url('/') ?>" method="post">
		<input type="file" name="file" id="file" />
		<button type="submit">
			Simpan
		</button>
	</form>
</body>
</html>