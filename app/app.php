<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Pet.php";

    session_start();

    if(empty($_SESSION['list_of_pets'])) {
      $_SESSION['list_of_pets'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array("twig.path" => __DIR__."/../views"
    ));


    $app->get("/", function() use ($app) {
      return $app["twig"]->render("pets.html.twig", array("pets" => Pet::getAll()));
    });

    return $app;

 ?>
