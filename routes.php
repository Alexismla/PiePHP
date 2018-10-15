<?php

namespace Core;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);

Router::connect('/register', ['controller' => 'user', 'action' => 'register']);

Router::connect('/login', ['controller' => 'user', 'action' => 'login']);

Router::connect('/profil', ['controller' => 'user', 'action' => 'profil']);
	