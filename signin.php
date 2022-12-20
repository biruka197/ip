<?php
require_once('include/header.php');


if (isset($_POST["submit"])) {

  $un = FormSanitier::sanUserName($_POST["uname"]);

  $pw = FormSanitier::sanPassword($_POST["pw"]);


  $account = new Account($con);
  $signin = $account->logInUser($un, $pw);
  if ($signin==1) {
    header("Location:http://localhost/kuruimg/");
  } else {
     $url = $signin;
    echo $url;
    header("Location:$url");
  }
}

require_once('include/footer.php');
