<?php
//agregamos la conecion del erchivo conexion.php
include_once 'conexion.php';
//una simple sentencia de sql
$sql ='select * from casa';
//creamos la variable sentencia y realizamos el metodo prepare(Prepara una sentencia SQL para su ejecución)
$sentencia = $pdo->prepare($sql);
//aqui ejecutamos sentencia 
$sentencia->execute();
//todo lo que visualizamos lo guardamos en un arreglo 
$resultado=$sentencia->fetchAll();
//valor fijo para la canitdad a mostrar
$arti_pag=4;
//contamos todas las filas de la tabla 
$total_db=$sentencia->rowCount();
//realizamos una divicion para identificar la cantidad de paginas y usarlo en el "nav" Page navigation example 
$paginas=$total_db= $total_db/$arti_pag;
$paginas=ceil($paginas);
//Ingresamos nuestros recursos de Google para el login de gmail
require_once('vendor/autoload.php');
require_once('app/clases/google_auth.php');
require_once('app/init.php');

$googleClient = new Google_Client();
$auth = new GoogleAuth($googleClient);
if($auth->checkRedirectCode()){
    die($_GET['code']);
    header('Location: index.php');
}

?>
<!-- Iniciando la estructura HTML con algunos segmentos de PHP-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inico de Cuci Renta</title>
    <!--aqui traemos el archivo de estilo.css, el sigueinte es para la apliacion de bootstrap, y el ultimo es para utilizar iconos -->
    <link rel="stylesheet" href="css/Estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"
        integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
</head>

