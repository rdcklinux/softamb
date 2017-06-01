<h1>Detalle de la Compra</h1>
<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
    <table class="table">
      <caption>Resumen de Compra </caption>
      <tr>
        <td>Total a pagar</td>
        <td>$<?=number_format($total,0,',','.')?></td>
      </tr>
      <tr>
        <td>Modo de pago</td>
        <td><?=$type?> <?=$_SESSION['payment']['vcard']?></td>
      </tr>
      <tr>
        <td>Modo de entrega</td>
        <td><?=$delivery?></td>
      </tr>
      <?php if($address):?>
        <tr>
          <td>Dirección de entrega</td>
          <td><?=$address?></td>
        </tr>
      <?php endif ?>
    </table>
  </div>
</div>
<div class="row">
  <div class="col-xs-offset-7 col-sm-offset-7 col-md-offset-7 col-lg-offset-7 col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <a href="/shop/buy" class="btn btn-default">Volver</a>
  </div>
  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
    <form class="from" action="/shop/buy/confirm" method="POST">
        <button type="submit" class="btn btn-success">Confirmar</button>
    </form>
  </div>
</div>
