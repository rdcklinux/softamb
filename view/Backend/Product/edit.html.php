<div class="container">

  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <h1 class="text-center">Categoria: <?= $category['name'] ?> <?=$title?></h1>
      <br>
      <form action="/admin/product/update" method="POST">
        <input type="hidden" value="<?= $product['id']  ?>" name="id">

        <div class="form-group">
          Nombre Producto <input type="text" required name="name" class="form-control" value="<?=$product['name'] ?>">
        </div>
        <div class="form-group">
          Valor Producto <input type="number" required value="<?=$product['price'] ?>" name="price" class="form-control ">
        </div>        
        <div class="form-group">
          Stock Producto <input type="number" required value="<?=$product['stock'] ?>" name="stock" class="form-control ">
        </div>         
        <div class="form-group">
          URL Imagen Producto <input type="text" required value="<?=$product['name'] ?>" name="image" class="form-control ">
        </div>        
        <div class="form-group">
          Descripcion Producto <textarea type="text" cols="4" rows="4" required value="<?=$product['description'] ?>" name="description" class="form-control "><?=$product['description'] ?></textarea>
        </div>  

        <div class="form-group">
        Categoria
            <select class="category_select form-control" name="category_id" data-test="">
   
              <?php foreach ($categories as $row): ?>
                <?= $selected = $row['id'] == $product['category_id'] ? 'selected' : '' ?>  
      
                <option <?= $selected ?>  value="<?= $row['id'] ?>"> <?= $row['name'] ?></option>
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
