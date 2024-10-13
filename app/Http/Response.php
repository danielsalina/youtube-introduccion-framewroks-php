<?php

namespace App\Http;

class Response
{

  public function __construct(protected $view){}

  public function getView()
  {
    return $this->view;
  }

  public function send()
  {
    $view = $this->getView();
    $content = file_get_contents(viewPath($view));
    require viewPath('layout');
  }
}