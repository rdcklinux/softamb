<style>
#myCarousel .item > img {
    width:100%;
}
</style>
<div class="row carousel-holder">
    <div class="col-md-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <div class="carousel-inner">
                <div class="item active"><img src="/images/telefonia.jpg" alt="Telefonía"></div>
                <div class="item"><img src="/images/musica.jpg" alt="Música"></div>
                <div class="item"><img src="/images/outdoor.jpg" alt="OutDoor"></div>
                <div class="item"><img src="/images/deporte.jpg" alt="Deporte"></div>
            </div>

            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>
</div>
<br/><br/>
<div class="row">
    <?php foreach($products as $product): ?>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="<?=$product['image']?>" with="320" height="150" alt="<?=$product['name']?>">
            <div class="caption">
                <h4 class="pull-right">$<?=number_format($product['price'],0,',','.')?></h4>
                <h4><a href="/shop/product/show?id=<?=$product['id']?>"><?=$product['name']?></a>
                </h4>
                <p><?=$product['description']?></p>
            </div>
            <a href="javascript:void(0);" class="add-to-cart btn btn-block btn-sm btn-success" rel="<?=$product['id']?>">AGREGAR</a>
            <a href="/shop/product/show?id=<?=$product['id']?>" class="btn btn-block btn-sm btn-info">VER DETALLE</a>
        </div>
    </div>
    <?php endforeach ?>
 </div>
