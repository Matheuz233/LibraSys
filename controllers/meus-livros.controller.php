<?php

if (!auth()) {
  header('location: /');
  exit();
}

$livros = Livro::meus_livros(auth()->id);

view("meus-livros", compact('livros'));
