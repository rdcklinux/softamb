<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center"><?=$title?></h1>
      <?php if(!empty($_SESSION['message'])):?>
          <p class="alert alert-danger"><?=$_SESSION['message']?></p>
          <?php unset($_SESSION['message'])?>
      <?php endif ?>
      <form action="/shop/auth/<?=$post?>" method="POST">
        <?php if(!$signin): ?>
        <div class="form-group">
          Nombre Completo <input type="text" required name="auth[name]" class="form-control"/>
        </div>
        <?php endif?>
        <div class="form-group">
          Email <input type="email" required class="form-control" name="auth[email]"/>
        </div>
        <div class="form-group">
          Contraseña <input type="password" required name="auth[password]" class="form-control"/>
        </div>
        <div class="row">
          <div class="col-md-6">
            <button type="submit" class="btn btn-success btn-block"><?=($signin)?'Ingresar':'Registrar Usuario'?></button>
          </div>
          <div class="col-md-6">
            <a class="btn btn-default btn-block" href="/shop/product">Volver</a>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>
