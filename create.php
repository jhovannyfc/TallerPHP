<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=bd', "root", "");

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try 
{    
    $statement=$mbd->prepare("INSERT INTO tabla1 (`id`, `porducto`, `descripción`, `codigo`) VALUES (`:id`, `:porducto`, `:descripción`, `:codigo`)");

    $statement->bindParam(':id', $id);
    $statement->bindParam(':porducto', $porducto);
    $statement->bindParam(':descripción', $descripción);
    $statement->bindParam(':codigo', $codigo);    
    $id = $_POST['id'];
    $porducto = $_POST['porducto'];
    $descripción = $_POST['descripción'];
    $codigo = $_POST['codigo'];

    $statement->execute();
    
      header('Content-type:application/json;charset=utf-8');    
    echo json_encode([
        
        'mensaje' => "Datos insertados correctamente",
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