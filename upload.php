<?php
if (isset($_FILES['file'])) {
    $imageFile = $_FILES['file']['tmp_name'];

    var_dump($imageFile);
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $imageID = uniqid(date('Y-m-d-H-i-s'),false);
    $imageName = $imageID . '.' . $extension;

    var_dump($imageName);

    list($width, $height) = getimagesize($imageFile);

    var_dump($width);
    var_dump($height);


function testInputData($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}


    if ($width == null && $height == null) {
        header("Location: index.php");
        return;
    }

    if(isset($_POST['title'])){
        $title = testInputData($_POST['title']);
    }
    var_dump($title);

    if(isset($_POST['subtitle'])){
        $subtitle = testInputData($_POST['subtitle']);
    }

    var_dump($subtitle);

    $image = new Imagick($imageFile);
    $image->cropThumbnailImage(1600,1600);

    $drawBox = new ImagickDraw();

    $drawBox->setFillColor('#2F4F4F');
    $drawBox->setFillOpacity(0.85);
    $drawBox->rectangle(0, 1000, 1600, 1400);

    $drawTitle = new ImagickDraw();
    $drawTitle->setGravity(7);
    $drawTitle->setFillColor('#FFFFFF');
    $drawTitle->setFillOpacity(1);
    $drawTitle->setFont('fonts/BoldFont.ttf');
    $drawTitle->setFontSize(150);
    $drawTitle->setTextKerning(-6);
    $drawTitle->setTextEncoding('UTF-8');
    $drawTitle->setTextAntialias(true);
    $drawTitle->annotation(100,370,$title);

    $drawSubtitle = new ImagickDraw();
    $drawSubtitle->setGravity(7);
    $drawSubtitle->setFillColor('#FFFFFF');
    $drawSubtitle->setFillOpacity(1);
    $drawSubtitle->setFont('fonts/ThinFont.ttf');
    $drawSubtitle->setFontSize(100);
    $drawSubtitle->setTextKerning(-3);
    $drawSubtitle->setTextEncoding('UTF-8');
    $drawSubtitle->setTextAntialias(true);
    $drawSubtitle->annotation(100,250,$subtitle);


    $image->drawImage($drawBox);
    $image->drawImage($drawTitle);
    $image->drawImage($drawSubtitle);

    var_dump($image->getFormat());
    var_dump($image->getImageFormat());

    $image->setImageCompressionQuality(90); 
    $image->writeImage('upload/'.$imageName);


    if($image->getImageFormat()!='JPEG'){
        echo('BINGO');
        $wrongImageFormatFile = new Imagick('upload/'.$imageName);
        $wrongImageFormatFile->setImageFormat('jpeg');
        $oldImageName = $imageName;
        $imageName = $imageID . '.jpg';
        $wrongImageFormatFile->writeImage('upload/'.$imageName);
        unlink('upload/'.$oldImageName);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cover</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Cover</h1>
        <img src="upload/<?php echo $imageName; ?>" id="photo">
    </body>
</html>
