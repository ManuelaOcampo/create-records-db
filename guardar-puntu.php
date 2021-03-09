<?php
    $clientes= $_REQUEST["clientes"];
    $domicilios= $_REQUEST["domicilios"];
    $comidas= $_REQUEST["comidas"];
    $puntuacion= $_REQUEST["puntuacion"];

    //1. Connect to database

    $host="localhost";
    $dbname="shipdog_db_2021";
    $username="root";
    $password="";

    $cnx= new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    
 //2. Construir la sentencia SQL

    $sql="INSERT INTO relacion (id_Relacion,id_Cliente,id_Domi,id_Comida,puntuacion) VALUES(NULL,'$clientes','$domicilios','$comidas','$puntuacion')";

    //3. Preparar la sentencia SQL

    $q=$cnx->prepare($sql);

    //4.Ejecutar sentencia SQL

    $result=$q->execute();

    if($result){
        
        echo '<script language="javascript">alert("Puntuación ingresada exitosamente");</script>';
    }
    else{
        echo"Hubo un error Creando la puntuacion";
    }

    

?>
<?php
  

  
//2. Construir la sentencia SQL
   $sql="SELECT id_Cliente,Nombre FROM clientes";
//3. Preparar la sentencia SQL
  $q=$cnx->prepare($sql);
//4.Ejecutar sentencia SQL
  $result=$q->execute();
  $clientes=$q->fetchAll();

      
//2. Construir la sentencia SQL
$sql="SELECT id_Domi,Lugar FROM domicilios";
//3. Preparar la sentencia SQL
   $q=$cnx->prepare($sql);
//4.Ejecutar sentencia SQL
   $result=$q->execute();
   $domicilios=$q->fetchAll();

    //2. Construir la sentencia SQL
$sql="SELECT id_Comida,Nombre_Producto FROM comidas";
//3. Preparar la sentencia SQL
   $q=$cnx->prepare($sql);
//4.Ejecutar sentencia SQL
   $result=$q->execute();
   $comidas=$q->fetchAll();

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">



  <link rel="stylesheet" href="Css/Food.css" type="text/css">
  <title>SHIPDOG</title>
</head>
<body>
  <header>
       
      <img src="img\Logo.jpg" alt="Logo" width="200" height="200">
      <h1>
          SHIPDOG
       </h1>
       <a href="index.html">
          <button>Principal</button>
           </a> 
          
      
  </header>
  <main>
 <h2> <form action="guardar-puntu.php" method="POST">
      Cliente 
      <select name="clientes" id="">
<?php
      for($i=0; $i<count($clientes);$i++){
          ?>
          <option value="<?php echo $clientes[$i]["id_Cliente"] ?>">
          <?php echo $clientes[$i]["Nombre"] ?>
          </option>
<?php
      }

      
?>
      </select>
      <br/><br/>
   
      Domicilio 
      <select name="domicilios" id="">
<?php
      for($i=0; $i<count($domicilios);$i++){
          ?>
          <option value="<?php echo $domicilios[$i]["id_Domi"] ?>">
          <?php echo $domicilios[$i]["Lugar"] ?>
          </option>
<?php
      }

      
?>
  </select>
  <br/><br/>

  Comida 
      <select name="comidas" id="">
<?php
      for($i=0; $i<count($comidas);$i++){
          ?>
          <option value="<?php echo $comidas[$i]["id_Comida"] ?>">
          <?php echo $comidas[$i]["Nombre_Producto"] ?>
          </option>
<?php
      }

      
?>
      </select>
      <br/><br/>
      
      Puntuacion
      <select name="puntuacion">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      </select>
      <br/><br/>
      
      <input type="submit" value="Realizar puntuacion">
  </form>
     
        
  </main>
  <br/>
  <footer>
      <span class="name" > Manuela Ocampo Giraldo
        <br>
      mocampo77109@umanizales.edu.co 
      <br>
      Codigo: 82201724162
    </span>
    </footer>
</body>
</html>
