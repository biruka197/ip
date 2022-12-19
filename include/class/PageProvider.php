<?php 

class PageProvider{
    private $con;
    public function __construct($con)
    {
        $this->con=$con;

    }
    public function indexPage($src){
        $html="<div class='grid-container'>
                  <div class='header'>
                   {$this->navbar()}
                  </div>
           
                  <div class='main'>{$this->mainCard($src)}</div>
           
                  <div class='footer'></div>
               </div>   

        ";
        return $html;
    }
    private function navbar(){
        $html="";
        $html="
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
                <div class='container'>
                    <ul class='nav navbar-nav  '>
                        <li class='active'><a href='#'>home</a></li>

                    </ul>
                    <ul class='nav navbar-nav navbar-right'>
                        <form class='navbar-form navbar-left' action='search.php' method='GET'>
                            <div class='input-group'>
                                <input type='text' class='form-control' placeholder='Search' name='search'>
                                <div class='input-group-btn'>
                                    <button class='btn btn-default' type='submit' name='search'>
                                        <i class='glyphicon glyphicon-search'></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
                        <li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
                    </ul>
                </div>
                

            </div>
        </div>
    </nav>
        
        ";
        return $html;
    }
private function mainCard(){
    $html="";
    $html="
    
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
}
