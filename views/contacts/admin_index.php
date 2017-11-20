<h3>Сообщения</h3><br>
<table class="table table-striped" style="width:100%;">
  <tr>
    <td style="width:5%;">#</td>
    <td style="width:10%;">Имя</td>
    <td style="width:25%;">E-mail</td>
    <td style="width:50%;">Сообщение</td>
  </tr>

  <?php foreach ($data as $item) { ?>
    <tr>
      <td><?=$item['id']?></td>
      <td><?=$item['name']?></td>
      <td><?=$item['email']?></td>
      <td><?=$item['message']?></td>
    </tr>
<?php } ?>
</table>
