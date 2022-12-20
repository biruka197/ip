<?php
require_once('include/header.php');

$form = new PageProvider($con);

$a[]=array("assets/img/uploded/img1.jpg","assets/img/uploded/k.jpg");
$f="assets/img/uploded/img1.jpg";
$un="biruk";
$link="a.php";
$link2="b.php";
$pro="ola";
$log="logout";
// foreach($a as $s)
// {
  // fix this by swich case and get method 
    echo $form->indexPage($f,$un,$pro,$log,$link,$link2);

      //  echo $form->indexPage($s[0],count($a));
   
//}

//
require_once('include/footer.php');
?>
<div ></div>