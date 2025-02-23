<?php
  session_start();
  $id = $_GET['id'];

  $con = new PDO('mysql:host=localhost;dbname=zonales1;charset=utf8','root','');

  $query = $con->query("SELECT * FROM teatro WHERE id=$id");

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
      <input type="hidden" name="especialidad" class="especialidad" value="Teatro">
      <?php echo'<input type="hidden" name="jurado" value="'.$_SESSION['user'].'">';
      echo'<input type="hidden" name="id" value="'.$_GET['id'].'">';?>

      <div class="form-group">
          <label for="editT1">Escenografia</label>
          <input type="number" class="form-control" required name="editT1" id="editT1" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->escenografia ?>">
      </div>

      <div class="form-group">
          <label for="editT2">Caracterización de los personajes</label>
          <input type="number" class="form-control" required name="editT2" id="editT2" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->caracterizacion_de_los_personajes ?>">
      </div>

      <div class="form-group">
          <label for="editT3">Expresión corporal</label>
          <input type="number" class="form-control" required name="editT3" id="editT3" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->expresion_corporal ?>">
      </div>

      <div class="form-group">
          <label for="editT4">Puesta en escena</label>
          <input type="number" class="form-control" required name="editT4" id="editT4" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->puesta_en_escena ?>">
      </div>

      <div class="form-group">
          <label for="editT5">Vestuario, maquillaje</label>
          <input type="number" class="form-control" required name="editT5" id="editT5" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->vestuario_y_maquillaje ?>">
      </div>

      <div class="form-group">
          <label for="editT6">Impacto</label>
          <input type="number" class="form-control" required name="editT6" id="editT6" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->impacto ?>">
      </div>

      <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt" style="text-align: right;"></i>Aceptar</button>
      <a href="conC.php" class="btn btn-info">Volver</a>

    </form>
  </div>
</body>
</html>