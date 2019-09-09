<?php

class tecnicoModel{
  public $nome;
  public $color;
  public $senha;
  public function __construct($nome,$senha,$color = "#000000"){
    $this->nome = $nome;
    $this->senha = $senha;
    $this->color = $color;
    }
  }
