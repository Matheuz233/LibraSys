<?php


function view($view, $data = [])
{
  foreach ($data as $key => $value) {

    $$key = $value;
  }

  require "views/template/app.php";
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
