<h1><?=$vtitle?></h1>
<a href="/backend/<?=$module?>/new" class="btn btn-success">Nuevo <?=ucfirst($module)?></a>
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
