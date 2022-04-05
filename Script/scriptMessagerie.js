
$('body').ready(function(){
	$('.message-header').children().text( $('#1').text().trim() );
	$('iframe').attr('src', '/cadre.php?salon=' + $('#1').text().trim() );
})

$('.panel-block').click( function() {
	var id = $(this).attr('id');
	$('.message-header').children().text( $('#'+id).text().trim() );
	$('iframe').attr('src', '/cadre.php?salon=' + $('#'+id).text().trim() );
})

$('#envoi').click( function(){

	$.ajax({
		url: "/AJAX/sendMessage.php",
		type: 'POST',
		data: 'message=' + $('#message').val() +
			'&salon=' + $('.message-header').children().text().trim() +
			'&compte=' + $('#profil').text().trim(),
		success: function(){
			$('#envoi').attr('disabled', 'true');
			$('#message').val('');
		},
		error: function(error){
			console.log(error);
		}
	})
})

$('#message').keyup(function(e){
	if ( $('#message').val() != "" ){
		$('#envoi').removeAttr('disabled');
		if (e.which == 13) {
			$('#envoi').click();
		}
	} else {
		$('#envoi').attr('disabled', true);
	}
})