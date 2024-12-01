<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

//configuración de la base path
$app->setBasePath("/tecweb_copia/practicas/p13/backend");

// Middleware para habilitar errores
$app->addErrorMiddleware(true, true, true);


//Obtener todos los productos 
$app->get('/products', function (Request $request, Response $response, $args) {
    require_once __DIR__ . '/product-list.php';
    return $response->withHeader('Content-Type', 'application/json');
});

//Obtener producto con ID
$app->get('/products/{id}', function (Request $request, Response $response, $args) {
    $_POST['id'] = $args['id'];
    require_once __DIR__ . '/product-single.php';
    return $response->withHeader('Content-Type', 'application/json');
});

//buscar producto
$app->get('/products/search/{term}', function (Request $request, Response $response, $args) {
    $_GET['search'] = $args['term'];
    require_once __DIR__ . '/product-search.php';
    return $response->withHeader('Content-Type', 'application/json');
});

//añadir producto
$app->post('/products', function (Request $request, Response $response, $args) {
    $_POST = $request->getParsedBody();
    require_once __DIR__ . '/product-add.php';
    return $response->withHeader('Content-Type', 'application/json');
});

//Editar producto
$app->put('/products/{id}', function (Request $request, Response $response, $args) {
    $_POST = $request->getParsedBody();
    $_POST['id'] = $args['id'];
    require_once __DIR__ . '/product-edit.php';
    return $response->withHeader('Content-Type', 'application/json');
});
//Borrar producto
$app->delete('/products/{id}', function (Request $request, Response $response, $args) {
    $_POST['id'] = $args['id'];
    require_once __DIR__ . '/product-delete.php';
    return $response->withHeader('Content-Type', 'application/json');
});


//Para manejar errores por si acaso xd $app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorMiddleware->setDefaultErrorHandler(function (
    Request $request,
    Throwable $exception,
    bool $displayErrorDetails
) use ($app) {
    $response = $app->getResponseFactory()->createResponse();
    $response->getBody()->write(json_encode([
        'error' => $exception->getMessage(),
    ]));
    return $response->withHeader('Content-Type', 'application/json');
});


//Correr el programa
$app->run();
?>