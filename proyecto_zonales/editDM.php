<?php
  session_start();
  $id = $_GET['id'];

  $con = new PDO('mysql:host=localhost;dbname=zonales1;charset=utf8','root','');

  $query = $con->query("SELECT * FROM danza_moderna WHERE id=$id");

  if($row = $query->fetchObject()){
    $res = $row;
  }

//  var_dump($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Editar Canto</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/edit.css">
  <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
</head>
<body>
  <div class="container">
    <form action="editar.php" method="post" class="form">
      <h2 class="text-center">Editar</h2>
      <input type="hidden" name="especialidad" class="especialidad" value="DanzaM">
      <?php echo'<input type="hidden" name="jurado" value="'.$_SESSION['user'].'">';
      echo'<input type="hidden" name="id" value="'.$_GET['id'].'">';?>

      <div class="form-group">
          <label for="editDF1">Calidad interpretativa</label>
          <input type="number" class="form-control" required name="editDF1" id="editDF1" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->calidad_interpretativa ?>">
      </div>

      <div class="form-group">
          <label for="editDF2">Composición Coreográfica(originalidad)</label>
          <input type="number" class="form-control" required name="editDF2" id="editDF2" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->composicion_coreografia ?>">
      </div>

      <div class="form-group">
          <label for="editDF3">Ensamble y sincronizacion grupo, ritmo y movimientos</label>
          <input type="number" class="form-control" required name="editDF3" id="editDF3" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->esamble_y_sincronizacion ?>">
      </div>

      <div class="form-group">
          <label for="editDF4">Vestuario, parafernaria y Utileria</label>
          <input type="number" class="form-control" required name="editDF4" id="editDF4" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->vestuario ?>">
      </div>

      <div class="form-group">
          <label for="editDF5">Investigación</label>
          <input type="number" class="form-control" required name="editDF5" id="editDF5" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->investigacion ?>">
      </div>

      <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt" style="text-align: right;"></i>Aceptar</button>
      <a href="conC.php" class="btn btn-info">Volver</a>

    </form>
  </div>
</body>
</html>