<?php

if (!auth()) {
  header('location: /');
  exit();
}

$livros = $database->query(
  'select * from livros where usuario_id = :id',
  Livro::class,
  ['id' => auth()->id]
);

view("meus-livros", compact('livros'));
