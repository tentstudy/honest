$(document).ready(function(){
	$('.reseved').addClass("addcssclick");
	$('.tab-favorite').addClass("dis-none");
	$('.favorites').click(function(){
		$('.tab-message').addClass("dis-none");
		$('.tab-favorite').removeClass("dis-none");
		$('.reseved').removeClass("addcssclick");
		$('.favorites').addClass("addcssclick");
	})

	$('.reseved').click(function(){
		$('.tab-message').removeClass("dis-none");
		$('.tab-favorite').addClass("dis-none");
		$('.favorites').removeClass("addcssclick");
		$('.reseved').addClass("addcssclick");
	})

	$('.content-mes .fa-send-o').click(function(){
		var id = $(this).attr('id');
		var data= {id:id};
		$.post('/model/generateImg.php',data,function(result)
		{
			result = JSON.parse(result);
			if (result.success) {
				// console.log(result.message);
				var url =  'https://www.facebook.com/share.php?u='+result.url;
				window.open(url);
                    // location.href=url;
                } else 
                console.log(result);
		})
	})

	$('.content-mes .delete').click(function(){
		var name = $(this).attr('name');
		$("."+name).addClass("dis-none");
		var data = new FormData();
		data.append('id', name);

        $.ajax({
            url: "../model/handlingdeletemess.php",
            processData: false,
            contentType: false,
            data,
            type: 'post',
            success: function(result) {
                console.log(result);
                // result = JSON.parse(result);
                // if (result.success) {
                //     location.href = '/login';
                // } else alert(result.message);
                // console.log(result);
            }
        });
	})

	$('.content-mes .heart-mess').click(function(){
		var name = $(this).attr('name');
		// var parent = $(this).pa
		$("*[name="+name+"]").remove();
		var data = new FormData();
		data.append('id', name);

        $.ajax({
            url: "../model/handlinglikemess.php",
            processData: false,
            contentType: false,
            data,
            type: 'post',
            success: function(result) {
            	console.log(result);
                result = JSON.parse(result);
                if (result.success) {
                    $('.tab-favorite').append(`<div class="content-mes"><span class="mes">${result.content}</span>
                        <span class="delete" name="${result.id}">×</span>
                        <div class="time-and-repost">
                            <span class="date-time">${result.time}</span>
                        </div>
                        <i class="fa fa-heart heart-favorite h-b " style="font-size:12px" name="${result.id}"></i>
                        </div>`)
                    console.log('app to fa');
                } else alert(result.message);

            }
        });


	})

	$('.content-mes .heart-favorite').click(function(){
		var name = $(this).attr('name');
		$("*[name="+name+"]").remove();
		var data = new FormData();
		data.append('id', name);

        $.ajax({
            url: "../model/handlinglikemess.php",
            processData: false,
            contentType: false,
            data,
            type: 'post',
            success: function(result) {
                result = JSON.parse(result);
                if (result.success) {
                    $('.tab-message').append(`<div class="content-mes"><span class="mes">${result.content}</span>
                                            <span class="delete" name="${result.id}">×</span>
                                            <div class="time-and-repost">
                                                <span class="date-time">${result.time}</span>
                                                <i class="fa fa-heart h-b" style="font-size:12px" name="${result.id}"></i>
                                            </div>
                                            <i class="fa fa-heart heart-favorite h-b " style="font-size:12px" name="${result.id}"></i>
                                            </div>`)
                } else alert(result.message);
            }
        }); 
	})

	

})