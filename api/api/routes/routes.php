<?php

use Core\Route;

return [
  new Route('/api/', 'index', 'index'),
  new Route('/api/city/all/', 'city', 'cities'),
  new Route('/api/city/:cityName/', 'city', 'city'),
];