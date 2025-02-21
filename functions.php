<?php

function view($view, $data = [])
{
  foreach ($data as $key => $value) {

    $$key = $value;
  }

  require "views/template/app.php";
}

function dd(...$data) {
  echo "<pre>";
  var_dump($data);
  echo "</pre>";
  die();
}

function abort($code)
{
  http_response_code($code);
  view($code);
  die();
}

function flash(){
  return new Flash;
}

function config($chave = null){
  $config = require 'config.php';

  if(strlen($chave) > 0){
    return $config[$chave];
  }

  return $config;
}

function auth(){
  if(!isset($_SESSION['auth'])){
    return null;
  }

  return $_SESSION['auth'];
}
