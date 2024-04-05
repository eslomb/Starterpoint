<div class="social">
	<?php
	global $starterpoint;
	echo $starterpoint->options->getFormattedOption('instagram','<a href="%s" target="_blank"><i class="fab fa-instagram"></i></a>');
	echo $starterpoint->options->getFormattedOption('facebook','<a href="%s" target="_blank"><i class="fab fa-facebook-f"></i></a>');
	echo $starterpoint->options->getFormattedOption('twitter','<a href="%s" target="_blank"><i class="fab fa-twitter"></i></a>');
	echo $starterpoint->options->getFormattedOption('linkedin','<a href="%s" target="_blank"><i class="fab fa-linkedin"></i></a>');
	echo $starterpoint->options->getFormattedOption('youtube','<a href="%s" target="_blank"><i class="fab fa-youtube"></i></a>');
	?>
</div>