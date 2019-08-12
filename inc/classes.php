<?php

/****************\
|Todas as Classes|
|-> cht          |
|-> comment      |
|-> Tecnico      |
\****************/
 class chtVisual{
  #Essa classe assume que a pagina esta usando Bootstrap
  public function __construct(){}
  public function displayStatus($chtModel){
    #retorna uma string de html formatado para cada estado.

    $class = "";
    $text = '';
    switch($chtModel->status){
      case 0:
        $text = ["Não atendido","Iniciar Atendimento","Encerrar Atendimento","Suspender Chamado"]; //não usado
        $class = "bg-danger";
        break;
      case 1:
        $text = ["Em atendimento","Encerrar Atendimento","Suspender Chamado"];
        $class = "bg-success";
        break;
      case 2:
        $text = ["Atendido"];
        $class = "bg-info";
        break;
      case 3:
        $text = ["Suspenso","Iniciar Atendimento","Encerrar Atendimento"];
        $class = "bg-secondary";
        break;
    }?>
    <form method='POST' action= 'submitChangeStatus.php'>
    <input type='hidden' name='numCht' value=".$chtModel->id.">
      <div class='input-group mb-3'>

        <select name='status' class= "custom-select <?php echo $class?> text-white" onchange='this.form.submit()'>

        <?php foreach($text as $value){echo "<option>".$value."</option>";} ?>

    </select>
      </div>
    </form><?php
  }
  public function printCht($chtModel, $tecnico){
    require "../inc/connect.inc.php";
    ?>

    <div class='container'>
      <div class='row'>
        <div class='col col-lg-2'>
        <?php echo $this->displayStatus($chtModel)?>
        </div>
        <div class='col-sm'> #<?php echo $chtModel->data[2].$chtModel->data[3]."/". $chtModel->id."</div>"?>
        <div class='col-sm'> <?php echo $chtModel->nome?></div>
        <div class='col-sm'> <?php echo $chtModel->email?></div>
        <div class='col-sm'>sl<?php echo $chtModel->sala?></div>
        <div class='col-sm'><?php echo $chtModel->usrsetor?></div>
        <div class='col-sm'><?php echo$chtModel->patrimonio?></div>
      </div>
      <div class= 'row'>
      <div class='col-sm'>
      <?php echo $chtModel->sol?>
      </div>
      </div>
      <div class='row'><div class='col-sm'>Pode atender na ausência:
      <?php
      if($chtModel->atendimento_na_ausencia) echo " sim";
      else{echo "não |   Horario de atendimento: ". $chtModel->horario_preferencial;}?>
      </div></div>
      <div class='row'><div class='col-sm'>
      <?php
      $commentVisual = new commentVisual($chtModel->id);
      $commentVisual->printCommentSection($tecnico);?>
      </div>
      <?php if($chtModel->tipo == 1){ ?>
        <img src="../icons/note.png" style="width:150px;height:150px;">
      <?php }
      if($chtModel->tipo == 2){ ?>
        <img src="../icons/Tel.png" style="width:100px;height:100px;">
      <?php }?></div>
    </div>
    <hr><?php
  }
}

class chtController{
  public function __construct(){}
  public function carregarCht($status = ["0","1"],$tel,$note){
    return getCht($status,$tel,$note);
  }
}

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


class commentController{
    public function __construct(){}
}

class commentVisual{
  public function __construct($chtNum){
    $this->chtNum = $chtNum;
  }
  public function printCommentSection($tecnico){

    #Exibe todos os comentarios já postados
    $log = getComments($this->chtNum);
    $n = sizeof($log);?>

    <table>
      <tr height=10></tr>

      <?php
      if($n!=0)
        for($i = 0 ; $i < $n ; $i++){
          echo "<tr><td>" . $log[$i]->tecnico . "  |  </td><td>".$log[$i]->comment ."</td></tr>";
        }
      ?>

      <tr height=10></tr>
    </table>

      <!--#Exibe botão para comentar.-->
      <form method='POST' action= 'sendComment.php'>

      <input type='hidden' name='numCht' value=<?php echo $this->chtNum ?>>
      <input type='hidden' name='tecnico' value=<?php echo $tecnico?>>
      <textarea name='entrada' rows='2'cols='60'></textarea><br>

    <input type=submit value=Comentar class='btn btn-light'> </form><?php
  }
}

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
    <hr>

    <?php
  }
}
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

class tecnicoControler{
}
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
          <form method='POST' action="../inc/changePasswd.php">
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
        <form method='POST' action="../inc/addTec.php">
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
?>
