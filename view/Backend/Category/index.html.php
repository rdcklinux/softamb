
 <div class="row">

 	<div class="col-md-8 col-md-offset-2">

		<h1 class=""><?php echo $title ?></h1><br>
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

				 		<td><a href="#" class="btn btn-block btn-sm btn-primary">Mas Informacion</a></td>
				  </tr>
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
				 		<td><a href="#" data-category-name="<?= $row['nombre'] ?>" data-rut="<?= $row['rut'] ?>" class="btn btn-block btn-xs btn-success seleccionar_usuario">Seleccionar Usuario</a></td>
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

		$(".seleccionar_usuario").on("click", function(e){
			e.preventDefault()
			var users_table = $("#users_table").DataTable()
			var btn = $(this)
			var rut = btn.data("rut")
			// Busco solo en la columna Nombre Categoria
			users_table.search(rut).draw()
			//Pendiente:
			//Ajax que setee a este usuario en una variable de session para asignarle
			// las ambulancias a el automaticamente

		})		

		$(".limpiar_busqueda").on("click", function(e){
			var category_table = $("#category_table").DataTable()
			var tabla_sintomas = $("#tabla_sintomas").DataTable()
			category_table.search("").draw()
			tabla_sintomas.search("").draw()
		})
	})
</script>