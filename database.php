<?php

class DB
{
  private  $db;

  public function __construct($config)
  {

    $driver = $config['driver'];

    $dsn = $driver . ':' . http_build_query($config, '', ';');

    if ($driver == 'sqlite') {
      $dsn = $driver . ":" . $config['database'];
    }

    $this->db = new PDO($dsn);
  }

  public function query($query, $class = null, $params = [])
  {
    $prepare = $this->db->prepare($query);

    if ($class) {
      $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
    }

    $prepare->execute($params);

    return $prepare;
  }
}

$database = new DB($config['database']);
