
$('input[type="checkbox"]').click(function(){

  var coche = "";
  if( $('#emploi').prop("checked") && $('#stage').prop("checked") ){
    coche = "es";
  } else if ( $('#emploi').prop("checked") ){
    coche = "e";
  } else if ( $('#stage').prop("checked") ) {
    coche = "s";
  }

  $.ajax({
    url: "/AJAX/checkbox.php",
    type: 'POST',
    data: 'coche='+ coche,
    dataType: 'json',
    success: function(data){
      $('#messages').empty();
      for (let index = 0; index < data.length; index++) {
        $('#messages').append("<article class='message'><div class='message-header'><p>" + data[index]['titre'] + " :</p></div><div class='message-body'><p>" + data[index]['message'] + "</p></div></article>");
      }
    },
    error: function(error){
      $('#messages').empty();
	  console.log(error);
    }
  })
})
