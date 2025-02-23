<?php
  session_start();

  if(!isset($_SESSION['login'])){
    header("Location: index.php");
  }

  $con = new PDO('mysql:host=localhost;dbname=zonales1;charset=utf8','root','');

  $query = $con->query("SELECT nombre, apellido FROM jurado WHERE 	n°_documento=".$_SESSION['user']);

  if($row = $query->fetchObject()){
    $result = $row;
  }

//  var_dump($result);
//  unset($_SESSION['login']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calificación</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
	
	<script src="js/jquery-3.3.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/form.js"></script>
</head>
<body>
    
    <div class="userMenu">
    <div class="dropdown show">
      <a class="btn btn-secondary dropdown-toggle mb-3" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#f37717">
        Bienvenido <?php echo $result->nombre." ".$result->apellido ?>
      </a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="cerrar.php">Cerrar sesión</a>
      </div>
    </div>
    </div>
    
	<div class="container">
		<div class="row justify-content-start">
			<div class="col">
				<div class="form-container">
				<?php

//                  session_start();
//                  echo $_SESSION['login'];
//
//                                  if(!isset($_SESSION['login'])){
//                                    header("Location: index.php");
//                                  }
//                  unset($_SESSION['login']);

                ?>
					<h2>Zonales Culturales</h2>
					<hr>
					
					<div class="form-group">
						<label for="concurso">Categorias</label>
						<select  name="concurso" id="concurso" class="form-control mb-3" required>
						    <option value="" disabled selected>Seleccione una opción</option>
							<option value="Canto">Canto</option>
							<option value="Cuenteria">Cuenteria</option>
							<option value="DanzaF">Danza Folclórica</option>
							<option value="DanzaM">Danza Popular</option>
							<option value="Teatro">Teatro</option>
						</select>
					</div>
          
                    <!-------------------Danza moderna--------------------->
                    <div id="DM" style="display: none">
                     <form action="conexion.php" method="post">
                      <input type="hidden" name="especialidad" class="especialidad" value="DanzaM">
                      <?php echo'<input type="hidden" name="jurado" value="'.$_SESSION['user'].'">'; ?>
                      <div class="form-group">
                          <label for="Regiones">Regiones</label>
                          <select  name="regiones" id="Regiones" class="form-control" required>
                              <option value="" disabled selected>Seleccione una opción</option>
                              <option value="1">Antioquia</option>
                              <option value="3">Caldas</option>
                              <option value="4">Huila</option>
                              <option value="2">Risaralda</option>
                              <option value="5">Tolima</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="DM1">Calidad interpretativa</label>
                          <input type="number" class="form-control" required name="DM1" id="DM1" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="DM2">Composición Coreográfica(originalidad)</label>
                          <input type="number" class="form-control" required name="DM2" id="DM2" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="DM3">Ensamble y sincronizacion grupo, ritmo y movimientos</label>
                          <input type="number" class="form-control" required name="DM3" id="DM3" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="DM4">Vestuario, parafernaria y Utileria</label>
                          <input type="number" class="form-control" required name="DM4" id="DM4" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="DM5">Investigación</label>
                          <input type="number" class="form-control" required name="DM5" id="DM5" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>
                      
                      <button type="submit" class="btn"><i class="fas fa-sign-in-alt" style="text-align: right;"></i>Aceptar</button>
                      
                      </form>
					</div>
					
					<!-------------------Danza folclorica--------------------->
                    <div id="DF" style="display: none">
                     <form action="conexion.php" method="post">
                      <input type="hidden" name="especialidad" class="especialidad" value="DanzaF">
                      <?php echo'<input type="hidden" name="jurado" value="'.$_SESSION['user'].'">'; ?>
                      <div class="form-group">
                          <label for="Regiones">Regiones</label>
                          <select  name="regiones" id="Regiones" class="form-control" required>
                              <option value="" disabled selected>Seleccione una opción</option>
                              <option value="1">Antioquia</option>
                              <option value="3">Caldas</option>
                              <option value="4">Huila</option>
                              <option value="2">Risaralda</option>
                              <option value="5">Tolima</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="DF1">Calidad interpretativa</label>
                          <input type="number" class="form-control" required name="DF1" id="DF1" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="DF2">Composición Coreográfica(originalidad)</label>
                          <input type="number" class="form-control" required name="DF2" id="DF2" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="DF3">Ensamble y sincronizacion grupo, ritmo y movimientos</label>
                          <input type="number" class="form-control" required name="DF3" id="DF3" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="DF4">Vestuario, parafernaria y Utileria</label>
                          <input type="number" class="form-control" required name="DF4" id="DF4" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="DF5">Investigación</label>
                          <input type="number" class="form-control" required name="DF5" id="DF5" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>
                      
                      <button type="submit" class="btn"><i class="fas fa-sign-in-alt" style="text-align: right;"></i>Aceptar</button>
                      
                      </form>
					</div>
					
					<!-------------------Teatro--------------------->
                    <div id="T" style="display: none">
                     <form action="conexion.php" method="post">
                      <input type="hidden" name="especialidad" class="especialidad" value="Teatro">
                      <?php echo'<input type="hidden" name="jurado" value="'.$_SESSION['user'].'">'; ?>
                      <div class="form-group">
                          <label for="Regiones">Regiones</label>
                          <select  name="regiones" id="Regiones" class="form-control" required>
                              <option value="" disabled selected>Seleccione una opción</option>
                              <option value="1">Antioquia</option>
                              <option value="3">Caldas</option>
                              <option value="4">Huila</option>
                              <option value="2">Risaralda</option>
                              <option value="5">Tolima</option>
                          </select>
                      </div>
                      
                      <div class="form-group">
                          <label for="T1">Escenografia</label>
                          <input type="number" class="form-control" required name="T1" id="T1" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="T2">Caracterización de los personajes</label>
                          <input type="number" class="form-control" required name="T2" id="T2" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="T3">Expresión corporal</label>
                          <input type="number" class="form-control" required name="T3" id="T3" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="T4">Puesta en escena</label>
                          <input type="number" class="form-control" required name="T4" id="T4" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="T5">Vestuario, maquillaje</label>
                          <input type="number" class="form-control" required name="T5" id="T5" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>
                      
                      <div class="form-group">
                          <label for="T6">Impacto</label>
                          <input type="number" class="form-control" required name="T6" id="T6" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>
                      
                      <button type="submit" class="btn"><i class="fas fa-sign-in-alt" style="text-align: right;"></i>Aceptar</button>
                      
                      </form>
					</div>
					
					<!-------------------Cuenteria--------------------->
                    <div id="C" style="display: none">
                     <form action="conexion.php" method="post">
                      <input type="hidden" name="especialidad" class="especialidad" value="Cuenteria">
                      <?php echo'<input type="hidden" name="jurado" value="'.$_SESSION['user'].'">'; ?>
                      <div class="form-group">
                          <label for="Regiones">Regiones</label>
                          <select  name="regiones" id="Regiones" class="form-control" required>
                              <option value="" disabled selected>Seleccione una opción</option>
                              <option value="1">Antioquia</option>
                              <option value="3">Caldas</option>
                              <option value="4">Huila</option>
                              <option value="2">Risaralda</option>
                              <option value="5">Tolima</option>
                          </select>
                      </div>
                      
                      <div class="form-group">
                          <label for="C1">Fluidez verbal</label>
                          <input type="number" class="form-control" required name="C1" id="C1" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="C2">Coherencia</label>
                          <input type="number" class="form-control" required name="C2" id="C2" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="C3">Argumento</label>
                          <input type="number" class="form-control" required name="C3" id="C3" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="C4">Impacto al público</label>
                          <input type="number" class="form-control" required name="C4" id="C4" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="C5">Creatividad</label>
                          <input type="number" class="form-control" required name="C5" id="C5" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>
                      
                      <button type="submit" class="btn"><i class="fas fa-sign-in-alt" style="text-align: right;"></i>Aceptar</button>
                      
                      </form>
					</div>
					
					<!-------------------Canto--------------------->
                    <div id="Cto" style="display: none">
                     <form action="conexion.php" method="post">
                      <input type="hidden" name="especialidad" class="especialidad" value="Canto">
                      <?php echo'<input type="hidden" name="jurado" value="'.$_SESSION['user'].'">'; ?>
                      <div class="form-group">
                          <label for="Regiones">Regiones</label>
                          <select  name="regiones" id="Regiones" class="form-control" required>
                              <option value="" disabled selected>Seleccione una opción</option>
                              <option value="1">Antioquia</option>
                              <option value="3">Caldas</option>
                              <option value="4">Huila</option>
                              <option value="2">Risaralda</option>
                              <option value="5">Tolima</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="Cto1">Vocalización</label>
                          <input type="number" class="form-control" required name="Cto1" id="Cto1" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="Cto2">Puesta en escena</label>
                          <input type="number" class="form-control" required name="Cto2" id="Cto2" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="Cto3">Ritmo, entonacion y medida</label>
                          <input type="number" class="form-control" required name="Cto3" id="Cto3" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>

                      <div class="form-group">
                          <label for="Cto4">Calidad interpretativa</label>
                          <input type="number" class="form-control" required name="Cto4" id="Cto4" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" min="0" max="10">
                      </div>
                
                      <button type="submit" class="btn"><i class="fas fa-sign-in-alt" style="text-align: right;"></i>Aceptar</button>
                      
                      </form>
					</div>
					<p class="text-white">* El separador decimal acepta puntos(.)</p>
					<p class="text-white">* Tenga cuidado ya que solo se puede calificar una vez</p>
					<?php 
                      if(isset($_SESSION['registrado'])){
                        echo '<p class="text-white mt-3">'.$_SESSION['registrado'].'</p>'; 
                        unset($_SESSION['registrado']);
                      }
                    ?>
                    <div class="dropdown show">
                      <a class="btn btn-secondary dropdown-toggle mb-3" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#f37717">
                        Reportes completos
                      </a>

                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="conCto.php" target="_blank">Canto</a>
                        <a class="dropdown-item" href="ConC.php" target="_blank">Cuenteria</a>
                        <a class="dropdown-item" href="conDF.php" target="_blank">Danza Folclórica</a>
                        <a class="dropdown-item" href="conDM.php" target="_blank">Danza Popular</a>
                        <a class="dropdown-item" href="conT.php" target="_blank">Teatro</a>
                      </div>
                    </div>
                    
					<a href="result.php" target="_blank">Consultar resultados</a>
				</div>
			</div>
		</div>
	</div>

</body>
</html>