<?php


class Validacao
{
  public $validacoes;

  public static function validar($regras, $dados)
  {
    $validacao = new self;
    foreach ($regras as $campo => $regraCampo) {
      foreach ($regraCampo as $regra) {
        $valorCampo = $dados[$campo] ?? '';
        if (str_contains($regra, ":")) {
          $temp = explode(":", $regra);
          $regra = $temp[0];
          $regraAr = $temp[1];
          $validacao->$regra($regraAr, $campo, $valorCampo);
        } else {
          $validacao->$regra($campo, $valorCampo);
        }
      }
    }

    return $validacao;
  }

  private function unique($tabela, $campo, $valor)
  {
    if (strlen($valor) == 0) {
      return;
    }

    $db = new Database(config('database'));

    $resultado = $db->query(
      query: "select * from $tabela where $campo = :valor",
      params: ['valor' => $valor]
    )->fetch();

    if ($resultado) {
      $this->validacoes[] = "O $campo já está em uso";
    }
  }

  private function required($campo, $valor)
  {
    if (strlen($valor) == 0) {
      $this->validacoes[] = "O campo $campo é obrigatório";
    }
  }

  private function email($campo, $valor)
  {
    if (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {
      $this->validacoes[] = "O campo $campo deve ser um email válido";
    }
  }

  private function min($min, $campo, $valor)
  {
    if (strlen($valor) < $min) {
      $this->validacoes[] = "O campo $campo deve ter no mínimo $min caracteres";
    }
  }

  private function max($max, $campo, $valor)
  {
    if (strlen($valor) > $max) {
      $this->validacoes[] = "O campo $campo deve ter no máximo $max caracteres";
    }
  }

  public function naoPassou($formulario = null)
  {
    $chave = 'validacoes';

    if ($formulario) {
      $chave .= "_{$formulario}";
    }

    flash()->push($chave, $this->validacoes);

    return !empty($this->validacoes);
  }
}
