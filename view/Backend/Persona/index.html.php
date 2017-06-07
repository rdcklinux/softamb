<a href="/backend/persona/new" class="btn btn-lg btn-info">Crear nueva Persona</a>
<table class="data-table table table-hover table-striped table-condensed ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Rut</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th></th>
                </tr>
            </thead>

            <br/><br/><br/>
            <h3>Usuarios</h3>
            <br>
            <tbody>
                <?php foreach($users as $row): ?>
                  <tr>
<<<<<<< HEAD
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


=======
                      <td><?= $row['id'] ?></td>
                      <td><?=$row['nombre']?></td>
                      <td><?= $row["rut"] ?></td>
                      <td><?= $row["apellido"] ?></td>
                      <td><?= $row["direccion"] ?></td>
                      <td><?= $row["contacto"] ?></td>
                      <td><a href="/backend/persona/delete?id=<?=$row['id']?>" class="btn btn-danger ">Eliminar</a></td>
                      <td><a href="/backend/persona/new" class="btn btn-success">Editar</a></td>
                  </tr>
>>>>>>> b425b71ee30085e562624894a5b28eda6dc8e7c8
              <?php endforeach ?>
            </tbody>
      </table>
