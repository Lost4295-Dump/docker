<?php
// On renvoie du JSON, car c'est un API
header("Content-Type: application/json; charset=utf8");
// Autoriser le front(Et à vrai dire n'importe quel host) à utiliser cet API pour s'afficher
header("Access-Control-Allow-Origin: *");


// Récupérer la requête en cours de traitement et en isoler le path
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// séparer le path dans un tableau en se basant sur les '/'
$uri = explode( '/', $uri );
(isset($_GET['familiar']) && $_GET['familiar'] === 'true')?$familiar=true:$familiar=false;
// echo $_GET['mon_param'];
// On n'expose que la route "hello" pour le moment.
// Les autres renvoient une erreur "Not Found"
if ($uri[2] === 'hello') {
    header('HTTP/1.1 200 OK');
    echo ($familiar)?"{ \"message\":\"Hi mom !\"}\n":"{ \"message\":\"Hello mom !\"}\n";
    exit();
} elseif ($uri[2] === 'world') {
    header('HTTP/1.1 200 OK');
    echo ($familiar)?"{ \"message\":\"Hi world !\"}\n":"{ \"message\":\"Hello world !\"}\n";
    exit();
} elseif ($uri[2] === 'friend') {
    header('HTTP/1.1 200 OK');
    echo ($familiar)?"{ \"message\":\"Hi friend !\"}\n":"{ \"message\":\"Hello friend !\"}\n";
    exit();
} elseif ($uri[2] === 'catto') {
    header('HTTP/1.1 200 OK');
    echo ($familiar)?"{ \"message\":\"Hi catto !\"}\n":"{ \"message\":\"Hello catto !\"}\n";
    exit();
} elseif ($uri[2] === 'doggo') {
    header('HTTP/1.1 200 OK');
    echo ($familiar)?"{ \"message\":\"Hi doggo !\"}\n":"{ \"message\":\"Hello doggo !\"}\n";
    exit();
} else {
    // Si le chemin demandé est "hello", alors on renvoie le header HTTP "OK" et on renvoie un message en JSON.
    header("HTTP/1.1 404 Not Found");
    exit();
}


