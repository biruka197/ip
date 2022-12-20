<?php
require_once('include/header.php');


if (isset($_POST["submit"])) {
  $fn = FormSanitier::sanInputText($_POST["fname"]);
  $ln = FormSanitier::sanInputText($_POST["lname"]);
  $un = FormSanitier::sanUserName($_POST["uname"]);
  $em = FormSanitier::sanEmail($_POST["email"]);
  $pw = FormSanitier::sanPassword($_POST["pw"]);
  $pw2 = FormSanitier::sanPassword($_POST["cpw"]);
  $img = FormSanitier::sanImg($_FILES["img"]["name"]);
  $img_tmp = $_FILES["img"]["tmp_name"];
  $dob = $_POST["dob"];
  $sex = $_POST["sex"];

  $account = new Account($con);
  $signup = $account->register($fn, $ln, $un, $em, $dob, $sex, $pw, $pw2, $img, $img_tmp);
  if ($signup == 1) {
    echo $signup;
    header("Location:http://localhost/kuruimg/index.php");
  } else {
    $url = $signup;
    //echo $url;
   // echo "oo";
    header("Location:$url");
  }
}

require_once('include/footer.php');
