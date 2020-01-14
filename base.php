<?php
include_once 'conexion.php';
require_once('vendor/autoload.php');
require_once('app/clases/google_auth.php');
require_once('app/init.php');
$googleClient = new Google_Client();
$auth = new GoogleAuth($googleClient);

$valor = $_GET['casa'];
$sql ='select * from fotos where :valor = idC';
$sentencia_foto=$pdo->prepare($sql);
$sentencia_foto->bindParam(':valor',$valor,PDO::PARAM_INT);
$sentencia_foto->execute();
$resultado_fotos=$sentencia_foto->fetchAll();
$sql2 ='select * from casa where :valor2 = idC';
$sentencia_foto2=$pdo->prepare($sql2);
$sentencia_foto2->bindParam(':valor2',$valor,PDO::PARAM_INT);
$sentencia_foto2->execute();
$resultado_fotos2=$sentencia_foto2->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Base para todos los datos</title>
    <link rel="stylesheet" href="css/Estilo.css">
</head>

<body id="base1">
    <header class="header-base">
        <nav id="nav" class="nav1">
            <div class="contenedor-nav">
                <div class="logo">
                    <img src="Imagenes/udg-icono.png">
                </div>
                <div class="textos2">
                    <h1>Cuci Renta</h1>

                </div>
                <div class="enlaces-base" id="enlaces">
                    <a href="Inicio.php" id="enlace-inicio" class="btn-header">Inicio</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container2">
            <div id="general-fotos">

                <?php $galeria=json_encode($resultado_fotos); $i=0; foreach($resultado_fotos as $datos):?>
                <?php if($i<=4):?>
                <div id="fotos" onmouseover="img('<?php echo $datos['ruta']?>')"
                    onmouseout="imgP('<?php echo $resultado_fotos2[0]['foto_primary']?>')">
                    <img class="imagenes" src="<?php echo $datos['ruta']?>" class="card-img" alt="...">
                    <?php if($i==4):?>
                    <p id="imagenes" style="cursor:pointer;">+<?php echo abs($i-5);?></p>
                    <script>
                        function galeria() {
                            var galeria = eval( <?php echo $galeria ?> );
                            return galeria;
                            
                        }
                    </script>
                    <?php endif?>
                    <?php $i++;?>
                </div>
                <?php else: break;?>
                <?php endif; ?>
                <?php endforeach;?>
            </div>
            <div id="contenedor-img">
                <img id="cambios" src="<?php echo $resultado_fotos2[0]['foto_primary']?>" alt="...">
            </div>
            <div id="descripcion">
                <h2><?php echo $resultado_fotos2[0]['domicilio']?></h2>
                <p>Telefono: <?php echo $resultado_fotos2[0]['telefono']?></p>
                <p>Dueño: <?php echo $resultado_fotos2[0]['nomb_propietario']?></p>
                <p>Colonia: <?php echo $resultado_fotos2[0]['colonia']?></p>
                <p>Codigo Postal: <?php echo $resultado_fotos2[0]['codigo_postal']?></p>
                <p>Cuartos: <?php echo $resultado_fotos2[0]['cuartos']?></p>
                <p>Baños:<?php echo $resultado_fotos2[0]['baños']?></p>
                <h3>Descripcion:</h3>
                <text>
                    <?php echo $resultado_fotos2[0]['descripcion']?>
                </text>
                <div id="maps">
                    <?php echo $resultado_fotos2[0]['maps']?>
                </div>
            </div>
        </div>
        
        <h3 aling="center">Para escribir un comentario es necesario Iniciar sesión</h3>
        
        <?php if(!$auth->isLoggedIn()):?>
        <div class="comentarios">
            <div id="datos">
            
            </div>
        </div>
        <?php else:
        $email=$_SESSION['usuario'];
        $prueba=$pdo->prepare("select * from usuario where email=:email");
        $prueba->bindParam(':email',$email,PDO::PARAM_STR);
        $prueba->execute();
        $r=$prueba->fetchAll();
        ?>
        
        <div class="comentarios">
            <div id="escribe">
                <textarea name="comentario" id="comentario" rows="4" cols="155" wrap="soft" placeholder="Máximo 1000 carácteres"
                    maxlength="1000" required></textarea>
                <input id="btn-enviar" type="submit" value="Enviar" name="Enviar" />
            </div>
            <div id="datos">
            
            </div>
        </div>
        <?php endif?>
    </main>
</body>

<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" >
$(document).ready(function() {
    var casa=<?php echo $_GET['casa'];?>;
    $("#datos").load("php/mensajes.php?casa="+casa);
});
</script>
<script type="text/javascript" >
    $(document).ready(function() {
        $('#btn-enviar').click(function() {
            idCasa= eval(<?php echo $resultado_fotos2[0]['idC'];?>);
            idUsuario= eval(<?php echo $r[0]['idU'];?>);
            comentario=$('#comentario').val();
            fecha=new Date();
            f=fecha.getFullYear()+"-"+(fecha.getMonth()+1)+"-"+fecha.getDate();
            //console.log(idCasa+" "+idUsuario+" "+comentario+" "+f);
            agregarComent(idCasa,idUsuario,comentario,f);
            
        });
    });
</script>
</html>