<div class='row'> 
	<div class='span10 offset1'>
		<?php

		#print_r(array_values($news));
		#print_r(array_values($news[0]));

/*
		foreach($news as $key => $value) {
			echo $value[headline];
			echo "<br>";
		}
		*/
		foreach($news as $key => $value) {
			echo '<div class="article">
				<div class="headline">'.$value[headline].'</div>
				<div class="exec_summary">'.$value[exec_summary].'</div>
				<div class="body">'.$value[body].'</div>
			</div>';
		}
		
		?>
	</div>
</div><!-- /row -->

<script type="text/javascript">
	var user_type = <?php echo "'".$user_role[0][user_type]."'"; ?>;
	var headlines = $('div.headline');
	var exec_summaries = $('div.exec_summary');
	var bodies = $('div.body');
	
	if(user_type == "Reader") {

		//Readers don't get the Executive Summary
		$("div.exec_summary").css('display','none');

		//Format Headlines
		headlines.each(function() {
			var h3 = $('<h3></h3>').
			append($(this).contents());
			$(this).replaceWith(h3);
		});
		
	}

	//Executives don't get the body/details -- they are too busy!!
	if(user_type == "Executive") {
		$("div.body").css('display','none');

		//Format Headlines
		headlines.each(function() {
			var h2 = $('<h2></h2>').
			append($(this).contents());
			$(this).replaceWith(h2);
		});

		//Add executive-ish styling
		$("body").css('background-color','#dddddd').css(
			'color','#14145C');


	}

	if(user_type == "Worker") {

		//Format Headlines
		headlines.each(function() {
			var h4 = $('<h4></h4>').
			append($(this).contents());
			$(this).replaceWith(h4);
		});

		//Zany colors because those tech guys can be a little nerdy :)
		exec_summaries.each(function() {
			$(this).css('background-color','#BAFFC4');
		});

	}

</script>