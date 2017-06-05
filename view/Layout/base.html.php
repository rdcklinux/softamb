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

              <a class="navbar-brand pull-right	" href="/">SOFTAMB</a>
              <a href="/">
              	<img style="height:50px" src="/images/logo3.png">
              </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <?php if(!empty($_SESSION['user'])): ?>
                    <li><a href="/backend/welcome">Inicio</a></li>
                    <li><a href="javascript:void(0);"><small><b><?=$_SESSION['user']["nombre"] . ' ' . $_SESSION['user']["apellido"]?></b></small> </a></li>
                	<?php if ($_SESSION['user']['gestor']): ?>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            Administrar <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu" aria-labelledby="adminMenu">
                            <li><a href="/backend/category">Categorías</a></li>
                            <li><a href="/backend/sintoma">Síntomas</a></li>
                            <li><a href="/backend/ambulancia">Ambulancias</a></li>
                          </ul>
                        </li>
                	<?php endif ?>
                	<li><a href="/frontend/auth/logout">Cerrar Sesion</a></li>
                <?php else: ?>
                    <li><a href="/frontend/signin">Inicio</a></li>
        	    <?php endif; ?>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div>
        </nav>

        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/datatables.min.js"></script>
        <script src="/js/cart.js"></script>
        <script src="/js/buy.js"></script>
        <script src="/js/tables.js"></script>
        <script src="/js/order.js"></script>
        
        <div class="container">
          <?php @include($this->view) ?>
        </div>        
    </body>
</html>
