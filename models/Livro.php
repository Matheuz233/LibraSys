<?php

class Livro
{
  public $id;
  public $titulo;
  public $autor;
  public $descricao;
  public $usuario_id;
  public $nota_avaliacao;
  public $count_avaliacoes;
  public $imagem;

  public function query($where, $params)
  {
    $database = new Database(config('database'));

    return $database->query(
      "
      SELECT l.id, l.titulo, l.autor, l.descricao, l.imagem,
        ifnull(ROUND(SUM(a.nota) / 5.0, 2), 0) AS nota_avaliacao, 
        ifnull(COUNT(a.id), 0) AS count_avaliacoes
      FROM livros l
      LEFT JOIN avaliacoes a ON a.livro_id = l.id
      WHERE $where
      GROUP BY l.id, l.titulo, l.autor, l.descricao;",
      self::class,
      $params
    );
  }

  public static function get($id)
  {
    return (new self)->query('l.id = :id', ['id' => $id])->fetch();
  }

  public static function all($filtro = '')
  {
    return (new self)->query('titulo like :filtro', ['filtro' => "%$filtro%"])->fetchAll();
  }

  public static function meus_livros($usuario_id)
  {
    return (new self)->query('l.usuario_id = :usuario_id', ['usuario_id' => $usuario_id])->fetchAll();
  }
}
