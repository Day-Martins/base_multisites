<?php

namespace Drupal\bagov_base_blocks\Utils;

class Estrategias
{
  public function estrategia_de_edital($node)
  {
    if ($node->hasField('field_midias_editais')) {
      $node->field_midias = $node->field_midias_editais;
    }

    if ($node->hasField('field_categorias_editais')) {
      $node->field_categorias = $node->field_categorias_editais;
    }

    return $node;
  }

  public function estrategia_de_publicacao($node)
  {

    if ($node->hasField('field_midias_publicacao')) {
      $node->field_midias = $node->field_midias_publicacao;
    }

    if ($node->hasField('field_categorias_publicacao')) {
      $node->field_categorias = $node->field_categorias_publicacao;
    }

    return $node;
  }

  public function estrategia_de_licitacao($node)
  {

    if ($node->hasField('field_midias_licitacoes')) {
      $node->field_midias = $node->field_midias_licitacoes;
    }

    if ($node->hasField('field_categorias_licitacoes')) {
      $node->field_categorias = $node->field_categorias_licitacoes;
    }

    return $node;
  }

  public function estrategia_de_legislacao($node)
  {
    if ($node->hasField('field_midias_legislacao')) {
      $node->field_midias = $node->field_midias_legislacao;
    }

    if ($node->hasField('field_categorias_legislacao')) {
      $node->field_categorias = $node->field_categorias_legislacao;
    }

    return $node;
  }
}

class EstrategiaDePublicacao
{
  static function definirEstrategia($node)
  {
    $mapa = [
      'edital' => 'estrategia_de_edital',
      'publicacao' => 'estrategia_de_publicacao',
      'licitacao' => 'estrategia_de_licitacao',
      'legislacao' => 'estrategia_de_legislacao',
    ];

    $chave = $node->getType();

    $objeto = new Estrategias();

    if (array_key_exists($chave, $mapa)) {
      $metodoAssociado = $mapa[$chave];
      return $objeto->$metodoAssociado($node);
    }

    return $node;
  }
}
