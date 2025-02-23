<?php

  $con = new PDO('mysql:host=localhost;dbname=zonales1;charset=utf8','root','');

  if(isset($_GET['jurado'])){
    $jur = $_GET['jurado'];
  }else{
    header("Location: result.php");
  }

  $query = $con->query("SELECT nombre,apellido FROM jurado WHERE n°_documento=".$jur);

  if($row = $query->fetchObject()){
    $result = $row;
  }
      
  $cat = array('canto','cuenteria','danza_folclórica','	danza_moderna','teatro');
  $catV = array('Canto','Cuenteria','Danza folclórica','Danza Popular','Teatro');

//  echo $cat[4];
//  var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Consulta por jurado</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/table.css">
  <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
</head>
<body>
  <a class="btn button text-white" href="result.php">Volver <img src="img/icons8_Undo_20px.png" alt=""></a>
  <div class="table-responsive" id="contenedor">
    <table class="table table-bordered cel" id="table">
      <thead class="text-center">
        <tr>
          <th colspan="3">Jurado <?php echo $result->nombre.' '.$result->apellido; ?></th>
        </tr>
        <tr>
          <th>Categoria</th>
          <th>Regionales</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
          for($y=0; $y<5; $y++){
//            $cat[$y];
            $query = $con->query("SELECT nombre,total FROM ".$cat[$y].", regional WHERE ".$cat[$y].".id_regional=regional.id_regional AND id_jurado=".$jur." ORDER BY total DESC");

            while($row = $query->fetchObject()){
              $res{$y}[] = $row;
            }

            $numRows = $query->rowCount();

            $x=1;
            if(isset($res{$y})){
              foreach($res{$y} as $key=>$value){
                if($x==1){
                  echo '<tr><td rowspan="'.$numRows.'" class="align-middle">'.$catV[$y].'</td><td>'.$value->nombre.'</td><td>'.$value->total.'</td></tr>';
                }else{
                  echo '<tr><td>'.$value->nombre.'</td><td>'.$value->total.'</td></tr>';
                }
                $x++;
              }
            }else{
              echo '<tr><td colspan="3" class="text-center">No hay registros en la categoria '.$catV[$y].'</td></tr>';
            }
          
          }
        ?>
      </tbody>
    </table>
 </div>
</body>
</html>