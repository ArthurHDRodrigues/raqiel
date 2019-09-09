<?php

class searchTokenVisual{
  public function __construct(){}

 public function printSearchBar(){?>
    <form method='POST' action= 'index.php' class='form-inline'>
      <div class="container">
        Pesquisa chamados:
        <div class="row">
          <div class="col-sm">
            <div class='form-check-inline'>
              <input name="naoatendido" class='form-check-input' type='checkbox' value='1' id='Não atendido'>
              <label class='form-check-label' for='Não atendido'>
                Não atendido
              </label>
            </div>

            <div class='form-check-inline'>
              <input name="atendendo" class='form-check-input' type='checkbox' value='1' id='Em atendimento'>
              <label class='form-check-label' for='Em atendimento'>
                Em atendimento
              </label>
            </div>

            <div class='form-check-inline'>
              <input name="suspenso" class='form-check-input' type='checkbox' value='1' id='Suspenso'>
              <label class='form-check-label' for='Suspenso'>
                Suspenso
              </label>
            </div>

            <div class='form-check-inline'>
              <input name="atendido" class='form-check-input' type='checkbox' value='1' id='Atendido'>
              <label class='form-check-label' for='Atendido'>
                Atendido
              </label>
            </div>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
          </div>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class='form-check-inline'>
              <input name="Telefonia" class='form-check-input' type='checkbox' value='1' id='Telefonia'>
              <label class='form-check-label' for='Telefonia'>
                Telefonia
              </label>
            </div>
            <div class='form-check-inline'>
              <input name = "Notebook" class='form-check-input' type='checkbox' value='1' id='Notebook'>
              <label class='form-check-label' for='Notebook'>
                Notebook
              </label>
            </div>
          </div>
        </div>
      </div>
    </form>
    <hr><?php
  }
}

