<?php

use App\Core\{Router, Request};

require 'vendor/autoload.php';
require 'core/requirements.php';


Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());
