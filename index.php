<?php
	$titleSizes = [
					'huge'=>180,
					'LARGE'=>150,
					'Large'=>130,
					'large'=>110,
				];
	$subtitleSizes = [
					'huge'=>120,
					'LARGE'=>100,
					'Large'=>90,
					'large'=>80,
				];			
?>

<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cover Generator</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>Cover Generator</h1>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<fieldset id="main">
				<label for="file">Image</label>
				<input type="file" name="file" id="file" required accept="image/*">

				<label for="title">Title</label>
				<input type="text" name="title" placeholder="Title" required>

				<label for="subtitle">Subtitle</label>
				<input type="text" name="subtitle" placeholder="Subtitle" required>
				
				<button type="submit" name="submit" value="generate Cover">generate Cover</button>
			</fieldset>



			


			<fieldset id="additional">
				<legend>Additional</legend>
				<label for="titleSize">Title</label>
				<select name="titleSize">
				<?php
					var_dump($titleSizes);
					foreach($titleSizes as $label=>$size) {
						var_dump($size);
						$selected = '';
						if($label === 'LARGE'){
							$selected = 'selected';
						}
						echo ('<option value="'.$size.'" label="'.$label.'"'.$selected.'>'.$size.'</option>');
					}
				?>
				</select>

				<label for="subtitleSize">Subtitle</label>
				<select name="subtitleSize">
				<?php
					var_dump($subtitleSizes);
					foreach($subtitleSizes as $label=>$size) {
						var_dump($size);
						$selected = '';
						if($label === 'LARGE'){
							$selected = 'selected';
						}
						echo ('<option value="'.$size.'" label="'.$label.'"'.$selected.'>'.$size.'</option>');
					}
				?>
				</select>
			</fieldset>
			</div>
		</form>
	</body>
</html>
