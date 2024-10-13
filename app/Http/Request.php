<?php

namespace App\Http;

class Request
{
  protected $segments = [];
  protected $controller;
  protected $method;

  public function __construct()
  {
    // Obtenemos los segmentos de la URL
    $this->segments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    $this->setController();
    $this->setMethod();
  }

  public function setController()
  {
    // Si no hay controlador en la URL, usamos 'home'
    $this->controller = empty($this->segments[0]) ? 'home' : $this->segments[0];
  }

  public function setMethod()
  {
    // Si no hay método en la URL, usamos 'index'
    $this->method = empty($this->segments[1]) ? 'index' : $this->segments[1];
  }

  public function getController()
  {
    // Convertimos el controlador a formato PascalCase y le añadimos 'Controller'
    $controller = ucfirst($this->controller);

    return "App\Http\Controllers\\{$controller}Controller";
  }

  public function getMethod()
  {
    return $this->method;
  }

  public function send()
  {
    $controller = $this->getController();
    $method = $this->getMethod();

    // Validamos si la clase del controlador existe
    if (!class_exists($controller)) {    
      return $this->handleError(404, "Controller {$controller} not found");
    }

    $controllerInstance = new $controller;

    // Ejecutamos el método y capturamos la respuesta
    $response = call_user_func([$controllerInstance, $method]);

    // Verificamos si la respuesta es una instancia de la clase Response
    if ($response instanceof Response) {
      $response->send();
    }     
  }

  protected function handleError($code, $message)
  {
    // Manejamos el error mostrando un mensaje y el código HTTP adecuado
    http_response_code($code);
    echo "<h1>Error {$code}</h1>";
    echo "<p>{$message}</p>";
  }
}
