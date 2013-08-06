$("document").ready(function() {

// Footer News
function getTheNews() {

	$.ajax({
		url: 'http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=10&callback=?&q=' + encodeURIComponent('http://blog.mokimobility.com/feed'),
		dataType: 'json',
		success: function(data) {
		
			// Append posts to DOM
			if(data) {
			
				var posts = data.responseData.feed.entries;
	
	$(posts).each(function(index, post){
		var div = $('<div class="post"></div>')
		var title = $('<span class="title mokiBlue"></span>')
		var snippet = $('<p></p>')
		var link = $('<a class="mokiBlue" target="_blank">Read More</a>')
		link.clone().attr('href', post.link).html(post.title).appendTo(title);
		snippet.html(post.contentSnippet);
		link.attr('href', post.link);
		title.appendTo(div);
		snippet.appendTo(div);
		link.appendTo(div);
		div.appendTo('.posts');
	});
	feedTheNews();
	var interval = setInterval(feedTheNews, 10000);
			}
		}   
	});
}

function feedTheNews(){
    if($('.activeStory').length == 0){
        var post = $('.post')[0]
        $(post).fadeIn();
        $(post).addClass('activeStory')
    }else if($('.activeStory').next().length == 0){
        //We're at the last story, time to goto the first
        $('.activeStory').fadeOut().removeClass('activeStory');
        $($('.post')[0]).fadeIn().addClass('activeStory');
    } else {
        $('.activeStory').fadeOut().removeClass('activeStory').next().addClass('activeStory').fadeIn();       
    }
}

getTheNews();

/* Marketo Forms - START */

	$('.btn-download, .btn-download-LP').click(function() {

		$('#marketo-MM-LP').validate({
			submitHandler: function(form) {
				$('#marketo-MM-LP').attr("action", "http://pages.mokimobility.com/index.php/leadCapture/save");
				form.submit();
			},
			
			rules: {
				FirstName: "required",
				LastName: "required",	
				Email: {
					required: true,
					email: true
				},
				Phone: {
					digits: true
				}		
			}
		});
	});


	$('.btn-download-LP-bottom').click(function() {

		$('#marketo-MM-LP-bottom').validate({
			submitHandler: function(form) {
				$('#marketo-MM-LP-bottom').attr("action", "http://pages.mokimobility.com/index.php/leadCapture/save");
				form.submit();
			},
			
			rules: {
				FirstName: "required",
				LastName: "required",	
				Email: {
					required: true,
					email: true
				},
				Phone: {
					digits: true
				}		
			}
		});
	});

	$('.btn-download-LP-nophone-bottom').click(function() {

		$('#marketo-MM-LP-nophone-bottom').validate({
			submitHandler: function(form) {
				$('#marketo-MM-LP-nophone-bottom').attr("action", "http://pages.mokimobility.com/index.php/leadCapture/save");
				form.submit();
			},
			
			rules: {
				FirstName: "required",
				LastName: "required",	
				Email: {
					required: true,
					email: true
				},
				Phone: {
					digits: true
				}		
			}
		});
	});

	/* Marketo Forms - END */

	$('.btn-ebook-download').click(function () {
		window.location = "http://pages.mokimobility.com/rs/mokimobility/images/The_complete_guide_to_tablet_kiosks.pdf";
	});

});