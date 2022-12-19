<?php
class Account
{
    private $con;
    public $errorarr = [];
    private $allowedimg = ["jpg", "png"];
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function register($fn, $ln, $un, $em, $dob, $sex, $pw, $pw2,$img,$img_tmp){
        $this->validateName($fn);
        $this->validateName($ln);
        $this->validateusername($un);
        $this->validateEmail($em);
        $this->validateAge($dob);
        $this->validatePassword($pw,$pw2);
        $this->validateImageFormat($img,$img_tmp);
        if (empty($this->errorarr)) {
            return $this->inserIntoUser($fn, $ln, $un, $em, $dob, $sex, $pw, $img);
        } else {

     print_r($this->errorarr);
            return false;
        }

    }
    private function inserIntoUser($fn, $ln, $un, $em, $dob, $sex, $pw, $img)
    {
        $pw = password_hash($pw, PASSWORD_DEFAULT);
        $query = $this->con->prepare("INSERT INTO user(
    u_fname,
    u_lname,
    username,
    u_email,
    u_dob,
    u_sex,
    u_password,
    u_profile_img
    )VALUES(
        :fn,
        :ln,
        :un,
        :em,
        :dob,
        :sex,
        :pw,
        :img
    )
    ");
        $query->bindParam(":fn", $fn);
        $query->bindParam(":ln", $ln);
        $query->bindParam(":un", $un);
        $query->bindParam(":em", $em);
        $query->bindParam(":dob", $dob);
        $query->bindParam(":sex", $sex);
        $query->bindParam(":pw", $pw);
        $query->bindParam(":img", $img);
        return $query->execute();
    }
    private function validateName($name)
    {
        if (strlen($name) > 30 || strlen($name) < 3) {
            array_push($this->errorarr, "Invalid fname");
        }
    }
    private function validateusername($username)
    {
        if (strlen($username) > 30 || strlen($username) < 5) {
            array_push($this->errorarr, "Invalid userame");
            return;
        }
        $query = $this->con->prepare("SELECT * FROM user WHERE username=:un ");
        $query->bindParam(":un", $username);
        $query->execute();
        if ($query->rowCount() > 0) {
            array_push($this->errorarr, "Duplicate userame");
        }
    }
    private function validateEmail($email)
    {
        if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {

            array_push($this->errorarr, "Error email");
            return;
        }
        $query = $this->con->prepare("SELECT * FROM user WHERE u_email=:em ");
        $query->bindParam(":em", $email);
        $query->execute();

        if ($query->rowCount() > 0) {
            array_push($this->errorarr, "Dupilicated email ");
            return;
        }
    }
    private function validatePassword($pw1, $pw2)
    {
        if ($pw1 != $pw2) {
            array_push($this->errorarr, "password doesnot macth");
        }
        if (preg_match("/[^A-Za-z1-9]/", $pw1)) {
            array_push($this->errorarr, "password unallowd item");
            return;
        }
        if (strlen($pw1) < 5 || strlen($pw1) > 50) {

            array_push($this->errorarr, "password Invalid length");
            return;
        }
    }
    private function validateAge($age)
    {
        $date1 = new DateTime();
        $date2 = new DateTime("$age");
        $interval = $date1->diff($date2);
        $validdate = $interval->y;

        if ($validdate < 18) {
            array_push($this->errorarr, "Invalid age have to at list than 18 ");
            return;
        }
    }
    private function validateImageFormat($image, $image_tmp)
    {
        $p = pathinfo($image, PATHINFO_EXTENSION);



        if (in_array($p, $this->allowedimg)) {


            $img =  move_uploaded_file($image_tmp, $image);

            if ($img) {
            } else {
                echo $_FILES["img"]["error"];
            }

            return $img;
        } else {


            array_push($this->errorarr, "invalid image format");
        }
    }
}
