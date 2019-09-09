<?php
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
   <form method='POST' action= '../backEnd/formActions/submitChangeStatus.php'>
   <input type='hidden' name='numCht' value=<?php echo $chtModel->id ?>>
     <div class='input-group mb-3'>

       <select name='status' class= "custom-select <?php echo $class?> text-white" onchange='this.form.submit()'>

       <?php foreach($text as $value){echo "<option>".$value."</option>";} ?>

   </select>
     </div>
   </form><?php
 }
 public function printCht($chtModel, $tecnico){
 ?>
   <div class='container rounded border border-dark'
   <?php switch($chtModel->tipo){
     case 0:
       ?>style="background-color:#F6F6FF"<?php
       $bgBt = ' background-color: Gray';
       break;
     case 1:
       ?>style="background-color:PeachPuff"<?php
       $bgBt = ' background-color: Gray';
       break;
     case 2:
       ?>style="background-color:lightblue"<?php
       $bgBt = 'background-color: Gray';
       break;


   };?>>
     <div class='row pt-3'>
       <div class='col col-lg-2'>
       <?php echo $this->displayStatus($chtModel)?>
       </div>
       <div class='col-sm'> #<?php echo $chtModel->data[2].$chtModel->data[3]."/". $chtModel->id."</div>"?>
       <div class='col-sm'> <?php echo $chtModel->nome?></div>
       <div class='col-sm'> <?php echo $chtModel->email?></div>
       <div class='col-sm'>sl. <?php echo $chtModel->sala?></div>
       <div class='col-sm'><?php echo $chtModel->usrsetor?></div>
       <div class='col-sm'><?php echo$chtModel->patrimonio?></div>
     </div>
     <div class= 'row'>
       <div class='col'>
         <?php echo $chtModel->sol?>
       </div>
     </div>

     <div class='row'>
       <div class='col-9 text-secondary'>
         <div class='row-sm'>
           Pode atender na ausência:
           <?php
           if($chtModel->atendimento_na_ausencia) echo " sim";
           else{echo "não |   Horario de atendimento: ". $chtModel->horario_preferencial;}?>
         </div>
         <div class='row-sl'>
           <?php
           $commentVisual = new commentVisual($chtModel->id);
           $commentVisual->printCommentSection($tecnico);
           ?>
         </div>
       </div>
       <div class='col'></div>
       <div class='col'>
	<div class='row'>
	<div class='col'>
         <?php
         if($chtModel->tipo == 1){ ?>
           <img src="../icons/note.png" style="width:100px;height:100px;">
           <?php
         }
         if($chtModel->tipo == 2){ ?>
           <img src="../icons/Tel.png" style="width:90px;height:90px;">
           <?php
         }?>
	</div>
	</div>
	<div class='row'>
	<form method='POST' action= '../backEnd/formActions/changeTipo.php'>
	<?php
	$bg = "";
   $text = '';
   switch($chtModel->tipo){
     case 0:
       $text = ["Telefonia","Notebook"];
       $bg = "#E2E2EC";
       break;
     case 1:
       $text = ["Comum","Telefonia"];
       $bg = "#EBC6C5";
       break;
     case 2:
       $text = ["Comum","Notebook"];
       $bg = "#87CEFA";
       break;
   } ?>
	<input type='hidden' name='numCht' value=<?php echo $chtModel->id ?>>
	<select name='tipo' style='background-color:<?php echo $bg ?>'  class= "custom-select" onchange='this.form.submit()'>
	<option></option>
	<?php foreach($text as $value){echo "<option>".$value."</option>";} ?>
	</select>
	</form>
	</div>
       </div>

     </div>

   </div>

   <br>
   <?php
 }
}
