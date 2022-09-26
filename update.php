<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=bd', "root", "");

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try 
{    
    $statement = $mbd->prepare("UPDATE tabla1  SET porducto = ?, descripción = ?, codigo = ? WHERE id = ?  ");
    $statement->bindParam(1, $_POST['id']);
    $statement->bindParam(2, $_POST['porducto']);
    $statement->bindParam(3, $_POST['descripción']);
    $statement->bindParam(4, $_POST['codigo']);

    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];

    $results = $statement->execute([$id, $porducto, $descripción, $codigo]);
    
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode([
        'mensaje' => "Registro actualizado con exito",      
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