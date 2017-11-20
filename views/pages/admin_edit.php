<h3>Редактирование страницы</h3><br>

<form  action="" method="post">
  <input type="hidden" name="id" value="<?=$data['page']['id']?>">
  <div class="form-group">
    <label for="alias">URL</label>
    <input type="text" name="alias" id="alias" value="<?=$data['page']['alias']?>" class="form-control">
  </div>

  <div class="form-group">
    <label for="title">Титул страницы</label>
    <input type="text" name="title" id="title" value="<?=$data['page']['title']?>" class="form-control">
  </div>

  <div class="form-group">
    <label for="content">Контент</label>
<textarea name="content" id="content" class="form-control"><?=$data['page']['content']?></textarea>
  </div>

  <div class="form-group">
    <label for="is_published">Опубликовано?</label>
    <input type="checkbox" name="is_published" id="is_published" <?php if($data['page']['is_published']){ ?>checked ="checked"<?php } ?> >
  </div>

  <input type="submit" class="btn btn-success">
</form>
