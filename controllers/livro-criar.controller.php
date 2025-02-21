<?php

require 'Validacao.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  header('location: /meus-livros');
  exit();
}

if (!auth()) {
  abort(403);
}

$usuario_id = auth()->id;
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$descricao = $_POST['descricao'];

$validacao = Validacao::validar([
  'titulo' => ['required', 'min:3'],
  'autor' => ['required'],
  'descricao' => ['required']
], $_POST);

if ($validacao->naoPassou()) {
  header('location: /meus-livros');
  exit();
}

$database->query(
  'insert into livros (titulo, autor, descricao, usuario_id) values (:titulo, :autor, :descricao, :usuario_id)',
  params: compact('titulo', 'autor', 'descricao', 'usuario_id')
);

flash()->push('mensagem', 'Livro criado com sucesso!');
header('location: /meus-livros');
exit();
