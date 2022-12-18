<?php 

class PageProvider{
    private $con;
    public function __construct($con)
    {
        $this->con=$con;

    }
    public function indexPage(){
        $html="<div class='grid-container'>
                  <div class='header'>
                   {$this->navbar()}
                  </div>
                  <div class='left'>
                  ols</div>
                  <div class='main'>ols</div>
                  <div class='right'>ols</div>
                  <div class='footer'>ols</div>
               </div>   

        ";
        return $html;
    }
    public function navbar(){
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
}
?>