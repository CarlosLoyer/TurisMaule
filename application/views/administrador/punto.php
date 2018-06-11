<!-- MODAL CREAR PUNTO -->
<!-- Modal Structure insert-->
<div id="modal_punto" class="modal">
    <div class="modal-content">
        <h3 class="center-align">Nuevo Punto</h3>
        <form method="post">
            <div class='row'>
                <div class='col s6'>
                    <input id='titulo_punto' type="text" placeholder="Titulo" >
                    <input id='descripcion_punto' type="text" placeholder="Descripcion" >
                    <input id='latitud' type="text" placeholder="Latitud" >
                    <input id='longitud' type="text" placeholder="Longitud" >
                </div>

                <div class='col s6'>

                    <div id="map" style="width:350px; height: 250px; border: solid; border-color: #424242  "></div>
                    <div id="test"></div>
                    <script>
                        function initMap() {
                            var uluru = {lat: -35.436281, lng: -71.624133};
                            var divql = document.getElementById('test');
                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 16,
                                center: uluru
                            });
                            var marker = new google.maps.Marker({
                                position: uluru,
                                map: map
                            });
                            map.addListener('click', function (e) {
                                var evt = e.latLng;
                                document.getElementById("latitud").value = evt.lat();
                                document.getElementById("longitud").value = evt.lng();
                            });
                        }
                    </script>

                    <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRidDqlGtF8UtbGzJHFsKbEC40iRRkUng&callback=initMap">
                    </script>



                    <!--
                    <input id='telefono_cliente' type="tel" placeholder="Telefono" >
                    <div class="input-field col s12">
                        <select id="region">
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <select id="provincia">
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <select id="comuna">
                        </select>
                    </div>
                    -->
                </div>

            </div>
            <button type="submit" id='bt_add_punto' class='btn'>
                CREAR PUNTO
            </button>
        </form>
    </div>
</div>
<!-- FIN MODAL CREAR PUNTO -->

<!-- MODAL MODIFICAR PUNTO -->
<!-- Modal Structure Insert-->
<div id="modal_punto_edit" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Editar Perfil</h4>
        <form method="post">
            <div class='row'>
                <div class='col s6'>
                    <input id='id_punto_edit' type="text" readonly="true" >
                    <input id='titulo_punto_edit' type="text" placeholder="Titulo" >
                    <input id='descripcion_punto_edit' type="text" placeholder="Descripcion" >
                    <input id='latitud_edit' type="text" placeholder="Latitud" >
                    <input id='longitud_edit' type="text" placeholder="Longitud" >
                </div>

                <div class='col s6'>

                    <div id="map2" style="width:350px; height: 250px; border: solid; border-color: #424242  "></div>
                    <script>
                        function initMap() {
                            //var latt = document.getElementById("latitud_edit").value;
                            //var lngg = document.getElementById("longitud_edit").value;

                            var uluru = {lat: -35.436281, lng: -71.624133};
                            var map2 = new google.maps.Map(document.getElementById('map2'), {
                                zoom: 16,
                                center: uluru
                            });
                            var marker = new google.maps.Marker({
                                position: uluru,
                                map: map2
                            });
                            map2.addListener('click', function (e) {
                                var evt = e.latLng;
                                document.getElementById("latitud_edit").value = evt.lat();
                                document.getElementById("longitud_edit").value = evt.lng();
                            });
                        }
                    </script>
                    <br/>

                </div>


            </div>
            <div class='row'>
                <div class='col s12'>
                    <button type="submit" id='bt_edit_punto' class='btn'>
                        ACTUALIZAR PUNTO
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- FIN MODAL MODIFICAR PUNTO -->

<!-- MODAL ELIMINAR PUNTO (CONFIRMACION) -->
<div id="modal_punto_del" class="modal" style='width: 35%'>
    <div class="modal-content">
        <form method="post">
            <div class='row'>
                <div class='col s12'>
                    <input id='id_punto_del' type="text" style='display: none' >
                    <h3 style='font-size: 23px; color: red'>Está apunto de eliminar el punto:</h3>
                    <h3 style='font-size: 17px' id='titulo_punto_del'></h3>
                    <p>
                        <input type="checkbox" class="filled-in" id="chk_del_punto" />
                        <label for="chk_del_punto">Confirmar</label>
                    </p>
                </div>

            </div>
            <button type="submit" id='bt_del_punto' class='btn disabled'>
                ELIMINAR PUNTO
            </button>
        </form>
    </div>
</div>
<!-- FIN MODAL ELIMINAR PUNTO -->

