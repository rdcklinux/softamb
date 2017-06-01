<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center"><?=$title?></h1>
      <?php if(!empty($_SESSION['message'])):?>
          <p class="alert alert-danger"><?=$_SESSION['message']?></p>
          <?php unset($_SESSION['message'])?>
      <?php endif ?>
      <form action="/frontend/auth/dosignin" method="POST">
        <div class="form-group">
          Rut <input type="text" required class="form-control" name="auth[rut]"/>
        </div>
        <div class="form-group">
          Contraseña <input type="password" required name="auth[password]" class="form-control"/>
        </div>
        <div class="row">
          <div class="col-md-6">
            <button type="submit" class="btn btn-success btn-block">Ingresar</button>
          </div>
          <div class="col-md-6">
            <a class="btn btn-default btn-block" href="/frontend">Volver</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
