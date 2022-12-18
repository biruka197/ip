<?php
require_once('include/header.php');

$form = new PageProvider($con);
echo $form->indexPage() ?>

<?php
require_once('include/footer.php');
?>