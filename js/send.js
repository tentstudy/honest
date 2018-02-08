$(document).ready(function(){
	$('#Send').click(function(){
		if($('#Text').val()=="")
		{
			$('.error').text("message is not null");
			return false;
		}else{
			return true;
		}
	})
});