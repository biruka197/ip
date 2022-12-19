<?php
require_once('include/header.php');

$form = new PageProvider($con);

    echo $form->form();

require_once('include/footer.php');
?>