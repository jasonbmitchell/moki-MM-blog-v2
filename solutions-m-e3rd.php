<?php
/*
Template Name: Mobility: Solution Center page by Everythird
*/
?>

<?php get_header('body-white-mobility'); ?>
<script src="<?php bloginfo('template_url'); ?>/js/buttons-e3rd.js"></script>
<div id="wp-content-wrapper-lg">
<div class="padding-top-zero panel-gray-down">
<div class="content">
<div class="row padding-top-three padding-bottom-one bkgd-blue rounded-bottom">
			<h2 class="type-white padding-left-one">Solution Center</h2>
</div>
</div>
</div>

<div class="panel-gray-up-sc padding-top-zero">
<div class="content">
<div class="row padding-top-three padding-bottom-one bkgd-white rounded-bottom">
			<h3 class="padding-left-one">App Solutions</h3>
</div>
<div class="row">
<div class="column4">
<ul id="app-categories">
<li class="cat-item current-cat"><a href="<?php echo home_url('/'); ?>solution-center/">All</a></li>
<?php 

$category = get_the_category(); 
if($category[0]){
$selected_ID = $category[0]->cat_ID;
$parent_ID = $category[0]->category_parent;
//echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_ID.'</a>';
}


wp_list_categories('orderby=name&child_of='. $selected_ID .'&title_li=');
?>
</ul>
<ul id="apps">
<?php
$displayposts = new WP_Query();
  //get posts from your news category
  $displayposts->query('cat=7');
while ($displayposts->have_posts()) : $displayposts->the_post();
?>

<li class="app">
<div class="app-RO"><?php the_excerpt(); ?></div>
<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

<?php
if ( has_post_thumbnail() ) {
	the_post_thumbnail('full');
} 
?>
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
	<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; // end of the loop. ?>

	</div><!-- Row - end -->
<?php get_footer('body-white-mobility'); ?>