<?php
  $con = new PDO('mysql:host=localhost;dbname=zonales1;charset=utf8','root','');

  $query = $con->query("SELECT * FROM jurado");

  while($row = $query->fetchObject()){
    $res[]=$row;
  }

//  foreach($res as $key=>$value){
//    echo $value->nombre." ".$value->apellido;
//  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resultados</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/result.css">
	<link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/result.js"></script>
</head>
<body>


	<div class="container">
		<div class="row justify-content-start">
			<div class="col">
				<div class="form-container">
					<h2>Consulta Resultados</h2>
					<hr>
					<div class="form-group">
						<label for="consulta">¿Qué desea consultar?</label>
						<select  name="consulta" id="consulta" class="form-control">
						    <option value="" disabled selected>Seleccione una opción</option>
							<option value="jurado">Jurado </option>
							<option value="categoria">Categoría</option>
						</select>
					</div>
					
					<form action="conJur.php" method="get" style="display: none" id="jur">		  
                      <div class="form-group">
                          <label for="Jurados">Jurados</label>
                          <select name="jurado" class="form-control mb-3" required id="Jurados">
                            <option value="" selected disabled>Seleccione una opción</option> 
                          <?php
                            foreach($res as $key=>$value){
                              echo '<option value="'.$value->n°_documento.'">'.$value->nombre.' '.$value->apellido.'</option>';
                            }
                          ?>
                          </select>

                        <button type="submit" class="btn">Aceptar</button>
                      </div>
					</form>
					
					<form action="conCat.php" method="get" style="display: none" id="cat">
                      <div class="form-group">
                          <label for="categoria">Categoría</label>
                          <select  name="categoria" id="categoria" class="form-control" required>
                               <option value="" selected disabled>Seleccione una opción</option>
                              <option value="canto">Canto</option>
                              <option value="cuenteria">Cuenteria</option>
                              <option value="danza_folclórica">Danza Folclórica</option>
                              <option value="danza_moderna">Danza Popular</option>
                              <option value="teatro">Teatro</option>
                          </select>
                      </div>
					  <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i>Aceptar</button>
					</form>
          
				    <a href="table.php" target="_blank">Ver resultados</a>
				</div>
			</div>
		</div>
	</div>

</body>
</html>