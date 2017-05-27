<div class="container">

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center"><?=$title?></h1>
      <br>
      <form action="/admin/category/create" method="POST">
        <div class="form-group">
          Nombre Categoria <input type="text" required name="name" class="form-control ">
        </div>

        <div class="row">
          <div class="col-md-6">
            <button class="btn btn-success btn-block">Registrar Categoria</button>
          </div>
          <div class="col-md-6">
            <a class="btn btn-default btn-block" href="/admin/category">Volver</a>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>
