<?php
    $N_Contacto= $_REQUEST["N_Contacto"];
    $Lugar = $_REQUEST["Lugar"];
    $TiempoEstimado = $_REQUEST["TiempoEstimado"];
    $Pedido = $_REQUEST["Pedido"];


    //1. Connect to database

    $host="localhost";
    $dbname="shipdog_db_2021";
    $username="root";
    $password="";

    $cnx= new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    
 //2. Construir la sentencia SQL

    $sql="INSERT INTO domicilios (id_Domi,N_Contacto,Lugar,TiempoEstimado,Pedido) VALUES(NULL,'$N_Contacto','$Lugar','$TiempoEstimado','$Pedido')";

    //3. Preparar la sentencia SQL

    $q=$cnx->prepare($sql);

    //4.Ejecutar sentencia SQL

    $result=$q->execute();

    if($result){
        
        echo '<script language="javascript">alert("Pedido exitoso");</script>';
    }
    else{
        echo"Hubo un error Al pedir el domicilio";
    }

    

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
         <a href="puntuacion.php">
          <button>Puntuación</button>
           </a> 

          
           <a href="index.html">
            <button style="top: 100px; right: 80px;">Principal</button>
             </a> 
            
        
    </header>
    <main>
    <form action="guardar-domicilio.php" method="POST">
           <h2> N Contacto <input type="text" name="N_Contacto"></h2><br/>
            <h2>Lugar <input type="text" name="Lugar"></h2><br/>
    
           <h2> Tiempo Estimado <input type="text" name="TiempoEstimado"></h2>
            
            <h2> Pedido <input type="text" name="Pedido"></h2>
            
         
            <input type="submit"  value="Hacer pedido" style="font-size: 34px; position: relative;
             left: 580px;">
          
           
      
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