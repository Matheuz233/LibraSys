<?php

require 'Validacao.php';

// 1. Receber os dados do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['password'];

  $validacao = Validacao::validar([
    'email' => ['required', 'email'],
    'password' => ['required']
  ], $_POST);

  if ($validacao->naoPassou('login')) {
    header('location: /login');
    exit();
  }

  // 2. Fazer consulta no BD
  $usuario = $database->query(
    query: "
      select * from usuarios
      where email = :email
    ",
    class: Usuario::class,
    params: compact('email')
  )->fetch();

  if ($usuario) {
    if (!password_verify($_POST['password'], $usuario->senha)) {
      flash()->push('validacoes_login', ['E-mail ou senha inválidos']);
      header('location: /login');
      exit();
    }
  }

  if ($usuario) {
    $_SESSION['auth'] = $usuario;
    flash()->push('mensagem', "Seja Bem-Vindo(a)" . " " . $usuario->nome . "!");
    $_SESSION['mensagem'] = "Seja Bem-Vindo" . $usuario->nome . "!";
    header('location: /');
    exit();
  }
}
view('login');
