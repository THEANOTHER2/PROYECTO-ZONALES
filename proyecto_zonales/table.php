<?php

$con = new PDO('mysql:host=localhost;dbname=zonales1;charset=utf8','root','');

$cat = array('canto','cuenteria','danza_folclórica','	danza_moderna','teatro');
$catV = array('Canto','Cuenteria','Danza folclórica','Danza moderna','Teatro');

//$queryCto = $con->query("SELECT regional.nombre ,total FROM canto,regional WHERE regional.id_regional=canto.id_regional");
//$queryC = $con->query("SELECT regional.nombre ,total FROM cuenteria,regional WHERE regional.id_regional=cuenteria.id_regional");
//$queryDF = $con->query("SELECT regional.nombre ,total FROM danza_folclórica,regional WHERE regional.id_regional=danza_folclórica.id_regional");
//$queryDM = $con->query("SELECT regional.nombre ,total FROM danza_moderna,regional WHERE regional.id_regional=danza_moderna.id_regional");
//$queryT = $con->query("SELECT regional.nombre ,total FROM teatro,regional WHERE regional.id_regional=teatro.id_regional");


//while($row = $queryCto->fetchObject()){
//      $canto[]=$row;
//}while($row = $queryC->fetchObject()){
//      $cuenteria[]=$row;
//}while($row = $queryDF->fetchObject()){
//      $danzaF[]=$row;
//}while($row = $queryDM->fetchObject()){
//      $danzaM[]=$row;
//}while($row = $queryT->fetchObject()){
//      $teatro[]=$row;
//}


//var_dump($res1);
//echo $res1[1]->id_regional;
//echo $query1->rowCount();



//echo $x;

//var_dump($resultSet);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Resultados</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    
    <script src="js/jquery-3.3.1.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>
<body>
	<div class="table-responsive" id="contenedor">
	<table  class="table table-bordered cel" id="table">
  <thead>
    <tr>
      <th scope="col">Categoría</th>
      <th scope="col" style="text-align: center;">Región</th>
      <th scope="col">Resultado</th>
    </tr>
  </thead>
  <tbody>
    <?php
      
      for($y=0; $y<5; $y++){
        
        $queryCto = $con->query("SELECT regional.nombre ,total FROM ".$cat[$y].",regional WHERE regional.id_regional=".$cat[$y].".id_regional");
        
        while($row = $queryCto->fetchObject()){
          $res{$y}[]=$row;
        }
        
        if(isset($res{$y})){
          $query1 = $con->query("SELECT id_regional FROM ".$cat[$y]." WHERE 1 GROUP BY id_regional");
          $numRows = $query1->rowCount();
          while($row = $query1->fetchObject()){
            $result{$y}[]=$row;
          }

          for($x =0;$x<$numRows;$x++){
            $numNotas = $con->query("SELECT * FROM ".$cat[$y]." WHERE id_regional=".$result{$y}[$x]->id_regional)->rowCount();
            ${$x} = $con->query("SELECT regional.nombre ,SUM(total)/".$numNotas." AS 'total' FROM ".$cat[$y].",regional WHERE regional.id_regional=".$cat[$y].".id_regional AND ".$cat[$y].".id_regional=".$result{$y}[$x]->id_regional." GROUP BY regional.nombre");

            if($row = ${$x}->fetchObject()){
                $resU=$row;
            }

            if($x==0){
             echo '<tr><td rowspan='.$numRows.' class="align-middle">'.$catV[$y].'</td><td>'.$resU->nombre.'</td><td>'.round($resU->total,2).'</td></tr>';
            }else{
              echo '<tr><td>'.$resU->nombre.'</td><td>'.round($resU->total,2).'</td></tr>';

            }
          }
        }else{
          echo '<tr><td class="text-center" colspan="3">No hay registros de '.$cat[$y].'</td></tr>';
        }
      }
    
