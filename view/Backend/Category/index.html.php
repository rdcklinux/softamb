<div class="row">
<div class="col-md-2"></div>
  <div class="col-md-8">


    <h1><?=$vtitle?></h1>
    <a href="/backend/<?=$module?>/new" class="btn btn-info">Nueva Categoria</a>
    <table class="table data-table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <?php foreach($fields as $field):?>
            <th>Nombre Categoria de Sintoma</th>
            <?php endforeach?>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($entities as $entity):?>
            <tr>
                <td><?=$entity['id']?></td>
                <?php foreach($fields as $key=>$field):?>
                <td><?=$entity[$key]?></td>
                <?php endforeach?>
                <td>
                    <a href="/backend/<?=$module?>/edit?id=<?=$entity['id']?>" class="btn btn-success  btn-xs btn-block">Editar</a>
                </td>
                <td>
                    <a href="/backend/<?=$module?>/delete?id=<?=$entity['id']?>" class="btn btn-danger  btn-xs btn-block eliminar">Eliminar</a>                  
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

  </div>
</div>


<script type="text/javascript">
  $(".eliminar").on("click", function(){
    alert("No se puede eliminar una Categoria si esta aun contiene Sintomas Asociados.")
  })
</script>