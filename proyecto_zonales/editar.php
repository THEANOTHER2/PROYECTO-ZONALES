<?php

  $con = new PDO('mysql:host=localhost;dbname=zonales1;charset=utf8','root','');

  foreach($_POST as $key => $value){
    ${$key} = $value;
  }

  switch($especialidad){
    case "Cuenteria":
      $total=($editC1*0.3)+($editC2*0.1)+($editC3*0.2)+($editC4*0.2)+($editC5*0.2);
      
      $query = $con->query("UPDATE cuenteria SET fluidez_verbal=$editC1, coherencia=$editC2, argumento=$editC3, impacto_al_publico=$editC4,creatividad=$editC5, total=$total WHERE id=$id");

      header("Location: conC.php");
      
      break;
    
    case "Canto":
      
      $total=($editCto1*0.25)+($editCto2*0.2)+($editCto3*0.3)+($editCto4*0.25);

      $query = $con->query("UPDATE canto SET vocalizacion=$editCto1, puesta_en_escena=$editCto2, ritmo_entonacion_y_medida=$editCto3, calidad_interpretativa=$editCto4, total=$total WHERE id=$id");

      header("Location: conCto.php");
      
      break;
      
    case "DanzaF":
      
      $total=($editDF1*0.3)+($editDF2*0.2)+($editDF3*0.3)+($editDF4*0.1)+($editDF5*0.1);

      $query = $con->query("UPDATE danza_folclórica SET calidad_interpretativa=$editDF1, composicion_coreografia=$editDF2, esamble_y_sincronizacion=$editDF3, vestuario=$editDF4,investigacion=$editDF5, total=$total WHERE id=$id");

      header("Location: conDF.php");
      
      break;
      
    case "DanzaM":
      
      $total=($editDF1*0.3)+($editDF2*0.2)+($editDF3*0.3)+($editDF4*0.1)+($editDF5*0.1);

      $query = $con->query("UPDATE danza_moderna SET calidad_interpretativa=$editDF1, composicion_coreografia=$editDF2, esamble_y_sincronizacion=$editDF3, vestuario=$editDF4,investigacion=$editDF5, total=$total WHERE id=$id");

      header("Location: conDM.php");
      
      break;
      
    case "Teatro":
      
      $total=($editT1*0.1)+($editT2*0.2)+($editT3*0.3)+($editT4*0.1)+($editT5*0.1)+($editT6*0.2);

      $query = $con->query("UPDATE teatro SET escenografia=$editT1, caracterizacion_de_los_personajes=$editT2, expresion_corporal=$editT3, puesta_en_escena=$editT4,vestuario_y_maquillaje=$editT5,impacto=$editT6, total=$total WHERE id=$id");

      header("Location: conT.php");
      
      break;
  }

  
?>