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
  <title>Teatro</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/table.css">
  <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="table-responsive" id="contenedor" style="width:100%">
    <table class="table fil" id="table">
      <thead class="text-center">
        <tr>
          <th colspan="10">Calificaciones de Teatro</th>
        </tr>
        <tr>
          <th>Regionales</th>
          <th>Jurados</th>
          <th>Escenografia</th>
          <th>Caracterizacion de los personajes</th>
          <th>Expresion corporal</th>
          <th>Puesta en escena</th>
          <th>Vestuario y maquillaje</th>
          <th>Impacto</th>
          <th>Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php

            $query = $con->query("SELECT id, id_jurado, jurado.nombre AS 'jurado',regional.nombre AS 'regional',escenografia,caracterizacion_de_los_personajes,expresion_corporal,puesta_en_escena,vestuario_y_maquillaje,impacto,total FROM teatro,jurado,regional WHERE teatro.id_regional=regional.id_regional AND teatro.id_jurado=jurado.n°_documento ORDER BY total DESC");

            while($row = $query->fetchObject()){
              $res[] = $row;
            }

//            $numRows = $query->rowCount();

//            $x=1;
            if(isset($res)){
              foreach($res as $key=>$value){
                if($value->id_jurado == $jurado){
                  echo '<tr><td>'.$value->regional.'</td><td>'.$value->jurado.'</td><td>'.$value->escenografia.'</td><td>'.$value->caracterizacion_de_los_personajes.'</td><td>'.$value->expresion_corporal.'</td><td>'.$value->puesta_en_escena.'</td><td>'.$value->vestuario_y_maquillaje.'</td><td>'.$value->impacto.'</td><td>'.$value->total.'</td><td><a class="btn btn-danger" href="editT.php?id='.$value->id.'">Editar</a></td></tr>';
                }else{
                  echo '<tr><td>'.$value->regional.'</td><td>'.$value->jurado.'</td><td>'.$value->escenografia.'</td><td>'.$value->caracterizacion_de_los_personajes.'</td><td>'.$value->expresion_corporal.'</td><td>'.$value->puesta_en_escena.'</td><td>'.$value->vestuario_y_maquillaje.'</td><td>'.$value->impacto.'</td><td>'.$value->total.'</td><td></td></tr>';
                }
              }
            }else{
              echo '<tr><td colspan="9">No hay registros</td></tr>';
            }
          
          
        ?>
      </tbody>
    </table>
 </div>
  </div>
</body>
</html>