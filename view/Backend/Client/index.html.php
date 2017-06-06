<h1>Mis Datos Personales</h1>
<?php if($_SESSION['message']):?>
    <p class="alert alert-success"><?=$_SESSION['message']?></p>
    <?php unset($_SESSION['message']) ?>
<?php endif ?>
<table class="table">
    <tr>
        <td>Rut</td>
        <td><?=$persona['rut']?></td>
    </tr>
    <tr>
        <td>Nombre</td>
        <td><?=$persona['nombre']?></td>
    </tr>
    <tr>
        <td>Apellido</td>
        <td><?=$persona['apellido']?></td>
    </tr>
    <tr>
        <td>Fecha Nacimiento</td>
        <td><?=$persona['fecha_nacimiento']?></td>
    </tr>
    <tr>
        <td>Teléfono</td>
        <td><?=$persona['telefono']?></td>
    </tr>
    <tr>
        <td>Dirección</td>
        <td><?=$persona['direccion']?></td>
    </tr>
</table>
<a href="/backend/client/edit" class="btn btn-default">Cambiar mis datos</a>
