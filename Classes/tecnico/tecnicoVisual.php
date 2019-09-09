<?php
class tecnicoVisual{
  public function printTecnicoSection($ModelTec){?>
    <div class="container">
      <div class="row">
        <div class="col"></div>
        <div class="col-6">
          <h2>Seu perfil</h2>
        </div>
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col"></div>
        <div class="col-6">
          Técnico: <?php echo  $ModelTec->nome ?>
        </div>
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col"></div>
        <div class="col-6">
          <form method='POST' action="../backEnd/formActions/changePasswd.php">
            <div class="form-group">
              <input name="nome" type="hidden" class="form-control" id="nome" value=<?php echo  $ModelTec->nome ?>></input>
              <input name="senha" type="text" class="form-control" id="senha" placeholder="Digite sua nova senha"></input>
              <small class="form-text text-muted">A senha é propositalmente visivel</small>
            </div>
            <button type="submit" class="btn btn-primary">Salve</button>
          </form>
        </div>
        <div class="col"></div>
      </div>
    </div>

  <hr>
  <div class="container">
    <div class="row">
      <div class="col"></div>
      <div class="col-6">
        <h2>Adicionar novo técnico</h2>
      </div>
      <div class="col"></div>
    </div>
    <div class="row">
      <div class="col"></div>
      <div class="col-6">
        <form method='POST' action="../backEnd/formActions/addTec.php">
          <div class="form-group">
            <input name="nome" type="text" class="form-control" id="nome" placeholder="Digite o nome"></input>
          </div>
          <div class="form-group">
            <input name="senha" type="password" class="form-control" id="senha" placeholder="Digite a senha"></input>
          </div>
          <button type="submit" class="btn btn-primary">submit</button>
        </form>
      </div>
      <div class="col"></div>
    </div>
  </div>
 <?php
}
}
