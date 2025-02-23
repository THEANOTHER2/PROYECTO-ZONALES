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
  <title>Danza Folclórica</title>
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
          <th colspan="9">Calificaciones de Danza Folclórica</th>
        </tr>
        <tr>
          <th>Regionales</th>
          <th>Jurados</th>
          <th>Calidad interpretativa</th>
          <th>Composicion coreografia</th>
          <th>Esamble y sincronizacion</th>
          <th>Vestuario</th>
          <th>Investigación</th>
          <th>Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php

            $query = $con->query("SELECT id, id_jurado, jurado.nombre AS 'jurado',regional.nombre AS 'regional',calidad_interpretativa,composicion_coreografia,esamble_y_sincronizacion,vestuario,investigacion,total FROM danza_folclórica,jurado,regional WHERE danza_folclórica.id_regional=regional.id_regional AND danza_folclórica.id_jurado=jurado.n°_documento ORDER BY total DESC");

            while($row = $query->fetchObject()){
              $res[] = $row;
            }

//            $numRows = $query->rowCount();

//            $x=1;
            if(isset($res)){
              foreach($res as $key=>$value){
                if($value->id_jurado == $jurado){
                  echo '<tr><td>'.$value->regional.'</td><td>'.$value->jurado.'</td><td>'.$value->calidad_interpretativa.'</td><td>'.$value->composicion_coreografia.'</td><td>'.$value->esamble_y_sincronizacion.'</td><td>'.$value->vestuario.'</td><td>'.$value->investigacion.'</td><td>'.$value->total.'</td><td><a class="btn btn-danger" href="editDF.php?id='.$value->id.'">Editar</a></td></tr>';
                }else{
                  echo '<tr><td>'.$value->regional.'</td><td>'.$value->jurado.'</td><td>'.$value->calidad_interpretativa.'</td><td>'.$value->composicion_coreografia.'</td><td>'.$value->esamble_y_sincronizacion.'</td><td>'.$value->vestuario.'</td><td>'.$value->investigacion.'</td><td>'.$value->total.'</td><td></td></tr>';
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