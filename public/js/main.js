$(function(){
	/*
	$("#send_post").on('click',function(){
		var form_data = $("#main_post").val();
		//console.log(form_data);
		$.ajax({
				type: 'POST',
				url: '/add',
				data: {'data':form_data, '_token': $("meta[name='csrf-token']").attr('content')},
				success: function(result){
					$("#main_post").val('');
					console.log(result);
				}
		});
	});
	*/
	$(".reply_form").hide();

	$(".reply_btn").on('click',function(){
		console.log($(this).parent().siblings(".reply_form"))
		$(this).siblings(".reply_form").toggle()
	});
});