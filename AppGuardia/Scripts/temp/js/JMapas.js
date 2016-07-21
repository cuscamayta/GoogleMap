
//VARIABLES GENERALES
//declaras fuera del ready de jquery
var nuevos_marcadores = [];
var marcadores_bd = [];
var mapa = null; //VARIABLE GENERAL PARA EL MAPA
//FUNCION PARA QUITAR MARCADORES DE MAPA
function limpiar_marcadores(lista)
{
    for (i in lista)
    {
        //QUITAR MARCADOR DEL MAPA
        lista[i].setMap(null);
    }
}
$(document).on("ready", function () {

    //VARIABLE DE FORMULARIO
    var formulario = $("#formulario");

    var punto = new google.maps.LatLng(-17.8899678, -63.3307637,15);
    var config = {
        zoom: 11,
        center: punto,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    
    
    mapa = new google.maps.Map($("#mapa")[0], config);

    google.maps.event.addListener(mapa, "click", function (event) {
        var coordenadas = event.latLng.toString();

        coordenadas = coordenadas.replace("(", "");
        coordenadas = coordenadas.replace(")", "");

        var lista = coordenadas.split(",");

        var direccion = new google.maps.LatLng(lista[0], lista[1]);
        //PASAR LA INFORMACI�N AL FORMULARIO
        formulario.find("input[name='titulo']").focus();
        formulario.find("input[name='cx']").val(lista[0]);
        formulario.find("input[name='cy']").val(lista[1]);


        var marcador = new google.maps.Marker({
            //titulo:prompt("Titulo del marcador?"),
            position: direccion,
            map: mapa,
            animation: google.maps.Animation.DROP,
            draggable: false
        });
        //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
        nuevos_marcadores.push(marcador);

        google.maps.event.addListener(marcador, "click", function () {

        });

        //BORRAR MARCADORES NUEVOS
        limpiar_marcadores(nuevos_marcadores);
        marcador.setMap(mapa);
    });
    $("#btn_grabar").on("click", function () {
        //INSTANCIAR EL FORMULARIO
        var f = $("#formulario");

        //VALIDAR CAMPO TITULO
        if (f.find("input[name='titulo']").val().trim() == "")
        {
            alert("Falta t�tulo");
            return false;
        }
        //VALIDAR CAMPO CX
        if (f.find("input[name='cx']").val().trim() == "")
        {
            alert("Falta Coordenada X");
            return false;
        }
        //VALIDAR CAMPO CY
        if (f.find("input[name='cy']").val().trim() == "")
        {
            alert("Falta Coordenada Y");
            return false;
        }
        //FIN VALIDACIONES

        if (f.hasClass("busy"))
        {
            //Cuando se haga clic en el boton grabar
            //se le marcar� con una clase 'busy' indicando
            //que ya se ha presionado, y no permitir que se
            //realiCe la misma operaci�n hasta que esta termine
            //SI TIENE LA CLASE BUSY, YA NO HARA NADA
            return false;
        }
        //SI NO TIENE LA CLASE BUSY, SE LA PONDREMOS AHORA
        f.addClass("busy");
        //Y CUANDO QUITAR LA CLASE BUSY?
        //CUANDO SE TERMINE DE PROCESAR ESTA SOLICITUD
        //ES DECIR EN EL EVENTO COMPLETE

        var loader_grabar = $("#loader_grabar");
        $.ajax({
            type: "POST",
            url: "php/iajax.php",
            dataType: "JSON",
            data: f.serialize() + "&tipo=grabar",
            success: function (data) {
                if (data.estado == "ok")
                {
                    loader_grabar.removeClass("label-warning").addClass("label-success")
                            .text("Grabado OK").delay(4000).slideUp();
                    listar();
                }
                else
                {
                    alert(data.mensaje);
                }


            },
            beforeSend: function () {
                //Notificar al usuario mientras que se procesa su solicitud
                loader_grabar.removeClass("label-success").addClass("label label-warning")
                        .text("Procesando...").slideDown();
            },
            complete: function () {
                //QUITAR LA CLASE BUSY
                f.removeClass("busy");
                f[0].reset();
                //[0] jquery trabaja con array de elementos javascript no
                //asi que se debe especificar cual elemento se har� reset
                //capricho de javascript
                //AHORA PERMITIR� OTRA VEZ QUE SE REALICE LA ACCION
                //Notificar que se ha terminado de procesar

            }
        });
        return false;
    });
    
    
    
    
    //BORRAR
    $("#btn_borrar").on("click", function () {
        //CONFIRMAR ACCION DEL USUARIO
        if (confirm("Está seguro?") == false)
        {
            //NO HARA NADA
            return;
        }
        var formulario_edicion = $("#formulario_edicion");
        $.ajax({
            type: "POST",
            url: "iajax.php",
            data: formulario_edicion.serialize() + "&tipo=borrar",
            dataType: "JSON",
            success: function (data) {
                //SABER CUANDO SE BORRÓ CORRECTAMENTE
                if (data.estado == "ok")
                {
                    //MOSTRAR EL MENSAJE
                    alert(data.mensaje);
                    //BORRAR MARCADORES NUEVOS EN CASO DE QUE HUBIESEN
                    limpiar_marcadores(nuevos_marcadores);
                    //LIMPIAR EL FORMULARIO
                    formulario_edicion[0].reset();
                    //LISTAR OTRA VEZ LOS MARCADORES
                    listar();
                }
                else
                {
                    //ERROR AL BORRAR
                    alert(data.mensaje);
                }

            },
            beforeSend: function () {

            },
            complete: function () {

            }
        });
    });

    //CARGAR PUNTOS AL TERMINAR DE CARGAR LA P�GINA
    listar();//FUNCIONA, AHORA A GRAFICAR LOS PUNTOS EN EL MAPA
});







//FUERA DE READY DE JQUERY
//FUNCTION PARA RECUPERAR PUNTOS DE LA BD
function listar()
{
    //ANTES DE LISTAR MARCADORES
    //SE DEBEN QUITAR LOS ANTERIORES DEL MAPA
    limpiar_marcadores(marcadores_bd);
    var formulario_edicion = $("#formulario_edicion");
    $.ajax({
        type: "POST",
        url: "iajax.php",
        dataType: "JSON",
        data: "&tipo=listar",
        success: function (data) {
            if (data.estado == "ok")
            {
                //alert("Hay puntos en la BD");
                $.each(data.mensaje, function (i, item) {
                    //OBTENER LAS COORDENADAS DEL PUNTO
                    var posi = new google.maps.LatLng(item.cx, item.cy);//bien
                    //CARGAR LAS PROPIEDADES AL MARCADOR
                    var marca = new google.maps.Marker({
                        idMarcador: item.IdPunto,
                        position: posi,
                        titulo: item.Titulo,
                        cx: item.cx, //esas coordenadas vienen de la BD
                        cy: item.cy//esas coordenadas vienen de la BD
                    });
                    //AGREGAR EVENTO CLICK AL MARCADOR
                    //MARCADORES QUE VIENEN DE LA BASE DE DATOS
                    google.maps.event.addListener(marca, "click", function () {
                        //ENTRAR EN EL SEGUNDO COLAPSIBLE
                        //Y OCULTAR EL PRIMERO
                        $("#collapseTwo").collapse("show");
                        $("#collapseOne").collapse("hide");
                        //VER DOCUMENTACIÓN DE BOOTSTRAP :)

                        //AHORA PASAR LA INFORMACIÓN DEL MARCADOR
                        //AL FORMUALARIO
                        formulario_edicion.find("input[name='id']").val(marca.idMarcador);
                        formulario_edicion.find("input[name='titulo']").val(marca.titulo).focus();
                        formulario_edicion.find("input[name='cx']").val(marca.cx);
                        formulario_edicion.find("input[name='cy']").val(marca.cy);

                    });
                    //AGREGAR EL MARCADOR A LA VARIABLE MARCADORES_BD
                    marcadores_bd.push(marca);
                    //UBICAR EL MARCADOR EN EL MAPA
                    marca.setMap(mapa);
                });
            }
            else
            {
                alert("NO hay puntos en la BD");
            }
        },
        beforeSend: function () {

        },
        complete: function () {

        }
    });
}
//PLANTILLA AJAX


