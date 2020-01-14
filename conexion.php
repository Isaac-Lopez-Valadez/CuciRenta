<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=cucirenta', 'CuciRenta', 'cucirenta123');
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>