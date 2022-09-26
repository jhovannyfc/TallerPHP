<?php
try {
    $mbd = new PDO('mysql:host=localhost;dbname=bd', "root", "");

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
try {    
    
    $statement=$mbd->prepare("DELETE from tabla1 WHERE id = ?");
    $statement->bindParam(1, $_POST['id']);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'mensaje' => "Datos eliminados correctamente",
        'Datos' => $_POST
    ]);

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>