
<h2>Proceso de Pago</h2>
<form action="/shop/buy/payment" method="POST">
    <h3>Seleccione medio de pago</h3>
    <div class="row">
      <div class="col-sm-5 col-md-5 col-lg-5">
        <div class="radio">
          <label>
            <input class="payment" rel="vcard" type="radio" name="pay[type]" value="1" checked="checked"/>
            Pago en Linea (TC)
          </label>
        </div>
        <div id="vcard-options" class="colapse row">
            <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Ingrese Número Tarjeta de Crédito" name="pay[vcard]" />
            </div>
        </div>
        <div class="radio">
          <label>
            <input class="payment" rel="store" type="radio" name="pay[type]" value="2"/>
            Pago en tienda
          </label>
        </div>
      </div>
    </div>
    <div id="delivery-options" class="colapse">
        <h3>Seleccione modo de entrega</h3>
        <div class="row">
          <div class="col-sm-5 col-md-5 col-lg-5">
            <div class="radio">
              <label>
                <input class="delivery" rel="store" type="radio" name="pay[delivery]" value="1"/>
                Retiro en Tienda
              </label>
            </div>
            <div class="radio">
              <label>
                <input class="delivery" rel="address" type="radio" name="pay[delivery]" value="2" checked="checked"/>
                Despacho Domicilio ($1.000)
              </label>
            </div>
            <div id="delivery-address" class="colapse row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="text" class="form-control" placeholder="Ingrese direccion" name="pay[address]" />
                </div>
            </div>
          </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3">
            <a href="/shop/product/showCart" class="btn btn-default">Volver</a>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            <button type="submit" class="btn btn-success">Continuar</button>
        </div>
    </div>
</form>
