$(document).ready(function () {

    var base_url = "http://localhost:8080/TurisMaule/";

    $("#bt_login").click(function (e) {
        e.preventDefault();
        var username = $("#user_login").val();
        var password = $("#password_login").val();
        //ENVIO DE DATOS
        $.ajax({
            url: base_url + 'login2',
            type: 'post',
            dataType: 'json',
            data: {username: username, password: password},
            success: function (o) {
                if (o.msg === "0") {
                    Materialize.toast("Usuario y/o contrasena incorrectos", "4000");
                } else if (o.msg === "Activo") {
                    window.location.href = base_url + "administrador";
                } else {
                    Materialize.toast("El usuario se encuentra Bloqueado", "4000");
                }


            },
            error: function () {
                Materialize.toast("Error 500", "4000");
            }

        });


    });
    
    //ELEMENTOS QUE CARGAN EL CONTENIDO EN LA PAGINA MAIN AL PINCHAR SOBRE LOS ITEMS DEL MENU
    
        $("#item_punto").on("click", function(e){
        e.preventDefault();
        $("main").load(base_url+"vista_puntos");
        $("a").removeClass("active-page");
        $("#item_punto").addClass("active-page");
    });


});

