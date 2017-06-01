<table>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
  </tr>
<?php foreach($list as $row): ?>
  <tr>
      <td><?=$row['id']?></td>
      <td><?=$row['nombre']?></td>
  </tr>
<?php endforeach ?>
</table>
<h1><?=$user->getName()?></h1>

<img src="/images/demo.jpg"/>
<link rel="stylesheet" href="/css/site.css" />
