
<br>

<div class="container">


  <div class="col-md-12 well">

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
            <td><a class="btn btn-block btn-xs btn-<?= $row['ambulancia'] ? 'success' : 'default' ?>"><?= $row["ambulancia"] ? "Si" : "No" ?></a></td>

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
                    <p>Descripcion: <?=$row['descripcion_sintomas']?></p>
                    <p></p>
                    <hr>
                    <h4>Primeros Auxilios:</h4>
                    <p><?=$row['primeros_auxilios']?></p>

                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

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

  })
</script>
