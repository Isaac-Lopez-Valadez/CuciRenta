<?php 

require_once '../conexion.php';

$casa = $_GET['casa'];
$comenta=$pdo->prepare("select email,comentario,fecha from comentarios, usuario where idCasa=:casa and idUsuarios=idU ORDER BY fecha DESC");
$comenta->bindParam(':casa',$casa,PDO::PARAM_INT);
$comenta->execute();
$comentarios=$comenta->fetchAll();

foreach($comentarios as $mensaje): ?>
            <div id="mensaje">
            <b><?php echo $mensaje['email']?></b>
            <p><?php echo $mensaje['comentario']?></p>
            <p align="right"><?php echo $mensaje['fecha']?></p>
            </div>
<?php endforeach;?>