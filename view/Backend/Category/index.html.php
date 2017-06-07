
 <div class="row">
	 <div class="col-md-4">
     <!-- Blog Search Well -->
    <div class="well">
        <h4>RUT PACIENTE</h4>
        <div class="input-group">
            <input id="rut_search" type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
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
            <div class="col-lg-6">
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
          <div class="col-lg-6">
                <ul class="list-unstyled">
                <button type="button" class="btn btn-success">Editar</button>
                </ul>
         </div>

        </div>
        <!-- /.row -->
    </div> 		

	 </div>

 	<div class="col-md-8 col-md-offset-2">

		<h1 class=""><?= $title ?></h1><br>
	 	<a href="#" class="btn btn-xs btn-info limpiar_busqueda">Limpiar Busqueda</a>

	 	<table id="category_table" class="data-table table table-hover table-striped table-condensed ">
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


		<br><br><br><br>
		<h2>Listado de Sintomas</h2>
		<br>

	 	<table id="tabla_sintomas" class="data-table table table-hover table-striped table-condensed ">
	 		<thead >
	 			<tr >
			 		<th>ID</th>
			 		<th>Sintoma</th>
			 		<th>Categoria</th>
			 		<th>Requiere Ambulancia? </th>
			 		<th></th>

	 			</tr>
	 		</thead>


	 		<tbody>
				<?php foreach($sintomas as $row): ?>

				  <tr>
			      <td><?= $row['id']?></td>
			      <td><?=$row['nombre']?></td>
			      <td><?=$row['categoria']?></td>
			      <td><?= $row["ambulancia"] ? "Si" : "No" ?></td>

				 		<td><a href="#modal_sintoma_<?= $row['id']?>"  data-toggle="modal" class="btn btn-block btn-sm btn-primary">Mas Informacion</a></td>
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
						        <p><?=$row['primeros_auxilios']?></p>
						        
						      </div>
		
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						       
						        <?php if($row["ambulancia"]): ?>
						        	<button  type="button" data-cliente-seteado="<?= isSet($_SESSION['selectedCliente']) ?>" class="btn btn-success asignar_ambulancia">Assignar Ambulancia</button>
						        <?php else: ?>
						        	<button  type="button" disabled class="btn btn-danger">No Requiere Ambulancia</button>
						      	<?php endif; ?>

						      </div>
						    </div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->				  
			  <?php endforeach ?>
	 		</tbody>

	  </table>




	 	<table id="users_table" class="data-table table table-hover table-striped table-condensed ">
	 		<thead >
	 			<tr >
			 		<th>ID</th>
			 		<th>Nombre</th>
			 		<th>Rut</th>
			 		<th>Apellido</th>
			 		<th>Direccion</th>
			 		<th>Telefono</th>
			 		<th></th>
	 			</tr>
	 		</thead>

			<br><br><br>
			<h3>Usuarios</h3>
			<br>
	 		<tbody>
	 		   
				<?php foreach($users as $row): ?>
				  <tr>
			      <td><?= $row['id'] ?></td>
			      <td><?=$row['nombre']?></td>
			      <td><?= $row["rut"] ?></td>
			      <td><?= $row["apellido"] ?></td>
			      <td><?= $row["direccion"] ?></td>
			      <td><?= $row["contacto"] ?></td>
				 		<!-- Botones CRUD :) -->	
				 		<td><a href="#" data-id="<?= $row["id"] ?>" data-rut="<?= $row["rut"] ?>" data-category-name="<?= $row['nombre'] ?>" data-rut="<?= $row['rut'] ?>" class="btn btn-block btn-xs btn-success seleccionar_usuario">Seleccionar Usuario</a></td>
				  </tr>
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
		      "dom": ""
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

		// $(".seleccionar_usuario").on("click", function(e){
		// 	e.preventDefault()
		// 	var users_table = $("#users_table").DataTable()
		// 	var btn = $(this)
		// 	var rut = btn.data("rut")
		// 	// Busco solo en la columna Nombre Categoria
		// 	users_table.search(rut).draw()
		// 	//Pendiente:
		// 	//Ajax que setee a este usuario en una variable de session para asignarle
		// 	// las ambulancias a el automaticamente

		// })		

		$(".limpiar_busqueda").on("click", function(e){
			var category_table = $("#category_table").DataTable()
			var tabla_sintomas = $("#tabla_sintomas").DataTable()
			category_table.search("").draw()
			tabla_sintomas.search("").draw()
		})

		

		$(".asignar_ambulancia").on("click", function(e){
			var btn = $(this)
			var cliente_seteado = btn.data("cliente-seteado") == "1"
			console.log(cliente_seteado)
			if (cliente_seteado == false) {
				alert("debe seleccionar un cliente antes de asignarle una ambulancia")
				return
			}
			// var id =  btn.data("id")
			console.log("paso")
		})


		<?php if( $_GET['alert'] == "rut_no_encontrado" ): ?>
			alert("Debe seleccionar un cliente antes de intentar asignarle una ambulancia")
		<?php endif ?>		

		$(".seleccionar_usuario").on("click", function(){
			var btn = $(this)
			var rut =  btn.data("rut")
			var id =  btn.data("id")

      $.ajax({
        url: "/backend/persona/setSelectedClient",
        type: "POST",
        dataType:'json',
        data: { rut: rut, id: id},
        success: function(response){
          console.log(response)

          if(response['success']) {
          	console.log("success")
          	window.location.reload();
        	} else {
        		console.log("cliente no encontrado")
        		window.location = "?alert=rut_no_encontrado";
        	}


        }
      });


		})
	})
</script>