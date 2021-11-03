
$('#changePassword').click(function(){
	$('#changePassword').addClass("is-loading");

	var oldpass = $('#oldPass').val();
	var newpass = $('#newPass').val();
	var newpassconfirm = $('#newPassConfirm').val();

	$.ajax({
		url: "/AJAX/changePassword.php",
		type: 'POST',
		data: 'oldpass='+ oldpass +'&newpass='+ newpass +'&newpassconfirm='+ newpassconfirm +'&mail='+ $('#mail').text(),
		success: function(data){
			if(data == 1){
				$('#changePassword').removeClass("is-loading is-link is-danger is-primary");
				$('#changePassword').addClass("is-primary");
				$('#oldPass').val('');
				$('#newPass').val('');
				$('#newPassConfirm').val('');
			} else {
				$('#changePassword').removeClass("is-loading is-link is-danger is-primary");
				$('#changePassword').addClass("is-danger");
			}
		},
		error: function(error){
			console.log(error);
			$('#changePassword').removeClass("is-loading is-link is-danger is-primary");
			$('#changePassword').addClass("is-danger");
		}
	})
})