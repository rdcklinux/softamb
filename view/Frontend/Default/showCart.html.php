<h1>Carro de compras</h1>
<?php if(empty($cart)):?>
    <h3>No hay productos en el carro</h3>
    <a  href="/shop/product" class="btn btn-default">Comprar en la tienda</a>
<?php else: ?>

<table class="table table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio Unitario</th>
        <th>Precio</th>
        <th>Cantidad</th>

    </tr>
<?php foreach($cart as $product):?>
    <tr>
        <td><?=$product['id']?></td>
        <td><img width="64px" src="<?=$product['image']?>" /></td>
        <td><a href="/shop/product/show?id=<?=$product['id']?>"><?=$product['name']?></a></td>
        <td>$<?=number_format($product['price'],0,',','.')?></td>
        <td>$<?=number_format($product['price'] * $product['quantity'],0,',','.')?></td>
        <td>
            <div style="width:100px;">
                <div class="input-group">
                    <input type="number" class="form-control" value="<?= $product['quantity']?>" min="1" max="10" />
                    <a class="input-group-addon btn btn-default update-cart" rel="<?=$product['id']?>"><i class="fa fa-refresh"></i></a>
                </div>
            </div>
        </td>

    </tr>
    <?php $suma+=$product['price'] * $product['quantity'];?>
<?php endforeach?>
    <!-- <tfoot> -->
        <tr>
            <td colspan="4"></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"><b>Sub Total</b></td>
            <td>$<?=number_format($suma,0,',','.')?></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"><b>IVA</b></td>
            <td>$<?=number_format($suma * 0.19,0,',','.')?></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"><b>Total</b></td>
            <td>$<?=number_format($suma * 1.19,0,',','.')?></td>
            <td></td>
        </tr>
    <!-- </tfoot> -->
</table>


 <div class="row">
    <div class="col-md-2"><a href="/shop/product/clearCart" class="btn btn-danger btn-block">Vaciar Carro</a></div>
    <div class="col-md-3 col-md-offset-4"> <a href="/shop/product" class="btn btn-default btn-block">Comprar algo más</a> </div>
    <div class="col-md-2"> <a href="/shop/buy" class="btn btn-success btn-block">Pagar</a> </div>
 </div>
</div>
<?php endif; ?>
