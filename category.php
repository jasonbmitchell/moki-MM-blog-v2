<?php
	$site = get_bloginfo('name');
	//$post = $wp_query->post;
	
	$category = get_the_category(); 
	$id = $category[0]->category_parent;
	$selected = get_the_category_by_ID($id);
	
	if ($site == 'MokiTouch') {
		include(TEMPLATEPATH . '/category-t-news-e3rd.php');
	} else {
	switch ($selected)
	{
		case 'Solution Center':
		  include(TEMPLATEPATH . '/category-m-solution-center-e3rd.php');
		  break;
		case 'News':
		  include(TEMPLATEPATH . '/category-m-news-e3rd.php');
		  break;
		default:
		  // do nothing
	}	
	}
?>