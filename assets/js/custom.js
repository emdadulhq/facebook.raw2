(function($){
	$(document).ready(function(){

		// Post Modal show 
		$(document).on('click','#post_div', function(){
			$('#post_modal').modal('show');
		});



		// Image load for reg
		$(document).on('change', 'input#profile_photo', function(e){
			e.preventDefault();
			let image_url = URL.createObjectURL(e.target.files[0]);
			$('img#profile_image_load').attr('src', image_url);
		});



		
	});
})(jQuery)