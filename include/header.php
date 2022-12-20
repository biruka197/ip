<?php 
require_once("default.php");
require_once("config.php");
require_once("class/PageProvider.php");
require_once("class/formSanitazer.php");
require_once("class/account.php");
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>

    <link rel="stylesheet" href="<?php echo URLASSET ?>style/style.css">
 
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'
        integrity='sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp' crossorigin='anonymous'>
    <title>Kuru Img</title>
</head>
<body>
