<?php

$livro = $database->query(
  "
  SELECT 
    l.id, 
    l.titulo,
    l.autor,
    l.descricao,
    ROUND(SUM(a.nota) / COUNT(a.id), 2) AS nota_avaliacao, 
    COUNT(a.id) AS count_avaliacoes
  FROM livros l
  LEFT JOIN avaliacoes a ON a.livro_id = l.id
  WHERE l.id = :id
  GROUP BY 
    l.id,
    l.titulo,
    l.autor,
    l.descricao;

",
  Livro::class,
  ['id' => $_GET['id']]
)->fetch();

$avaliacoes = $database->query('select * from avaliacoes where livro_id = :id', Avaliacao::class, ['id' => $_GET['id']])->fetchAll();

view('livro', compact('livro', 'avaliacoes'));
