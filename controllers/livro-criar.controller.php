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
$imagem = $_POST['imagem'];

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
  'insert into livros (titulo, autor, descricao, usuario_id, imagem) values (:titulo, :autor, :descricao, :usuario_id, :imagem)',
  params: compact('titulo', 'autor', 'descricao', 'usuario_id', 'imagem')
);

flash()->push('mensagem', 'Livro criado com sucesso!');
header('location: /meus-livros');
exit();
