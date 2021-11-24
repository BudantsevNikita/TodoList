<?php

namespace Core;



class Dispatcher
{

  public function getPage(Track $track)
  {
    $className = ucfirst($track->controller) . 'Controller';
    $fullName = "\\Api\\Controllers\\$className";
    $requestMethod = strtolower($track->requestMethod);
    $method = ucfirst($track->action);
    $fullMethod = $requestMethod . $method . 'Action';

    if (class_exists($fullName)) {


      $controller = new $fullName;

      if (method_exists($controller, $fullMethod)) {
        $result = $controller->{$fullMethod}($track->params);

        if ($result) {
          return $result;
        }
      } else {
        return Response::json([
          'success' => false,
          'data' => "$fullMethod not found in $fullName"
        ]);
      }
    } else {
      return Response::json(
        [
          'success' => false,
          'data' => "Controller $fullName not found"
        ]
      );
    }
  }
}
