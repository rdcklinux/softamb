<h1><?=$vtitle?></h1>
<?php if($_SESSION['message']):?>
    <p class="alert alert-success"><?=$_SESSION['message']?></p>
    <?php unset($_SESSION['message']) ?>
<?php endif ?>
<form class="form" action="/backend/<?=$module?>/<?=$method?$method:"save?id=$entity[id]"?>" method="post">
<table class="table">
    <?php foreach($fields as $key => $field):?>
    <tr>
        <td><?=$field['name']?></td>
        <td>
            <?php if($field['type'] == 'textarea'): ?>
                <textarea name="entity[<?=$key?>]" class="form-control"><?=$entity[$key]?></textarea>
            <?php elseif($field['type'] == 'select'):?>
                <select class="form-control" name="entity[<?=$key?>]" required>
                    <option value="">Seleccione una categoria</option>
                    <?php foreach($entity[$key]['options'] as $option):?>
                        <option value="<?=$option['id']?>" <?=$entity[$key]['selected']==$option['id']?'selected':''?> ><?=$option['nombre']?></option>
                    <?php endforeach ?>
                </select>
            <?php elseif($field['type'] == 'checkbox'):?>
                <input value="1" type="<?=$field['type']?>" class="form-control" name="entity[<?=$key?>]" <?=$entity[$key]?'checked':''?>>
            <?php else: ?>
                <input value="<?=$entity[$key]?>" type="<?=$field['type']?>" class="form-control" name="entity[<?=$key?>]">
            <?php endif ?>
        </td>
    </tr>
    <?php endforeach ?>
</table>
<a href="/backend/<?=$module?>" class="btn btn-default">Volver</a>
<button type="submit" class="btn btn-success">Guardar</button>
</form>
