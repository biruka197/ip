<?php
require_once("include/default.php");

class FormSanitier{
    public static function sanInputText($inputtext){
        $inputtext=strip_tags($inputtext);
        $inputtext=str_replace(" ","",$inputtext);
        $inputtext=strtolower($inputtext);
        $inputtext=ucfirst($inputtext);
      

        return $inputtext;
    }
    public static function sanUserName($username){
        $username=strip_tags($username);
        $username=str_replace(" ","",$username);
        return $username;
    }
    
    public static function sanEmail($email){
        $email=strip_tags($email);
        $email=str_replace(" ","",$email);
        return $email;
    }
    public static function sanPassword($password){
        $password=strip_tags($password);
        $password=str_replace(" ","",$password);
        return $password;
    }
    public static function sanImg($img){
      $tardir="./assets/img/profile/".uniqid().basename($img);
      $tardir=str_replace(" ","_",$tardir);
      return $tardir;
      
    }
    
    public static function sanUserImgUpdate($img){
      $tardir="../assets/img/uploded/".uniqid().basename($img);
      $tardir=str_replace(" ","_",$tardir);
      return $tardir;
      
    }

    public static function sanPostImg($img){
      $tardir="../postimg/".basename($img);
      $tardir=str_replace(" ","_",$tardir);
      return $tardir;
      
    }
}

?>