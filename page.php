<?php //remove_filter ('the_content', 'wpautop'); ?>
<?php //get_header('MM'); ?>
<div class="centered">
	<div class="row">
		<div class="column8">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		</div>
		<div class="column8">
			<p>Right</p>
		</div>
	</div>
</div>
<?php get_footer('MM'); ?>