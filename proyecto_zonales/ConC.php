<?php

  $con = new PDO('mysql:host=localhost;dbname=zonales1;charset=utf8','root','');

  session_start();
  $jurado = $_SESSION['user'];
  echo $jurado;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cuenteria</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/table.css">
  <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="table-responsive" id="contenedor" style="width:100%">
    <table class="table fil" id="table">
      <thead class="text-center">
        <tr>
          <th colspan="9">Calificaciones de Cuenteria</th>
        </tr>
        <tr>
          <th>Regionales</th>
          <th>Jurados</th>
          <th>Fluidez verbal</th>
          <th>Coherencia</th>
          <th>Argumento</th>
          <th>Impacto al publico</th>
          <th>Creatividad</th>
          <th>Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php

            $query = $con->query("SELECT id, id_jurado, jurado.nombre AS 'jurado',regional.nombre AS 'regional',fluidez_verbal,coherencia,argumento,impacto_al_publico,creatividad,total FROM cuenteria,jurado,regional WHERE cuenteria.id_regional=regional.id_regional AND cuenteria.id_jurado=jurado.n°_documento ORDER By total DESC");

            while($row = $query->fetchObject()){
              $res[] = $row;
            }

//            $numRows = $query->rowCount();

//            $x=1;
            if(isset($res)){
              foreach($res as $key=>$value){
                if($value->id_jurado == $jurado){
                  echo '<tr><td>'.$value->regional.'</td><td>'.$value->jurado.'</td><td>'.$value->fluidez_verbal.'</td><td>'.$value->coherencia.'</td><td>'.$value->argumento.'</td><td>'.$value->impacto_al_publico.'</td><td>'.$value->creatividad.'</td><td>'.$value->total.'</td><td><a class="btn btn-danger" href="editC.php?id='.$value->id.'">Editar</a></td></tr>';
                }else{
                  echo '<tr><td>'.$value->regional.'</td><td>'.$value->jurado.'</td><td>'.$value->fluidez_verbal.'</td><td>'.$value->coherencia.'</td><td>'.$value->argumento.'</td><td>'.$value->impacto_al_publico.'</td><td>'.$value->creatividad.'</td><td>'.$value->total.'</td><td></td></tr>';
                }
              }
            }else{
              echo '<tr><td colspan="8">No hay registros</td></tr>';
            }
          
          
        ?>
      </tbody>
    </table>
 </div>
  </div>
</body>
</html>