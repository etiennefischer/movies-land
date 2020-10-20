<?php
session_start();

if  (isset($_GET['clear']) == "true") {
    $_SESSION = [];
    session_destroy();
}

$contents = file_get_contents(__DIR__ . '/config/env.json');
$obj = json_decode($contents);

define('ENV', $obj->env);



require ('src/controller/Add.php');
require ('src/controller/Archives.php');
require ('src/controller/Category.php');
require ('src/controller/Details.php');
require ('src/controller/Home.php');
require ('src/controller/List_movies.php');
require ('src/controller/Loans.php');
require ('src/controller/Modify.php');
require ('src/controller/Whishlist.php');
require ('src/model/Model.php');


$page = filter_input(INPUT_GET,"page");
//$page = $_SERVER['REDIRECT_URL'];

$route= [

    "home" => Home::class,
    "add"  => Add::class,
    "list"  => List_movies::class,
    "archives"  => Archives::class,
    "details"  => Details::class,
    "categories"  => Category::class,
    "loans"  => Loans::class,
    "whishlist"  => Whishlist::class

];

// if(isset($_SESSION['logged'])) {


// }


foreach ($route as $routeValue => $className) {

    if ($page === $routeValue) {

        $controller = new $className;
        $controller->manage();
        break;  

    }

}

if(!isset($controller)) {

    //ERROR 404
    $controller = new Home();
    $controller->manage();
}

?>