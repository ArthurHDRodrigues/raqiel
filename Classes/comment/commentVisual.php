<?php
class commentVisual{
  public function __construct($chtNum){
    $this->chtNum = $chtNum;
  }
  public function printCommentSection($tecnico){

    #Exibe todos os comentarios já postados
    $log = getComments($this->chtNum);
    $n = sizeof($log);?>

    <br>
    <div class="container">
      <?php
        if($n != 0){
          if($n>3){
            echo "<a class='btn btn-link' type='button' role='button' data-toggle='collapse' href='#". $this->chtNum."' id='hide'>
                Mostrar Comentarios
            </a>";
            echo "<div class='row collapse' id='".$this->chtNum."'><div class='col'>";
        };

          for($i = 0 ; $i < $n ; $i++){
            ?>

            <div class="row justify-content-start border-top">
              <div class="col-1">
                <?php
                echo $log[$i]->tecnico;
                 ?>
              </div>
              <div class="col-4 justify-content-start">
                <?php
                echo $log[$i]->comment;
                ?>
              </div>
              <div class="col-4"></div>

              <?php
              if($_SESSION['user'] == $log[$i]->tecnico){
                $this->printEditOptions($log[$i]);
              }
              else{?>

              </div> <?php
            }

              ?>

            <!--</div>-->

        <?php }
        if($n>3){
          echo '</div></div>';
        };
       }?>



    <!--#Exibe botão para comentar.-->
    <form method='POST' action="../backEnd/formActions/sendComment.php">
      <input type='hidden' name='numCht' value=<?php echo $this->chtNum ?>>
      <input type='hidden' name='tecnico' value=<?php echo $tecnico?>>

        <div class='row'>
          <div class='col'>
            <textarea class='form-control' name='entrada' rows='2'cols='60'></textarea>
            <!--<h2><marquee>raqer aqui<br/></marquee></h2>
            <h2><marquee>raqer</h2>-->
          </div>
        </div>
        <br>
        <div class='row'>
          <div class='col'>
            <input type=submit value=Comentar class="btn btn-secondary">
          </div>
        </div>

    </form>
  </div>

      <?php
  }#

  public function printEditOptions($comment){?>
  <!-- INICIO -->
  <div class="col">
    <p>
        <a class="btn btn-link" type="button" role="button" data-toggle="collapse" href='#editComment<?php echo $comment->id?>' id="hide">
            Editar
        </a>
    </p>
  </div>
  <div class="col-sm">
     <form method='POST' action="../backEnd/formActions/removeComment.php">
          <input type="hidden" name="id"value='<?php echo $comment->id?>'></input>
             <button class="btn btn-link"type="submit">Excluir</button>
    </form>
  </div></div>
  <div class="row collapse" id='editComment<?php echo $comment->id?>'>
    <div class="col">
      <form method='POST' action="../backEnd/formActions/editComment.php">
        <input type="hidden" name="id" value='<?php echo $comment->id?>'>
        <input name="entrada" value='<?php echo $comment->comment;?>'></input>
        <button type="submit" class="btn btn-primary">Finalizar</button>
      </form>
    </div>
  </div>
  <!-- FIM-->

<?php
}
}
?>
