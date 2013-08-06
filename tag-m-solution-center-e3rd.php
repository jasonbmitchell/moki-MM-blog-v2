<?php get_header('body-white-mobility'); ?>
<script src="<?php bloginfo('template_url'); ?>/js/buttons-e3rd.js"></script>
<div id="wp-content-wrapper-lg">
<div class="padding-top-zero sc-header-bkgd">
<div class="content">
<div class="row padding-top-three padding-bottom-one bkgd-blue rounded-bottom">
			<a href="<?php echo home_url('/'); ?>solution-center/" title="MokiMobility Solution Center"><h2 class="type-white padding-left-one">Solution Center</h2></a>
</div>
<div class="row border-below">
<div class="sc-header-left">
<h2 class="solution-center type-white type-semibold ">Featured Tablet Solutions</h2>
</div>
<div class="sc-header-right">
<div id="sc-header-tooltip" class="type-semibold"><span id="sc-header-tooltip-span">Revel Systems</span></div>
<div id="sc-header-downArrow" class="sc-header-downArrow-p1">&nbsp;</div>
<ul id="sc-header">
<li id="btn-revel">&nbsp;</li>
<li id="btn-mokitouch">&nbsp;</li>
<li id="btn-noshlist">&nbsp;</li>
<li id="btn-archelon">&nbsp;</li>
<li id="btn-square">&nbsp;</li>
</ul>
</div>
</div>
<div class="row">
<div class="sc-header-left">
<h1 class="solution-center type-white type-semibold ">The best single-purpose apps for any business</h1>
</div>
<div class="sc-header-right-slides">
<div id="slide0" class="sc-header-slide hidden">
	<p><a href="<?php echo home_url('/'); ?>solution-center/featured/revel-systems/" title=""><img src="<?php bloginfo('template_url'); ?>/images/appicon_featured_Revel.png"/></a></p>
	<p class="type-white border-below-app"><strong><a href="<?php echo home_url('/'); ?>solution-center/featured/revel-systems/" title="">Revel Systems</a></strong><br />Revel Systems’ POS System provides a complete front to back of house solution for restaurant and retail establishments. </p>
	<p class="type-white right">Restaurant</p>
</div>
<div id="slide1" class="sc-header-slide hidden">
	<p><a href="<?php echo home_url('/'); ?>solution-center/featured/moki-touch/" title=""><img src="<?php bloginfo('template_url'); ?>/images/appicon_featured_Moki.png"/></a></p>
	<p class="type-white border-below-app"><strong><a href="<?php echo home_url('/'); ?>solution-center/featured/moki-touch/" title="">MokiTouch</a></strong><br />Safe, secure and engaging iPad and Android kiosk app to display web, video and images</p>
	<p class="type-white right">Retail</p>
</div>
<div id="slide2" class="sc-header-slide hidden">
	<p><a href="<?php echo home_url('/'); ?>solution-center/featured/nosh-list/" title=""><img src="<?php bloginfo('template_url'); ?>/images/appicon_featured_NoshList.png"/></a></p>
	<p class="type-white border-below-app"><strong><a href="<?php echo home_url('/'); ?>solution-center/featured/nosh-list/" title="">Noshlist</a></strong><br />The simplest and most effective restaurant waitlist ever! Manage waitlist, increase seating efficiencies and elevate the guest experience.</p>
	<p class="type-white right">Restaurant</p>
</div>
<div id="slide3" class="sc-header-slide hidden">
	<p><a href="<?php echo home_url('/'); ?>solution-center/featured/archelon-enclosures/" title=""><img src="<?php bloginfo('template_url'); ?>/images/appicon_featured_Archelon.png"/></a></p>
	<p class="type-white border-below-app"><strong><a href="<?php echo home_url('/'); ?>solution-center/featured/archelon-enclosures/" title="">Archelon Enclosures</a></strong><br /><strong>The <em>Archelon</em></strong> is a secure enclosure providing the perfect solution to protect your iPad®.</p>
	<p class="type-white right">Enclosure</p>
</div>
<div id="slide4" class="sc-header-slide hidden">
	<p><a href="<?php echo home_url('/'); ?>solution-center/featured/square-register/" title=""><img src="<?php bloginfo('template_url'); ?>/images/appicon_featured_Square.png"/></a></p>
	<p class="type-white border-below-app"><strong><a href="<?php echo home_url('/'); ?>solution-center/featured/square-register/" title="">Square</a></strong><br />Accept credit cards and run your business anywhere with Square Register on your iPhone, iPad, or iPod Touch.</p>
	<p class="type-white right">Retail</p>
</div>
</div>
</div>
</div>
</div>

<div class="panel-gray-up-sc padding-top-zero">
<div class="content">
<div class="row padding-top-three padding-bottom-one bkgd-white rounded-bottom">
			<h3 class="padding-left-one">App Solutions</h3>
</div>
<div class="column4">
<ul id="app-categories">
<li class="cat-item"><a href="<?php echo home_url('/'); ?>solution-center/">All</a></li>
<?php 
$category = get_the_category(); 
if($category[0]){
$selected_ID = $category[0]->cat_ID;
$parent_ID = $category[0]->category_parent;
//echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_ID.'</a>';
}


/*
if( is_category() ) {
  $q_cat = get_query_var('cat');
  $cat = get_category( $q_cat );
  //echo $cat->category_parent; // Print the ID
}
*/


wp_list_categories('orderby=name&child_of='. $parent_ID . '&title_li=');?>
</ul>
<p>Viewing only <strong><?php single_tag_title(); ?></strong> solutions.</p>
<ul id="apps">
<?php



//http://localhost:8888/mokitouch/solution-center/featured/


//echo get_the_category();
$selected_tag = single_tag_title("", false);
//$query = new WP_Query( 'tag=cooking' );

$displayposts = new WP_Query('tag=' . $selected_tag);
  //get posts from your news category
  
  
  
  //$displayposts->query();
while ($displayposts->have_posts()) : $displayposts->the_post();
?>

<li class="app">
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
<div class="app-RO"><?php the_excerpt(); ?></div>
<div class="appName"><?php the_title(); ?></div>
<?php
if ( has_post_thumbnail() ) {
	the_post_thumbnail(array(108,108));
} 
?>
</a>
</li>

<?php //edit_post_link('edit', '', ''); ?>

<?php 
endwhile; 
wp_reset_postdata();
?>
</ul>


</div>
</div>
</div>
</div>

<?php 
$query = new WP_Query( 'pagename=solution-center' );
while ($query->have_posts() ) : $query->the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; // end of the loop. ?>
</div><!-- Row - end -->
<?php get_footer('body-white-mobility'); ?>