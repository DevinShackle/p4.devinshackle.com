<div class="row">
	<div class="well span4 offset1">
		<form id="commentForm" method="POST" action="/users/p_signup">
			<fieldset>
				<p>
					<label for="cfname">First Name</label>
					<input id="cfname" name="first_name" type="text" required/>
				</p>
				<p>
					<label for="clname">Last Name</label>
					<input id="clname" name="last_name" type="text" required/>
				</p>
				<p>
					<label for="cemail">E-Mail</label>
					<input id="cemail" type="email" name="email" required/>
				</p>
				<p>
					<label for="cpwd">Password</label>
					<input id="cpwd" type="password" name="password" required/>
				</p>
				<select name="user_type">
					<option>Select a Role</option>
					<option>Reader</option>
					<option>Executive</option>
					<option>Worker</option>
				</select>
				<p>
					<input class="submit" type="submit" value="Sign up"/>
				</p>
			</fieldset>
		</form>
	</div> 
</div>