<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	

	<!-- Common CSS/JSS -->
	<link rel="stylesheet" href="/css/app.css" type="text/css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<!-- Bootstrap CSS/JS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="/css/bootstrap-theme.min.css" type="text/css">
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	<nav class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<span class="navbar-brand"><?=APP_NAME?></span>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			<ul class="nav navbar-nav">
				<li><a href="/">Home</a></li>

			<?php if($user): ?>
				<li><a href='/users/profile'>Profile</a></li>
				<li><a href='/posts/users'>Users</a></li>
				<li><a href='/posts/index'>My Stream</a></li>
				<li><a href='/posts/add'><b>Post</b></a></li>

			<?php else: ?>

				<li><a href='/users/signup'>Sign Up</a></li>

			<?php endif; ?>

			</ul>
			
			<ul class="nav navbar-nav navbar-right">
			<?php if($user): ?>
				<li><a href='/users/logout'>Logout</a></li>
			<?php else: ?>
				<li><a href='/users/login'>Login</a></li>

			<?php endif; ?>
			</ul>
		</div>
	</nav>

	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>