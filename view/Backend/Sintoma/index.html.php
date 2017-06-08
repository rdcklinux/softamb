<div class="row">

  <div class="col-md-12">


    <h1><?=$vtitle?></h1>
    <a href="/backend/<?=$module?>/new" class="btn btn-info">Nuevo <?=ucfirst($module)?></a>
    <table class="table data-table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <?php foreach($fields as $field):?>
            <th><?=$field['name']?></th>
            <?php endforeach?>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($entities as $entity):?>
            <tr>
                <td><?=$entity['id']?></td>
                <td><?=$entity['nombre']?></td>
                <?php foreach($fields as $key=>$field):?>
                <td><?=$entity[$key]?></td>
                <?php endforeach?>
                <td>
                    <a href="/backend/<?=$module?>/edit?id=<?=$entity['id']?>" class="btn btn-sm btn-success btn-block">Editar</a>
                </td>
                <td>
                    <a href="/backend/<?=$module?>/delete?id=<?=$entity['id']?>" class="btn btn-sm btn-danger btn-block">Eliminar</a>                    
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

  </div>
</div>
