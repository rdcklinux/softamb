 <h1><?=$vtitle?> para</h1>
 <p>
     Nombre Titular: <strong><?=$persona['nombre']?> <?=$persona['apellido']?></strong>
     <br/>Run titular: <strong><?=$persona['rut']?></strong>
 </p>
<a href="/backend/<?=$module?>/new" class="btn btn-success">Nueva <?=ucfirst($module)?></a>
<table class="table data-table">
    <thead>
    <tr>
        <?php foreach($fields as $field):?>
        <th><?=$field['name']?></th>
        <?php endforeach?>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($entities as $entity):?>
        <tr>
            <?php foreach($fields as $key=>$field):?>
            <?php
                if(in_array($key, ['activo','gestor','cliente'])):
                    $entity[$key] = $entity[$key]?'SI':'NO';
                endif;
            ?>
            <td><?=$entity[$key]?></td>
            <?php endforeach?>
            <td>
                <a href="/backend/<?=$module?>/edit?id=<?=$entity['id']?>" class="btn btn-success">Editar</a>
                <a href="/backend/<?=$module?>/delete?id=<?=$entity['id']?>" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<a href="/backend/persona" class="btn btn-default">Volver a Personas</a>
