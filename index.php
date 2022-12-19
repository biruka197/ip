<?php
require_once('include/header.php');

$form = new PageProvider($con);

$a[]=array("assets/img/uploded/img1.jpg","assets/img/uploded/k.jpg");

foreach($a as $s)
{
    // echo $form->indexPage($src[0]);

        echo $form->indexPage($s[0],count($a));
   
}


require_once('include/footer.php');
?>