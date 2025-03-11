<?php if (isset($errors)) : ?>
  <div class="p-4 mb-4 bg-red-50 border border-red-200 rounded-md">
    <?php foreach ($errors as $error) : ?>
      <p class="text-red-500 text-sm"><?= $error ?></p>
    <?php endforeach ?>
  </div>
<?php endif ?>