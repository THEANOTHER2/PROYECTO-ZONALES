<?php
  session_start();
  $id = $_GET['id'];

  $con = new PDO('mysql:host=localhost;dbname=zonales1;charset=utf8','root','');

  $query = $con->query("SELECT * FROM canto WHERE id=$id");

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
    <br>
    <input type="hidden" name="especialidad" class="especialidad" value="Canto">
    <?php echo'<input type="hidden" name="jurado" value="'.$_SESSION['user'].'">';
    echo'<input type="hidden" name="id" value="'.$_GET['id'].'">';?>
    <div class="form-group">
        <label for="Cto1">Vocalización</label>
        <input type="number" class="form-control" required name="editCto1" id="Cto1" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->vocalizacion ?>">
    </div>

    <div class="form-group">
        <label for="Cto2">Puesta en escena</label>
        <input type="number" class="form-control" required name="editCto2" id="Cto2" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->puesta_en_escena ?>">
    </div>

    <div class="form-group">
        <label for="Cto3">Ritmo, entonacion y medida</label>
        <input type="number" class="form-control" required name="editCto3" id="Cto3" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->ritmo_entonacion_y_medida ?>">
    </div>

    <div class="form-group">
        <label for="Cto4">Calidad interpretativa</label>
        <input type="number" class="form-control" required name="editCto4" id="Cto4" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10" value="<?php echo $res->calidad_interpretativa ?>">
    </div>

    <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt" style="text-align: right;"></i>Aceptar</button>
    <a href="conCto.php" class="btn btn-info">Volver</a>
  </form>
  </div>
</body>
</html>