<div class='card-panel'>
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">PUNTOS TURISTICOS</h4>

            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn-floating modal-trigger" href="#modal_punto">
                <i class='material-icons'>add</i>
            </a>
            <br />

            <table class='bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Latitud</th>   
                        <th>Longitud</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id='tbody_punto'>
                    <?php foreach ($datos as $filas): ?>
                        <tr id="<?= $filas['id_punto']; ?>" align="center">
                            <td><?= $filas['id_punto']; ?></td>        
                            <td><?= $filas['titulo']; ?></td>
                            <td><?= $filas['descripcion']; ?></td>
                            <td><?= $filas['latitud']; ?></td>
                            <td><?= $filas['longitud']; ?></td>
                            <td><a id='btn_edit_punto' class='btn-floating waves-effect'><i class='material-icons'>edit</i></a></td>
                            <td><a id='btn_del_punto' class='btn-floating waves-effect'><i class='material-icons'>delete</i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<script>
    $('select').material_select();
    $('.modal-trigger').leanModal({
        height: "100%"
    });
    //FUNCION QUE TRAE LOS PUNTOS TURISTICOS Y LOS CARGA DENTRO DE LA TABLA
    puntos();
    function puntos() {
        $("#tbody_punto").empty();
        $.getJSON(URL + "puntos", function (result) {
            $.each(result, function (i, o) {
                var row = "<tr>";
                row += "<td>" + o.id_punto + "</td>";
                row += "<td>" + o.titulo + "</td>";
                row += "<td>" + o.descripcion + "</td>";
                row += "<td>" + o.latitud + "</td>";
                row += "<td>" + o.longitud + "</td>";
                row += "<td><a id='btn_edit_punto' class='btn-floating waves-effect'><i class='material-icons'>edit</i></a></td>";
                row += "<td><a id='btn_del_punto' class='btn-floating waves-effect'><i class='material-icons'>delete</i></a></td>";
                row += "</tr>";
                $("#tbody_punto").append(row);
            });
        });
    }
    //FIN FUNCION PUNTOS A TABLA

    //FUNCION QUE PERMITE AÑADIR UN PUNTO TURISTICO TRAS PINCHAR EL BOTON "CREAR PUNTO" EN EL MODAL
    $("#bt_add_punto").bind("click", function (e) {
        e.preventDefault();
        var titulo = $("#titulo_punto").val();
        var descripcion = $("#descripcion_punto").val();
        var latitud = $("#latitud").val();
        var longitud = $("#longitud").val();
        var key = "3F!9#";
        if (titulo === "" || descripcion === "" || latitud === "" || longitud === "") {
            Materialize.toast("Debe llenar todos los campos", "3000");
        } else {
            $.ajax({
                url: URL + 'insertarPunto',
                type: 'post',
                dataType: 'json',
                data: {titulo: titulo, descripcion: descripcion, latitud: latitud, longitud: longitud, key: key},
                success: function (o) {
                    Materialize.toast(o.msg, "3000");
                    puntos();
                    $("#modal_punto").closeModal();
                },
                error: function () {
                    Materialize.toast("Error 500", "3000");
                }
            });
        }
    });
    //FIN FUNCION AÑADIR PUNTO

    //FUNCION QUE PERMITE CARGAR LOS CAMPOS DE TEXTO AL PINCHAR SOBRE EL BOTON MODIFICAR EN LA TABLA
    $("body").on("click", "#btn_edit_punto", function (e) {
        e.preventDefault();
        var id = $(this).parent().parent().children()[0];
        var titulo = $(this).parent().parent().children()[1];
        var descripcion = $(this).parent().parent().children()[2];
        var latitud = $(this).parent().parent().children()[3];
        var longitud = $(this).parent().parent().children()[4];
        //escribir en el modal
        $("#id_punto_edit").val($(id).text());
        $("#titulo_punto_edit").val($(titulo).text());
        $("#descripcion_punto_edit").val($(descripcion).text());
        $("#latitud_edit").val($(latitud).text());
        $("#longitud_edit").val($(longitud).text());
        $('#modal_punto_edit').openModal();
    });

    //FUNCION QUE PERMITE INGRESAR LA MODIFICACION DEL PUNTO
    $("#bt_edit_punto").bind("click", function (e) {
        e.preventDefault();
        var id = $("#id_punto_edit").val();
        var titulo = $("#titulo_punto_edit").val();
        var descripcion = $("#descripcion_punto_edit").val();
        var latitud = $("#latitud_edit").val();
        var longitud = $("#longitud_edit").val();
        var key = "3F!9#";
        $.ajax({
            url: URL + 'editarPunto',
            type: 'post',
            dataType: 'json',
            data: {id: id, titulo: titulo, descripcion: descripcion, latitud: latitud, longitud: longitud, key: key},
            success: function (o) {
                Materialize.toast(o.msg, "3000");
                puntos();
                $("#modal_punto_edit").closeModal();
            },
            error: function () {
                Materialize.toast("500", "3000");
            }
        });
    });
    //FIN FUNCION MODIFICAR

    //FUNCION QUE PERMITE CARGAR EL ID AL PINCHAR SOBRE EL BOTON ELIMINAR EN LA TABLA
    $("body").on("click", "#btn_del_punto", function (e) {
        e.preventDefault();
        var id = $(this).parent().parent().children()[0];
        var titulo = $(this).parent().parent().children()[1];

        //escribir en el modal
        $("#id_punto_del").val($(id).text());
        document.getElementById('titulo_punto_del').innerHTML = '> ' + $(titulo).text() + ' <';
        $('#modal_punto_del').openModal();
    });


    $("#chk_del_punto").bind("click", function (e) {
        e.preventDefault();
        var chkBox = document.getElementById('chk_del_punto');
        if (chkBox.checked)
        {
            $('#MyElement').addClass('MyClass');

            $('#MyElement').removeClass('MyClass');
        }else{
            
        }

    });

</script>
