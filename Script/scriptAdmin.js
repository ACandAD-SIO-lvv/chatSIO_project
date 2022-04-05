
$('.accepter').click(function () {
	$('.card-footer-item').attr('disabled', true);

	var identifiant = $(this).parent().parent().attr('id');
	$.ajax({
		url: "/AJAX/acceptProp.php",
		type: 'POST',
		data: 'choix=' + 1 + '&id=' + identifiant,
		success: function () {
			$('#' + identifiant).remove();
		},
		error: function (error) {
			console.log(error);
		}
	})
})

$('.decliner').click(function () {
	$('.card-footer-item').attr('disabled', 'true');

	var identifiant = $(this).parent().parent().attr('id');
	$.ajax({
		url: "/AJAX/acceptProp.php",
		type: 'POST',
		data: 'choix=' + 0 + '&id=' + identifiant,
		success: function () {
			$('#' + identifiant).remove();
		},
		error: function (error) {
			console.log(error);
		}
	})
})

$('#creationpromo').click(function () {


	var nompromo = $('#anneedebut').val() + "/" + $('#anneefin').val();
	$.ajax({
		url: "/AJAX/creerPromo.php",
		type: 'POST',
		data: 'nomPromo=' + nompromo,
		success: function () {
			$('.input').val('');
			$('#creationpromo').attr('disabled', true);
			$('.panel-block:first').after('<div class="notification is-success" style="position: fixed; left: 40%; width: 30%; height: 2.5%"><p style="text-align: center; vertical-align: middle">Création de la promotion effectuée</p></div>');
			$('.notification').fadeOut(3000);
		},
		error: function (error) {
			console.log(error);
		}
	})
})

$('.input').keyup(function (e) {
	if ($('#anneedebut').val().length == 4 && $('#anneefin').val().length == 4) {
		$('#creationpromo').removeAttr('disabled');
	} else {
		$('#creationpromo').attr('disabled', true);
	}
})