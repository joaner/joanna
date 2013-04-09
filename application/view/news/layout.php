<?php
use \system\library\htmlResource;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" Content="en">
<title><?php echo $this->title(); ?></title>
<meta name="robots" content="index, follow" />
<meta name="googlebot" content="index, follow" />
<?php if( isset($keywords) ): ?>
<meta name="keywords" content="<?php echo is_array($keywords) ? join(',', $keywords) : $keywords;?>" />
<?php endif; ?>
<?php if( isset($description) ): ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php endif; ?>

<?php echo htmlResource::create('system.css'); ?>
<?php echo htmlResource::create('system.js'); ?>
<?php echo htmlResource::create('Maven-Pro.woff'); ?>
<?php echo htmlResource::create('Julius-Sans-One.woff'); ?>
</head>
<body>
<div id="container">
<!-- page -->
<div id="page" class="row">

<!--  head -->
<div id="header" class="row">
	<header>
		<div id="header-top">
			<div id="logo">
				<h2 title="<?php if(isset($catname)) echo $catname, ' - ';?> http://foreignerCN.org">
					ForeignerCN.org<?php if(isset($catname)) echo ' - ', $catname; ?>
				</h2>
			</div>
			<div class="clear"></div>
		</div>
		<div id="header-nav" class="row">
			<ul class="color-line">
				<li style="background-color:rgb(185, 241, 99);"></li>
				<li style="background-color:rgb(216, 120, 159);"></li>
				<li style="background-color:rgb(93, 167, 209);"></li>
				<li style="background-color:rgb(243, 153, 55);"></li>
				<li style="background-color:rgb(185, 185, 184);"></li>
			</ul>
			<nav>
				<ul>
					<li><a href="#" >Home</a></li>
					<li><a href="#news" >China News</a></li>
					<li><a href="#business" >Business News</a></li>
					<li><a href="#sports" >Sports News</a></li>
					<li><a href="#arts" >Arts & Entertainment</a></li>
					<li><a href="#tours" >China Tour Packages</a></li>
					<li><a href="#law" >Chinese Law</a></li>
					<li><a href="#forum" >China Forum</a></li>
					<div class="clear"></div>
				</ul>
			</nav>
		</div>
	</header>
</div>
<!--  article -->
<div class="row">
	<div id="ads_top" data-size="970*100" >
	</div>
	<div class="row">
		<div id="article">
			<?php echo $content; ?>
		</div>
		<div id="sidebar">
			
		</div>
	</div>
</div>

<!--  footer -->
<div id="footer" class="row">
	<div id="footer-note">
		<ul>
			<li>
				<a href="/">Welcome to ForeignerCN.org</a>
			</li>
			<li>
				<a href="javascript:contact();">Advertise With Us</a>
			</li>
			<li>
				<a href="javascript:contact();">Contact Us</a>
			</li>
			<li>
				<a href="#link">Partner Links</a>
			</li>
		</ul>
	</div>
</div>

</div>
<!-- page -->
</div>
</body>
</html>
