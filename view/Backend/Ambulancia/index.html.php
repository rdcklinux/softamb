<div class="row">
<div class="col-md-2"></div>
  <div class="col-md-8">

    <h1><?=$vtitle?></h1>
    <br>
    <a href="/backend/<?=$module?>/new" class="btn btn-info">Nueva <?=ucfirst($module)?></a>
    <br><br>
    <table class="table data-table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <?php foreach($fields as $field):?>
            <th><?=$field['name']?></th>
            <?php endforeach?>
            <th>Disponibilidad</th>
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
                  <?php if (isSet($entity['persona_id'])): ?>
                     <a href="/backend/ambulancia/liberarAmbulancia?id=<?=$entity['id']?>" class="btn btn-warning btn-xs btn-block liberar_ambulancia">Liberar Ambulancia</a> 
                  <?php else: ?>
                     <a href="#" class="btn btn-default btn-xs btn-block "><span class="text-success">Disponible</span></a>                                
                  <?php endif ?> 
                </td>


                <td>
                    <a href="/backend/<?=$module?>/edit?id=<?=$entity['id']?>" class="btn btn-success btn-xs btn-block">Editar</a>                
                </td>
                <td>
                    <a href="/backend/<?=$module?>/delete?id=<?=$entity['id']?>" class="btn btn-danger btn-xs btn-block">Eliminar</a>                
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    
  </div>
</div>


<script type="text/javascript">
  

    // $(".liberar_ambulancia").on("click", function(e){
    //   var btn = $(this)
    //   var cliente_seteado = btn.data("cliente-seteado") == "1"
    //   var user_id = "<?= $_SESSION['selectedCliente']['id'] ?>"

    //   if (cliente_seteado == false) {
    //     alert("debe seleccionar un cliente antes de asignarle una ambulancia")
    //     return
    //   }

    //   $.ajax({
    //     url: "/backend/persona/asignarAmbulancia",
    //     type: "POST",
    //     dataType:'json',
    //     data: { user_id: user_id},
    //     success: function(response){
    //       console.log(response)
    //       window.location = response['alert_param'];
    //     }
    //   });

    // })


</script>