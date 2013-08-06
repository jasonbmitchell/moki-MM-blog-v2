<?php
	$site = get_bloginfo('name');
	//$post = $wp_query->post;
	if ($site == 'MokiTouch') {
		include(TEMPLATEPATH . '/single-t.php');
	} else {
		// Post is assigned to "solutions center" category or any descendant of "solutions center" category?
		
		$category = get_the_category(); 
		$id = $category[0]->category_parent;
		$selected = get_the_category_by_ID($id); 
		//echo $id . ", " . $category[0]->category_parent . ", " . $selected;
		
		/*
if($category[0]){
			$selected_ID = $category[0]->cat_ID;
			$parent_ID = $category[0]->category_parent;
			//echo $parent_ID;
		}
*/
		
		/*
if ( in_category( 'solution-center' ) || post_is_in_descendant_category($parent_ID) ) {
			//echo 'Solution Center: ' . $parent_ID;
			include(TEMPLATEPATH . '/single-m-sc.php');
		} else {
			echo 'News: ' . $parent_ID;
			include(TEMPLATEPATH . '/single-m.php');
		}
*/
		
	switch ($selected)
	{
		case 'Solution Center':
		  include(TEMPLATEPATH . '/single-m-sc.php');
		  break;
		case 'News':
		  include(TEMPLATEPATH . '/single-m.php');
		  break;
		default:
		  // do nothing
	}
		
		
	}
?>