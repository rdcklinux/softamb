<div class="container">

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1 class="text-center"><?=$title?></h1>
			<br>
			<form action="/admin/product/create" method="POST">

				<div class="form-group">
					Nombre Producto <input type="text" required name="name" class="form-control ">
				</div>
				<div class="form-group">
					Valor Producto <input type="number" required name="price" class="form-control ">
				</div>        
				<div class="form-group">
					Stock Producto <input type="number" required name="stock" class="form-control ">
				</div>         
				<div class="form-group">
					URL Imagen Producto <input type="text" required name="image" class="form-control ">
				</div>        
				<div class="form-group">
					Descripcion Producto <textarea type="textarea" cols="4" rows="4" required name="description" class="form-control "></textarea>
				</div>  

				<div class="form-group">
				Categoria
						<select class="category_select form-control" name="category_id">
							<!-- <option selected required value="0"> Elija Categoria Producto</option> -->
							<?php foreach ($categories as $category): ?>
								<option value="<?= $category['id'] ?>"> <?= $category['name'] ?></option>
							<?php endforeach ?>
						</select>
				</div>				               

				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-success btn-block">Registrar Producto</button>
					</div>
					<div class="col-md-6">
						<a class="btn btn-default btn-block" href="/admin/product/index">Volver</a>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
