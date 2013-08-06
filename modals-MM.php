<?php
/*
Template Name: Mobility: Modals
*/
?>

<div id="lightbox"></div>
<!-- Get Started Form -->
<div id="get-started-form-MM">
<div class="modal-header">
	<h3 class="text-shadow-no">Get Started</h3>
	<div id="btn-close-form-MM">&nbsp;</div>
</div>
<div class="modal-content">
	<?php 
		echo do_shortcode('[MM_marketo_form label="Submit" instance="btn-getting-started" campaign="1003" download="/thank-you/"]'); 
	?>
</div>
</div>