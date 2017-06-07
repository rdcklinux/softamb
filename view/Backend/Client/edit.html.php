<h1>Mis Datos Personales</h1>
<form class="form" action="/backend/client/save" method="post">
<table class="table">
    <tr>
        <td>Rut</td>
        <td><input value="<?=$persona['rut']?>" type="text" class="form-control" name="person[rut]"></td>
    </tr>
    <tr>
        <td>Nombre</td>
        <td><input value="<?=$persona['nombre']?>" type="text" class="form-control" name="person[nombre]"></td>
    </tr>
    <tr>
        <td>Apellido</td>
        <td><input value="<?=$persona['apellido']?>" type="text" class="form-control" name="person[apellido]"></td>
    </tr>
    <tr>
        <td>Fecha Nacimiento</td>
        <td><input value="<?=$persona['fecha_nacimiento']?>" type="text" class="form-control" name="person[fecha_nacimiento]"></td>
    </tr>
    <tr>
        <td>Teléfono</td>
        <td><input value="<?=$persona['telefono']?>" type="text" class="form-control" name="person[telefono]"></td>
    </tr>
    <tr>
        <td>Dirección</td>
        <td><input value="<?=$persona['direccion']?>" type="text" class="form-control" name="person[direccion]"></td>
    </tr>
</table>
<a href="/backend/client" class="btn btn-default">volver</a>
<button type="submit" class="btn btn-success">Guardar</button>
</form>

