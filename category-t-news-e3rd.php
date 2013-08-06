<?php get_header('MT'); ?>
<script src="<?php bloginfo('template_url'); ?>/js/buttons-e3rd.js"></script>
<div id="wp-content-wrapper-lg">
	<div class="bkgd-blueDark">
		<div class="content">
			<h1>News</h1>
		</div>
	</div>

	<div class="panel-white">
		<div class="content">
			<div class="row">
				<div class="column3">
					<h2>Press Releases</h2>
					
					<?php
						$the_query = new WP_Query();
						$the_query->query('category_name=press-releases, mokitouch');
					?>					
					
					<?php while ($the_query->have_posts() ) : $the_query->the_post(); ?>
						<h2 class="margin-top-two"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?> 
						<?php /* the_content(); */ ?> 
						
					<?php endwhile; // end of the loop. ?>
				</div>
				<div class="column1">
					<h2>MokiMobility Blog</h2>
					<?php // Get RSS Feed(s)
					include_once(ABSPATH . WPINC . '/feed.php');
					
					// Get a SimplePie feed object from the specified feed source.
					$rss = fetch_feed('http://feeds.feedburner.com/MokimobilityBlog');
					if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly 
					    // Figure out how many total items there are, but limit it to 5. 
					    $maxitems = $rss->get_item_quantity(5); 
					
					    // Build an array of all the items, starting with element 0 (first element).
					    $rss_items = $rss->get_items(0, $maxitems); 
					endif;
					?>
					
					<ul id="blog">
					    <?php if ($maxitems == 0) echo '<li>No items.</li>';
					    else
					    // Loop through each feed item and display each item as a hyperlink.
					    foreach ( $rss_items as $item ) : ?>
					    <li>
					        <a href='<?php echo esc_url( $item->get_permalink() ); ?>'
					        title='<?php echo 'Posted '.$item->get_date('j F Y | g:i a'); ?>' target="_blank">
					        <?php echo esc_html( $item->get_title() ); ?></a>
					    </li>
					    <?php endforeach; ?>
					</ul>
					<h2 class="margin-top-two margin-bottom-one">Latest Tweets</h2>
					<a class="twitter-timeline" data-dnt=true href="https://twitter.com/MokiTouch" data-widget-id="293792978235949056">Tweets by @MokiTouch</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

				</div>
			</div> <!-- Row - end -->
		</div><!-- Row - end -->
	</div><!-- Row - end -->
</div><!-- Row - end -->
<?php get_footer('MT'); ?>