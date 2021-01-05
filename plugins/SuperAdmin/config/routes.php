<?php
use Cake\Routing\Route\DashedRoute;

$routes->plugin(
    'SuperAdmin',
    ['path' => '/super-admin'],
    function ($routes) {
        $routes->setRouteClass(DashedRoute::class);

        $routes->connect('/login', ['controller' => 'Superadmin', 'action' => 'login']);
        $routes->connect('/index', ['controller' => 'Superadmin', 'action' => 'index']);
        $routes->connect('/logout', ['controller' => 'Superadmin', 'action' => 'logout']);
        $routes->connect('/verify-otp', ['controller' => 'Superadmin', 'action' => 'verifyOtp']);
        $routes->connect('/forgot-password', ['controller' => 'Superadmin', 'action' => 'forgotPassword']);
        $routes->connect('/reset-password/{id}',['controller' => 'Superadmin', 'action' => 'resetPassword'],['pass' => ['id']]);
    }
);