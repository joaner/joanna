<?php
namespace app\view\metro;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo $this->title; ?></title>
<!-- <link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
-->
<?php
if( is_array($this->resource) ):
foreach($this->resource as &$resource){
		switch($resource['mimetype']){
			case 'application/x-javascript':
				$meta = "<script type=\"text/javascript\" src=\"static/metro/{$resource['src']}\"></script>";
				break;
			case 'text/css':
				$meta = "<link rel=\"stylesheet\" type=\"text/css\" href=\"static/metro/{$resource['src']}\" />";
				break;
			default:
				continue;
		}
		echo $meta, PHP_EOL;
	}
endif; ?>
</head>
<body>
<div id="page">
<div id="header" class="font-header">
<header>
<div id="logoinfo">
	<!--
	<img id="logo" src="http://www.foreignercn.com/info/statics/images/info/foreigner_logo.png" />
	-->
	<div class="border"></div>
</div>
<div id="headerinfo">
<div id="userinfo">
	<span>
	Hi, joaner!
	</span>
</div>
<?php 
if( is_array($this->header['menu']) ):
?>
<div id="menu">
<ul>
<?php
foreach($this->header['menu'] as $name=>$category):
?>
	<li >
		<a href="<?php echo PATH; ?>/<?php echo $name;?>/" ><?php echo $category; ?></a>
	</li>
<?php
endforeach;
?>
</ul>
</div>
<?php
endif;
?>
</div>
</header>
</div>

<div id="article">

<div id="left">
<div class="leftSide">
</div>
<div class="leftSide">
</div>
<div style="clear:both;"></div>
</div>

<div id="content">

</div>
<div style="clear:both;"></div>
</div>

<div id="footer">

</div>

</div>
</body>
</html>
