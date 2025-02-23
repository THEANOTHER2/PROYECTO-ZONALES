$(document).ready(function(){
  $('#concurso').change(function(){
    console.log($('#concurso').val());
//    if(($('#concurso').val())=="DanzaM"){    
//      $('#DM').slideDown("slow");
//    }
//    $(".especialidad").val($('#concurso').val());
    switch($('#concurso').val()){
      case "DanzaM":
//        $("#C").slideUp("slow");
        $("#Cto").hide();$("#C").hide();$('#T').hide();$("#DF").hide();
       $('#DM').slideDown("slow");
        break;
      
      case "Canto":
        $("#DM").hide();$("#C").hide();$('#T').hide();$("#DF").hide();
        $("#Cto").slideDown("slow");
        break;
        
      case "Cuenteria":
        $("#Cto").hide();$("#DM").hide();$('#T').hide();$("#DF").hide();
        $("#C").slideDown("slow");
        break;
        
      case "DanzaF":
        $("#Cto").hide();$("#C").hide();$('#T').hide();$("#DM").hide();
        $("#DF").slideDown("slow");
        break;
        
      case "Teatro":
        $("#Cto").hide();$("#C").hide();$('#DM').hide();$("#DF").hide();
        $("#T").slideDown("slow");
        break;
    }
  });
});