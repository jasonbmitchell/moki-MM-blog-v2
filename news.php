<?php
/*
Template Name: News
*/
?>

<?php get_header(); ?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style/news.css" type="text/css" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"/>
    <script src="<?php bloginfo('template_url'); ?>/js/news.js"></script>


            
    <div class="body shadow_bot">
        <div class="content">
            <h1>News</h1>
            <div class="left">
                <div id="news_posts">
                </div>

            </div>
            <div class="right">
                <h2>Latest Tweets</h2>
                <div id="tweets">
		    <a class="twitter-timeline" href="https://twitter.com/MokiTouch" data-widget-id="263748990187732993">Tweets by @MokiTouch</a>
		    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>




<?php get_footer(); ?>