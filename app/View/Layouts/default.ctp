<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		<?php echo __('HolidayMaker　〜あなたの休日を本物に！〜'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<style>
	body {
		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	}
	</style>

	<?php echo $this->Html->css('bootstrap-responsive.min'); ?>
	<?php echo $this->Html->script('jquery.min'); ?>
	<?php echo $this->Html->script('jquery-1.10.2.min'); ?>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<!--
	<link rel="shortcut icon" href="/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
	-->
	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>
</head>

<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo $this->webroot ?>"><?php echo __('HolidayMaker'); ?></a>
				<div class="nav-collapse">
					<ul class="nav">
					<li<?php echo $this->name === 'Posts' ? ' class="active"' : '' ?>><a href="<?php echo $this->Html->url(array('controller' => 'Posts', 'action' => 'plan')) ?>"><i class="icon-pencil icon-black"></i>&nbsp;<?php echo __('プラン投稿') ?></a></li>
					<li<?php echo $this->name === 'generate' ? ' class="active"' : '' ?>><a href="<?php echo $this->Html->url(array('controller' => 'generate', 'action' => 'index')) ?>"><i class="icon-random icon-black"></i>&nbsp;<?php echo __('勝手にプラン作成') ?></a></li>
					<li><?php if($this->Session->read('login')) { ?>
						<li<?php echo $this->name === 'Logins' ? ' class="active"' : '' ?>><a href="#"><i class="icon-user icon-black"></i>&nbsp;<?php echo $this->Session->read('user_name') ?>さん</a></li>
						 <?php } else {?>
						<li<?php echo $this->name === 'Logins' ? ' class="active"' : '' ?>><a href="/login?co=<?php echo $this->name ?>$$ac=<?php echo $this->action ?>"><i class="icon-home icon-black"></i>&nbsp;<?php echo __('ログイン') ?></a></li>
						<?php }?>
					</li>
					<!--<li><?php if($this->Session->read('login')) { ?>
                    <li><a href="#"><?php echo $this->Session->read('user_name') ?>さん</a></li>
                    <?php } else {?>
                    <li><a href="/login?co=<?php echo $this->name ?>$$ac=<?php echo $this->action ?>">Login</a></li>
                    <?php }?>
					</li>-->
					</ul>

					<form action = "<?php echo $this->webroot ?>searchs" class="navbar-form pull-right" method="post">
						<input type="text" name="sword" value="キーワードで検索" onfocus="if (this.value == 'キーワードで検索') { this.value='' }" onblur="if (this.value == '') { this.value='キーワードで検索' }" />
            			<button type="submit" class="btn btn-primary">Search</button>
        			</form>
				</div>
			</div>
		</div>
	</div>

	<div class="container">

		<!--<h1>Bootstrap starter template</h1>-->

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>

	</div> <!-- /container -->

    <div id="footer">
      <div class="container">
    			<center>
				<br>
      			<br>Copyright © <a href="http://niftyjinji.cocolog-nifty.com/blog/2013/06/2013-9ae1.html" target="_blank"> NIFTY SUMMER INTERNSHIP 2013</a> TEAM KABOOM All Rights Reserved.<br></center>
				<center>Powered by<a href="http://c4sa.nifty.com/" target="_blank"> NIFTY Cloud C4SA</a></center>
	  </div>
    </div>

	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<?php echo $this->Html->script('bootstrap.min'); ?>
	<?php echo $this->Html->script('jquery.raty.min'); ?>
	<?php echo $this->fetch('script'); ?>

</body>
</html>