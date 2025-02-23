$(document).ready(function(){
  $('#consulta').change(function(){
    switch($('#consulta').val()){
      case 'jurado':
        $("#cat").hide();
        $("#jur").slideDown('slow');
        break;
      case 'categoria':
        $("#jur").hide();
        $("#cat").slideDown('slow')
        break
    }
  });
});