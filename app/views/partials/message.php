<?php

use Core\Session;
?>

<?php $successMessage = Session::getFlashMessage('success_message'); ?>
<?php if ($successMessage !== null) : ?>
  <div class="p-4 mb-4 bg-green-50 border border-green-200 rounded-md">
    <p class="text-green-500 text-sm"><?= $successMessage ?></p>
  </div>
<?php endif; ?>

<?php $errorMessage = Session::getFlashMessage('error_message'); ?>
<?php if ($errorMessage !== null) : ?>
  <div class="p-4 mb-4 bg-red-50 border border-red-200 rounded-md">
    <p class="text-red-500 text-sm"><?= $errorMessage ?></p>
  </div>
<?php endif; ?>