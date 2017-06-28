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

    $app->post("/pets", function() use ($app)  {
      $pet = new Pet($_POST['name'], microtime(true));
      $pet->save();
      // var_dump($pet->getBirth());
      return $app['twig']->render('create_pet.html.twig', array('newpet' => $pet));
    });

    $app->post("/delete_pets", function() use ($app) {
      Pet::deleteAll();
      return $app['twig']->render('delete_pet.html.twig');
    });

    return $app;

 ?>
