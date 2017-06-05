<div class="row">

 	<div class="col-md-8 col-md-offset-2">

		<h1 class=""><?php echo $title ?></h1><br>
<<<<<<< HEAD
	 	<a href="/admin/category/new" class="btn btn-sm btn-info">Crear Nueva Categoria</a>
	 	<h1>Esta linea es nueva</h1>
=======
	 	<a href="/admin/category/new" class="btn btn-sm btn-info">Listado Categorias</a>
>>>>>>> 1ad4c02358e4be146126ba2e94e4e27ab9a8a9f2

	 	<table class="data-table table table-hover table-striped table-condensed ">
	 		<thead >
	 			<tr >
			 		<th>ID</th>
			 		<th>Nombre</th>
			 		<th>Descripcion</th>
			 		<th>Productos</th>
			 		<!-- <th>Editar </th> -->
			 		<th>Borrar </th>
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
				 		<td><a href="/shop/product?id=<?= $category_id ?>" class="btn btn-block btn-sm btn-success">Seleccionar</a></td>
				 		<!-- <td><a href="/admin/category/edit?id=<?= $category_id ?>" class="btn btn-block btn-sm btn-warning">Editar</a></td> -->
				 		<td><a href="/admin/category/delete?id=<?= $category_id ?>" class="btn btn-block btn-sm btn-danger">Borrar 	</a></td>
				  </tr>
			  <?php endforeach ?>
	 		</tbody>

	  </table>




	 	<table class="data-table table table-hover table-striped table-condensed ">
	 		<thead >
	 			<tr >
			 		<th>ID</th>
			 		<th>Nombre</th>
			 		<th>Descripcion</th>
			 		<th>Productos</th>
			 		<!-- <th>Editar </th> -->
			 		<th>Borrar </th>
	 			</tr>
	 		</thead>


	 		<tbody>
				<?php foreach($c2 as $row): ?>
					<?php $category_id = $row['id'] ?>

				  <tr>
			      <td><?= $category_id?></td>
			      <td><?=$row['nombre']?></td>
			      <td>Pendiente</td>
				 		<!-- Botones CRUD :) -->
				 		<td><a href="/shop/product?id=<?= $category_id ?>" class="btn btn-block btn-sm btn-success">Seleccionar</a></td>
				 		<!-- <td><a href="/admin/category/edit?id=<?= $category_id ?>" class="btn btn-block btn-sm btn-warning">Editar</a></td> -->
				 		<td><a href="/admin/category/delete?id=<?= $category_id ?>" class="btn btn-block btn-sm btn-danger">Borrar 	</a></td>
				  </tr>
			  <?php endforeach ?>
	 		</tbody>

	  </table>



 	</div>
 </div>
