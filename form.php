<?php
require_once('include/header.php');

$form = new PageProvider($con);
if (isset($_GET["err"])) {
   // $err = $_GET["err"];
   $err="";
    for ($i=0; $i <$_GET["errcount"] ; $i++) { 
       $err .= $_GET["$i"]."<br>";
    }
    $dis = "block";
} else {
    $err = "";
    $dis = "none";
}
echo $form->form($err, $dis);


require_once('include/footer.php');
