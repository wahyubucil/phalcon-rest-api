<?php

use Phalcon\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;

// Use Loader() to autoload our model
$loader = new Loader();

$loader->registerNamespaces(
    [
        'Store\Toys' => __DIR__ . '/models'
    ]
);

$loader->register();

$di = new FactoryDefault();

// Set up the database service
$di->set(
    'db',
    function() {
        return new PdoMysql(
            [
                'host' => '127.0.0.1',
                'username' => 'root',
                'password' => '',
                'dbname' => 'phalcon_basic'
            ]
        );
    }
);

// Create and bind the DI to the application
$app = new Micro($di);

// Retrieves all robots
$app->get(
    '/api/robots',
    function() {

    }
);

// Searches for robots with $name in their name
$app->get(
    '/api/robots/search/{name}',
    function($name) {

    }
);

// Retrieves robots based on primary key
$app->get(
    '/api/robots/{id:[0-9]+}',
    function($id) {

    }
);

// Adds a new robot
$app->post(
    '/api/robots',
    function() {

    }
);

// Updates robots based on primary key
$app->put(
    '/api/robots/{id:[0-9]+}',
    function($id) {

    }
);

// Deletes robots based on primary key
$app->delete(
    '/api/robots/{id:[0-9]+}',
    function($id) {

    }
);

$app->handle();

?>