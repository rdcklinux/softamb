
<br>

<div class="container">
  <div class="col-md-4">

     <!-- Blog Search Well -->
    <div class="well">
        <h4>RUT PACIENTE</h4>
        <div class="input-group">
            <input id="rut_search" type="text" class="form-control">
            <span class="input-group-btn">
                <button id="trigger_rut_search" class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">

        <h4>DATOS PACIENTES</h4>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-unstyled">
                    <li><p>NOMBRE: <?= $_SESSION['selectedCliente']['nombre'] ?></p>
                    </li>
                    <li><p>APELLIDO: <?= $_SESSION['selectedCliente']['apellido'] ?></p>
                    </li>
                    <li><p>RUT: <?= $_SESSION['selectedCliente']['rut'] ?></p>
                    </li>
                    <li><p>FECHA NACIMIENTO: <?= $_SESSION['selectedCliente']['fecha_nacimiento'] ?> </p>
                    </li>
                    <li><p>TELEFONO: <?= $_SESSION['selectedCliente']['contacto'] ?></p>
                    </li>
                    <li><p>DIRECCION: <?= $_SESSION['selectedCliente']['direccion'] ?></p>
                    </li>
                </ul>
            </div>
          <div class="col-md-12">
            <a href="/backend/persona/edit?id=<?= $_SESSION['selectedCliente']['id'] ?>" class="btn btn-success btn-sm btn-block">Editar</a>
         </div>

        </div>
        <!-- /.row -->
    </div>


<?php foreach ($cargas as $carga): ?>
    <div class="well">
        <h4>CARGAS ADICIONALES</h4>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-unstyled">
                  <li><p>NOMBRE: <?= $carga["nombre"] ?></p>
                  </li>
                  <li><p>APELLIDO: <?= $carga["apellido"] ?></p>
                  </li>
                  <li><p>RUT: <?= $carga["rut"] ?></p>
                  </li>
                  <li><p>EDAD: <?= $carga["telefono"] ?></p>
                  </li>
                </ul>
            </div>
          <div class="col-md-12">
            <a href="/backend/persona/edit?id=<?= $carga['carga_id'] ?>" class="btn btn-success btn-sm btn-block">Editar</a>
         </div>
        </div>
        <!-- /.row -->
    </div>

<?php endforeach ?>


  </div>

  <div class="col-md-8 well">

    <h1 class=""><?= $title ?></h1><br>
    <a href="#" class="btn btn-xs btn-info limpiar_busqueda">Limpiar Busqueda</a>

    <table id="category_table" class="table table-hover table-striped table-condensed ">
      <thead >
        <tr >
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th></th>
        </tr>
      </thead>


      <tbody>

        <?php foreach($categories as $row): ?>
          <?php $category_id = $row['id'] ?>

          <tr>
            <td><?= $category_id?></td>
            <td><?=$row['nombre']?></td>
            <td>Pendiente</td>
            <!-- Botones CRUD :) -->
            <td><a href="#" data-category-name="<?= $row['nombre'] ?>" data-category-id="<?= $category_id ?>" class="btn btn-block btn-xs btn-success seleccionar_categoria">Seleccionar Categoria</a></td>
          </tr>
        <?php endforeach ?>
      </tbody>

    </table>

