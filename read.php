<?php
try {
    $mbd = new PDO('mysql:host=localhost;dbname=bd', "root", "");
    $sql = "SELECT * FROM tabla1";
    $statement = $mbd->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    header('Content-type:application/json;charset=utf-8');    
    echo json_encode($results);
    } catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>


