<h1>Listado de Ordenes</h1>
<table class="table">
    <tr>
        <th>Numero de Orden</th>
        <th>Estado</th>
        <th>Fecha de pedido</th>
        <th>Forma de Pago</th>
        <th>Forma de Entrega</th>
        <th>Dirección</th>
        <th>Detalle</th>
        <th>Modificar Estado</th>
    </tr>
    <?php
        $dataPayment = [
            'type'=>[1=>'Pago en Linea (TC)', 2=>'Pago en Tienda'],
            'delivery'=>[1=>'Retiro en Tienda', 2=>'Despacho a domicilio']
        ];
    ?>
    <?php foreach($orders as $order):?>
        <tr>
            <td><?=$order['id']?></td>
            <td><?=$status[$order['status']]?></td>
            <td><?=$order['created_at']?></td>
            <td><?=$dataPayment['type'][$order['payment_type']]?></td>
            <td><?=$dataPayment['delivery'][$order['payment_delivery']]?></td>
            <td><?=$order['delivery_address']?></td>
            <td><a href="/shop/order/details?id=<?=$order['id']?>" class="btn btn-success">ver detalle</a></td>


             <td>
                 <select class="status_select form-control" data-order-id="<?=$order['id'] ?>">
                    <option selected  value="0"> Elija Nuevo Estado</option>
                     <option value="1"> PENDIENTE</option>
                     <option value="2"> EN PROCESO</option>
                     <option value="3"> DESPACHADO</option>
                     <option value="4"> ENTREGADO</option>
                     <option value="5"> DEVOLUCION</option>
                     <option value="6"> ANULADO </option>
                 </select>
             </td>

        </tr>
    <?php endforeach?>
</table>
