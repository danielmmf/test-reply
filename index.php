<?php
require 'vendor/autoload.php';

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => 'templates',
));

// Create monolog logger and store logger in container as singleton 
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('slim-skeleton');
    $log->pushHandler(new \Monolog\Handler\StreamHandler('logs/app.log', \Monolog\Logger::DEBUG));
    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('templates/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());
// Define routes
$app->get('/', function () use ($app) {
    $endereco ='http://localhost/reply/reply/';
    // Sample log message
    $app->log->info("Slim-Skeleton '/' route");
    $mega = new MegaSorteio();
   
    $app->view->cartelas = $mega->montar_cartela();
    $app->view->endereco = 'testaraerarerae';


    $jogo1 = $mega->montar_cartela();
    $jogo2 = $mega->montar_cartela();
    $jogo3 = $mega->montar_cartela();


     $params = array(
                    'jogo1' => $mega->printa_table($jogo1),
                    'jogo2' => $mega->printa_table($jogo2),
                    'jogo3' => $mega->printa_table($jogo3),
                    'endereco' => $endereco
    );
   // die();
    // Render index view
    $app->render('index.html', $params);
});


$app->get('/envio', function () use ($app) {
    $endereco ='http://localhost/reply/reply/';
    // Sample log message
    $app->log->info("Slim-Skeleton '/' route");
    $mega = new MegaSorteio();
   
     $params = array(
                    
                    'endereco' => $endereco,
     
    );
   // die();
    // Render index view
    $app->render('envio.html', $params);
});


$app->post('/envio', function () use ($app) {
    $endereco ='http://localhost/reply/reply/';

    if (!isset($_FILES)) {
        echo "Nenhum arquivo enviado!!";
        return;
    }

    $imgs = array();

    $files = $_FILES['arquivo'];

 
    $name = uniqid('arquivo-'.date('Ymd').'-');
    try {
        move_uploaded_file($files['tmp_name'], 'uploads/' . $name);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
           
    $params = array(
        'endereco' => $endereco,
        'name' =>$name,
        'conteudo' => Reader::parser('uploads/' .$name)
    );

  $app->render('envio.html', $params);
});
// Run app
$app->run();
