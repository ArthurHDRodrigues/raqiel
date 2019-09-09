<?php
class chtModel{
  #modelo

  public $id;
  public $nome;
  public $email;
  public $ramal;
  public $sala;
  public $usrsetor;
  public $sol;
  public $tipo;
  public $status;
  public $data;
  public $patrimonio;
  public $atendimento_na_ausencia;
  public $horario_preferencial;

  public function __construct($row = array('id','nome','email','ramal','sala','setor','sol','tipo','status','data','patrimonio','atendimento','horario')){
    $this->id = $row[0];
    $this->nome = $row[1];
    $this->email = $row[2];
    $this->ramal = $row[3];
    $this->sala = $row[4];
    $this->usrsetor = $row[5];
    $this->sol = $row[6];
    $this->tipo = $row[7];
    $this->status = $row[8]; //ta na representação numerica
    $this->data = $row[9];
    $this->patrimonio = $row[10];
    $this->atendimento_na_ausencia = $row[11];
    $this->horario_preferencial = $row[12];
  }
}
