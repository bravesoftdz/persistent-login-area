$(function(){
	//dynamically change remember me on the fly
	$('.frmRememberMe #cbxRememberMe').change(function(){
		
		$.ajax({
			url: 'ajax_remember_me.php',
			data: {remember_me: this.checked ? 1 : ''}, 
			success: function(data){
			   console.log(data);
			},
			dataType: 'json'
		})
	});

});
