 <h1><?=$vtitle?></h1>
<a href="/backend/<?=$module?>/new" class="btn btn-success">Nueva <?=ucfirst($module)?></a>
<table class="table data-table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <?php foreach($fields as $field):?>
        <th><?=$field['name']?></th>
        <?php endforeach?>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($entities as $entity):?>
            <?php if(!$entity['activo'] && !$entity['gestor'] && !$entity['cliente'] ) continue;?>
        <tr>
            <td><?=$entity['id']?></td>
            <?php foreach($fields as $key=>$field):?>
            <?php
                if(in_array($key, ['activo','gestor','cliente'])):
                    $entity[$key] = $entity[$key]?'SI':'NO';
                endif;
            ?>
            <td><?=$entity[$key]?></td>
            <?php endforeach?>
            <td>
                <a href="/backend/carga?persona=<?=$entity['id']?>" class="btn btn-default  btn-sm">Ver Cargas</a>
                <a href="/backend/<?=$module?>/edit?id=<?=$entity['id']?>" class="btn btn-success  btn-sm">Editar</a>
                <a href="/backend/<?=$module?>/delete?id=<?=$entity['id']?>" class="btn btn-danger  btn-sm">Eliminar</a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
