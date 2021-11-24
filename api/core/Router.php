<?php

namespace Core;

class Router
{

  public function getTrack($routes, $query, $requestMethod)
  {


    $querySplitByGetParam = explode('?', $query);
    $query = $querySplitByGetParam[0];
    $getParam = '';
    if (count($querySplitByGetParam) === 2) {
      $getParam = $querySplitByGetParam[1];
    }
    $params2 = [];
    $getParamItem = explode('&', $getParam);
    if ($getParam) {
      foreach ($getParamItem as $paramItem) {
        $explodeParam = explode('=', $paramItem);
        $params2[$explodeParam[0]] = $explodeParam[1];
      }
    }
    foreach ($routes as $route) {

      $pattern = $this->createPattern($route->path);

      if (preg_match($pattern, $query, $params)) {
        $params = $this->clearParams($params);
        $params['query'] = $params2;
        return new Track($route->controller, $route->action, $params, $requestMethod);
      }
    }

    return new Track('error', 'error', [], $requestMethod);
  }

  private function createPattern($path): string
  {
    return '#^' . preg_replace('#/:([^/]+)#', '/(?<$1>[^/]+)', $path) . '/?$#';
  }

  private function clearParams($params): array
  {
    $result = [];
    foreach ($params as $key => $param) {

      if (!is_int($key)) {
        $result[$key] = $param;
      }
    }

    return $result;
  }
}
