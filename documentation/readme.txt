$status antigo
0: "Confirmado o atendimento"; //não usado
1: "Não atendido";
2: "Tecnico indicado";
3: "Em atendimento";
4: "Atendido";
5: "Pendente";

$status novo:
0: "Não atendido";
1: "Em atendimento";
2: "Atendido";
3: "Suspenso";(quando não é possivel atender no momento)

Descrição:
raqiel é um sistema de chamados tecnicos hackeavel, ele propositalmente
aceita injeções de html na sessão de comentarios ( isso claramente não é preguiça do DEV)

Passo-a-passo para implementar o sistema:

0) Garanta que sua maquina tem apache2;

1)Setup mysql

Após fazer essa sessão lembre de editar o arquivo "inc/config.php", cada variável dele esta entre parenteses abaixo;

1.0) Crie uma conta de usuario ( $adm_user ) com privilégios no mysql e senha ( $adm_passwd );
1.1) Crie um banco de dados ( $db );
1.2) Crie 3 tabelas, uma para chamados ( $db_cht ), uma para funcionario ( $db_func ) e a terceira para os comentario( $db_comment );
No arquivo "./Estrutura_do_Banco_de_Dados.txt" tem os comandos do mysql para criar as tables;

1.3) Renomeie $servername para o nome/IP do seu servidor;

1.4) Adicione uma entrada no $db_func para fazer o primeiro login:
INSERT INTO tbfunc VALUES('root',md5('batata'));

2) Setup PHP

2.0) Habilite o modo de debug no arquivo "/etc/php/7.3/apache2/php.ini" para caso algo der errado;
2.1) Instalar Biblioteca mysqli;
    sudo apt-get install php-mysqli

Pronto! Tudo deve estar funcionando!
