<?php
  session_start();
  $id = $_GET['id'];

  $con = new PDO('mysql:host=localhost;dbname=zonales1;charset=utf8','root','');

  $query = $con->query("SELECT * FROM cuenteria WHERE id=$id");

  if($row = $query->fetchObject()){
    $res = $row;
  }

//  var_dump($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Editar Cuenteria</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/edit.css">
  <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
</head>
<body>
  <div class="container">
    <form action="editar.php" method="post" class="form">
     <h2 class="text-center">Editar</h2>
      <input type="hidden" name="especialidad" class="especialidad" value="Cuenteria">
      <?php echo'<input type="hidden" name="jurado" value="'.$_SESSION['user'].'">';
      echo'<input type="hidden" name="id" value="'.$_GET['id'].'">';?>

      <div class="form-group">
          <label for="C1">Fluidez verbal</label>
          <input type="number" class="form-control" required name="editC1" id="C1" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->fluidez_verbal ?>">
      </div>

      <div class="form-group">
          <label for="C2">Coherencia</label>
          <input type="number" class="form-control" required name="editC2" id="C2" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->coherencia ?>">
      </div>

      <div class="form-group">
          <label for="C3">Argumento</label>
          <input type="number" class="form-control" required name="editC3" id="C3" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->argumento ?>">
      </div>

      <div class="form-group">
          <label for="C4">Impacto al público</label>
          <input type="number" class="form-control" required name="editC4" id="C4" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->impacto_al_publico ?>">
      </div>

      <div class="form-group">
          <label for="C5">Creatividad</label>
          <input type="number" class="form-control" required name="editC5" id="C5" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->creatividad ?>">
      </div>

      <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt" style="text-align: right;"></i>Aceptar</button>
      <a href="conC.php" class="btn btn-info">Volver</a>

    </form>
  </div>
</body>
</html>