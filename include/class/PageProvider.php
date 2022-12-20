<?php

class PageProvider
{
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function indexPage($src)
    {
        $html = "<div class='grid-container'>
                  <div class='header'>
                   {$this->navbar()}
                  </div>
           
                  <div class='main'>{$this->mainCard($src)}</div>
           
                  <div class='footer'></div>
               </div>   

        ";
        return $html;
    }
    public function form($err,$dis)
    {
        $html = "<div class='grid-container'>
                  <div class='header'>
             
                  </div>
           
                  <div class='main'>{$this->forms($err,$dis)}</div>
           
                  <div class='footer'></div>
               </div>   

        ";
        return $html;
    }

    private function navbar( )
    {
        $html = "";
        $html = "
        <nav class='navbar navbar-inverse'>
        <div class='container-fluid'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='#'>KURUIMG</a>
            </div>
            <div class='collapse navbar-collapse ' id='myNavbar'>
                <div class='container'>";
                if (isset($_SESSION["un"])) {
                   $html.="  <ul class='nav navbar-nav  '>
                   <li class=''>
                    <a class='navbar-brand x' href='#'>
          <span>  <img  src='{$_SESSION['uimg']}' class='rounded-circle' width='50' width='40' alt='logo'></span>

         </a>
                   </li>
                   <li>
                   <a class='navbar-brand x' href='#'>{$_SESSION['un']}</a>
                   </li>
                   

               </ul>";
                }
                  
                   $html.=" <ul class='nav navbar-nav navbar-right'>
                        <form class='navbar-form navbar-left' action='search.php' method='GET'>
                            <div class='input-group'>
                                <input type='text' class='form-control' placeholder='Search' name='search'>
                                <div class='input-group-btn'>
                                    <button class='btn btn-default' type='submit' name='search'>
                                        <i class='glyphicon glyphicon-search'></i>
                                    </button>
                                </div>
                            </div>
                        </form>";

                        if (isset($_SESSION['un'])) {
                            $html.="  <li><a href=''><span class='glyphicon glyphicon-user'></span> profile</a></li>
                            <li><a href=''><span class='glyphicon glyphicon-log-out'></span> log out </a></li>";
                        }
                        else{
                            $html.="  
                            <li><a href=''><span class='glyphicon glyphicon-log-in'></span> log in </a></li>";
                        }
                    $html.="
                    </ul>
            </div>
        </div>
    </nav>
         ";
         if (!isset($_SESSION['un'])) {
          $html.="    <div class='container'>
          <div class='alert alert-warning alert-dismissible'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>login or signup</strong> u are not loged in
          </div>
        </div>";
         }
        return $html;
    }
    private function mainCard()
    {
        $html = "";
        $html = "
    
    <div class='container'>
    <div class='row'>
        <div class='row'> 
       
             
                <div class='col-lg-3 col-md-4 col-xs-6 thumb'>
                            <a class='thumbnail' href='#' data-image-id='' data-toggle='modal' data-title='ola'
                                data-image='./assets/img/uploded/a.jpg'
                                data-target='#image-gallery'>
                                <img class='img-thumbnail'
                                    src='./assets/img/uploded/a.jpg'
                                    alt=''>
                            </a>
                        </div>
                
            <div class='modal fade' id='image-gallery' tabindex='-1' role='dialog'
                    aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog modal-lg'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h4 class='modal-title' id='image-gallery-title'></h4>
                                <button type='button' class='close' data-dismiss='modal'><span
                                        aria-hidden='true'>×</span><span class='sr-only'>Close</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <img id='image-gallery-image' class='img-responsive col-md-12' src=''>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary float-left'
                                    id='show-previous-image'><i class='fa fa-arrow-left'></i>
                                </button>

                                <button type='button' id='show-next-image' class='btn btn-secondary float-right'><i
                                        class='fa fa-arrow-right'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ";
        return $html;
    }
    private function forms($err,$dis)
    {
        $html = "";
        $html = "
    
        <div class='container container_form'>
       
        <div class='frame'>
      
            <div class='nav nav-form'>
            
                <ul class='links'>
                    <li class='signin-active'><a class='btn'>Log IN</a></li>
                    <li class='signup-inactive'><a class='btn'>Sign Up</a></li>
                </ul>
               
            </div>
            <div class='alert alert-danger card' style='display: $dis; text-align: left; role='alert'>
            $err
           </div>
            <div>
                <form class='form-signin' action='signin.php' method='post'>
                    <label for='username'>username</label>
                    <input class='form-styling' type='text' name='uname' placeholder='' />
                    <label for='password'>Password</label>
                    <input class='form-styling' type='password' name='pw' placeholder='' />
                    <div class='btn-animate'> 
                      <input type='submit' value='signin' class='btn-signin' name='submit'>
                    </div>
                </form>
                <form class='form-signup overflow-auto' action='signup.php' method='POST' enctype='multipart/form-data'>
                    <label for='firstname'>First name</label>
                    <input class='form-styling' type='text' name='fname' required />
                    <label for='lastname'>Last name</label>
                    <input class='form-styling' type='text' name='lname' required />
                    <label for='username'>Username</label>
                    <input class='form-styling' type='text' name='uname' required />
                    <label for='email'>Email</label>
                    <input class='form-styling' type='email' name='email' required />
                    <label for='dob'>Enter Date Of Birth</label>
                    <input class='form-styling' type='date' name='dob' required />
                    <select name='sex' class='form-styling' id='sex' required>
                        <option value=''>choose Sex</option>
                        <option value='Male'>Male</option>
                        <option value='female'>female</option>
                    </select>
                    <label for='password'>password</label>
                    <input class='form-styling' type='password' name='pw' required />
                    <label for='password'>Confirm password</label>
                    <input class='form-styling' type='password' name='cpw' required />
                    <input type='file' class='form-styling ' name='img' id=''>
                    <input type='submit' name='submit' class=' btn-signup' value='Sign UP'>
                </form>
            
            </div>
          
        </div
        
        ";
        return $html;
    }
}
