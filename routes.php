<?php
use Core\Router;
Router::connect('/PiePHP/', ['controller' => 'app', 'action' => 'index']);
Router::connect("/PiePHP/user/add", ['controller' => 'user', 'action' => 'add']);
Router::connect("/PiePHP/user", ['controller' => 'user', 'action' => 'index']);
Router::connect("/PiePHP/user/register", ['controller' => 'user', 'action' => 'register']);
Router::connect("/PiePHP/user/login", ['controller' => 'user', 'action' => 'login']);
Router::connect("/PiePHP/pet", ['controller' => 'pet', 'action' => 'index']);