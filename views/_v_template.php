<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	

	<!-- Common CSS/JS -->
	<link rel="stylesheet" href="/css/app.css" type="text/css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<!-- Bootstrap CSS/JS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	<div class="navbar">
		<div class="navbar-inner">
			<span class="brand"><?=APP_NAME?></span>
			<ul class="nav">
				<li><a href="/">Home</a></li>

			<?php if($user): ?>
				<li><a href='/users/profile'>Profile</a></li>
				<li><a href='/news/index'>Latest News</a></li>
				<li><a href='/news/add'><b>Make News!</b></a></li>

			<?php else: ?>

				<li><a href='/users/signup'>Sign Up</a></li>

			<?php endif; ?>

			</ul>

			<!-- we use a second list element here so that the logout button 
				 stands away from other buttons and will be less likely
				 to be pressed accidentally -->
			<ul class="nav loginOut">
			<?php if($user): ?>
				<li><a href='/users/logout'>Logout</a></li>
			<?php else: ?>
				<li><a href='/users/login'>Login</a></li>

			<?php endif; ?>
			</ul>
		</div>
	</div>

	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>