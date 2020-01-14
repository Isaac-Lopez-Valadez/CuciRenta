$(function () {
    let equipo = $('#equipo').offset().top,
        sobre = $('#sobre').offset().top,
        contacto = $('#contacto').offset().top;
    window.addEventListener('resize',function(){
        let equipo = $('#equipo').offset().top,
        sobre = $('#sobre').offset().top,
        contacto = $('#contacto').offset().top;
    });

    $('#enlace-inicio').on('click',function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop:0
        },600);
    });
    $('#enlace-equipo').on('click',function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop: equipo
        },600);
    });
    $('#enlace-sobre').on('click',function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop:sobre
        },600);
    });
    $('#enlace-contacto').on('click',function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop:contacto
        },600);
    });

});