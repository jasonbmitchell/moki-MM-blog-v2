<?php get_header('body-white-mobility'); ?>
<script src="<?php bloginfo('template_url'); ?>/js/buttons-e3rd.js"></script>
<div id="wp-content-wrapper-lg">
	<div class="panel-white padding-top-zero ">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="content">
		<div class="row padding-top-three padding-bottom-one bkgd-blue rounded-bottom">
			<a href="<?php echo home_url('/'); ?>solution-center/" title="MokiMobility Solution Center"><h2 class="type-white padding-left-one">Solution Center</h2></a>
		</div>
		<div class="row margin-top-three margin-bottom-one">
			<h2 class="type-semiBold"><?php the_title(); ?></h2>
		</div>
		<div class="row bkgd-gray rounded">
			<div class="column1">
			<?php 
if (get_post_meta($post->ID, 'showEnclosure', true) == "true") {
?>
	<p class="padding-left-one">Enclosure Details</p>
<?php } else { ?>
			<p class="padding-left-one">App Details</p>
			<?php } ?>
			</div>
			<div class="column3">
				<?php
				$sc_url = home_url('/');
				//$tags = get_tags();
				$post_id = get_the_ID(); 
				$tags = wp_get_post_terms($post_id);
				$html = '<ul id="app-tags">';
				foreach ($tags as $tag){
					$tag_link = get_tag_link($tag->term_id);			
					$html .= "<li><a href='" . $sc_url. "solution-center/{$tag->slug}' title='{$tag->name} Tag' class='{$tag->slug}'>";
					$html .= "{$tag->name}</a></li>";
				}
				$html .= '</ul>';
				echo $html;
				?>
			</div>
		</div>
			<div class="row margin-top-two">
				<div class="column1">				
						
<?php 
if (get_post_meta($post->ID, 'showEnclosure', true) == "true") {
?>
<p><?php
if ( has_post_thumbnail() ) {
	the_post_thumbnail(array(220,220));
} 
?>
</p>
<?php 
	$enclosure_website = get_post_meta($post->ID, 'enclosure-website-url', true);
?>
<p class="margin-top-zero rule-above-below"><a href="<?php echo $enclosure_website; ?>"><?php the_title(); ?></a></p>
<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'partner-logo'); endif; ?>
<?php } else { ?>
<p><?php
if ( has_post_thumbnail() ) {
	the_post_thumbnail(array(108,108));
} 
?>
						</p>
<p>
<?php 
$website = get_post_meta($post->ID, 'app-website-url', true);
$support = get_post_meta($post->ID, 'app-support-url', true);
$appStore = get_post_meta($post->ID, 'app-ios-url', true);
$googlePlay = get_post_meta($post->ID, 'app-android-url', true);
?>
<p><a href="<?php echo $website; ?>">Website</a><br /><a href="<?php echo $support; ?>">Support</a></p>

<?php if ($appStore != null) { ?>
<p><a href="<?php echo $appStore; ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/app-store-sc.png" width="166" alt="Apple AppStore"></a></p>
<?php 
} 
if ($googlePlay != null) { 
?>
<p><a href="<?php echo $googlePlay; ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/google-play-sc.png" width="166" alt="Google Play"></a></p>
<?php } ?>
<?php } ?>
					
					
				</div>
				<div class="column3">
					<?php the_content(); ?>
				</div>
				</div>
				<div class="row margin-top-two">
				<div class="column3 span1">
					<div class="row bkgd-grayDark rounded padded margin-bottom-one">
			<h3 class="type-white text-shadow-no">MokiManage Integration</h3>
			</div>
			<p><img src="<?php echo get_bloginfo('template_directory'); ?>/images/solutioncenter_mokimanage_large.png" width="720" alt="MokiManage Integration"></p>
			<h3 class="type-blue text-shadow-no">Manage and secure ALL of your tablet solutions in a single dashboard</h3>
<p class="margin-top-zero">Only with MokiManage can you remotely secure, manage and monitor all of your iPad and Android tablets. With MokiManage you can manage wifi settings, lock the tablet in to a single app, and monitor how well the tablet is running from a single dashboard. Whether you have 2 tablets or 10,000, MokiManage is the only way to successfully secure, manage and monitor all of your tablets. <a href="<?php echo home_url('/'); ?>mokimanage/" title="MokiManage">Learn more</a></p>
<h3 class="type-blue text-shadow-no margin-top-one">Building tablet solutions like these? Integrate MokiManage</h3>
<p class="margin-top-zero">Are you building tablet solutions like these listed here? Integrate MokiManage and add more security, remote management and monitoring to your solution. With MokiManage you can deliver a more reliable and secure solution to your customers. <a href="<?php echo home_url('/'); ?>developers/" title="">Learn more</a></p>
<div class="btn-row margin-top-one margin-bottom-two">
<?php echo do_shortcode('[display_button_mobility tracker="solution-center" label="Talk to a MokiManage specialist" instance="btn-specialist" width="350" bkgd="#0089c9" type="#fff"]'); ?>
</div>
				</div>
			</div> <!-- div.row - end -->
			
		
		</div><!-- Row - end -->
		<?php endwhile; endif; ?>
	</div><!-- Row - end -->
</div><!-- Row - end -->
<?php get_footer('body-white-mobility'); ?>