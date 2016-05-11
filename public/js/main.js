jQuery(window).load(function() {
        // will first fade out the loading animation
    jQuery("#status").fadeOut();
        // will fade out the whole DIV that covers the website.
    jQuery("#preloader").delay(1000).fadeOut("slow");
})


$(function(){

	$(".reply_form").hide();
	$("#child-comments ul").hide();

	$(".reply_btn").on('click',function(){
		console.log($(this).parent().siblings(".reply_form"))
		$(this).siblings(".reply_form").toggle("slow")
	});
	$(".comment_show_btn").on('click',function(){
		console.log($(this).siblings('ul.media-list'))
		$(this).siblings('ul.media-list').toggle("slow")
	})
});
