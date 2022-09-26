<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=bd', "root", "");

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
try 
{    
    $statement=$mbd->prepare("INSERT INTO tabla2 (id, id_fk, apellido, nombre, fecha, estado, abierto, saldo, email) VALUES (:id, :id_fk, :apellido, :nombre, :fecha, :estado, :abierto, :saldo, :email)");

   
    $statement->bindParam(':id', $id);
    $statement->bindParam(':fk', $id_fk);
    $statement->bindParam(':apellido', $apellido);
    $statement->bindParam(':nombre', $nombre);
    $statement->bindParam(':fecha', $fecha);
    $statement->bindParam(':estado', $estado);
    $statement->bindParam(':abierto', $abierto);
    $statement->bindParam(':saldo', $saldo);
    $statement->bindParam(':emai', $email);    

    $id = $_POST['id'];
   
    $id_fk = $_POST['$id_fk'];
    $apellidon = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $fecha = $_POST['fecha'];
    $abierto = $_POST['abierto'];
    $email = $_POST['email'];

    $statement->execute();
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode([
        
        'Datos' =>$_POST
    ]);

} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode([
        'error' => [
            'codigo' =>$e->getCode() ,
            'mensaje' => $e->getMessage()
        ]
    ]);
}


?>