<hr>
    <h2>Listado de Sintomas</h2>
    <br>

    <table id="tabla_sintomas" class="table table-hover table-striped table-condensed ">
      <thead >
        <tr >
          <th>ID</th>
          <th>Sintoma</th>
          <th>Categoria</th>
          <th>Ambulancia? </th>
          <th></th>

        </tr>
      </thead>


      <tbody>
        <?php foreach($sintomas as $row): ?>

          <tr>
            <td><?= $row['id']?></td>
            <td><?=$row['nombre']?></td>
            <td><?=$row['category_id']?></td>
            <td><?= $row["ambulancia"] ? "Si" : "No" ?></td>

            <td><a href="#modal_sintoma_<?= $row['id']?>"  data-toggle="modal" class="btn btn-block btn-xs btn-primary">Mas Informacion</a></td>
          </tr>


            <div id="modal_sintoma_<?= $row['id']?>" class="modal fade" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Primeros Auxilios </h3>
                  </div>
                  <div class="modal-body">
                    <h4>Sintoma: <?=$row['nombre']?></h4>
                    <br>
                    <p>Descripcion: <?=$row['descripcion']?></p>
                    <p></p>
                    <hr>
                    <h4>Primeros Auxilios:</h4>
                    <p><?=$row['primeros_auxilios']?></p>

                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                    <?php if($row["ambulancia"]): ?>
                      <button  type="button" data-user-id="<?=$row['id']?>" data-cliente-seteado="<?= isSet($_SESSION['selectedCliente']) ?>" class="btn btn-success asignar_ambulancia">Assignar Ambulancia</button>
                    <?php endif; ?>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        <?php endforeach ?>
      </tbody>

    </table>

  </div>

</div>




<script type="text/javascript">


  $(document).ready(function(){

    $(function(){
        $("#category_table").DataTable({
          "dom": "f"
        });
    });

    $(function(){
        $("#tabla_sintomas").DataTable({
          "dom": "f"
        });
    });

    $(function(){
        $("#users_table").DataTable({
          "dom": "f"
        });
    });


    $(".seleccionar_categoria").on("click", function(e){
      var category_table = $("#category_table").DataTable()
      var tabla_sintomas = $("#tabla_sintomas").DataTable()
      var btn = $(this)
      var category_id = btn.data("category-id")
      var category_name = btn.data("category-name")
      // Busco solo en la columna Nombre Categoria
      category_table.search(category_name).draw()
      // Busco solo en la columna Nombre Categoria
      tabla_sintomas.search(category_name).draw()


    })

    $(".limpiar_busqueda").on("click", function(e){
      var category_table = $("#category_table").DataTable()
      var tabla_sintomas = $("#tabla_sintomas").DataTable()
      category_table.search("").draw()
      tabla_sintomas.search("").draw()
    })


    // Mensajes de alerta
    <?php if( $_GET['alert'] == "rut_no_encontrado" ): ?>
      alert("No se han encontrado clientes asociados al rut ingresado")
    <?php elseif($_GET['alert'] == "cliente_seleccionado"): ?>
      alert("Cliente encontrado")
    <?php elseif($_GET['alert'] == "sin_ambulancias_libres"): ?>
      alert("No quedan ambulancias libres para asignar")
    <?php elseif($_GET['alert'] == "ambulancia_ya_asignada"): ?>
      alert("Una ambulancia ya fue asignada a este cliente")
    <?php elseif($_GET['alert'] == "ambulancia_asignada"): ?>
      alert("Ambulancia asignada exitosamente")
    <?php endif ?>


    $(".asignar_ambulancia").on("click", function(e){
      var btn = $(this)
      var cliente_seteado = btn.data("cliente-seteado") == "1"
      var user_id = "<?= $_SESSION['selectedCliente']['id'] ?>"

      if (cliente_seteado == false) {
        alert("debe seleccionar un cliente antes de asignarle una ambulancia")
        return
      }

      $.ajax({
        url: "/backend/persona/asignarAmbulancia",
        type: "POST",
        dataType:'json',
        data: { user_id: user_id},
        success: function(response){
          console.log(response)
          window.location = response['alert_param'];
        }
      });

    })


    $("#trigger_rut_search").on("click", function(){
      var rut =  $("#rut_search").val()

      $.ajax({
        url: "/backend/persona/setSelectedClient",
        type: "POST",
        dataType:'json',
        data: { rut: rut},
        success: function(response){
          console.log(response)
          window.location = response['alert_param'];
        }
      });

    })
  })
</script>
