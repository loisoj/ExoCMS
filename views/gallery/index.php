<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Галерея</title>
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" />
<link rel="stylesheet" type="text/css" href="css/gallery.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.pack.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</head>

<body>

<div id="container">

<div id="heading">
<h1>Тестовая галерея</h1>
</div>

<div id="gallery">

<?php

$directory = 'uploads/gallery';

$allowed_types=array('jpg','jpeg','gif','png');
$file_parts=array();
$ext='';
$title='';
$i=0;

$dir_handle = @opendir($directory) or die("There is an error with your image directory!");

while ($file = readdir($dir_handle))
{
	if($file=='.' || $file == '..') continue;

	$file_parts = explode('.',$file);
	$ext = strtolower(array_pop($file_parts));

	$title = implode('.',$file_parts);
	$title = htmlspecialchars($title);

	$nomargin='';

	if(in_array($ext,$allowed_types))
	{
		if(($i+1)%4==0) $nomargin='nomargin';

		echo '
		<div class="pic '.$nomargin.'" style="background:url('.$directory.'/'.$file.') no-repeat 50% 50%;">
		<a href="'.$directory.'/'.$file.'" title="'.$title.'" target="_blank">'.$title.'</a>
		</div>';

		$i++;
	}
}

closedir($dir_handle);

?>
<div class="clear"></div>
</div>

<div id="footer">
</div>

</div>

</body>
</html>
