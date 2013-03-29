<?php
namespace application\view\events;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $this->title; ?></title>
<?php 
if( is_array($this->resource)){
	foreach($this->resource as &$resource){
		switch($resource['mimetype']){
			case 'application/x-javascript':
				$meta = "<script type=\"text/javascript\" src=\"{$resource['src']}\"></script>";
				break;
			case 'text/css':
				$meta = "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$resource['src']}\" />";
				break;
			default:
				continue;
		}
		echo $meta, PHP_EOL;
	}
}?>
</head>
<body>
<header>
<?php echo $this->header; ?>

</header>
<article>
<?php echo $this->article; ?>

</article>
<footer>
<?php echo $this->footer; ?>

</footer>
</body>
</html>
