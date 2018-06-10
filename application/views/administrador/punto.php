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
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCy6nk5-lv1fvTWT397gDx58OZbF-WzFIY&callback=initMap">
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
                row += "</tr>";
                $("#tbody_punto").append(row);
            });
        });
    }

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
</script>
