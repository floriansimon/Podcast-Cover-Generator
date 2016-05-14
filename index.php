<!DOCTYPE html>
	<html>
	<head>
		<title>Cover-Generator</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>Cover-Generator</h1>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<label for="file">Bild:</label>
			<input type="file" name="file" id="file">
			
			<label for="title">Titel:</label>
			<input type="text" name="title" placeholder="Titel">

			<label for="subtitle">Untertitel:</label>
			<input type="text" name="subtitle" placeholder="Untertitel">

			<input type="submit" name="submit" value="generieren">
		</form>
	</body>
</html>
