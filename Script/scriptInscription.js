
function cacher(){
  if ( $('#role').val() == "Etudiant" ){
    $('#promo1').show();
    $('#promo2').show();
  }
  else {
    $('#promo1').hide();
    $('#promo2').hide();
    $('#promo').val('');
  }
}

function coche(){
    if ($('#check').prop("checked")) {
      $('#bouton').attr("disabled", false);
    }else{
      $('#bouton').attr("disabled", true);
    }
}
