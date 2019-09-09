<?php

class chtController{
  public function __construct(){}
  public function carregarCht($status = ["0","1"],$tel,$note){
    return getCht($status,$tel,$note);
  }
}


 ?>
