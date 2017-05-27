<!DOCTYPE html>
<html>
    <head>
        <title><?=$title?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.15/datatables.min.css"/>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand pull-right	" href="/">LaTienda</a>
              <a href="/">
              	<img style="height:50px" src="/images/logo3.png">
              </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
              <li><a href="/shop/product">Productos</a></li>
                <?php if(!empty($_SESSION['user'])): ?>
                    <li><a href="javascript:void(0);"><small><b><?=$_SESSION['user']["email"]?></b></small> </a></li>
                	<?php if ($_SESSION['user']['is_admin'] == 1): ?>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            Administrar <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu" aria-labelledby="adminMenu">
                            <li><a href="/admin/category">Categorias</a></li>
                            <li><a href="/admin/order">Ordenes</a></li>
                            <li><a href="/admin/product">Productos</a></li>
                          </ul>
                        </li>
        	        <?php else: ?>
        	        	<li><a href="/shop/product/showCart">Ver Carro</a></li>
                	<?php endif ?>
                	<li><a href="/shop/auth/logout">Cerrar Sesion</a></li>
                <?php else: ?>
                	<li><a href="/shop/product/showCart">Ver Carro</a></li>
        	        <li><a href="/shop/auth/signup">Registrarse</a></li>
        	        <li><a href="/shop/auth/signin">Login</a></li>
        	    <?php endif; ?>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div>
        </nav>
        <div class="container">
        	<?php @include($this->view) ?>
        </div>
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/datatables.min.js"></script>
        <script src="/js/cart.js"></script>
        <script src="/js/buy.js"></script>
        <script src="/js/tables.js"></script>
        <script src="/js/order.js"></script>
    </body>
</html>
