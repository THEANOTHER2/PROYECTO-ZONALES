<?php
  if(isset($_GET['categoria'])){
    $cat=$_GET['categoria'];
  }else{
    header("Location: result.php");
  }

  

  switch($cat){
    case "canto":$categoria="Canto";break;
    case "cuenteria":$categoria="Cuenteria";break;
    case "danza_folclórica":$categoria="Danza Folclórica";break;
    case "danza_moderna":$categoria="Danza Popular";break;
    case "teatro":$categoria="Teatro";break;
  }

  $con = new PDO('mysql:host=localhost;dbname=zonales1;charset=utf8','root','');

  $query = $con->query("SELECT nombre, SUM(total)/3 AS 'promedio',COUNT(*) AS 'num_votos' FROM ".$cat.", regional WHERE ".$cat.".id_regional=regional.id_regional GROUP BY nombre ORDER BY promedio DESC");

  while($row = $query->fetchObject()){
    $result[] = $row;
  }

//  var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Consulta por categoria</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/table.css">
  <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
</head>
<body>
  <a class="btn button text-white" href="result.php">Volver <img src="img/icons8_Undo_20px.png" alt=""></a>
  <div class="table-responsive" id="contenedor">
    <table class="table fil" id="table">
      <thead class="text-center">
        <tr>
          <th colspan="2">Resultados en la categoria <?php echo $categoria ?></th>
        </tr>
        <tr>
          <th>Regionales</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
  
          if(isset($result)){
            foreach($result as $key=>$value){
              if($value->num_votos<3){
                echo '<tr><td>'.$value->nombre.'</td><td>'.$value->promedio.' faltan jurados por calificar</td></tr>';
              }else{
                echo '<tr><td>'.$value->nombre.'</td><td>'.$value->promedio.'</td></tr>';
              }
            }
          }else{
            echo '<tr><td colspan="2">No hay registros</td></tr>';
          }
        ?>
      </tbody>
    </table>
 </div>
</body>
</html>