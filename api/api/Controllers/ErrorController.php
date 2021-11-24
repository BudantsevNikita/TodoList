<?php

namespace Api\Controllers;

use Core\Controller;
use Core\Response;

class ErrorController extends Controller {

  public function getErrorAction(){
    return Response::json();
  }

}