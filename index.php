<!DOCTYPE html>
<html lang="pt-br">
<head>

  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title> ☯Abertura de Chamados Técnicos SI/IME/USP</title></head>

<!-- clone da antiga pag de abertura de chamados-->
<body>
  <h2><center>IME/USP<br>SI - Chamado Técnico</center></h2>
    <br><p>O acesso aos serviços do Suporte Técnico da Seção Técnica de Informática é através da abertura de "chamados técnicos", usando o formulário eletrônico. O formulário é enviado automaticamente à Seção Técnica de Informática para
o devido atendimento. O Suporte Técnico da Seção Técnica de Informática oferece também atendimento pessoal na sala 120 do Bloco A ou pelo telefone (11) 3091-6166 .
    </p><hr>

    <div class="container" style="background-color:lightgray">
    <h2> Formulário de abertura de chamado técnico: </h2>
    </div>

    <div class="container">
    <form method='POST' action= 'sendCht.php'>
      <h3>Seus dados</h3>
      <div class="form-group">
        <label for="Nome">Nome:</label>
        <input class="form-control" name ='nome' type='text'>
      </div>

      <div class="form-group">
        <label for="Email">E-mail:</label>
        <input class="form-control" name ='email' type='email'></input>
      </div>

      <div class="form-group">
        <label for="Ramal">Ramal:</label>
        <input class="form-control" name ='ramal' type='number'></input>
      </div>

      <div class="form-group">
        <label for="Setor">Setor:</label>
        <select class="form-control" name="usrsetor">
          <?php require("./inc/usrsetor.lst"); ?>
        </select>
      </div>

      <div class="form-group custom-control-inline">
        <label for="Sala">Bloco e sala:</label>

          <select  class="form-control"name = 'bloco'>
            <option> </option>
            <option value="A">Bloco A </option>
            <option value="B">Bloco B </option>
            <option value="C">Bloco C </option>
          </select>
          <input class="form-control" name ='sala' type='number'></input>
      </div>

      <h3>Dados do seu chamado</h3>
      <div class="form-group">
        <label for="Patrimonio">Nº de patrimônio:</label>
        <input  name ='patrimonio' type='number'></input>
      </div>

      <div class="custom-control custom-checkbox custom-control-inline" >
        <input name="notebook" type="checkbox" class="custom-control-input" id="notebook"/> <!-- name="notebook"-->
        <label class="custom-control-label" for="notebook">Notebook</label>
      </div>


      <div class="custom-control custom-checkbox custom-control-inline">
        <input name="telefonia" type="checkbox" class="custom-control-input" id="telefonia"/>
        <label class="custom-control-label" for="telefonia">Telefonia</label>
      </div>

      <div class="form-group">
        Solicitação:<textarea name='sol' rows='6'cols='60'></textarea>
      </div>

      <div class="form-group">
        <div>
          O serviço pode ser executado na sua ausência ?
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type='radio' id="sim" name = 'atendimento_na_ausencia' class="custom-control-input" value=1  CHECKED='checked'></input>
          <label class="custom-control-label" for="sim">Sim</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type='radio' id="não" name = 'atendimento_na_ausencia' class="custom-control-input" value=0></input>
          <label class="custom-control-label" for="não">Não</label>
        </div>
      </div>

      <div class="form-group">
        Horário preferencial de atendimento <input name ='horario_preferencial' size='60' type='text'></input>
        <small id="hrAtendimento" class="form-text text-muted">Horário de atendimento: seg-sex, das 8 às 17h</small>
      </div>

      <div class="form-group">
        <input type=submit value=Enviar class="btn btn-primary">
     </div>

    </form>
    </div>
    <hr>

    <font> Protótipo de sistema de chamado. Codinome: Ramiel </font>
</body>
</html>
