<div class="well">
    <h3 class="text-center">Detalle Producto</h3>
        <div class="thumbnail">
            <div class="caption">
                <img src="<?=$product['image']?>" width="320" height="150" alt="<?=$product['name']?>">
            </div>
            <h3 class="tittles-pages text-center">Informacion</h3>
            <strong><?=$product['name']?></strong>
            <p><?=$product['descripcion']?></p>
            <h4 class="pull-right">Precio: $<?=number_format($product['price'],0,',','.')?></h4>
            <a  href="/shop/product" class="btn btn-outline btn-default">Volver</a>
            <a href="javascript:void(0);" class="add-to-cart btn btn-success" rel="<?=$product['id']?>">AGREGAR</a>
        </div>
</div>
