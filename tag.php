<?php
	// get site title
	$site = get_bloginfo('name');
	
	// get current category
	$category = get_the_category(); 
	$id = $category[0]->category_parent;
	$selected = get_the_category_by_ID($id);
	
	if ($site == 'MokiTouch') {
		//echo "MokiTouch - Tag - News";
		include(TEMPLATEPATH . '/tag-t-news-e3rd.php');
	} else {
		switch ($selected)
		{
			case 'Solution Center':
				//echo "MokiMobility - Tag - Solution Center";
				//echo $site;
			  include(TEMPLATEPATH . '/tag-m-solution-center-e3rd.php');
			  break;
			case 'News':
				//echo "MokiMobility - Tag - News";
			  include(TEMPLATEPATH . '/tag-m-news-e3rd.php');
			  break;
			default:
			  // do nothing
		}
	}
?>