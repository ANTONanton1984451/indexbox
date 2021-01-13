<?php

require_once '../autoloader.php';

require_once '../routes.php';

require_once '../Helpers/functions.php';

return new App\Router\Router(new \App\Factories\RouteFactory(),new \App\Factories\RequestFactory());