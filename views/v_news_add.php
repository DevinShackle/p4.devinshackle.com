<?php
print_r(array_values($user_role)); 
echo "<br>";
echo $user_role[0][user_type];
?>

<div class='row'>
	<div class='span6 offset1'>
		<h2>Let's make some news<?php if($user) echo ', '.$user->first_name; ?>!</h2>
	</div>
</div>
<div class="row">
	<div class="well span10 offset1">
		<form method='POST' action='/news/p_add'>

			<label for='headline'><strong>Headline:</strong></label><br>
			<textarea name='headline' id='headline' class='news'
			placeholder='Insert a short headline for your article here (less than 255 characters)'></textarea>

			<br><br>

			<label for='exec_summary'><strong>Executive Summary:</strong></label><br>
			<textarea name='exec_summary' id='exec_summary' class='news'
			placeholder='Write a short paragraph that captures the most important points of your article'></textarea>

			<br><br>

			<label for='body'><strong>Article Body:</strong></label><br>
			<textarea name='body' id='body' class='news'
			placeholder="Write the rest of your article here. Be sure to include all the extra details that didn't make it into the Executive Summary"></textarea>


			<br><br>
			<label for='tags'><strong>Tags:</strong></label><br>
			<textarea name='tags' id='tags' class='news'
			placeholder='A comma-separated list of tags related to your article'></textarea>

			<br><br>

			<input type='submit' value='Make Some News!!'>

		</form> 
	</div>
</div><!--/row-->