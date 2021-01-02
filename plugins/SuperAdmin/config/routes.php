<?php
use Cake\Routing\Route\DashedRoute;

$routes->plugin(
    'SuperAdmin',
    ['path' => '/super-admin'],
    function ($routes) {
        $routes->setRouteClass(DashedRoute::class);

        $routes->get('/login', ['controller' => 'Superadmin', 'action' => 'login']);
        $routes->post('/login', ['controller' => 'Superadmin', 'action' => 'login']);
        $routes->get('/index', ['controller' => 'Superadmin', 'action' => 'index']);
        $routes->get('/logout', ['controller' => 'Superadmin', 'action' => 'logout']);
        $routes->get('/verify-otp', ['controller' => 'Superadmin', 'action' => 'verifyOtp']);
        $routes->post('/verify-otp', ['controller' => 'Superadmin', 'action' => 'verifyOtp']);
        // $routes->get('/contacts/{id}', ['controller' => 'Contacts', 'action' => 'view']);
        // $routes->put('/contacts/{id}', ['controller' => 'Contacts', 'action' => 'update']);
    }
);