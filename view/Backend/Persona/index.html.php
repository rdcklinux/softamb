<h1>Mantenedor Usuario</h1>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $tituloPagina; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
   
        
          <div class="container">
          <td><a href="/backend/persona/new" class="btn btn-lg btn-info">Crear nueva Persona</a></td> 

<table id="users_table" class="data-table table table-hover table-striped table-condensed ">
            <thead >
                <tr >
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Rut</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th></th>
                </tr>
            </thead>

            <br><br><br>
            <h3>Usuarios</h3>
            <br>
            <tbody>
               
                <?php foreach($users as $row): ?>
                  <tr>
                  <td><?= $row['id'] ?></td>
                  <td><?=$row['nombre']?></td>
                  <td><?= $row["rut"] ?></td>
                  <td><?= $row["apellido"] ?></td>
                  <td><?= $row["direccion"] ?></td>
                  <td><?= $row["contacto"] ?></td>
                        <!-- Botones CRUD :) -->    
                        <td><a href="/backend/persona/delete?id=<?=$row['id']?>" class="btn btn-danger ">Eliminar</a></td>
                         
                         <td><a href="/backend/persona/edit?id=<?=$row['id']?> " class="btn btn-success">Editar</a></td>
                           
                                                  
                      </tr>


              <?php endforeach ?>
            </tbody>

      </table>

                
            </div>









              <!-- Footer -->
              <footer>
                  <div class="row">
                      <div class="col-lg-12">
                          <p>Copyright &copy; Your Website 2014</p>
                      </div>
                  </div>
              </footer>

          </div>


 </div>
</div>

        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/cart.js"></script>
        <script src="js/jquery.js"></script>

 

    </body>
</html>
