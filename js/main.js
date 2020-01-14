let nav = document.getElementById('nav');
let menu = document.getElementById('enlaces');
let abrir = document.getElementById('open');
let botones = document.getElementsByClassName('btn-header');
let imagen = document.getElementById('cambios');
let imagenes = document.getElementById('imagenes');
let a = document.querySelector('a');
let cerrado = true;

function menus() {
    let desplazamiento = window.pageYOffset;

    if (desplazamiento <= 380) {
        abrir.style.display = 'none';
      
    } else {
        abrir.style.display = 'flex';
        
    }

}
/*
function apertura() {
    
    if (cerrado) {
        menu.style.width = '25vw';
        cerrado = false;
    } else {
        menu.style.width = '0%';
        menu.style.overflow = 'hidden';
        cerrado = true;

    }
}*/
/*
window.addEventListener('load', function () {
    menus();
});
window.addEventListener('scroll', function () {
    console.log(window.pageYOffset);
    menus();
});
abrir.addEventListener('click', function () {
    apertura();
});*/
//eso es para Base.php
function img(imag) {
    imagen.src = imag;
}

function imgP(imag) {
    imagen.src = imag;
}

 imagenes.addEventListener('click', function(e){
    var arreglo = e.target.src;
    var nuevo=galeria();
    var cont=0;
    var ligthbox ='<div class="ligthbox">'+
                  '<div class="btn-mover-atras"><</div>'+
                  '<img id="carrusel" src="'+nuevo[cont].ruta+'" alt="">'+
                  '<div class="btn-mover-adelante">></div>'+
                  '<div class="btn-cerrar">X</div>'+
                  '</div>';
                
    $("body").append(ligthbox);
    $(".btn-mover-atras").click(function(){
        cont--;
        if(cont<0)
            cont=nuevo.length-1;
        var foto=document.getElementById('carrusel');
        foto.src=nuevo[cont].ruta;
    });
    $(".btn-mover-adelante").click(function(){
        cont++;
        if(cont>nuevo.length-1)
            cont=0;
        var foto=document.getElementById('carrusel');
        foto.src=nuevo[cont].ruta;
    });
    $(".btn-cerrar").click(function(){
        $(".ligthbox").remove();
    });
    });
    function agregarComent(casa,usuario,coment,fecha){
        cadena="casa="+casa+
                "&usuario="+usuario+
                "&coment="+coment+
                "&fecha="+fecha;
        $.ajax({
            type:"POST",
            url:"php/agregar.php",
            data:cadena,
            success:function(r){
                if(r==1){
                    $("#datos").load("php/mensajes.php?casa="+casa);
                    $('#comentario').val("");
                }else{
                    alert("Error en la base de datos");
                }
            }
        });        
    } 