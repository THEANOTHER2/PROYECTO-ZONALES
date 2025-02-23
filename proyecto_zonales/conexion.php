<?php

session_start();
$con = new PDO('mysql:host=localhost;dbname=zonales1;charset=utf8','root','');
//echo "Hi";

//$con->query("INSERT INTO regional (NOMBRE) VALUES('Tolima')");

//echo $_POST['regiones'];
echo $_POST['especialidad'];

foreach($_POST as $key => $value){
  ${$key} = $value;
}

switch($_POST['especialidad']){
  case "DanzaM":
    
    $consulta = $con->query("SELECT * FROM danza_moderna WHERE id_jurado=$jurado AND id_regional=$regiones");
    
//    $row = $consulta->fetchObject();
    if($row = $consulta->fetchObject()){
      $resultSet=$row;
    }
    

    if(isset($resultSet)){
      $_SESSION['registrado']="Su calificación no se ha guardado, ya que esta ya se habia registrado";
      header("Location: form.php");
    }else{
    
      $total=($DM1*0.3)+($DM2*0.2)+($DM3*0.3)+($DM4*0.1)+($DM5*0.1);

      $con->query("INSERT INTO danza_moderna (calidad_interpretativa,composicion_coreografia,esamble_y_sincronizacion,vestuario,investigacion,total,id_regional,id_jurado) VALUES($DM1,$DM2,$DM3,$DM4,$DM5,$total,$regiones,$jurado)");
      $_SESSION['registrado']="Registrado con exito";
      header("Location: form.php");
    }
    break;
  case "Canto":
    
    $consulta = $con->query("SELECT * FROM canto WHERE id_jurado=$jurado AND id_regional=$regiones");
    
//    $row = $consulta->fetchObject();
    if($row = $consulta->fetchObject()){
      $resultSet=$row;
    }
    

    if(isset($resultSet)){
      $_SESSION['registrado']="Su calificación no se ha guardado, ya que esta ya se habia registrado";
      header("Location: form.php");
    }else{
    
      $total=($Cto1*0.25)+($Cto2*0.2)+($Cto3*0.3)+($Cto4*0.25);

      $con->query("INSERT INTO canto (vocalizacion,puesta_en_escena,ritmo_entonacion_y_medida,calidad_interpretativa,total,id_regional,id_jurado) VALUES($Cto1,$Cto2,$Cto3,$Cto4,$total,$regiones,$jurado)");
      $_SESSION['registrado']="Registrado con exito";
      header("Location: form.php");
    }
    break;
    
  case "Cuenteria":
    
    $consulta = $con->query("SELECT * FROM cuenteria WHERE id_jurado=$jurado AND id_regional=$regiones");
    
//    $row = $consulta->fetchObject();
    if($row = $consulta->fetchObject()){
      $resultSet=$row;
    }
    

    if(isset($resultSet)){
      $_SESSION['registrado']="Su calificación no se ha guardado, ya que esta ya se habia registrado";
      header("Location: form.php");
    }else{    
      $total=($C1*0.3)+($C2*0.1)+($C3*0.2)+($C4*0.2)+($C5*0.2);

      $con->query("INSERT INTO cuenteria (fluidez_verbal,coherencia,argumento,impacto_al_publico,creatividad,total,id_regional,id_jurado) VALUES($C1,$C2,$C3,$C4,$C5,$total,$regiones,$jurado)");
      $_SESSION['registrado']="Registrado con exito";
      header("Location: form.php");
    }
    break;
    
  case "DanzaF":
    
    $consulta = $con->query("SELECT * FROM danza_folclórica WHERE id_jurado=$jurado AND id_regional=$regiones");
    
//    $row = $consulta->fetchObject();
    if($row = $consulta->fetchObject()){
      $resultSet=$row;
    }
    

    if(isset($resultSet)){
      $_SESSION['registrado']="Su calificación no se ha guardado, ya que esta ya se habia registrado";
      header("Location: form.php");
    }else{
      $total=($DF1*0.3)+($DF2*0.2)+($DF3*0.3)+($DF4*0.1)+($DF5*0.1);
    
      $con->query("INSERT INTO danza_folclórica (calidad_interpretativa,composicion_coreografia,esamble_y_sincronizacion,vestuario,investigacion,total,id_regional,id_jurado) VALUES($DF1,$DF2,$DF3,$DF4,$DF5,$total,$regiones,$jurado)");
      $_SESSION['registrado']="Registrado con exito";
      header("Location: form.php");
    }
    
    break;
    
  case "Teatro":
    
    $consulta = $con->query("SELECT * FROM teatro WHERE id_jurado=$jurado AND id_regional=$regiones");
    
//    $row = $consulta->fetchObject();
    if($row = $consulta->fetchObject()){
      $resultSet=$row;
    }
    

    if(isset($resultSet)){
      $_SESSION['registrado']="Su calificación no se ha guardado, ya que esta ya se habia registrado";
      header("Location: form.php");
    }else{
    
      $total=($T1*0.1)+($T2*0.2)+($T3*0.3)+($T4*0.1)+($T5*0.1)+($T6*0.2);

      $con->query("INSERT INTO teatro (escenografia,caracterizacion_de_los_personajes,expresion_corporal,puesta_en_escena,vestuario_y_maquillaje,impacto,total,id_regional,id_jurado) VALUES($T1,$T2,$T3,$T4,$T5,$T6,$total,$regiones,$jurado)");
      $_SESSION['registrado']="Registrado con exito";
      header("Location: form.php");
    }
    break;
}