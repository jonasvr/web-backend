<?php
include('style.php');
	$dir    = '../oplossingen';
$files = scandir($dir);

?>

<html>
<head>
	<title></title>
</head>
<body>
	<?php //foreach($files as $key => $file): ?>
<pre><?=var_dump($files);?></pre>
</body>
</html>