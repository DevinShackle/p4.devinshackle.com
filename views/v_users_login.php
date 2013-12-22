<div class="row">
	<div class="well span4 offset 1">
		<form method='POST' action='/users/p_login'>

			Email<br>
			<input type='text' name='email'>

			<br><br>

			Password<br>
			<input type='password' name='password'>

			<br><br>

			<?php if(isset($error)): ?>
				<div class='error'>
					Login failed. Please double check your email and password.
				</div>
				<br>
			<?php endif; ?>

			<input type='submit' value='Log in'>

		</form>
	</div> <!-- /well -->
	<div class="span6 offset1">
		<h1>Welcome back!</h1>
		<h3>Log in to get the latest news from around your organization!</h3>
	</div>
</div><!-- /row -->