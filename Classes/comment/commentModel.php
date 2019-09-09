<?php
class commentModel{
  public $id;
  public $numCht;
  public $tecnico;
  public $comment;

  public function __construct($row = array([])){
    $this->id = $row[0];
    $this->numCht=$row[1];
    $this->tecnico=$row[2];
    $this->comment = $row[3];
  }
}
