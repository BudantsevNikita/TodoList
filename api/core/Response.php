<?php

namespace Core;

class Response
{


  public static function json($params = ['success' => false, 'data' => 'not found'], $statusCode = 404)
  {
    http_response_code($statusCode);
    echo json_encode($params);
  }
}