<body claas="hidden">
    <?php
    //in if para la incializacion de la direccion o el link con Inicio.php?pagina=1
   if(!$_GET){
        header('Location:Inicio.php?pagina=1');
    }
    //otro if
    if($_GET['pagina']>$paginas || $_GET['pagina']<=0){
        header('Location:Inicio.php?pagina=1');
    }
    $iniciar= ($_GET['pagina']-1)*$arti_pag;

    //en esta parte preparamos sql_articulos con un comando sql y su metodo limit para limitar nuestra informacion de 4 en 4,
    //lo prepramos con prepare para la ejecucion sql 
    $sql_articulos='select * from casa limit :iniciar,:narticulos';
    $sentencia_arti=$pdo->prepare($sql_articulos);
    //utilizamos el metodo binParam para cambiar variables de Entero a String. se le conoce como PlaceHolder 
    $sentencia_arti->bindParam(':iniciar',$iniciar,PDO::PARAM_INT);
    $sentencia_arti->bindParam(':narticulos',$arti_pag,PDO::PARAM_INT);
    //ejecutamos toda nuestra sentencia articulos y obtenemos nuestra informacion con el fetchAll
    $sentencia_arti->execute();
    $resultado_arti=$sentencia_arti->fetchAll();
    ?>
    <!--<div class="centrado" id="onload">
    <div class="lds-facebook"><div></div><div></div><div></div></div>
    </div>-->

    <header>
        <nav id="nav" class="nav1">
            <div class="contenedor-nav">
                <div class="logo">
                    <img src="Imagenes/udg-icono.png">
                </div>
                <div class="enlaces" id="enlaces">
                    <a href="#" id="enlace-inicio" class="btn-header">Inicio</a>
                    <a href="#" id="enlace-equipo" class="btn-header">Casas</a>
                    <a href="#" id="enlace-sobre" class="btn-header">Sobre Nosotros</a>
                    <a href="#" id="enlace-contacto" class="btn-header">Contacto</a>
                    <?php if(!$auth->isLoggedIn()):?>
                    <a href="<?php echo $auth->getAuthUrl(); ?>" id="enlace-contacto" class="btn-header">Iniciar
                        Sesion</a>
                    <?php else: ?>
                    <a href="logout.php" id="enlace-contacto" class="btn-header">Cerrar Sesion</a>
                    <?php endif ?>
                </div>
                <div class="icono" id="open">
                    <span>&#9776;</span>
                </div>
            </div>
        </nav>
        <div class="textos">
            <h1>Cuci Renta</h1>
            <h2>Busca y renta tu cuarto o habitación</h2>
        </div>
    </header>
    <main>
        <Section class="casa contenedor" id="equipo">
            <div class="container my-3">
                <h3> Casas</h3>
                <p class="after">Conoce nuestras casas asombrosas </p>
                <?php foreach($resultado_arti as $datos):?>
                <!--Utilize otra erra mienta de boostrap de modo de carta se ve mas utli y aprovechable -->
                <div class="card mb-3" style="max-width: 850px;">
                    <div class="row no-gutters">
                        <div class="col-md-4" onclick="location.href='base.php?casa=<?php echo $datos['idC']?>'"
                            style="cursor:pointer;">
                            <img src="<?php echo $datos['foto_primary']?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title"
                                    onclick="location.href='base.php?casa=<?php echo $datos['idC']?>'"
                                    style="cursor:pointer;"><?php echo $datos['domicilio']?></h4>
                                <p class="card-text">Colonia: <?php echo $datos['colonia']?></p>
                                <p class="card-text">Dueño: <?php echo $datos['nomb_propietario']?></p>
                                <p class="card-text">Telefono: <?php echo $datos['telefono']?></p>
                                <p class="card-text">Cuartos: <?php echo $datos['cuartos']?></p>
                                <p class="card-text"><small class="text-muted">Descripcion:
                                        <?php echo $datos['descripcion']?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
                <!--Dejamos este nav de boostrap para la lista de paginas-->
                <nav aria-label="Page navigation example">

            </div>
            <ul class="pagination">
                <li class="page-item
            <?php echo $_GET['pagina']<=1 ? 'disabled':''?>">
                    <a class="page-link" href="Inicio.php?pagina=<?php echo $_GET['pagina']-1?>">Anterior</a></li>

                <!--Iniciamos un for con php para identificar las paginas que tenemos por medio
             de una operacion que esta guardada en la variable paginas y tambien agregando el link de 
             Inicio.php?pagina= # numero de pagina -->
                <?php for($i=0; $i<$paginas; $i++):?>
                <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : ''?>"><a class="page-link"
                        href="Inicio.php?pagina=<?php echo $i+1?>"><?php echo $i+1?></a></li>
                <?php endfor?>

                <li class="page-item
            <?php echo $_GET['pagina']>=$paginas ? 'disabled':''?>">
                    <a class="page-link" href="Inicio.php?pagina=<?php echo $_GET['pagina']+1?>">Siguiente</a></li>
            </ul>
            </nav>

        </Section>
        <Section class="about" id="sobre">
            <div class="contenedor">
                <h3>Aprende algo sobre nosotros</h3>
                <p class="after">Hacemos de algo simple algo extraordinario</p>
                <div class="servicios">
                    <div class="caja-servicios">
                        <img src="imagenes/isaac.jpeg" alt="">
                        <h4>Isaac Said Lopez Valadez</h4>
                    </div>
                    <div class="caja-servicios">
                        <h4>Hola Soy Isaac Said Lopez Valadez</h4>
                        <text>
                            Soy un joven estudiante de la carrera Ingeriría en Informática <br />
                            en la universidad de Guadalajara centro universito de la ciénega<br />
                            actualmente estoy cursando el 8vo semestre de la carrea.<br />
                            Realizando mi servicio social y mis proyectos modulares<br />
                            para llevar acabo la titulación. Este proyecto está realizado<br />
                            por mí en los cuales aplico los conocimientos obtenidos durante<br />
                            los 8 semestres, apoyado de investigaciones como: foros,<br />
                            documentaciones, manuales, tutoriales y asesorías de profesores.

                        </text>
                    </div>
                    <div class="caja-servicios">
                        <h4>¿Por qué se realizó este proyecto?</h4>
                        <text >
                            Esta pagina web esta realizada con el fin de ayudar<br/>
                            a los estudiantes foráneos que no tienen conocimiento<br/>
                            del área cercana al centro universitario de la ciénega,<br/>
                            ofreciéndoles información sobre casas, departamentos<br/>
                            o habitaciones disponibles en renta.<br/>
                            Mostrándoles diferentes opciones a escoger con información<br/>
                            obtenida del dueño, mostrando los datos de dicha vivienda<br/>
                            para darles una breve descripción y características necesarias.<br/>
                        </text>
                    </div>
                </div>
            </div>
        </Section>

    </main>

    <footer id="contacto">
        <div class="footer contenedor">
            <div class="marca-logo">
                <img src="Imagenes/udg-icono.png" alt="">
            </div>
            <div class="iconos">
                <i class="fab fa-facebook"></i>
                <i class="fas fa-university"></i>
            </div>
            <h5>Gracias por visitar nuestra página y que disfrutes tu renta</h5>
        </div>
    </footer>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
</body>

</html>