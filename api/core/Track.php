<?php

namespace Core;

class Track
{
  private string $controller;
  private string $action;
  private array $params;
  private string $requestMethod;

  public function __construct($controller, $action, $params, $requestMethod)
  {
    $this->controller = $controller;
    $this->action = $action;
    $this->params = $params;
    $this->requestMethod = $requestMethod;
  }

  public function __get($property)
  {
    return $this->$property;
  }
}