//      if(isset($canto)){
//        $query1 = $con->query("SELECT id_regional FROM canto WHERE 1 GROUP BY id_regional");
//        $numRows = $query1->rowCount();
//        while($row = $query1->fetchObject()){
//          $res1[]=$row;
//        }
//        
//        for($x =0;$x<$numRows;$x++){
//          $numNotas = $con->query("SELECT * FROM `canto` WHERE id_regional=".$res1[$x]->id_regional)->rowCount();
//          ${$x} = $con->query("SELECT regional.nombre ,SUM(total)/".$numNotas." AS 'total' FROM canto,regional WHERE regional.id_regional=canto.id_regional AND canto.id_regional=".$res1[$x]->id_regional." GROUP BY regional.nombre");
//
//          if($row = ${$x}->fetchObject()){
//              $result=$row;
//          }
//          
//          if($x==0){
//           echo '<tr><td rowspan='.$numRows.' class="align-middle">Canto</td><td>'.$result->nombre.'</td><td>'.round($result->total,2).'</td></tr>';
//          }else{
//            echo '<tr><td>'.$result->nombre.'</td><td>'.round($result->total,2).'</td></tr>';
//            
//          }
//        }
//      }else{
//        echo '<tr><td class="text-center" colspan="3">No hay registros de canto</td></tr>';
//      }
//    
//      if(isset($cuenteria)){
//        $query1 = $con->query("SELECT id_regional FROM cuenteria WHERE 1 GROUP BY id_regional");
//        $numRows = $query1->rowCount();
//        while($row = $query1->fetchObject()){
//          $res2[]=$row;
//        }
//        
//        for($x =0;$x<$numRows;$x++){
//          $numNotas = $con->query("SELECT * FROM `cuenteria` WHERE id_regional=".$res2[$x]->id_regional)->rowCount();
//          ${$x} = $con->query("SELECT regional.nombre ,SUM(total)/".$numNotas." AS 'total' FROM cuenteria,regional WHERE regional.id_regional=cuenteria.id_regional AND cuenteria.id_regional=".$res2[$x]->id_regional." GROUP BY regional.nombre");
//
//          if($row = ${$x}->fetchObject()){
//              $result=$row;
//          }
//          
//          if($x==0){     
//           echo '<tr><td rowspan='.$numRows.' class="align-middle">Cuenteria</td><td>'.$result->nombre.'</td><td>'.round($result->total,2).'</td></tr>';
//          }else{
//            echo '<tr><td>'.$result->nombre.'</td><td>'.round($result->total,2).'</td></tr>';
//            
//          }
//        }
//      }else{
//        echo '<tr><td class="text-center" colspan="3">No hay registros de cuenteria</td></tr>';
//      }
//    
//      if(isset($danzaF)){
//        $query1 = $con->query("SELECT id_regional FROM danza_folclórica WHERE 1 GROUP BY id_regional");
//        $numRows = $query1->rowCount();
//        while($row = $query1->fetchObject()){
//          $res3[]=$row;
//        }
//        
//        for($x =0;$x<$numRows;$x++){
//          $numNotas = $con->query("SELECT * FROM `danza_folclórica` WHERE id_regional=".$res3[$x]->id_regional)->rowCount();
//          ${$x} = $con->query("SELECT regional.nombre ,SUM(total)/".$numNotas." AS 'total' FROM danza_folclórica,regional WHERE regional.id_regional=danza_folclórica.id_regional AND danza_folclórica.id_regional=".$res3[$x]->id_regional." GROUP BY regional.nombre");
//
//          if($row = ${$x}->fetchObject()){
//              $result=$row;
//          }
//          
//          if($x==0){   
//           echo '<tr><td rowspan='.$numRows.' class="align-middle">Danza folclórica</td><td>'.$result->nombre.'</td><td>'.round($result->total,2).'</td></tr>';
//          }else{
//            echo '<tr><td>'.$result->nombre.'</td><td>'.round($result->total,2).'</td></tr>';
//            
//          }
//          
//        //  var_dump($result);
//        //  echo "<br>";
//        }
//      }else{
//        echo '<tr><td class="text-center" colspan="3">No hay registros de danza folclórica</td></tr>';
//      }
//    
//      if(isset($danzaM)){
//        
//        $query1 = $con->query("SELECT id_regional FROM danza_moderna WHERE 1 GROUP BY id_regional");
//        $numRows = $query1->rowCount();
//        while($row = $query1->fetchObject()){
//          $res4[]=$row;
//        }
////        var_dump($res4);
//        
//        for($x =0;$x<$numRows;$x++){
//          $numNotas = $con->query("SELECT * FROM `danza_moderna` WHERE id_regional=".$res4[$x]->id_regional)->rowCount();
//          ${$x} = $con->query("SELECT regional.nombre ,SUM(total)/".$numNotas." AS 'total' FROM danza_moderna,regional WHERE regional.id_regional=danza_moderna.id_regional AND danza_moderna.id_regional=".$res4[$x]->id_regional." GROUP BY regional.nombre");
//
//          if($row = ${$x}->fetchObject()){
//              $result=$row;
//          }
//          
//          if($x==0){     
//           echo '<tr><td rowspan='.$numRows.' class="align-middle">Danza Moderna</td><td>'.$result->nombre.'</td><td>'.round($result->total,2).'</td></tr>';
//          }else{
//            echo '<tr><td>'.$result->nombre.'</td><td>'.round($result->total,2).'</td></tr>';
//            
//          }
//        }
//      }else{
//        echo '<tr><td class="text-center" colspan="3">No hay registros de danza moderna</td></tr>';
//      }
//    
//      if(isset($teatro)){
//        $query1 = $con->query("SELECT id_regional FROM danza_moderna WHERE 1 GROUP BY id_regional");
//        $numRows = $query1->rowCount();
//        while($row = $query1->fetchObject()){
//          $res5[]=$row;
//        }
//        
//        for($x =0;$x<$numRows;$x++){
//          $numNotas = $con->query("SELECT * FROM `danza_moderna` WHERE id_regional=".$res5[$x]->id_regional)->rowCount();
//          ${$x} = $con->query("SELECT regional.nombre ,SUM(total)/".$numNotas." AS 'total' FROM danza_moderna,regional WHERE regional.id_regional=danza_moderna.id_regional AND danza_moderna.id_regional=".$res5[$x]->id_regional." GROUP BY regional.nombre");
//
//          if($row = ${$x}->fetchObject()){
//              $result=$row;
//          }
//          
//          if($x==0){     
//           echo '<tr><td rowspan='.$numRows.' class="align-middle">Teatro</td><td>'.$result->nombre.'</td><td>'.round($result->total,2).'</td></tr>';
//          }else{
//            echo '<tr><td>'.$result->nombre.'</td><td>'.round($result->total,2).'</td></tr>';
//            
//          }
//        }
//      }else{
//        echo '<tr><td class="text-center" colspan="3">No hay registros de teatro</td></tr>';
//      }
    
    ?>
  </tbody>
</table>
</div>
</body>
</html>