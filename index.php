<?php 
    // use this for check user login or not
    
    // get page from url if not auto to home
    session_start(); // session start

    $page = $_GET['page'] ?? 'homepage';
    $publicpage = ['signin','signup'];

    // check user haved login or not and have page or not
    if(!isset($_SESSION['user']) && !in_array($page, $publicpage)){
        header('Location: index.php?page=signin');
        exit;
    }
    
    
    // call all controller from folder controller
    require_once 'app/controller/HomeController.php';
    require_once 'app/controller/SizeController.php';
    require_once 'app/controller/ItemController.php';
    require_once 'app/controller/AuthController.php';

    // new controller
    require_once 'app/controller/SignInController.php';
    require_once 'app/controller/SignUpController.php';
    

    // get func from ajax if not null
    $func =  $_POST['func'] ?? null;
    
    switch($page){

        // for signup
        case 'signup':
            $signup = new SignUpController();

            switch($func){  
                // create case register for call signup function 
                // from controller
                case 'register':
                    $signup->signup();
                break;

                default:
                    $signup->index();
                break;
            }
        break;

        // for signin
        case 'signin':
            $signin = new SignInController();

            switch($func){

                case "login":
                    $signin->login();   
                break;
                default:
                    $signin->index();
                break;
            }
        break;


        // home page
        case 'homepage':
            // cerate object from HomeController
            $home = new HomeController();
            switch($func){
                case 'logout':
                    $home->logout();
                break;
                // call function in HomeController like create,update,delete....
                default:
                    // default home page
                    $home->index();
                    break;
            }
        break;

        // size page
        case 'sizepage':
            // cerate object from HomeController
            $size = new SizeController();
            switch($func){

                // fetch-data
                case 'fetchdata':
                    $size->getAllData();
                break;

                case 'create_size':
                    $size->create();
                break;
                
                default:
              
                    // default home page
                    $size->index();
                break;
            }
        break;

        // item page
        case 'itempage':
            // cerate object from HomeController
            $item = new ItemController();
            switch($func){
                default:
                    // default home page
                    $item->index();
                    break;
            }
        break;
    }
?>